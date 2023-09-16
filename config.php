<?php
session_start();
$db = mysqli_connect("localhost", "u662313268_artat", "Artat@123", "u662313268_artat");
function towquery($query)
 {
   $db = mysqli_connect("localhost", "u662313268_artat", "Artat@123", "u662313268_artat");
   mysqli_set_charset($db,'utf8');
   $re = mysqli_query($db,$query);
   return $re;
 }
 function towquery2($query)
 {
   $db = mysqli_connect("localhost", "u662313268_artat", "Artat@123", "u662313268_artat");
   mysqli_set_charset($db,'utf8');
   $re = mysqli_query($db,$query);
   $re2 = mysqli_insert_id($db);
   return $re2;
 }
 function townum($query)
 {
   $re = mysqli_num_rows($query);
   return $re;
 }
 function towfetch($query)
 {
   $re = mysqli_fetch_array($query);
   return $re;
 }
 function towfetchassoc($query)
 {
   $re = mysqli_fetch_assoc($query);
   return $re;
 }
 function towreal($query)
 {
   $db = mysqli_connect("localhost", "u662313268_artat", "Artat@123", "u662313268_artat");
   $re = str_replace("<","",$query);
   $re = str_replace(">","",$re);
   $re = mysqli_real_escape_string($db,$re);
   return $re;
 }
 function towrealarray($query)
 {
   $db = mysqli_connect("localhost", "u662313268_artat", "Artat@123", "u662313268_artat");
   $re = array();
   foreach ($query as $key => $value) {
   $$key = str_replace("<","",$value);
   $$key = str_replace(">","",$$key);
   $$key = mysqli_real_escape_string($db,$$key);

   $re[$key] = $$key;
    }
   return $re;
 }
 function towrealarray2($query)
 {
   $co = mysqli_connect("localhost", "u662313268_artat", "Artat@123", "u662313268_artat");
   $re = array();
   foreach ($query as $key => $value) {
       if(!is_array($value)){
   $$key = str_replace("<","",$value);
   $$key = str_replace(">","",$$key);
   $$key = mysqli_real_escape_string($co,$$key);

   $re[$key] = $$key;
       }else{
           $re[$key] = towrealarray2($value);
       }
    }
   return $re;
 }

date_default_timezone_set('Asia/Kolkata');

function getDateTimeDiff($date){
 $now_timestamp = strtotime(date('Y-m-d H:i:s'));
 $diff_timestamp = $now_timestamp - strtotime($date);
 
 if($diff_timestamp<60){
  return 'few seconds ago';
 }
 else if($diff_timestamp>=60 && $diff_timestamp<3600){
  return round($diff_timestamp/60).' mins ago';
 }
 else if($diff_timestamp>=3600 && $diff_timestamp<86400){
  return round($diff_timestamp/3600).' hours ago';
 }
 else if($diff_timestamp>=86400 && $diff_timestamp<(86400*30)){
  return round($diff_timestamp/(86400)).' days ago';
 }
 else if($diff_timestamp>=(86400*30) && $diff_timestamp<(86400*365)){
  return round($diff_timestamp/(86400*30)).' months ago';
 }
 else{
  return round($diff_timestamp/(86400*365)).' years ago';
 }
}
?>