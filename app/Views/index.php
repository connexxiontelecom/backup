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
                                  <li><a href="#"><em class="icon ni ni-folder-plus"></em><span>Create Folder</span></a></li>
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
                      <div class="nk-block">
                        <div class="row g-gs">
                          <div class="col-xl-3 col-lg-3 col-md-3">
                            <div class="card card-bordered">
                              <div class="card-inner">
                                <div class="card-title-group align-start mb-2">
                                  <div class="card-title">
                                    <h6 class="title">All Files</h6>
                                  </div>
                                  <div class="card-tools">
                                    <a href="#" class="link link-sm">View More</a>
                                  </div>
                                </div>
                                <div class="align-end flex-sm-wrap g-4 flex-md-nowrap">
                                  <div class="nk-sale-data">
                                    <span class="amount">0</span>
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
                                    <h6 class="title">Starred Files</h6>
                                  </div>
                                  <div class="card-tools">
                                    <a href="" class="link link-sm">View More</a>
                                  </div>
                                </div>
                                <div class="align-end flex-sm-wrap g-4 flex-md-nowrap">
                                  <div class="nk-sale-data">
                                    <span class="amount">0</span>
                                    <span class="sub-title">Total files starred</span>
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
                                    <h6 class="title">Shared Files</h6>
                                  </div>
                                  <div class="card-tools">
                                    <a href="" class="link link-sm">View More</a>
                                  </div>
                                </div>
                                <div class="align-end flex-sm-wrap g-4 flex-md-nowrap">
                                  <div class="nk-sale-data">
                                    <span class="amount">0</span>
                                    <span class="sub-title">Files shared with me</span>
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
                                    <h6 class="title">Deleted files</h6>
                                  </div>
                                  <div class="card-tools">
                                    <a href="/subscription" class="link link-sm">View More</a>
                                  </div>
                                </div>
                                <div class="align-end flex-sm-wrap g-4 flex-md-nowrap">
                                  <div class="nk-sale-data">
                                    <span class="amount">0</span>
                                    <span class="sub-title">Total files deleted</span>
                                  </div>
                                </div>
                              </div>
                            </div><!-- .card -->
                          </div><!-- .col -->
                        </div>
                      </div>
                      <div class="nk-fmg-listing nk-block">
                        <div class="nk-block-head-xs">
                          <div class="nk-block-between g-2">
                            <div class="nk-block-head-content">
                              <h6 class="nk-block-title title">Recent Files</h6>
                            </div>
                            <div class="nk-block-head-content">
                              <a href="#" class="link link-primary toggle-opt active" data-target="recent-files">
                                <div class="inactive-text">Show</div>
                                <div class="active-text">Hide</div>
                              </a>
                            </div>
                          </div>
                        </div><!-- .nk-block-head -->
                        <div class="toggle-expand-content expanded" data-content="recent-files">
                          <div class="nk-files nk-files-view-group">
                            <div class="nk-files-head">
                              <div class="nk-file-item">
                                <div class="nk-file-info">
                                  <div class="dropdown">
                                    <div class="tb-head dropdown-toggle dropdown-indicator-caret" data-toggle="dropdown">Last Opened</div>
                                    <div class="dropdown-menu dropdown-menu-xs">
                                      <ul class="link-list-opt no-bdr">
                                        <li><a class="active" href="#"><span>Last Opened</span></a></li>
                                        <li><a href="#"><span>Name</span></a></li>
                                        <li><a href="#"><span>Size</span></a></li>
                                      </ul>
                                    </div>
                                  </div>
                                </div>
                                <div class="nk-file-actions">
                                  <div class="dropdown">
                                    <a href="" class="dropdown-toggle btn btn-sm btn-icon btn-trigger" data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                      <ul class="link-list-opt no-bdr">$file['name']
                                        <li><a href="#file-share" data-toggle="modal"><em class="icon ni ni-share"></em><span>Share</span></a></li>
                                        <li><a href="#file-copy" data-toggle="modal"><em class="icon ni ni-copy"></em><span>Copy</span></a></li>
                                        <li><a href="#file-move" data-toggle="modal"><em class="icon ni ni-forward-arrow"></em><span>Move</span></a></li>
                                        <li><a href="#" class="file-dl-toast"><em class="icon ni ni-download"></em><span>Download</span></a></li>
                                        <li><a href="#"><em class="icon ni ni-trash"></em><span>Delete</span></a></li>
                                      </ul>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div><!-- .nk-files-head -->
                            <div class="nk-files-group">
                              <h6 class="title">Folder</h6>
                              <div class="nk-files-list">
<!--                                <div class="nk-file-item nk-file">-->
<!--                                  <div class="nk-file-info">-->
<!--                                    <div class="nk-file-title">-->
<!--                                      <div class="nk-file-icon">-->
<!--                                                                            <span class="nk-file-icon-type">-->
<!--                                                                                <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" viewBox="0 0 72 72">-->
<!--                                                                                    <path fill="#6C87FE" d="M57.5,31h-23c-1.4,0-2.5-1.1-2.5-2.5v-10c0-1.4,1.1-2.5,2.5-2.5h23c1.4,0,2.5,1.1,2.5,2.5v10-->
<!--	C60,29.9,58.9,31,57.5,31z" />-->
<!--                                                                                    <path fill="#8AA3FF" d="M59.8,61H12.2C8.8,61,6,58,6,54.4V17.6C6,14,8.8,11,12.2,11h18.5c1.7,0,3.3,1,4.1,2.6L38,24h21.8-->
<!--	c3.4,0,6.2,2.4,6.2,6v24.4C66,58,63.2,61,59.8,61z" />-->
<!--                                                                                    <path display="none" fill="#8AA3FF" d="M62.1,61H9.9C7.8,61,6,59.2,6,57c0,0,0-31.5,0-42c0-2.2,1.8-4,3.9-4h19.3-->
<!--	c1.6,0,3.2,0.2,3.9,2.3l2.7,6.8c0.5,1.1,1.6,1.9,2.8,1.9h23.5c2.2,0,3.9,1.8,3.9,4v31C66,59.2,64.2,61,62.1,61z" />-->
<!--                                                                                    <path fill="#798BFF" d="M7.7,59c2.2,2.4,4.7,2,6.3,2h45c1.1,0,3.2,0.1,5.3-2H7.7z" />-->
<!--                                                                                </svg>-->
<!--                                                                            </span>-->
<!--                                      </div>-->
<!--                                      <div class="nk-file-name">-->
<!--                                        <div class="nk-file-name-text">-->
<!--                                          <a href="#" class="title">UI Design</a>-->
<!--                                          <div class="asterisk"><a href="#"><em class="asterisk-off icon ni ni-star"></em><em class="asterisk-on icon ni ni-star-fill"></em></a></div>-->
<!--                                        </div>-->
<!--                                      </div>-->
<!--                                    </div>-->
<!--                                    <ul class="nk-file-desc">-->
<!--                                      <li class="date">Today</li>-->
<!--                                      <li class="size">4.5 MB</li>-->
<!--                                      <li class="members">3 Members</li>-->
<!--                                    </ul>-->
<!--                                  </div>-->
<!--                                  <div class="nk-file-actions">-->
<!--                                    <div class="dropdown">-->
<!--                                      <a href="" class="dropdown-toggle btn btn-sm btn-icon btn-trigger" data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>-->
<!--                                      <div class="dropdown-menu dropdown-menu-right">-->
<!--                                        <ul class="link-list-plain no-bdr">-->
<!--                                          <li><a href="#file-details" data-toggle="modal"><em class="icon ni ni-eye"></em><span>Details</span></a></li>-->
<!--                                          <li><a href="#file-share" data-toggle="modal"><em class="icon ni ni-share"></em><span>Share</span></a></li>-->
<!--                                          <li><a href="#file-copy" data-toggle="modal"><em class="icon ni ni-copy"></em><span>Copy</span></a></li>-->
<!--                                          <li><a href="#file-move" data-toggle="modal"><em class="icon ni ni-forward-arrow"></em><span>Move</span></a></li>-->
<!--                                          <li><a href="#" class="file-dl-toast"><em class="icon ni ni-download"></em><span>Download</span></a></li>-->
<!--                                          <li><a href="#"><em class="icon ni ni-pen"></em><span>Rename</span></a></li>-->
<!--                                          <li><a href="#"><em class="icon ni ni-trash"></em><span>Delete</span></a></li>-->
<!--                                        </ul>-->
<!--                                      </div>-->
<!--                                    </div>-->
<!--                                  </div>-->
<!--                                </div>-->
                              </div>
                            </div>
                            <div class="nk-files-group">
                              <h6 class="title">Files</h6>
                              <div class="nk-files-list">
                                <?php foreach($files as $file):?>
                                  <div class="nk-file-item nk-file">
                                    <div class="nk-file-info">
                                      <div class="nk-file-title">
                                        <div class="nk-file-icon">
                                        <span class="nk-file-icon-type">
                                          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 72 72">
                                              <g>
                                                <path d="M49,61H23a5.0147,5.0147,0,0,1-5-5V16a5.0147,5.0147,0,0,1,5-5H40.9091L54,22.1111V56A5.0147,5.0147,0,0,1,49,61Z" style="fill:#e3edfc" />
                                                <path d="M54,22.1111H44.1818a3.3034,3.3034,0,0,1-3.2727-3.3333V11s1.8409.2083,6.9545,4.5833C52.8409,20.0972,54,22.1111,54,22.1111Z" style="fill:#b7d0ea" />
                                                <path d="M19.03,59A4.9835,4.9835,0,0,0,23,61H49a4.9835,4.9835,0,0,0,3.97-2Z" style="fill:#c4dbf2" />
                                                <rect x="27" y="31" width="18" height="2" rx="1" ry="1" style="fill:#599def" />
                                                <rect x="27" y="36" width="18" height="2" rx="1" ry="1" style="fill:#599def" />
                                                <rect x="27" y="41" width="18" height="2" rx="1" ry="1" style="fill:#599def" />
                                                <rect x="27" y="46" width="12" height="2" rx="1" ry="1" style="fill:#599def" />
                                              </g>
                                            </svg>
                                        </span>
                                        </div>
                                        <div class="nk-file-name">
                                          <div class="nk-file-name-text">
                                            <a href="#" class="title"><?=$file['name']?></a>
                                            <div class="asterisk"><a href="#"><em class="asterisk-off icon ni ni-star"></em><em class="asterisk-on icon ni ni-star-fill"></em></a></div>
                                          </div>
                                        </div>
                                      </div>
                                      <ul class="nk-file-desc">
                                        <li class="date">
                                          <?php
                                            $date = date_create($file['created_at']);
                                            echo date_format($date, 'd M Y');
                                          ?>
                                        </li>
                                        <li class="size">
                                          <?=format_bytes($file['size'])?>
                                        </li>
                                        <li class="size">
                                          <?=$file['mime_type']?>
                                        </li>
                                      </ul>
                                    </div>
                                    <div class="nk-file-actions">
                                      <div class="dropdown">
                                        <a href="" class="dropdown-toggle btn btn-sm btn-icon btn-trigger" data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                          <ul class="link-list-plain no-bdr">
                                            <li><a href="#file-details" data-toggle="modal"><em class="icon ni ni-eye"></em><span>Details</span></a></li>
                                            <li><a href="#file-share" data-toggle="modal"><em class="icon ni ni-share"></em><span>Share</span></a></li>
                                            <li><a href="#file-copy" data-toggle="modal"><em class="icon ni ni-copy"></em><span>Copy</span></a></li>
                                            <li><a href="#file-move" data-toggle="modal"><em class="icon ni ni-forward-arrow"></em><span>Move</span></a></li>
                                            <li><a href="/file/download_file/<?=$file['file_id']?>" class="file-dl-toast"><em class="icon ni ni-download"></em><span>Download</span></a></li>
                                            <li><a href="#"><em class="icon ni ni-trash"></em><span>Delete</span></a></li>
                                          </ul>
                                        </div>
                                      </div>
                                    </div>
                                  </div><!-- .nk-file -->
                                <?php endforeach;?>
                              </div>
                            </div>
                          </div><!-- .nk-files -->
                        </div>
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
    <?php include('_scripts.php');?>
    <?php include('_index-scripts.php');?>
  </body>
</html>