<?php
function kompresi_output($buffer)
{
$search = array(
'/\>[^\S ]+/s',		//strip whitespaces after tags, except space
'/[^\S ]+\</s',		//strip whitespaces before tags, except space
'/(\s)+/s'		 	//shorten multiple whitespace sequences
);
$replace = array(
'>',
'<',
'\\1'
);
if (preg_match("/\<html/i",$buffer) == 1 && preg_match("/\<\/html\>/i",$buffer) == 1) {
$buffer = preg_replace($search, $replace, $buffer);
}
return $buffer;
}
?>