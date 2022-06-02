import './image-area.js'

$(function () {
  $('.color-picker').colorpicker()

  try {
    $('.select2').select2();
  } catch (error) {
    console.log(error)
  }

  $('.color-body').on('click', function (e) {
    $(this).toggleClass('color-active')

    let checkbox = $(this).next('input')[0]

    checkbox.toggleAttribute('checked')
  })

  $('.color-radio-body').on('click', function (e) {
    let radio = $(this).next('input')[0]

    if (!radio.hasAttribute('checked')) {
      $('.color-radio-body').each(function () {
        $(this).removeClass('color-active')
        let radio = $(this).next('input')[0]
        radio.removeAttribute('checked')
      })

      $(this).toggleClass('color-active')
      radio.toggleAttribute('checked')
    }
  })

  $('.enable-discount').on('click', function (e) {
    let id = $(this).attr('data-enable-product-id')

    $.ajax({
      url: `/products/enable-discount/${id}`,
      type: 'GET',
      success: function (data) {
        if (data) {
          $('.toast-discount').toast('show')
        }
      }
    })
  })

  $('.product-status').on('click', function (e) {
    let id = $(this).attr('data-product-id')

    $.ajax({
      url: `/products/status/${id}`,
      type: 'GET',
      success: function (data) {
        if (data) {
          $('.toast-status').toast('show')
        }
      }
    })
  })

  $('.product-bestseller').on('click', function (e) {
    let id = $(this).attr('data-product-id')

    $.ajax({
      url: `/products/bestseller/${id}`,
      type: 'GET',
      success: function (data) {
        if (data) {
          $('.toast-bestseller').toast('show')
        }
      }
    })
  })

  let discountPrice
  let discount

  $('.discount-button').on('click', function () {
    let productId = $(this).attr('data-product-id')
    let productName = $(this).attr('data-product-name')
    let tr = $(this).parent().parent();

    discountPrice = tr.find('.td-discount-price')
    discount = tr.find('.td-discount')

    $('#discountAccordion #productName').html(productName)
    $('#formCreateDiscount .product-id').val(productId)
    $('#formAddDiscount .product-id').val(productId)
  })

  $('#formAddDiscount').submit(function (e) {
    e.preventDefault()

    let form = $(this)

    $.ajax({
      url: '/products/add-discount',
      type: 'POST',
      dataType: 'JSON',
      data: $(this).serialize(),
      beforeSend: function () {
        form.find("[type='submit']").html(
          `<div class="spinner-border text-light" role="status">
            <span class="sr-only">Loading...</span>
          </div>`
        )
      },
      success: function (data) {
        discount.html(data['discount'])
        discountPrice.html(data['discount_price'])
        $('#discountModal').modal('hide')
        form.find("[type='submit']").html(
          'Confirm'
        )
        $(`[data-enable-product-id=${data['product_id']}]`).prop('checked', true).prop('disabled', false)
      }
    })
  })

  $('#formCreateDiscount').submit(function (e) {
    e.preventDefault()
    let form = $(this)
    $.ajax({
      url: '/products/add-new-discount',
      type: 'POST',
      dataType: 'JSON',
      data: $(this).serialize(),
      beforeSend: function () {
        form.find("[type='submit']").html(
          `<div class="spinner-border text-light" role="status">
            <span class="sr-only">Loading...</span>
          </div>`
        )
      },
      success: function (data) {
        discount.html(data['discount'])
        discountPrice.html(data['discount_price'])
        $('#discountModal').modal('hide')
        form.find("[type='submit']").html(
          'Confirm'
        )
        form.find("[name='value']").val('')
        form.find("[name='is_percent']").prop('checked', false)
        $('#formAddDiscount select').append(`<option value="${data.discount_id}">${data.discount} ${data.unit}</option>`)
        $(`[data-enable-product-id=${data['product_id']}]`).prop('checked', true).prop('disabled', false)
      }
    })
  })

  $('#productSearchClear').on('click', function (e) {
    e.preventDefault()

    $('#productSearchInput').val('')

    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    })

    $.ajax({
      url: '/discounts/search-products',
      type: 'POST',
      dataType: 'JSON',
      data: {
        'search': '',
      },
      beforeSend: loadingSearchProducts,
      success: addCardList,
    })
  })

  $('#productSearchInput').bind('input', function () {
    let search = $(this).val()

    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    })

    $.ajax({
      url: '/discounts/search-products',
      type: 'POST',
      dataType: 'JSON',
      data: {
        'search': search,
      },
      beforeSend: loadingSearchProducts,
      success: addCardList,
    })
  })

  function loadingSearchProducts() {
    let listBody = $('.product-discount-list')

    listBody.empty()

    listBody.append(`
      <div class="d-flex justify-content-center">
        <div class="spinner-border text-primary" role="status">
          <span class="sr-only">Loading...</span>
        </div>
      </div>
    `)
  }

  function addCardList(data) {
    let listBody = $('.product-discount-list')
    let iteration = 1
    listBody.empty()

    data['products'].forEach(
      (elem) => {
        listBody.append(
          `<div class="card">
              <div class="card-body">
                  <div class="product-discount d-flex justify-content-between align-items-center">
                      <div>${iteration}</div>
                      <div class="name">${elem['name']}</div>
                      <div class="price">${elem['price']}</div>
                      <input type="checkbox" name="products[]" value="${elem['id']}">
                  </div>
              </div>
            </div>`
        )
        iteration++
      }
    )
  }

  let statusId
  let id

  $('.change-status-button').on('click', function () {
    statusId = $(this).attr('data-status-id')
    id = $(this).attr('data-order-id')

    let select = $('#orderStatusModal select')

    select.val(statusId)
    select.trigger('change')
  })

  $('#orderStatusModal select').change(function () {
    if (statusId !== $(this).val()) {
      let status = $(this).val()

      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      })

      $.ajax({
        url: `/orders/change-status/${id}`,
        type: 'POST',
        dataType: 'JSON',
        data: {
          'status': status,
        },
        beforeSend: function () {
          $('#orderStatusModal .spinner').toggleClass('d-none')
        },
        success: function (data) {
          $('#orderStatusModal').modal('hide')

          if (data) {
            $(`.change-status-button[data-order-id=${id}]`)
              .attr('data-status-id', status)

            $(`#order${id}`).html(data['status'])
              .removeClass(`status-${statusId}`)
              .addClass(`status-${status}`)
          }
        },
        complete: function () {
          $('#orderStatusModal .spinner').toggleClass('d-none')
        }
      })
    }
  })
})
