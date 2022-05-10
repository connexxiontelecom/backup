<?php
$session = session();
?>

<script>
  $('#folder-submit-file').on('click', function () {
    let file = $('#file').prop('files')[0];
    let containingFolder = $('#containing-folder').val()
    if (!file) {
      Swal.fire("Invalid Submission", "A file is required!", "error");
    } else {
      let formData = new FormData();
      formData.append("file", file);
      formData.append("folder", containingFolder)
      $('#folder-submit-file').attr('hidden', true)
      $('#detail-name').html(`${file.name}`)
      $('#detail-type').html(`${file.type}`)
      $('#detail-size').html(`${readableBytes(file.size)}`)
      $('#file-details').attr('hidden', false)
      $('#uploading-file').attr('hidden', false)
      $.ajax({
        url: '<?=site_url('folder/upload_file')?>',
        type: 'post',
        data: formData,
        success: function (data) {
          $('#folder-submit-file').attr('hidden', false)
          $('#file-details').attr('hidden', true)
          $('#uploading-file').attr('hidden', true)
          if (data.success) {
            Swal.fire('Confirmed!', data.msg, 'success').then(() => {
              location.reload()
            })
          } else {
            Swal.fire('Sorry!', data.msg, 'error')
          }
        },
        cache: false,
        contentType: false,
        processData: false
      })
    }
  })
  function readableBytes(bytes) {
    var i = Math.floor(Math.log(bytes) / Math.log(1024)),
      sizes = ['B', 'KB', 'MB', 'GB', 'TB', 'PB', 'EB', 'ZB', 'YB'];
    return (bytes / Math.pow(1024, i)).toFixed(2) * 1 + ' ' + sizes[i];
  }
  $('form#add-folder-form-2').submit(function (e) {
    e.preventDefault()
    let name = $('#folder-name').val()
    let folder = $('#containing-folder').val()
    if (!name) {
      Swal.fire("Invalid Submission", "A folder name is required!", "error");
    } else {
      let formData = new FormData(this)
      Swal.fire({
        title: 'Are you sure?',
        text: 'This will add a new folder',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Confirm'
      }).then(function (confirm) {
        if (confirm.value) {
          $.ajax({
            url: '<?=site_url('folder/create_folder')?>',
            type: 'post',
            data: formData,
            success: function (data) {
              if (data.success) {
                Swal.fire('Confirmed!', data.msg, 'success').then(() => {
                  location.reload()
                })
              } else {
                Swal.fire('Sorry!', data.msg, 'error')
                console.log(data.meta)
              }
            },
            cache: false,
            contentType: false,
            processData: false
          })
        }
      })
    }
  })
</script>
