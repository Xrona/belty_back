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

  $('.discount-button').on('click', function () {
    let productId =  $(this).attr('data-product-id')
    let productName = $(this).attr('data-product-name')

    $('#discountAccordion #productName').html(productName)
  })
})
