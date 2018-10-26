<div class="row">
    <div class="col-md-12">
      <?php require_once(dirname(__FILE__) . "/profile-view-widget.php"); ?>
      <!-- BEGIN PROFILE CONTENT -->
      <div class="profile-content">
          <div class="row">
              <div class="col-md-12">
                  <div class="portlet light ">
                      <div class="portlet-title tabbable-line">
                          <div class="caption caption-md">
                              <i class="icon-globe theme-font hide"></i>
                              <span class="caption-subject font-blue-madison bold uppercase">Profile Account</span>
                          </div>
                          <?php require_once(dirname(__FILE__) . "/profile-tab-nav.php"); ?>
                      </div>
                      <div class="portlet-body">
                          <div class="tab-content">
                              <!-- CHANGE AVATAR TAB -->
                              <div class="tab-pane active" id="tab_1_2">
                                  <form action="" method="post" role="form" enctype="multipart/form-data">
                                      <div class="form-group">
                                          <div class="fileinput fileinput-new" data-provides="fileinput">
                                              <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                                                  <img src="<?php echo $profile_photo;?>" alt="" /> </div>
                                              <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"> </div>
                                              <div>
                                                  <span class="btn default btn-file">
                                                      <span class="fileinput-new"> Select image </span>
                                                      <span class="fileinput-exists"> Change </span>
                                                      <input type="file" name="profile_photo"> </span>
                                                  <a href="javascript:;" class="btn default fileinput-exists" data-dismiss="fileinput"> Remove </a>
                                              </div>
                                              <div class="clearfix margin-top-10">
                                                 <span>Max size : 600X600, File Type: JPG, PNG, GIF</span>
                                              </div>
                                          </div>
                                      </div>
                                      <div class="margin-top-10">
                                          <input type="submit" class="btn green" name="save_profile_photo" value="Save">
                                      </div>
                                  </form>
                              </div>
                              <!-- END CHANGE AVATAR TAB -->
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
      <!-- END PROFILE CONTENT -->

  </div>
</div>
