
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
                        <h3 class="nk-block-title page-title"><?=$folder['name']?></h3>
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
                      <div class="nk-block-head-content d-none d-lg-block text-muted">
                        <?=$folder['department']['name']?> Department
                      </div>
                    </div>
                  </div>
                  <div class="nk-fmg-listing nk-block">
                    <div class="nk-files nk-files-view-list">
                      <div class="nk-files-head">
                        <div class="nk-file-item">
                          <div class="nk-file-info">
                            <div class="tb-head">Name</div>
                            <div class="tb-head"></div>
                          </div>
                          <div class="nk-file-meta">
                            <div class="dropdown">
                              <div class="tb-head">Created/Uploaded</div>
                            </div>
                          </div>
                          <div class="nk-file-members">
                            <div class="tb-head">Created/Uploaded By</div>
                          </div>
                          <div class="nk-file-actions">
                            <div class="dropdown">
                              <a href="javascript:void(0)" class="dropdown-toggle btn btn-sm btn-icon btn-trigger"><em class="icon ni ni-more-h"></em></a>
                            </div>
                          </div>
                        </div>
                      </div><!-- .nk-files-head -->
                      <div class="nk-files-list">
                        <?php foreach ($folders as $folder):?>
                          <div class="nk-file-item nk-file">
                            <div class="nk-file-info">
                              <div class="nk-file-title">
                                <div class="custom-control custom-control-sm custom-checkbox notext">
                                  <input type="checkbox" class="custom-control-input" id="file-check-<?=$folder['folder_id']?>">
                                  <label class="custom-control-label" for="file-check-<?=$folder['folder_id']?>"></label>
                                </div>
                                <div class="nk-file-icon">
                                  <span class="nk-file-icon-type">
                                    <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" viewBox="0 0 72 72">
                                      <path fill="#6C87FE" d="M57.5,31h-23c-1.4,0-2.5-1.1-2.5-2.5v-10c0-1.4,1.1-2.5,2.5-2.5h23c1.4,0,2.5,1.1,2.5,2.5v10C60,29.9,58.9,31,57.5,31z" />
                                      <path fill="#8AA3FF" d="M59.8,61H12.2C8.8,61,6,58,6,54.4V17.6C6,14,8.8,11,12.2,11h18.5c1.7,0,3.3,1,4.1,2.6L38,24h21.8c3.4,0,6.2,2.4,6.2,6v24.4C66,58,63.2,61,59.8,61z" />
                                      <path display="none" fill="#8AA3FF" d="M62.1,61H9.9C7.8,61,6,59.2,6,57c0,0,0-31.5,0-42c0-2.2,1.8-4,3.9-4h19.3c1.6,0,3.2,0.2,3.9,2.3l2.7,6.8c0.5,1.1,1.6,1.9,2.8,1.9h23.5c2.2,0,3.9,1.8,3.9,4v31C66,59.2,64.2,61,62.1,61z" />
                                      <path fill="#798BFF" d="M7.7,59c2.2,2.4,4.7,2,6.3,2h45c1.1,0,3.2,0.1,5.3-2H7.7z" />
                                    </svg>
                                  </span>
                                </div>
                                <div class="nk-file-name">
                                  <div class="nk-file-name-text">
                                    <a href="<?=site_url('folder/view_folder/').$folder['folder_id']?>" class="title"><?=$folder['name']?></a>
                                    <!--                                    <div class="nk-file-star asterisk"><a href="#"><em class="asterisk-off icon ni ni-star"></em><em class="asterisk-on icon ni ni-star-fill"></em></a></div>-->
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="nk-file-meta">
                              <div class="tb-lead">
                                <?php
                                $date = date_create($folder['created_at']);
                                echo date_format($date, 'd M Y, g:i a');
                                ?>
                              </div>
                            </div>
                            <div class="nk-file-members">
                              <!--                              <div class="tb-lead">--><?//=$file['creator']['name']?><!--</div>-->
                            </div>
                            <div class="nk-file-actions">
                            </div>
                          </div><!-- .nk-file -->
                        <?php endforeach;?>


                        <?php foreach ($files as $file):?>
                          <div class="nk-file-item nk-file">
                            <div class="nk-file-info">
                              <div class="nk-file-title">
                                <div class="custom-control custom-control-sm custom-checkbox notext">
                                  <input type="checkbox" class="custom-control-input" id="file-check-<?=$file['file_id']?>">
                                  <label class="custom-control-label" for="file-check-<?=$file['file_id']?>"></label>
                                </div>
                                <div class="nk-file-icon">
                                  <span class="nk-file-icon-type">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 72 72">
                                      <path d="M50,61H22a6,6,0,0,1-6-6V22l9-11H50a6,6,0,0,1,6,6V55A6,6,0,0,1,50,61Z" style="fill:#755de0" />
                                      <path d="M27.2223,43H44.7086s2.325-.2815.7357-1.897l-5.6034-5.4985s-1.5115-1.7913-3.3357.7933L33.56,40.4707a.6887.6887,0,0,1-1.0186.0486l-1.9-1.6393s-1.3291-1.5866-2.4758,0c-.6561.9079-2.0261,2.8489-2.0261,2.8489S25.4268,43,27.2223,43Z" style="fill:#fff" />
                                      <path d="M25,20.556A1.444,1.444,0,0,1,23.556,22H16l9-11h0Z" style="fill:#b5b3ff" />
                                    </svg>
                                    <!--                                    <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" viewBox="0 0 72 72">-->
                                    <!--                                      <path fill="#6C87FE" d="M57.5,31h-23c-1.4,0-2.5-1.1-2.5-2.5v-10c0-1.4,1.1-2.5,2.5-2.5h23c1.4,0,2.5,1.1,2.5,2.5v10C60,29.9,58.9,31,57.5,31z" />-->
                                    <!--                                      <path fill="#8AA3FF" d="M59.8,61H12.2C8.8,61,6,58,6,54.4V17.6C6,14,8.8,11,12.2,11h18.5c1.7,0,3.3,1,4.1,2.6L38,24h21.8c3.4,0,6.2,2.4,6.2,6v24.4C66,58,63.2,61,59.8,61z" />-->
                                    <!--                                      <path display="none" fill="#8AA3FF" d="M62.1,61H9.9C7.8,61,6,59.2,6,57c0,0,0-31.5,0-42c0-2.2,1.8-4,3.9-4h19.3c1.6,0,3.2,0.2,3.9,2.3l2.7,6.8c0.5,1.1,1.6,1.9,2.8,1.9h23.5c2.2,0,3.9,1.8,3.9,4v31C66,59.2,64.2,61,62.1,61z" />-->
                                    <!--                                      <path fill="#798BFF" d="M7.7,59c2.2,2.4,4.7,2,6.3,2h45c1.1,0,3.2,0.1,5.3-2H7.7z" />-->
                                    <!--                                    </svg>-->
                                  </span>
                                </div>
                                <div class="nk-file-name">
                                  <div class="nk-file-name-text">
                                    <a href="/file/download_file/<?=$file['file_id']?>" class="title"><?=$file['name']?></a>
                                    <div class="nk-file-star asterisk"><a href="#"><em class="asterisk-off icon ni ni-star"></em><em class="asterisk-on icon ni ni-star-fill"></em></a></div>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="nk-file-meta">
                              <div class="tb-lead">
                                <?php
                                $date = date_create($file['created_at']);
                                echo date_format($date, 'd M Y, g:i a');
                                ?>
                              </div>
                            </div>
                            <div class="nk-file-members">

                              <div class="tb-lead"><?=$file['creator']['name']?></div>
                            </div>
                            <div class="nk-file-actions">
                              <div class="dropdown">
                                <a href="" class="dropdown-toggle btn btn-sm btn-icon btn-trigger" data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                <div class="dropdown-menu dropdown-menu-right">
                                  <ul class="link-list-plain no-bdr">
                                    <!--                                    <li><a href="#file-details" data-toggle="modal"><em class="icon ni ni-eye"></em><span>Details</span></a></li>-->
                                    <!--                                    <li><a href="#file-share" data-toggle="modal"><em class="icon ni ni-share"></em><span>Share</span></a></li>-->
                                    <!--                                    <li><a href="#file-copy" data-toggle="modal"><em class="icon ni ni-copy"></em><span>Copy</span></a></li>-->
                                    <!--                                    <li><a href="#file-move" data-toggle="modal"><em class="icon ni ni-forward-arrow"></em><span>Move</span></a></li>-->
                                    <li><a href="/file/download_file/<?=$file['file_id']?>" class="file-dl-toast"><em class="icon ni ni-download"></em><span>Download</span></a></li>
                                    <!--                                    <li><a href="#"><em class="icon ni ni-pen"></em><span>Rename</span></a></li>-->
                                    <?php if ($session->is_admin == 1):?>
                                      <li><a href="javascript:void(0)" onclick="deleteFile(<?=$file['file_id']?>)"><em class="icon ni ni-trash"></em><span>Delete</span></a></li>
                                    <?php endif?>
                                  </ul>
                                </div>
                              </div>
                            </div>
                          </div><!-- .nk-file -->
                        <?php endforeach;?>

                      </div>
                    </div><!-- .nk-files -->
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
        <input type="hidden" value="<?=$folder['folder_id']?>" id="containing-folder">
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
          <button type="button" class="btn btn-primary ml-3" id="folder-submit-file">
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
        <form action="" id="add-folder-form-2">
          <div class="form-group">
            <label class="form-label" for="folder-name">Folder Name <span style="color: red"> *</span></label>
            <div class="form-control-wrap">
              <input autocomplete="off" type="text" class="form-control" id="folder-name" name="name">
            </div>
          </div>
          <input type="hidden" value="<?=$folder['folder_id']?>" id="containing-folder" name="folder">
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
<?php include('_folder-scripts.php');?>
</body>
</html>