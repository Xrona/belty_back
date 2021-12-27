$('#image-area').sortable({
  items: 'li:not(.add-image)'
})

$('#image-area').disableSelection()


$('#image-area .add-image button').on('click', function(e) {
  e.preventDefault()

  $(this).next('input').click()
})

$('#productFileInput').change(function() {
  if(window.FormData === undefined) {
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
        data.forEach(function(url) {
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

$('#image-area').on('click', '.remove-image button',function(e) {
  e.preventDefault()

  if(window.confirm('Do you really want to delete image?')) {
    let parent = $(this).closest('.image')
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
      success: function(data) {
        console.log(data)
        parent.remove()
      }
    })
  }
})
