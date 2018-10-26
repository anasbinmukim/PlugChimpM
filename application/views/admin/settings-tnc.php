
        <!-- BEGIN PAGE HEADER-->
        <h1 class="page-title"> Settings Terms and Conditions</h1>
        <div class="page-bar">
            <ul class="page-breadcrumb">
                <li>
                    <i class="icon-home"></i>
                    <a href="<?php echo site_url();?>">Home</a>
                    <i class="fa fa-angle-right"></i>
                </li>
                <li>
                    <i class="icon-home"></i>
                    <a href="<?php echo site_url('admin/settings'); ?>">Settings</a>
                    <i class="fa fa-angle-right"></i>
                </li>
                <li>
                    <span>Terms and Conditions</span>
                </li>
            </ul>
        </div>
        <!-- END PAGE HEADER-->


        <!-- BEGIN : SETTINGS -->
        <div class="row">

            <div class="col-md-12">
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
                        // if(isset($_POST['settings_general'])){
                        //   if(!$site_title){
                        //     $site_title = set_value('site_title');
                        //   }
                        //   if(!$site_tagline){
                        //     $site_tagline = set_value('tagline');
                        //   }
                        //   if(!$admin_email){
                        //     $admin_email = set_value('email');
                        //   }
                        // }
                        ?>

                        <form method="post" role="form">
                            <div class="form-body">
                                <div class="form-group ">
                                    <!-- <label>Site Title</label> -->
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-envelope"></i>
                                        </span>
                                        <input type="text" value="" name="site_title" class="form-control" placeholder="Site Title">
                                    </div>

                                </div>
                                <div class="form-group ">
                                    <!-- <label>Tagline</label> -->
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-envelope"></i>
                                        </span>
                                        <input type="text" value="" name="tagline" class="form-control" placeholder="Tagline">
                                      </div>

                                </div>
                            </div>
                            <div class="form-actions right">
                                <input type="hidden" name="settings_tnc" value="yes">
                                <button type="submit" class="btn green">Save</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>

        </div>
        <!-- END : SETTINGS -->
