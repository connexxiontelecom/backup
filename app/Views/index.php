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
                      <div class="nk-fmg-quick-list nk-block">
                        <div class="nk-block-head-xs">
                          <div class="nk-block-between g-2">
                            <div class="nk-block-head-content">
                              <h6 class="nk-block-title title">Quick Access</h6>
                            </div>
                            <div class="nk-block-head-content">
                              <a href="#" class="link link-primary toggle-opt active" data-target="quick-access">
                                <div class="inactive-text">Show</div>
                                <div class="active-text">Hide</div>
                              </a>
                            </div>
                          </div>
                        </div><!-- .nk-block-head -->
                        <div class="toggle-expand-content expanded" data-content="quick-access">
                          <div class="nk-files nk-files-view-grid">
                            <div class="nk-files-list">
<!--                              <div class="nk-file-item nk-file">-->
<!--                                <div class="nk-file-info">-->
<!--                                  <a href="#" class="nk-file-link">-->
<!--                                    <div class="nk-file-title">-->
<!--                                      <div class="nk-file-icon">-->
<!--                                        <span class="nk-file-icon-type">-->
<!--                                          <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" viewBox="0 0 72 72">-->
<!--                                            <path fill="#6C87FE" d="M57.5,31h-23c-1.4,0-2.5-1.1-2.5-2.5v-10c0-1.4,1.1-2.5,2.5-2.5h23c1.4,0,2.5,1.1,2.5,2.5v10C60,29.9,58.9,31,57.5,31z" />-->
<!--                                            <path fill="#8AA3FF" d="M59.8,61H12.2C8.8,61,6,58,6,54.4V17.6C6,14,8.8,11,12.2,11h18.5c1.7,0,3.3,1,4.1,2.6L38,24h21.8c3.4,0,6.2,2.4,6.2,6v24.4C66,58,63.2,61,59.8,61z" />-->
<!--                                            <path display="none" fill="#8AA3FF" d="M62.1,61H9.9C7.8,61,6,59.2,6,57c0,0,0-31.5,0-42c0-2.2,1.8-4,3.9-4h19.3c1.6,0,3.2,0.2,3.9,2.3l2.7,6.8c0.5,1.1,1.6,1.9,2.8,1.9h23.5c2.2,0,3.9,1.8,3.9,4v31C66,59.2,64.2,61,62.1,61z" />-->
<!--                                            <path fill="#798BFF" d="M7.7,59c2.2,2.4,4.7,2,6.3,2h45c1.1,0,3.2,0.1,5.3-2H7.7z" />-->
<!--                                          </svg>-->
<!--                                        </span>-->
<!--                                      </div>-->
<!--                                      <div class="nk-file-name">-->
<!--                                        <div class="nk-file-name-text">-->
<!--                                          <span href="#" class="title">UI Design</span>-->
<!--                                        </div>-->
<!--                                      </div>-->
<!--                                    </div>-->
<!--                                  </a>-->
<!--                                </div>-->
<!--                                <div class="nk-file-actions hideable">-->
<!--                                  <a href="#" class="btn btn-sm btn-icon btn-trigger"><em class="icon ni ni-cross"></em></a>-->
<!--                                </div>-->
<!--                              </div>-->
                            </div>
                          </div><!-- .nk-files -->
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
                                      <ul class="link-list-opt no-bdr">
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
                                <div class="nk-file-item nk-file">
                                  <div class="nk-file-info">
                                    <div class="nk-file-title">
                                      <div class="nk-file-icon">
                                        <span class="nk-file-icon-type">
                                          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 72 72">
                                            <path d="M50,61H22a6,6,0,0,1-6-6V22l9-11H50a6,6,0,0,1,6,6V55A6,6,0,0,1,50,61Z" style="fill:#36c684" />
                                            <path d="M25,20.556A1.444,1.444,0,0,1,23.556,22H16l9-11h0Z" style="fill:#95e5bd" />
                                            <path d="M42,31H30a3.0033,3.0033,0,0,0-3,3V45a3.0033,3.0033,0,0,0,3,3H42a3.0033,3.0033,0,0,0,3-3V34A3.0033,3.0033,0,0,0,42,31ZM29,38h6v3H29Zm8,0h6v3H37Zm6-4v2H37V33h5A1.001,1.001,0,0,1,43,34ZM30,33h5v3H29V34A1.001,1.001,0,0,1,30,33ZM29,45V43h6v3H30A1.001,1.001,0,0,1,29,45Zm13,1H37V43h6v2A1.001,1.001,0,0,1,42,46Z" style="fill:#fff" /></svg>
                                        </span>
                                      </div>
                                      <div class="nk-file-name">
                                        <div class="nk-file-name-text">
                                          <a href="#" class="title">Update Data.xlsx</a>
                                          <div class="asterisk"><a href="#"><em class="asterisk-off icon ni ni-star"></em><em class="asterisk-on icon ni ni-star-fill"></em></a></div>
                                        </div>
                                      </div>
                                    </div>
                                    <ul class="nk-file-desc">
                                      <li class="date">Yesterday</li>
                                      <li class="size">235 KB</li>
                                      <li class="members">3 Members</li>
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
                                          <li><a href="#" class="file-dl-toast"><em class="icon ni ni-download"></em><span>Download</span></a></li>
                                          <li><a href="#"><em class="icon ni ni-pen"></em><span>Rename</span></a></li>
                                          <li><a href="#"><em class="icon ni ni-trash"></em><span>Delete</span></a></li>
                                        </ul>
                                      </div>
                                    </div>
                                  </div>
                                </div><!-- .nk-file -->
                                <div class="nk-file-item nk-file">
                                  <div class="nk-file-info">
                                    <div class="nk-file-title">
                                      <div class="nk-file-icon">
                                                                            <span class="nk-file-icon-type">
                                                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 72 72">
                                                                                    <g>
                                                                                        <rect x="16" y="14" width="40" height="44" rx="6" ry="6" style="fill:#7e95c4" />
                                                                                        <rect x="32" y="17" width="8" height="2" rx="1" ry="1" style="fill:#fff" />
                                                                                        <rect x="32" y="22" width="8" height="2" rx="1" ry="1" style="fill:#fff" />
                                                                                        <rect x="32" y="27" width="8" height="2" rx="1" ry="1" style="fill:#fff" />
                                                                                        <rect x="32" y="32" width="8" height="2" rx="1" ry="1" style="fill:#fff" />
                                                                                        <rect x="32" y="37" width="8" height="2" rx="1" ry="1" style="fill:#fff" />
                                                                                        <path d="M35,14h2a0,0,0,0,1,0,0V43a1,1,0,0,1-1,1h0a1,1,0,0,1-1-1V14A0,0,0,0,1,35,14Z" style="fill:#fff" />
                                                                                        <path d="M38.0024,42H33.9976A1.9976,1.9976,0,0,0,32,43.9976v2.0047A1.9976,1.9976,0,0,0,33.9976,48h4.0047A1.9976,1.9976,0,0,0,40,46.0024V43.9976A1.9976,1.9976,0,0,0,38.0024,42Zm-.0053,4H34V44h4Z" style="fill:#fff" />
                                                                                    </g>
                                                                                </svg>
                                                                            </span>
                                      </div>
                                      <div class="nk-file-name">
                                        <div class="nk-file-name-text">
                                          <a href="#" class="title">dashlite...1.2.zip</a>
                                          <div class="asterisk"><a href="#"><em class="asterisk-off icon ni ni-star"></em><em class="asterisk-on icon ni ni-star-fill"></em></a></div>
                                        </div>
                                      </div>
                                    </div>
                                    <ul class="nk-file-desc">
                                      <li class="date">03 May</li>
                                      <li class="size">235 KB</li>
                                      <li class="members">3 Members</li>
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
                                          <li><a href="#" class="file-dl-toast"><em class="icon ni ni-download"></em><span>Download</span></a></li>
                                          <li><a href="#"><em class="icon ni ni-pen"></em><span>Rename</span></a></li>
                                          <li><a href="#"><em class="icon ni ni-trash"></em><span>Delete</span></a></li>
                                        </ul>
                                      </div>
                                    </div>
                                  </div>
                                </div><!-- .nk-file -->
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