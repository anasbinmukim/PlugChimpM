<!-- BEGIN LOGIN -->
<div class="content" style="margin-top:0;">
   <!-- BEGIN FORGOT PASSWORD FORM -->
    <form class="forget-form" style="display:block;" action="" method="post">
        <h3 class="font-red"  style="color: #2b3643!important;">Forget Password ?</h3>

		<?php if( $success ){?>
        <div class="alert alert-success">
           <button class="close" data-close="alert"></button>
           <span><?php echo $success;?></span>
        </div>
        <?php }?>

        <?php if( $this->session->flashdata('error') ) {?>
         <div class="alert alert-danger">
            <button class="close" data-close="alert"></button>
           <span><?php echo $this->session->flashdata('error');?></span>
        </div>
        <?php }?>

        <?php if( $error ) {?>
        <div class="alert alert-danger">
            <button class="close" data-close="alert"></button>
           <span><?php echo $error;?></span>
        </div>
        <?php }?>

        <p> To reset your password, please first identify your account. </p>
        <div class="form-group">
            <input class="form-control placeholder-no-fix" type="text" autocomplete="off" placeholder="Email" name="email" /> </div>
        <div class="form-actions">
            <button type="submit" class="btn blue-steel uppercase">Submit</button>
        </div>
    </form>
    <!-- END FORGOT PASSWORD FORM -->
</div>
