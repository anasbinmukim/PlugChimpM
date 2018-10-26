
        <!-- BEGIN PAGE HEADER-->
        <h1 class="page-title"> Settings</h1>
        <div class="page-bar">
            <ul class="page-breadcrumb">
                <li>
                    <i class="icon-home"></i>
                    <a href="<?php echo site_url();?>">Home</a>
                    <i class="fa fa-angle-right"></i>
                </li>
                <li>
                    <span>General Settings</span>
                </li>
            </ul>
        </div>
        <!-- END PAGE HEADER-->


        <!-- BEGIN : SETTINGS -->
        <div class="row">

            <div class="col-md-6">
                <div class="portlet light portlet-fit ">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class=" icon-layers font-green"></i>
                            <span class="caption-subject font-green bold uppercase">Site Settings</span>
                        </div>
                    </div>
                    <?php if($this->session->flashdata('success_msg_general')): ?>
                      <div class="note note-success">
                          <h4 class="block">Success</h4>
                          <p> <?php $this->session->flashdata('success_msg_general'); ?> </p>
                      </div>
                    <? endif ?>
                    <div class="portlet-body">

                        <?php
                        if(isset($_POST['settings_general'])){
                          if(!$site_title){
                            $site_title = set_value('site_title');
                          }
                          if(!$site_tagline){
                            $site_tagline = set_value('tagline');
                          }
                          if(!$admin_email){
                            $admin_email = set_value('email');
                          }
                        }
                        ?>

                        <form method="post" role="form">
                            <div class="form-body">
                                <div class="form-group <?php echo form_error('site_title')?'has-error':''; ?>">
                                    <!-- <label>Site Title</label> -->
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-envelope"></i>
                                        </span>
                                        <input type="text" value="<?php echo $site_title; ?>" name="site_title" class="form-control" placeholder="Site Title">
                                    </div>
                                    <?php echo form_error('site_title'); ?>
                                </div>
                                <div class="form-group <?php echo form_error('tagline')?'has-error':''; ?>">
                                    <!-- <label>Tagline</label> -->
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-envelope"></i>
                                        </span>
                                        <input type="text" value="<?php echo $site_tagline; ?>" name="tagline" class="form-control" placeholder="Tagline">
                                      </div>
                                      <?php echo form_error('tagline'); ?>
                                </div>
                                <div class="form-group <?php echo form_error('email')?'has-error':''; ?>">
                                    <!-- <label>Email Address</label> -->
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-envelope"></i>
                                        </span>
                                        <input type="text" value="<?php echo $admin_email; ?>" name="email" class="form-control" placeholder="Email Address">
                                      </div>
                                      <?php echo form_error('email'); ?>
                                </div>
                            </div>
                            <div class="form-actions right">
                                <input type="hidden" name="settings_general" value="yes">
                                <button type="submit" class="btn green">Save</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>

            <div class="col-md-6">
                <div class="portlet light portlet-fit ">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class=" icon-layers font-green"></i>
                            <span class="caption-subject font-green bold uppercase">Logo</span>
                        </div>
                    </div>

                    <?php if($this->session->flashdata('success_msg_logo')): ?>
                      <div class="note note-success">
                          <h4 class="block">Success</h4>
                          <p> <?php $this->session->flashdata('success_msg_logo'); ?> </p>
                      </div>
                    <? endif ?>

                    <div class="portlet-body">
                        <form role="form" method="post" action="" enctype="multipart/form-data">
                            <div class="form-body">
                                <div class="form-group">
                                    <label>Header Logo</label>
                                    <div class="input-group">
                                        <input type="file" name="logo" id="logo">
                                        <span class="help-inline">(500x100)</span>
                                      </div>
                                </div>
                                    <diV><img src="<?php echo $site_logo; ?>" width="400" /><br /><br /></diV>
                            </div>
                            <div class="form-actions right">
                                <input type="hidden" name="site_logo" value="save site logo">
                                <button type="submit" class="btn green">Save</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>



        </div>
        <!-- END : SETTINGS -->
