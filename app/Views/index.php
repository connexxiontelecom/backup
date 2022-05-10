<?php
  $session = session();
  function format_bytes($bytes, $precision = 2) {
    if ($bytes > 0) {
      $i = floor(log($bytes) / log(1024));
      $sizes = array('B', 'KB', 'MB', 'GB', 'TB', 'PB', 'EB', 'ZB', 'YB');
      return sprintf('%.02F', round($bytes / pow(1024, $i),1)) * 1 . ' ' . @$sizes[$i];
    } else {
      return 0;
    }
  }
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
                    <div class="nk-fmg-body-head d-none d-lg-flex">
                      <div class="nk-fmg-search">
                        <em class="icon ni ni-search"></em>
                        <input type="text" class="form-control border-transparent form-focus-none" placeholder="Search files, folders">
                      </div>
                      <div class="nk-fmg-actions">
                        <ul class="nk-block-tools g-3">
                          <li>
                            <div class="dropdown">
                              <a href="#" class="btn btn-light" data-toggle="dropdown"><em class="icon ni ni-plus"></em> <span>Create</span></a>
                              <div class="dropdown-menu dropdown-menu-right">
                                <ul class="link-list-opt no-bdr">
                                  <li><a href="#file-upload" data-toggle="modal"><em class="icon ni ni-upload-cloud"></em><span>Upload File</span></a></li>
                                  <li><a href="#create-folder" data-toggle="modal"><em class="icon ni ni-folder-plus"></em><span>Create Folder</span></a></li>
                                </ul>
                              </div>
                            </div>
                          </li>
                          <li><a href="#file-upload" class="btn btn-primary" data-toggle="modal"><em class="icon ni ni-upload-cloud"></em> <span>Upload</span></a></li>
                        </ul>
                      </div>
                    </div>
                    <div class="nk-fmg-body-content">
                      <div class="nk-block-head nk-block-head-sm">
                        <div class="nk-block-between position-relative">
                          <div class="nk-block-head-content">
                            <h3 class="nk-block-title page-title">Home</h3>
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
                                      <li><a href="#create-folder" data-toggle="modal"><em class="icon ni ni-folder-plus"></em><span>Create Folder</span></a></li>
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
                      <div class="nk-block">
                        <div class="row g-gs">
                          <div class="col-xl-3 col-lg-3 col-md-3">
                            <div class="card card-bordered">
                              <div class="card-inner">
                                <div class="card-title-group align-start mb-2">
                                  <div class="card-title">
                                    <h6 class="title">Uploaded Files</h6>
                                  </div>
                                  <div class="card-tools">
                                    <a href="/file" class="link link-sm">View More</a>
                                  </div>
                                </div>
                                <div class="align-end flex-sm-wrap g-4 flex-md-nowrap">
                                  <div class="nk-sale-data">
                                    <span class="amount"><?=count($files)?></span>
                                    <span class="sub-title">Total files uploaded</span>
                                  </div>
                                </div>
                              </div>
                            </div><!-- .card -->
                          </div><!-- .col -->
                          <div class="col-xl-3 col-lg-3 col-md-3">
                            <div class="card card-bordered">
                              <div class="card-inner">
                                <div class="card-title-group align-start mb-2">
                                  <div class="card-title">
                                    <h6 class="title">Department Folders</h6>
                                  </div>
                                  <div class="card-tools">
                                    <a href="/file" class="link link-sm">View More</a>
                                  </div>
                                </div>
                                <div class="align-end flex-sm-wrap g-4 flex-md-nowrap">
                                  <div class="nk-sale-data">
                                    <span class="amount"><?=count($folders)?></span>
                                    <span class="sub-title">Total department folders</span>
                                  </div>
                                </div>
                              </div>
                            </div><!-- .card -->
                          </div><!-- .col -->
                        </div>
                      </div>
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
    <div class="modal fade" tabindex="-1" role="dialog" id="file-upload">
      <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Upload File</h5>
            <a href="#" class="close" data-dismiss="modal" aria-label="Close">
              <em class="icon ni ni-cross"></em>
            </a>
          </div>
          <div class="modal-body">
            <div class="form-group">
              <label class="form-label" for="customFileLabel">Select File <span style="color: red"> *</span></label>
              <div class="form-control-wrap">
                <div class="custom-file">
                  <input type="file" class="custom-file-input" id="file" name="file">
                  <label class="custom-file-label" for="file">Choose file</label>
                </div>
              </div>
            </div>
            <div class="alert alert-icon alert-primary" role="alert" hidden id="file-details">
              <em class="icon ni ni-alert-circle"></em>
              <strong>File upload is in progress</strong>. Details for this file include: <br>
              File Name: <span id="detail-name"></span><br>
              File Type: <span id="detail-type"></span><br>
              File Size: <span id="detail-size"></span><br>
            </div>
            <div class="form-group">
              <a href="#" data-dismiss="modal" class="btn btn-light">Cancel</a>
              <button class="btn btn-primary ml-3" type="button" disabled hidden id="uploading-file">
                <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                <span> Uploading... </span>
              </button>
              <button type="button" class="btn btn-primary ml-3" id="submit-file">
                Submit File
              </button>
            </div>
          </div>
        </div><!-- .modal-content -->
      </div><!-- .modla-dialog -->
    </div><!-- .modal -->
    <div class="modal fade" tabindex="-1" role="dialog" id="create-folder">
      <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Create Folder</h5>
            <a href="#" class="close" data-dismiss="modal" aria-label="Close">
              <em class="icon ni ni-cross"></em>
            </a>
          </div>
          <div class="modal-body">
            <form action="" id="add-folder-form">
              <div class="form-group">
                <label class="form-label" for="folder-name">Folder Name <span style="color: red"> *</span></label>
                <div class="form-control-wrap">
                  <input autocomplete="off" type="text" class="form-control" id="folder-name" name="name">
                </div>
              </div>
              <?php if($session->is_admin == 1):?>
                <div class="form-group">
                  <label class="form-label" for="folder-department">Department <span style="color: red"> *</span></label>
                  <div class="form-control-wrap">
                    <select class="form-select form-control" data-search="on" id="folder-department" name="department">
                      <option value="">Default Option</option>
                      <?php foreach ($departments as $department):?>
                        <option value="<?= $department['department_id'] ?>"><?=$department['name']?></option>
                      <?php endforeach;?>
                    </select>
                  </div>
                </div>
              <?php endif?>
              <div class="form-group">
                <a href="#" data-dismiss="modal" class="btn btn-light">Cancel</a>
                <button type="submit" class="btn btn-primary ml-3">Create New Folder</button>
              </div>
            </form>
          </div>
        </div><!-- .modal-content -->
      </div><!-- .modla-dialog -->
    </div><!-- .modal -->

    <?php include('_scripts.php');?>
  </body>
</html>