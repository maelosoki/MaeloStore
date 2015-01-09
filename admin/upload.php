<?php
if ($_FILES['file']['name']) {
            if (!$_FILES['file']['error']) {
                $name = md5(rand(100, 200));
                $ext = explode('.', $_FILES['file']['name']);
                $filename = $name . '.' . $ext[1];
                $destination = '../upload/' . $filename; //don't change this directory
                $location = $_FILES["file"]["tmp_name"];
                move_uploaded_file($location, $destination);
                //echo 'http://localhost/maelostore/upload/' . $filename; //ganti sesuai nama folder anda
				echo '../upload/' . $filename; //utk di hosting >> ketika online
            }
            else
            {
              echo  $message = 'Ooops! upload error:  '.$_FILES['file']['error'];
            }
        }
?>