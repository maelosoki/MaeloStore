<?php 
if($_GET){
foreach($_GET as $key => $value){
$value = explode(';' , $value);
$value = explode('\'' , $value[0]);
$value = explode('"' , $value[0]);
$_GET[$key] = $value[0];
}
}
if($_POST){
foreach($_POST as $key => $value){
$value = explode(';' , $value);
$value = explode('\'' , $value[0]);
$value = explode('"' , $value[0]);
$_POST[$key] = $value[0];
}
}
if($_REQUEST){
foreach($_REQUEST as $key => $value){
$value = explode(';' , $value);
$value = explode('\'' , $value[0]);
$value = explode('"' , $value[0]);
$_REQUEST[$key] = $value[0];
}
}
?>