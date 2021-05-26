<?php
 $session = session();
?>
<div class="nk-header nk-header-fixed is-light">
  <div class="container-fluid">
    <div class="nk-header-wrap">
      <div class="nk-header-app-name">
        <div class="nk-header-app-logo">
          <em class="icon ni ni-folder bg-purple-dim"></em>
        </div>
        <div class="nk-header-app-info">
          <span class="sub-text">Welcome,</span>
          <span class="lead-text"><?=$session->get('name')?></span>
        </div>
      </div>
      <div class="nk-header-tools">
        <ul class="nk-quick-nav">
          <li class="dropdown notification-dropdown">
            <a href="#" class="dropdown-toggle nk-quick-nav-icon" data-toggle="dropdown">
              <div class="icon-status icon-status-secondary"><em class="icon ni ni-bell"></em></div>
            </a>
          </li>
          <li class="dropdown list-apps-dropdown d-lg-none">
            <a href="#" class="dropdown-toggle nk-quick-nav-icon" data-toggle="dropdown">
              <div class="icon-status icon-status-na"><em class="icon ni ni-menu-circled"></em></div>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
              <div class="dropdown-body">
                <ul class="list-apps">
                  <li>
                    <a href="html/index.html">
                      <span class="list-apps-media"><em class="icon ni ni-dashlite bg-primary text-white"></em></span>
                      <span class="list-apps-title">Dashboard</span>
                    </a>
                  </li>
                  <li>
                    <a href="html/apps/chats.html">
                      <span class="list-apps-media"><em class="icon ni ni-chat-circle bg-info-dim"></em></span>
                      <span class="list-apps-title">Chats</span>
                    </a>
                  </li>
                  <li>
                    <a href="html/apps/mailbox.html">
                      <span class="list-apps-media"><em class="icon ni ni-inbox bg-purple-dim"></em></span>
                      <span class="list-apps-title">Mailbox</span>
                    </a>
                  </li>
                  <li>
                    <a href="html/apps/messages.html">
                      <span class="list-apps-media"><em class="icon ni ni-chat bg-success-dim"></em></span>
                      <span class="list-apps-title">Messages</span>
                    </a>
                  </li>
                  <li>
                    <a href="html/apps/file-manager.html">
                      <span class="list-apps-media"><em class="icon ni ni-folder bg-purple-dim"></em></span>
                      <span class="list-apps-title">File Manager</span>
                    </a>
                  </li>
                  <li>
                    <a href="html/components.html">
                      <span class="list-apps-media"><em class="icon ni ni-layers bg-secondary-dim"></em></span>
                      <span class="list-apps-title">Components</span>
                    </a>
                  </li>
                </ul>
                <ul class="list-apps">
                  <li>
                    <a href="/demo2/ecommerce/index.html">
                      <span class="list-apps-media"><em class="icon ni ni-cart bg-danger-dim"></em></span>
                      <span class="list-apps-title">Ecommerce Panel</span>
                    </a>
                  </li>
                  <li>
                    <a href="/demo4/subscription/index.html">
                      <span class="list-apps-media"><em class="icon ni ni-calendar-booking bg-primary-dim"></em></span>
                      <span class="list-apps-title">Subscription Panel</span>
                    </a>
                  </li>
                  <li>
                    <a href="/demo5/crypto/index.html">
                      <span class="list-apps-media"><em class="icon ni ni-bitcoin-cash bg-warning-dim"></em></span>
                      <span class="list-apps-title">Crypto Wallet Panel</span>
                    </a>
                  </li>
                  <li>
                    <a href="/demo6/invest/index.html">
                      <span class="list-apps-media"><em class="icon ni ni-invest bg-blue-dim"></em></span>
                      <span class="list-apps-title">HYIP Invest Panel</span>
                    </a>
                  </li>
                </ul>
              </div><!-- .nk-dropdown-body -->
            </div>
          </li>
          <li class="dropdown user-dropdown">
            <a href="#" class="dropdown-toggle mr-n1" data-toggle="dropdown">
              <div class="user-toggle">
                <div class="user-avatar sm">
                  <em class="icon ni ni-user-alt"></em>
                </div>
              </div>
            </a>
            <div class="dropdown-menu dropdown-menu-md dropdown-menu-right">
              <div class="dropdown-inner user-card-wrap bg-lighter d-none d-md-block">
                <div class="user-card">
                  <div class="user-avatar">
                    <em class="icon ni ni-user-alt"></em>
                  </div>
                  <div class="user-info">
                    <span class="lead-text"><?=$session->get('name')?></span>
                    <span class="sub-text"><?=$session->get('email')?></span>
                  </div>
                </div>
              </div>
              <div class="dropdown-inner">
                <ul class="link-list">
                  <li><a href="html/user-profile-setting.html"><em class="icon ni ni-setting-alt"></em><span>Account Setting</span></a></li>
                  <li><a class="dark-switch" href="#"><em class="icon ni ni-moon"></em><span>Dark Mode</span></a></li>
                </ul>
              </div>
              <div class="dropdown-inner">
                <ul class="link-list">
                  <li><a href="/auth/logout"><em class="icon ni ni-signout"></em><span>Sign out</span></a></li>
                </ul>
              </div>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </div>
</div>
