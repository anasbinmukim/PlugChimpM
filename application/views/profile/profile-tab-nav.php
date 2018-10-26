<ul class="nav nav-tabs">
    <li <?php if($profile_section == 'personal-info'){ ?>class="active" <?php } ?>>
        <a href="<?php echo site_url('/profile/?psection=personal-info'); ?>">Personal Info</a>
    </li>
    <li <?php if($profile_section == 'profile-photo'){ ?>class="active" <?php } ?>>
        <a href="<?php echo site_url('/profile/?psection=profile-photo'); ?>">Profile Photo</a>
    </li>
    <li <?php if($profile_section == 'update-password'){ ?>class="active" <?php } ?>>
        <a href="<?php echo site_url('/profile/?psection=update-password'); ?>">Update Password</a>
    </li>
    <li <?php if($profile_section == 'profile-settings'){ ?>class="active" <?php } ?>>
        <a href="<?php echo site_url('/profile/?psection=profile-settings'); ?>">Privacy Settings</a>
    </li>
</ul>
