<?php
  $session = session();
?>

<div class="nk-apps-sidebar is-dark">
  <div class="nk-apps-brand">
    <a href="/dashboard" class="logo-link">
      <img class="logo-light logo-img" src="/assets/images/logo-small.png" alt="logo">
      <img class="logo-dark logo-img" src="/assets/images/logo-dark-small.png" alt="logo-dark">
    </a>
  </div>
  <div class="nk-sidebar-element">
    <div class="nk-sidebar-body">
      <div class="nk-sidebar-content" data-simplebar>
        <div class="nk-sidebar-menu">
          <!-- Menu -->
          <ul class="nk-menu apps-menu">
            <li class="nk-menu-item">
              <a href="/" class="nk-menu-link" title="File Manager">
                <span class="nk-menu-icon"><em class="icon ni ni-folder"></em></span>
              </a>
            </li>
          </ul>
        </div>
        <div class="nk-sidebar-footer">
          <ul class="nk-menu nk-menu-md">
            <li class="nk-menu-item">
              <a href="/settings/users" class="nk-menu-link" title="Settings">
                <span class="nk-menu-icon"><em class="icon ni ni-setting"></em></span>
              </a>
            </li>
          </ul>
        </div>
      </div>
      <div class="nk-sidebar-profile nk-sidebar-profile-fixed dropdown">
        <a href="#" data-toggle="dropdown" data-offset="50,-60">
          <div class="user-avatar">
            <em class="icon ni ni-user-alt"></em>
          </div>
        </a>
        <div class="dropdown-menu dropdown-menu-md ml-4">
          <div class="dropdown-inner user-card-wrap d-none d-md-block">
            <div class="user-card">
              <div class="user-avatar">
                <em class="icon ni ni-user-alt"></em>
              </div>
              <div class="user-info">
                <span class="lead-text"><?=$session->get('name')?></span>
                <span class="sub-text text-soft"><?=$session->get('email')?></span>
              </div>
            </div>
          </div>
          <div class="dropdown-inner">
            <ul class="link-list">
              <li><a href="html/user-profile-setting.html"><em class="icon ni ni-setting-alt"></em><span>Account Setting</span></a></li>
            </ul>
          </div>
          <div class="dropdown-inner">
            <ul class="link-list">
              <li><a href="/auth/logout"><em class="icon ni ni-signout"></em><span>Sign out</span></a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

