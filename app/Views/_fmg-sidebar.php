<?php
  $session = session();
  $uri = current_url(true);
?>

<div class="nk-fmg-aside" data-content="files-aside" data-toggle-overlay="true" data-toggle-body="true" data-toggle-screen="lg" data-simplebar>
  <div class="nk-fmg-aside-wrap">
    <div class="nk-fmg-aside-top">
      <ul class="nk-fmg-menu">
        <li class="<?=$uri->getSegment(1) == '' || $uri->getSegment(1) == 'dashboard' ? 'active': ''?>">
          <a class="nk-fmg-menu-item" href="/dashboard">
            <em class="icon ni ni-home-alt"></em>
            <span class="nk-fmg-menu-text">Home</span>
          </a>
        </li>
        <li class="<?=$uri->getSegment(1) == 'file' ? 'active': ''?>">
          <a class="nk-fmg-menu-item" href="/file">
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
        <?php if($session->get('login') == 'admin'):?>
          <li class="<?=$uri->getSegment(1) == 'settings' ? 'active': ''?>">
            <a class="nk-fmg-menu-item" href="/settings/users">
              <em class="icon ni ni-setting-alt"></em>
              <span class="nk-fmg-menu-text">Settings</span>
            </a>
          </li>
        <?php endif?>
      </ul>
    </div>
  </div>
</div><!-- .nk-fmg-aside -->
