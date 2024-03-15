<?php
$captcha_array = array(substr(sha1(mt_rand()),17,6));
shuffle($captcha_array);
$captcha_code = substr(implode('',$captcha_array),0,6);
$_SESSION['captcha'] = $captcha_code;
echo $captcha_code;     

?>