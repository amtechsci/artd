<?php
session_start();
$con=mysqli_connect("localhost","u623876688_artat","Artat@123","u623876688_artat");
define('SERVER_PATH',$_SERVER['DOCUMENT_ROOT'].'/');
define('SITE_PATH','https://artdarshan.com/');
define('PRODUCT_IMAGE_SERVER_PATH',SERVER_PATH.'upload/');
define('PRODUCT_IMAGE_SITE_PATH',SITE_PATH.'upload/');
define('PRODUCT_MULTIPLE_IMAGE_SERVER_PATH',SERVER_PATH.'upload/');
define('PRODUCT_MULTIPLE_IMAGE_SITE_PATH',SITE_PATH.'upload/');

define('BANNER_SERVER_PATH',SERVER_PATH.'upload/');
define('BANNER_SITE_PATH',SITE_PATH.'upload/');

define('SHIPROCKET_TOKEN_EMAIL','gmail');
define('SHIPROCKET_TOKEN_PASSWORD','password');
function towrealarray2($query)
 {
$con=mysqli_connect("localhost","u623876688_artat","Artat@123","u623876688_artat");
   $re = array();
   foreach ($query as $key => $value) {
       if(!is_array($value)){
   $$key = str_replace("<","<",$value);
   $$key = str_replace(">",">",$$key);
   $$key = mysqli_real_escape_string($con,$$key);

   $re[$key] = $$key;
       }else{
           $re[$key] = towrealarray2($value);
       }
    }
   return $re;
 }
?>