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

    $('form#add-user-form').submit(function (e) {
      e.preventDefault()
      let fullName = $('#name').val()
      let login = $('#login').val()
      let email = $('#email').val()
      let password = $('#password').val()
      let department = $('#department').val()
      if (!fullName) {
        Swal.fire("Invalid Submission", "A full name is required!", "error");
      } else if (!login) {
        Swal.fire("Invalid Submission", "A login key is required!", "error");
      } else if (!email) {
        Swal.fire("Invalid Submission", "An email address is required!", "error");
      } else if (!password) {
        Swal.fire("Invalid Submission", "A password is required!", "error");
      } else if (!department) {
        Swal.fire("Invalid Submission", "A department is required!", "error");
      } else {
        let formData = new FormData(this)
        // for (var pair of formData.entries()) {
        //   console.log(pair[0]+ ', ' + pair[1]);
        // }
        Swal.fire({
          title: 'Are you sure?',
          text: 'This will add a new user to the backup',
          icon: 'warning',
          showCancelButton: true,
          confirmButtonText: 'Confirm'
        }).then(function (confirm) {
          if (confirm.value) {
            $.ajax({
              url: '<?=site_url('settings/create_user')?>',
              type: 'post',
              data: formData,
              success: function (data) {
                if (data.success) {
                  Swal.fire('Confirmed!', data.msg, 'success').then(() => {
                    location.href = '<?=site_url('/settings/users')?>'
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

  function deleteUser(user) {
    Swal.fire({
      title: 'Are you sure?',
      text: 'This will delete the user',
      icon: 'warning',
      showCancelButton: true,
      confirmButtonText: 'Confirm'
    }).then(function (confirm) {
      if (confirm.value) {
        $.ajax({
          url: `<?=site_url('settings/delete_user')?>/${user}`,
          type: 'get',
          success: function (data) {
            if (data.success) {
              Swal.fire('Confirmed!', data.msg, 'success').then(() => {
                location.reload()
              })
            } else {
              Swal.fire('Sorry!', data.msg, 'error')
              console.log(data.meta)
            }
          }
        })
      }
    })
  }
</script>