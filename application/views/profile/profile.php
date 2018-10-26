<?php
  if($profile_section == 'personal-info'){
    require_once(dirname(__FILE__) . "/profile-personal-info.php");
  }elseif($profile_section == 'profile-photo'){
    require_once(dirname(__FILE__) . "/profile-photo.php");
  }elseif($profile_section == 'profile-settings'){
    require_once(dirname(__FILE__) . "/profile-settings.php");
  }elseif($profile_section == 'update-password'){
    require_once(dirname(__FILE__) . "/profile-password.php");
  }else{
    require_once(dirname(__FILE__) . "/profile-personal-info.php");
  }
?>
