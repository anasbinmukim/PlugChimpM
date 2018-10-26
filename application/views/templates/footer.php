    </div>
    <!-- END CONTENT BODY -->
  </div>
  <!-- END CONTENT -->

</div>
<!-- END CONTAINER -->

<!-- BEGIN FOOTER -->
<div class="page-footer">
    <div class="page-footer-inner"> <?php echo date('Y'); ?> &copy; SeatBooking.COM.BD | All Rights Reserved
      <div class="scroll-to-top">
            <i class="icon-arrow-up"></i>
        </div>
    </div>
    <!-- END FOOTER -->
</div>
       <!-- END FOOTER -->
			 <!--[if lt IE 9]>
			 <script src="<?php echo base_url('assets/global/plugins/respond.min.js');?>"></script>
			 <script src="<?php echo base_url('assets/global/plugins/excanvas.min.js');?>"></script>
       <script src="<?php echo base_url('assets/global/plugins/ie8.fix.min.js');?>"></script>
			 <![endif]-->
			 <!-- BEGIN CORE PLUGINS -->
			 <script src="<?php echo base_url('assets/global/plugins/jquery.min.js');?>" type="text/javascript"></script>
			 <script src="<?php echo base_url('assets/global/plugins/bootstrap/js/bootstrap.min.js');?>" type="text/javascript"></script>
			 <script src="<?php echo base_url('assets/global/plugins/js.cookie.min.js');?>" type="text/javascript"></script>
			 <script src="<?php echo base_url('assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js');?>" type="text/javascript"></script>
			 <script src="<?php echo base_url('assets/global/plugins/jquery.blockui.min.js');?>" type="text/javascript"></script>
			 <script src="<?php echo base_url('assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js');?>" type="text/javascript"></script>
			 <!-- END CORE PLUGINS -->

       <!-- BEGIN THEME GLOBAL SCRIPTS -->
       <script src="<?php echo base_url('assets/global/scripts/app.min.js');?>" type="text/javascript"></script>
       <!-- END THEME GLOBAL SCRIPTS -->

       <!-- BEGIN THEME LAYOUT SCRIPTS -->
       <script src="<?php echo base_url('assets/layouts/layout2/scripts/layout.min.js');?>" type="text/javascript"></script>
       <script src="<?php echo base_url('assets/layouts/layout2/scripts/demo.min.js');?>" type="text/javascript"></script>
       <script src="<?php echo base_url('assets/layouts/global/scripts/quick-sidebar.min.js');?>" type="text/javascript"></script>
       <script src="<?php echo base_url('assets/layouts/global/scripts/quick-nav.min.js');?>" type="text/javascript"></script>
       <!-- END THEME LAYOUT SCRIPTS -->
       <?php if( isset($js_files)) { foreach( $js_files as $js ){ ?>
           <script src="<?php echo $js;?>" type="text/javascript"></script>
       <?php }} ?>
	 </body>

</html>
