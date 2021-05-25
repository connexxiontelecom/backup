<?php
  $session = session();
  $uri = current_url(true);
?>

<div class="nk-fmg-aside" data-content="files-aside" data-toggle-overlay="true" data-toggle-body="true" data-toggle-screen="lg" data-simplebar>
  <div class="nk-fmg-aside-wrap">
    <div class="nk-fmg-aside-top">
      <ul class="nk-fmg-menu">
        <li class="<?=$uri->getSegment(1) == 'dashboard' ? 'active': ''?>">
          <a class="nk-fmg-menu-item" href="html/apps/file-manager.html">
            <em class="icon ni ni-home-alt"></em>
            <span class="nk-fmg-menu-text">Home</span>
          </a>
        </li>
        <li>
          <a class="nk-fmg-menu-item" href="html/apps/files.html">
            <em class="icon ni ni-file-docs"></em>
            <span class="nk-fmg-menu-text">Files</span>
          </a>
        </li>
        <li>
          <a class="nk-fmg-menu-item" href="html/apps/starred.html">
            <em class="icon ni ni-star"></em>
            <span class="nk-fmg-menu-text">Starred</span>
          </a>
        </li>
        <li>
          <a class="nk-fmg-menu-item" href="html/apps/shared.html">
            <em class="icon ni ni-share-alt"></em>
            <span class="nk-fmg-menu-text">Shared</span>
          </a>
        </li>
        <li>
          <a class="nk-fmg-menu-item" href="html/apps/recovery.html">
            <em class="icon ni ni-trash-alt"></em>
            <span class="nk-fmg-menu-text">Recovery</span>
          </a>
        </li>
        <li class="<?=$uri->getSegment(1) == 'settings' ? 'active': ''?>">
          <a class="nk-fmg-menu-item" href="/settings/users">
            <em class="icon ni ni-setting-alt"></em>
            <span class="nk-fmg-menu-text">Settings</span>
          </a>
        </li>
      </ul>
    </div>
    <div class="nk-fmg-aside-bottom">
      <div class="nk-fmg-status">
        <h6 class="nk-fmg-status-title"><em class="icon ni ni-hard-drive"></em><span>Storage</span></h6>
        <div class="progress progress-md bg-light">
          <div class="progress-bar" data-progress="5"></div>
        </div>
        <div class="nk-fmg-status-info">12.47 GB of 50 GB used</div>
        <div class="nk-fmg-status-action">
          <a href="#" class="link link-primary link-sm">Upgrade Storage</a>
        </div>
      </div>
      <div class="nk-fmg-switch">
        <div class="dropdown">
          <a href="#" data-toggle="dropdown" data-offset="-10, 12" class="dropdown-toggle dropdown-indicator-unfold">
            <div class="lead-text">Personal</div>
            <div class="sub-text">Only you</div>
          </a>
          <div class="dropdown-menu dropdown-menu-right">
            <ul class="link-list-opt no-bdr">
              <li><a href="#"><span>Team Plan</span></a></li>
              <li><a class="active" href="#"><span>Personal</span></a></li>
              <li class="divider"></li>
              <li><a class="link" href="#"><span>Upgrade Plan</span></a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</div><!-- .nk-fmg-aside -->
