<?php
define('AUTOCACHE_DEFAULT_TTL', 5);
define('AUTOCACHE_HASH',	'sha1');
define('AUTOCACHE_DIR',		getcwd() . '/cache/');
class AutoCache {
	public static $key = '', $ttl = AUTOCACHE_DEFAULT_TTL;
	private static $wrote_header = false;
	public static function Hash($data) {
		self::$key .= $data . '-';
	}
	public static function Key($key = false) {
		return hash(AUTOCACHE_HASH, $key ? $key : self::$key);
	}
	public static function Filename($timestamp = false, $key = false) {
		return AUTOCACHE_DIR . ($timestamp ? time() + self::$ttl . '_' : '') . ($key ? $key : self::Key()) . ($timestamp ? '' : '.php');
	}
	public static function Write($data) {
		$file = self::Filename();
		if(!file_exists(AUTOCACHE_DIR) && !@mkdir(AUTOCACHE_DIR))
			return self::Error('Could not create directory: ' . AUTOCACHE_DIR);
		if(!$fp = fopen($file, 'w'))
			return self::Error('Unable to open file for writing: ' . $file);
		if(!self::$wrote_header) {
			fwrite($fp, "<?php\n\n");
			fwrite($fp, "if(time() >= \$_" . self::Key() . "_time = " . (time() + self::$ttl) . ") return;\n");
			fwrite($fp, "\$_" . self::Key() . " = true;\n\n");
			foreach($headers = headers_list() as $header) {
				fwrite($fp, "header(" . var_export($header, true) . ");\n");
			}
			fwrite($fp, "\n?>");
			touch(self::Filename(true));
		}
		fwrite($fp, str_replace('<?', '<?php echo \'<?\'; ?>', $data));
		fclose($fp);
		return $data;
	}
	public static function Shutdown() {
		ob_end_flush();
	}
	private static function Pull() {
		$key = self::Key();
		if(file_exists($file = self::Filename())) {
			unset(${'_' . $key});
			unset(${'_' . $key . '_time'});
			require $file;
			if(isset(${'_' . $key}))
				exit;
			if(isset(${'_' . $key . '_time'})) {
				unlink(AUTOCACHE_DIR . ${'_' . $key . '_time'} . '_' . self::Key());
			}
			unlink($file);
		}
		return false;
	}
	public static function Push($ttl) {
		if($ttl !== false)
			self::$ttl = $ttl;
		ob_start('AutoCache::Write');
		register_shutdown_function('AutoCache::Shutdown');
	}
	public static function PullOrPush($ttl = false) {
		self::Pull();
		self::Push($ttl);
	}
	public static function Delete($hash) {
		$key = '';
		foreach($hash as $h) {
			$key .= $h . '-';
		}
		$key = self::Key($key);
		@unlink($filename = self::Filename(false, $key));
		$times = glob(AUTOCACHE_DIR . '/*_' . $key);
		foreach($times as $file) {
			@unlink($file);
		}
	}
	public static function AutoPurge() {
		if(!file_exists(AUTOCACHE_DIR) && !@mkdir(AUTOCACHE_DIR))
			return;
		if(!$dir = opendir(AUTOCACHE_DIR))
			die(self::Error('Unable to open directory for reading: ' . AUTOCACHE_DIR));
		while(($entry = readdir($dir)) !== false) {
			if(preg_match('/^(\d+)_(.+)$/', $entry, $matches)) {
				if(time() > (int)$matches[1]) {
					unlink(AUTOCACHE_DIR . $entry);
					unlink(AUTOCACHE_DIR . $matches[2] . '.php');
				}
			}
		}
		closedir($dir);
	}
	private static function Error($message) {
		return 'Error: ' . $message;
	}
}
?>