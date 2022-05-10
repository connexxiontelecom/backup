<!DOCTYPE html>
<html lang="zxx" class="js">
<?php include('_head.php')?>
<body class="nk-body npc-default pg-auth">
<div class="nk-app-root">
  <!-- main @s -->
  <div class="nk-main ">
    <!-- wrap @s -->
    <div class="nk-wrap nk-wrap-nosidebar">
      <!-- content @s -->
      <div class="nk-content ">
        <div class="nk-block nk-block-middle nk-auth-body  wide-xs">
          <div class="brand-logo pb-4 text-center">
            <a href="/" class="logo-link">
              <img class="logo-light logo-img" src="/assets/images/logo-small.png" alt="logo">
              <img class="logo-dark logo-img" src="/assets/images/logo-dark-small.png" alt="logo-dark">
            </a>
          </div>
          <div class="card card-bordered">
            <div class="card-inner card-inner-lg">
              <div class="nk-block-head">
                <div class="nk-block-head-content">
                  <h4 class="nk-block-title">Login</h4>
                  <div class="nk-block-des">
                    <p>Access the Connexxion backup using your login key and passcode.</p>
                  </div>
                </div>
              </div>
              <form action="" class="pt-3" id="login-form">
                <div class="form-group">
                  <div class="form-label-group">
                    <label class="form-label" for="login">Login Key</label>
                  </div>
                  <input autocomplete="off" type="text" class="form-control" id="login" name="login">
                </div>
                <div class="form-group">
                  <div class="form-label-group">
                    <label class="form-label" for="password">Passcode</label>
                  </div>
                  <div class="form-control-wrap">
                    <a href="#" class="form-icon form-icon-right passcode-switch" data-target="password">
                      <em class="passcode-icon icon-show icon ni ni-eye"></em>
                      <em class="passcode-icon icon-hide icon ni ni-eye-off"></em>
                    </a>
                    <input autocomplete="off" type="password" class="form-control" id="password" name="password">
                  </div>
                </div>
                <div class="form-group mt-4">
                  <button class="btn btn-primary btn-block">Login</button>
                </div>
              </form>
            </div>
          </div>
        </div>
        <div class="nk-footer nk-auth-footer-full">
          <div class="container wide-lg">
            <div class="nk-block-content text-center">
              <p class="text-soft">
                &copy; <?=date("Y")?> Backup Service. Powered by <a href="https://connexxiontelecom.com" target="_blank">Connexxion Telecom</a>
              </p>
            </div>
          </div>
        </div>      </div>
      <!-- wrap @e -->
    </div>
    <!-- content @e -->
  </div>
  <!-- main @e -->
</div>
<!-- app-root @e -->
<!-- JavaScript -->
<?php include('_scripts.php'); ?>
<?php include('_auth-scripts.php');?>
</html>