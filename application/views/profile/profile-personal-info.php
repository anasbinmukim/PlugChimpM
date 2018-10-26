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
                              <!-- PERSONAL INFO TAB -->
                              <div class="tab-pane active" id="tab_1_1">
                                  <form role="form" action="#">
                                      <div class="form-group">
                                          <label class="control-label">First Name</label>
                                          <input type="text" placeholder="John" class="form-control" /> </div>
                                      <div class="form-group">
                                          <label class="control-label">Last Name</label>
                                          <input type="text" placeholder="Doe" class="form-control" /> </div>
                                      <div class="form-group">
                                          <label class="control-label">Mobile Number</label>
                                          <input type="text" placeholder="+1 646 580 DEMO (6284)" class="form-control" /> </div>
                                      <div class="form-group">
                                          <label class="control-label">Interests</label>
                                          <input type="text" placeholder="Design, Web etc." class="form-control" /> </div>
                                      <div class="form-group">
                                          <label class="control-label">Occupation</label>
                                          <input type="text" placeholder="Web Developer" class="form-control" /> </div>
                                      <div class="form-group">
                                          <label class="control-label">About</label>
                                          <textarea class="form-control" rows="3" placeholder="We are KeenThemes!!!"></textarea>
                                      </div>
                                      <div class="form-group">
                                          <label class="control-label">Website Url</label>
                                          <input type="text" placeholder="http://www.mywebsite.com" class="form-control" /> </div>
                                      <div class="margiv-top-10">
                                          <a href="javascript:;" class="btn green"> Save Changes </a>
                                          <a href="javascript:;" class="btn default"> Cancel </a>
                                      </div>
                                  </form>
                              </div>
                              <!-- END PERSONAL INFO TAB -->
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
      <!-- END PROFILE CONTENT -->

  </div>
</div>
