<?php
/**
 * function to emulate the register_globals setting in PHP
 * for all of those diehard fans of possibly harmful PHP settings
 * @param string $order order in which to register the globals, e.g. 'egpcs' for default
 * @link hxxp://www.php.net/manual/en/security.globals.php#82213
 */

function register_globals($order = 'egpcs')
{
	// define a subroutine
	if(!function_exists('register_global_array'))
	{
		function register_global_array(array $superglobal)
		{
			foreach($superglobal as $varname => $value)
			{
				global $$varname;
				$$varname = $value;
			}
		}
	}
	$order = explode("\r\n", trim(chunk_split($order, 1)));
	foreach($order as $k)
	{
		switch(strtolower($k))
		{
			case 'e':	register_global_array($_ENV);		break;
			case 'g':	register_global_array($_GET);		break;
			case 'p':	register_global_array($_POST);		break;
			case 'c':	register_global_array($_COOKIE);	break;
			case 's':	register_global_array($_SERVER);	break;
		}
	}
}

// Undo register_globals
function unregister_globals() {
	if (ini_get(register_globals)) {
		$array = array('_ENV', '_GET', '_POST', '_COOKIE', '_SERVER');
		foreach ($array as $value) {
			foreach ($GLOBALS[$value] as $key => $var) {
				if ($var === $GLOBALS[$key]) {
					unset($GLOBALS[$key]);
				}
			}
		}
	}
}
?>