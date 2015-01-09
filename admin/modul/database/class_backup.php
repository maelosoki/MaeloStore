<?php
//Recursively Zip a directory with PHP
class FlxZipArchive extends ZipArchive {

    public function addDir1($location, $name, $includeCurrDir) {
      if($includeCurrDir)
        $this->addEmptyDir($name);     
        $this->addDirDo1($location, $name, $includeCurrDir);
     } // EO addDir

    private function addDirDo1($location, $name, $includeCurrDir) {
      if($includeCurrDir)
        $name .= '/';
      else
        $name = '';

      $location .= '/';

        // Read all Files in Dir
        $dir = opendir ($location);
        while ($file = readdir($dir))
        {
            if ($file == '.' || $file == '..') continue;

            // Rekursiv, If dir: FlxZipArchive::addDir(), else ::File();
            $do = (filetype( $location . $file) == 'dir') ? 'addDir' : 'addFile';
            $this->$do($location . $file, $name . $file);
        }
    } // EO addDirDo();

    public function addDir($location, $name) {
        $this->addEmptyDir($name);     
        $this->addDirDo($location, $name);
     } // EO addDir

    private function addDirDo($location, $name) {
        $name .= '/';
        $location .= '/';

        // Read all Files in Dir
        $dir = opendir ($location);
        while ($file = readdir($dir))
        {
            if ($file == '.' || $file == '..') continue;

            // Rekursiv, If dir: FlxZipArchive::addDir(), else ::File();
            $do = (filetype( $location . $file) == 'dir') ? 'addDir' : 'addFile';
            $this->$do($location . $file, $name . $file);
        }
    } // EO addDirDo();
}

function zipIt($source, $target, $includeCurrDir){
  $za = new FlxZipArchive;

  $res = $za->open($target, ZipArchive::CREATE);

  if($res === TRUE) {
      $za->addDir1($source, basename($source),$includeCurrDir);
      $za->close();
  }
  else
      echo 'Could not create a zip archive';

}
$the_folder = '../';
$zip_file_name = '../maelostore.zip';
//Don't forget to remove the trailing slash in folder
zipIt($the_folder,$zip_file_name,false);
?> 