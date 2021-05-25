<?php
  $session = session();
?>

<script>
  $(document).ready(function () {
    $('form#add-department-form').submit(function (e) {
      e.preventDefault()
      let name = $('#name').val()
      if (!name) {
        Swal.fire("Invalid Submission", "A department name is required!", "error");
      } else {
        let formData = new FormData(this)
        Swal.fire({
          title: 'Are you sure?',
          text: 'This will add a new department',
          icon: 'warning',
          showCancelButton: true,
          confirmButtonText: 'Confirm'
        }).then(function (confirm) {
          if (confirm.value) {
            $.ajax({
              url: '<?=site_url('settings/create_department')?>',
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

  })
</script>