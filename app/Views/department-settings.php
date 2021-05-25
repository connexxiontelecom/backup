<?php
$session = session();
?>
<!DOCTYPE html>
<html lang="en" class="js">
<?php include('_head.php'); ?>
<body class="nnk-body npc-apps apps-only has-apps-sidebar npc-apps-files">
<div class="nk-app-root">
  <?php include('_sidebar.php'); ?>
  <div class="nk-main ">
    <!-- wrap @s -->
    <div class="nk-wrap ">
      <!-- main header @s -->
      <?php include('_header.php'); ?>
      <!-- main header @e -->
      <?php include('_index-sidebar.php'); ?>
      <!-- content @s -->
      <div class="nk-content p-0">
        <div class="nk-content-inner">
          <div class="nk-content-body">
            <div class="nk-fmg">
              <?php include('_fmg-sidebar.php'); ?>
              <div class="nk-fmg-body">
                <div class="nk-fmg-body-content">
                  <div class="nk-block-head nk-block-head-sm">
                    <div class="nk-block-between position-relative">
                      <div class="nk-block-head-content">
                        <h3 class="nk-block-title page-title">Settings</h3>
                      </div>
                      <div class="nk-block-head-content">
                        <ul class="nk-block-tools g-1">
                          <li class="d-lg-none">
                            <a href="#" class="btn btn-trigger btn-icon search-toggle toggle-search" data-target="search"><em class="icon ni ni-search"></em></a>
                          </li>
                          <li class="d-lg-none">
                            <div class="dropdown">
                              <a href="#" class="btn btn-trigger btn-icon" data-toggle="dropdown"><em class="icon ni ni-plus"></em></a>
                              <div class="dropdown-menu dropdown-menu-right">
                                <ul class="link-list-opt no-bdr">
                                  <li><a href="#file-upload" data-toggle="modal"><em class="icon ni ni-upload-cloud"></em><span>Upload File</span></a></li>
                                  <li><a href="#"><em class="icon ni ni-file-plus"></em><span>Create File</span></a></li>
                                  <li><a href="#"><em class="icon ni ni-folder-plus"></em><span>Create Folder</span></a></li>
                                </ul>
                              </div>
                            </div>
                          </li>
                          <li class="d-lg-none mr-n1"><a href="#" class="btn btn-trigger btn-icon toggle" data-target="files-aside"><em class="icon ni ni-menu-alt-r"></em></a></li>
                        </ul>
                      </div>
                      <div class="search-wrap px-2 d-lg-none" data-search="search">
                        <div class="search-content">
                          <a href="#" class="search-back btn btn-icon toggle-search" data-target="search"><em class="icon ni ni-arrow-left"></em></a>
                          <input type="text" class="form-control border-transparent form-focus-none" placeholder="Search by user or message">
                          <button class="search-submit btn btn-icon"><em class="icon ni ni-search"></em></button>
                        </div>
                      </div><!-- .search-wrap -->
                    </div>
                  </div>
                  <div class="nk-fmg-quick-list nk-block">
                    <ul class="nk-nav nav nav-tabs">
                      <li class="nav-item">
                        <a class="nav-link" href="/settings/users">Users</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link active" href="/settings/departments">Departments</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="#">Security</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="#">Billings</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="#">Notifications</a>
                      </li>
                    </ul><!-- .nk-nav -->
                  </div>
                  <div class="nk-block nk-block-xs pt-0">
                    <div class="user-plan-wrap">
                      <div class="user-plan">
                        <div class="user-plan-info">
                          <div class="user-plan-title">All Departments</div>
                        </div>
                        <div class="user-plan-actions">
                          <ul class="btn-toolbar align-center g-4">
                            <li class="order-1 order-sm-2">
                              <a href="#add-department" class="btn btn-sm btn-primary" data-toggle="modal">Add Department</a>
                            </li>
                          </ul>
                        </div>
                      </div>
                    </div>
                    <div class="card card-preview">
                      <div class="card-inner">
                        <table class="datatable-init table">
                          <thead>
                          <tr>
                            <th>Name</th>
                            <th>Options</th>
                          </tr>
                          </thead>
                          <tbody>
                            <?php foreach ($departments as $department):?>
                              <tr>
                                <td><?=$department['name']?></td>
                                <td style="width: 10%">
                                  <a href="javascript:void(0)" class="link link-sm"><span>Edit</span></a>
                                </td>
                              </tr>
                            <?php endforeach;?>
                          </tbody>
                        </table>
                      </div>
                    </div><!-- .card-preview -->
                  </div><!-- .nk-block -->
                </div><!-- .nk-fmg-body-content -->
              </div><!-- .nk-fmg-body -->
            </div><!-- .nk-fmg -->
          </div>
        </div>
      </div>
      <!-- content @e -->
    </div>
    <!-- wrap @e -->
  </div>
</div>
<div class="modal fade zoom" tabindex="-1" id="add-department">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Department Info</h5>
        <a href="#" class="close" data-dismiss="modal" aria-label="Close">
          <em class="icon ni ni-cross"></em>
        </a>
      </div>
      <div class="modal-body">
        <form action="" id="add-department-form">
          <div class="form-group">
            <label class="form-label" for="name">Name  <span style="color: red"> *</span></label>
            <div class="form-control-wrap">
              <input type="text" class="form-control" id="name" name="name">
            </div>
          </div>
          <div class="form-group">
            <a href="#" data-dismiss="modal" class="btn btn-light">Cancel</a>
            <button type="submit" class="btn btn-primary ml-3">Create New Department</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<?php include('_scripts.php');?>
<?php include('_settings-script.php');?>
</body>
</html>