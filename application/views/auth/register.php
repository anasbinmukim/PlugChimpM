<!-- BEGIN LOGIN -->
<div class="content register_content" style="margin-top:0;">
	<!-- BEGIN REGISTRATION FORM -->
	<form class="register-form" style="display:block;" action="" method="post">
			<h3 class="font-green">Sign Up</h3>

			<p class="hint"> Enter your personal details below: </p>
			<div class="form-group <?php echo form_error('first_name')?'has-error':''; ?>">
					<label class="control-label visible-ie8 visible-ie9">First Name</label>
					<input class="form-control placeholder-no-fix" type="text" placeholder="First Name" name="first_name" />
					<?php echo form_error('first_name'); ?>
			</div>
			<div class="form-group">
					<label class="control-label visible-ie8 visible-ie9">Last Name</label>
					<input class="form-control placeholder-no-fix" type="text" placeholder="Last Name" name="last_name" /> </div>
			<div class="form-group <?php echo form_error('email')?'has-error':''; ?>">
					<!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
					<label class="control-label visible-ie8 visible-ie9">Email</label>
					<input class="form-control placeholder-no-fix" type="text" placeholder="Email" name="email" />
					<?php echo form_error('email'); ?>
			</div>
			<p class="hint"> Enter your user name or mobile number below: </p>
			<div class="form-group <?php echo form_error('username')?'has-error':''; ?>">
					<label class="control-label visible-ie8 visible-ie9">Enter Number</label>
					<input class="form-control placeholder-no-fix" type="text" autocomplete="off" placeholder="Enter Username or Number" name="username" />
					<?php echo form_error('username'); ?>
			</div>
			<div class="form-group <?php echo form_error('conf_username')?'has-error':''; ?>">
					<label class="control-label visible-ie8 visible-ie9">User Name / Mobile Number Confirm</label>
					<input class="form-control placeholder-no-fix" type="text" autocomplete="off" placeholder="Re-type Uesrname or Number" name="conf_username" />
					<?php echo form_error('conf_username'); ?>
			</div>
			<p class="hint"> Enter your account password below: </p>
			<div class="form-group <?php echo form_error('password')?'has-error':''; ?>">
					<label class="control-label visible-ie8 visible-ie9">Password</label>
					<input class="form-control placeholder-no-fix" type="password" autocomplete="off" id="register_password" placeholder="Password" name="password" />
					<?php echo form_error('password'); ?>
			</div>
			<div class="form-group <?php echo form_error('conf_password')?'has-error':''; ?>">
					<label class="control-label visible-ie8 visible-ie9">Re-type Your Password</label>
					<input class="form-control placeholder-no-fix" type="password" autocomplete="off" placeholder="Re-type Your Password" name="conf_password" />
					<?php echo form_error('conf_password'); ?>
			</div>
			<div class="form-group margin-top-20 margin-bottom-20 <?php echo form_error('tnc')?'has-error':''; ?>">
					<label class="mt-checkbox mt-checkbox-outline">
							<input type="checkbox" name="tnc" /> I agree to the
							<a href="#">Terms of Service </a> &
							<a href="#">Privacy Policy </a>
							<span></span>
					</label>
					<div id="register_tnc_error"> </div>
			<?php echo form_error('tnc'); ?>
			</div>
			<div class="form-actions">
					<a href="<?php echo site_url('login');?>" class="btn green btn-outline">Sign In</a>
					<button type="submit" id="register-submit-btn" class="btn btn-success uppercase pull-right">Submit</button>
			</div>
	</form>
	<!-- END REGISTRATION FORM -->
</div>
