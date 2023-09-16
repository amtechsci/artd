<?php
// exit;
// "AFGHFGH%$%^$hgtsdf6565";
session_start();
$con=mysqli_connect("localhost", "u662313268_artat", "Art44@123", "u662313268_artat");
define('SERVER_PATH',$_SERVER['DOCUMENT_ROOT'].'/');
define('SITE_PATH','https://artdarshan.com/');
define('PRODUCT_IMAGE_SERVER_PATH',SERVER_PATH.'upload/');
define('PRODUCT_IMAGE_SITE_PATH',SITE_PATH.'upload/');
define('PRODUCT_MULTIPLE_IMAGE_SERVER_PATH',SERVER_PATH.'upload/');
define('PRODUCT_MULTIPLE_IMAGE_SITE_PATH',SITE_PATH.'upload/');

define('BANNER_SERVER_PATH',SERVER_PATH.'upload/');
define('BANNER_SITE_PATH',SITE_PATH.'upload/');

function towrealarray2($input) {
    if (is_array($input)) {
        $result = array();
        foreach ($input as $key => $value) {
            $result[towrealarray2($key)] = towrealarray2($value);
        }
    } else {
        if (ini_get('magic_quotes_gpc')) {
            $input = stripslashes($input);
        }
        $input = preg_replace('/<script\b[^>]*>(.*?)<\/script>/is', '', $input);
        $input = preg_replace('/<style\b[^>]*>(.*?)<\/style>/is', '', $input);
        $con = mysqli_connect("localhost","u662313268_artat","Art44@123","u662313268_artat");
        $input = mysqli_real_escape_string($con, $input);
        mysqli_close($con);
        $result = $input;
    }
    return $result;
}



 function atulquery($query) {
  	$co = mysqli_connect("localhost","u662313268_artat","Art44@123","u662313268_artat");
////
      	$now = new DateTime();
        $mins = $now->getOffset() / 60;
        $sgn = ($mins < 0 ? -1 : 1);
        $mins = abs($mins);
        $hrs = floor($mins / 60);
        $mins -= $hrs * 60;
        $offset = sprintf('%+d:%02d', $hrs*$sgn, $mins);
        mysqli_query($co,"SET time_zone='$offset';");
////
    $re = mysqli_query($co,$query);
    mysqli_close($co);
    return $re;
  }
?>