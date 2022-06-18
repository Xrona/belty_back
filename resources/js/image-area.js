$('#image-area').sortable({
  items: 'li:not(.add-image)'
})

$('#image-area').disableSelection()


$('#image-area .add-image button').on('click', function (e) {
  e.preventDefault()

  $(this).next('input').click()
})

function uploadImages(formData, success) {
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  })


  $.ajax({
    type: 'POST',
    url: '/upload-image',
    cache: false,
    contentType: false,
    processData: false,
    data: formData,
    dataType: 'JSON',
    beforeSend: function () {

    },
    success: success
  })
}

function removeImages(parent, success) {
  if (window.confirm('Do you really want to delete image?')) {
    let name = parent.attr('data-image-name')
    let id = parent.attr('data-image-id')

    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    })

    $.ajax({
      url: '/delete-image',
      type: 'POST',
      data: {
        'id': id ?? null,
        'name': name,
      },
      dataType: 'JSON',
      success: success
    })
  }
}

$('#postFileInput').change(function () {
  if (!window.FormData) {
    alert('FormData not found in your browser')
  } else {
    let formData = new FormData()

    const file = $('#postFileInput')[0].files[0]

    formData.append('file[]', file)

    uploadImages(formData, (data) => {
      $('.add-image').css('display', 'none').before(
        `<div class="image" style="background-image: url(${data[0]})"
                data-image-name="${data[0].split('/').pop()}"
                >
            <input class="d-none" type="text" name="image"  value="${data[0]}"">
            <div class="remove-image">
                <button>&times;</button>
            </div>
          </div>`
      )
    })
  }
})

$('#productFileInput').change(function () {
  if (window.FormData === undefined) {
    alert('FormData not found in your browser')
  } else {
    let formData = new FormData()

    $.each($('#productFileInput')[0].files, function (key, input) {
      formData.append('file[]', input)
    })

    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    })

    $.ajax({
      type: 'POST',
      url: '/upload-image',
      cache: false,
      contentType: false,
      processData: false,
      data: formData,
      dataType: 'JSON',
      beforeSend: function () {

      },
      success: function (data) {
        data.forEach(function (url) {
          $('.add-image').before(
            `<li class="image" style="background-image: url(${url})"
                data-image-name="${url.split('/').pop()}"
                >
            <input class="d-none" type="text" name="images[]"  value="${url}"">
            <div class="remove-image">
                <button>&times;</button>
            </div>
          </li>`
          )
        })
      }
    })
  }
})

$('#image-area.post-image').on('click', '.remove-image button', function (e) {
  e.preventDefault()
  const parent = $(this).closest('.image')

  removeImages(parent, (data) => {
    parent.remove()
    $('.add-image').css('display', 'block')
  })
})

$('#image-area.product-images').on('click', '.remove-image button', function (e) {
  e.preventDefault()
  const parent = $(this).closest('.image')

  removeImages(parent, (data) => {
    parent.remove()
  })
})
