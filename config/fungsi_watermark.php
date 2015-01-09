<?php
// Watermark untuk gambar produk
function watermark_produk($fupload_name){
	$image_show = "../../../images/watermark.png";   // watermark image
	$image_path = $image_show; 
	$path = "../../../foto_produk/";   // folder upload gambar setelah proses watermark
	move_uploaded_file($_FILES['fupload']['tmp_name'], $path.$_FILES['fupload']['name']);
	$oldimage_name=$path.$_FILES['fupload']['name'];
	$new_image_name = $fupload_name;
    list($owidth,$oheight) = getimagesize($oldimage_name);
    $width = $owidth;
	$height = $oheight;   
    $im = imagecreatetruecolor($width, $height);
    $img_src = imagecreatefromjpeg($oldimage_name);
    imagecopyresampled($im, $img_src, 0, 0, 0, 0, $width, $height, $owidth, $oheight);
    $watermark = imagecreatefrompng($image_path);
    list($w_width, $w_height) = getimagesize($image_path);        
    $pos_x = $width - $w_width -20; 
    $pos_y = $height - $w_height - 17;
    imagecopy($im, $watermark, $pos_x, $pos_y, 0, 0, $w_width, $w_height);
    imagejpeg($im, $new_image_name, 100); 
    imagedestroy($im);
    unlink($oldimage_name);
    return $new_image_name;
}

// Watermark untuk gambar produk2
function watermark_produk2($fupload_name){
	$image_show = "../../../images/watermark.png";   // watermark image
	$image_path = $image_show; 
	$path = "../../../foto_produk/";   // folder upload gambar setelah proses watermark
	$fileSize2		= $_FILES['fupload2']['size'];
	if ($fileSize2 > 0){
	move_uploaded_file($_FILES['fupload2']['tmp_name'], $path.$_FILES['fupload2']['name']);
	$oldimage_name=$path.$_FILES['fupload2']['name'];
	$new_image_name = $fupload_name;
    list($owidth,$oheight) = getimagesize($oldimage_name);
    $width = $owidth;
	$height = $oheight;   
    $im = imagecreatetruecolor($width, $height);
    $img_src = imagecreatefromjpeg($oldimage_name);
    imagecopyresampled($im, $img_src, 0, 0, 0, 0, $width, $height, $owidth, $oheight);
    $watermark = imagecreatefrompng($image_path);
    list($w_width, $w_height) = getimagesize($image_path);        
    $pos_x = $width - $w_width -20; 
    $pos_y = $height - $w_height - 17;
    imagecopy($im, $watermark, $pos_x, $pos_y, 0, 0, $w_width, $w_height);
    imagejpeg($im, $new_image_name, 100); 
    imagedestroy($im);
    unlink($oldimage_name);
    return $new_image_name;
	}
}

// Watermark untuk gambar produk3
function watermark_produk3($fupload_name){
	$image_show = "../../../images/watermark.png";   // watermark image
	$image_path = $image_show; 
	$path = "../../../foto_produk/";   // folder upload gambar setelah proses watermark
	$fileSize3		= $_FILES['fupload3']['size'];
	if ($fileSize3 > 0){
	move_uploaded_file($_FILES['fupload3']['tmp_name'], $path.$_FILES['fupload3']['name']);
	$oldimage_name=$path.$_FILES['fupload3']['name'];
	$new_image_name = $fupload_name;
    list($owidth,$oheight) = getimagesize($oldimage_name);
    $width = $owidth;
	$height = $oheight;   
    $im = imagecreatetruecolor($width, $height);
    $img_src = imagecreatefromjpeg($oldimage_name);
    imagecopyresampled($im, $img_src, 0, 0, 0, 0, $width, $height, $owidth, $oheight);
    $watermark = imagecreatefrompng($image_path);
    list($w_width, $w_height) = getimagesize($image_path);        
    $pos_x = $width - $w_width -20; 
    $pos_y = $height - $w_height - 17;
    imagecopy($im, $watermark, $pos_x, $pos_y, 0, 0, $w_width, $w_height);
    imagejpeg($im, $new_image_name, 100); 
    imagedestroy($im);
    unlink($oldimage_name);
    return $new_image_name;
	}
}

// Watermark untuk gambar produk4
function watermark_produk4($fupload_name){
	$image_show = "../../../images/watermark.png";   // watermark image
	$image_path = $image_show; 
	$path = "../../../foto_produk/";   // folder upload gambar setelah proses watermark
	$fileSize4		= $_FILES['fupload4']['size'];
	if ($fileSize4 > 0){
	move_uploaded_file($_FILES['fupload4']['tmp_name'], $path.$_FILES['fupload4']['name']);
	$oldimage_name=$path.$_FILES['fupload4']['name'];
	$new_image_name = $fupload_name;
    list($owidth,$oheight) = getimagesize($oldimage_name);
    $width = $owidth;
	$height = $oheight;   
    $im = imagecreatetruecolor($width, $height);
    $img_src = imagecreatefromjpeg($oldimage_name);
    imagecopyresampled($im, $img_src, 0, 0, 0, 0, $width, $height, $owidth, $oheight);
    $watermark = imagecreatefrompng($image_path);
    list($w_width, $w_height) = getimagesize($image_path);        
    $pos_x = $width - $w_width -20; 
    $pos_y = $height - $w_height - 17;
    imagecopy($im, $watermark, $pos_x, $pos_y, 0, 0, $w_width, $w_height);
    imagejpeg($im, $new_image_name, 100); 
    imagedestroy($im);
    unlink($oldimage_name);
    return $new_image_name;
	}
}

// Watermark untuk gambar produk5
function watermark_produk5($fupload_name){
	$image_show = "../../../images/watermark.png";   // watermark image
	$image_path = $image_show; 
	$path = "../../../foto_produk/";   // folder upload gambar setelah proses watermark
	$fileSize5		= $_FILES['fupload5']['size'];
	if ($fileSize5 > 0){
	move_uploaded_file($_FILES['fupload5']['tmp_name'], $path.$_FILES['fupload5']['name']);
	$oldimage_name=$path.$_FILES['fupload5']['name'];
	$new_image_name = $fupload_name;
    list($owidth,$oheight) = getimagesize($oldimage_name);
    $width = $owidth;
	$height = $oheight;   
    $im = imagecreatetruecolor($width, $height);
    $img_src = imagecreatefromjpeg($oldimage_name);
    imagecopyresampled($im, $img_src, 0, 0, 0, 0, $width, $height, $owidth, $oheight);
    $watermark = imagecreatefrompng($image_path);
    list($w_width, $w_height) = getimagesize($image_path);        
    $pos_x = $width - $w_width -20; 
    $pos_y = $height - $w_height - 17;
    imagecopy($im, $watermark, $pos_x, $pos_y, 0, 0, $w_width, $w_height);
    imagejpeg($im, $new_image_name, 100); 
    imagedestroy($im);
    unlink($oldimage_name);
    return $new_image_name;
	}
}

// Watermark untuk gambar artikel
function watermark_artikel($fupload_name){
	$image_show = "../../../images/watermark.png";   // watermark image
	$image_path = $image_show; 
	$path = "../../../foto_artikel/";   // folder upload gambar setelah proses watermark
	move_uploaded_file($_FILES['fupload']['tmp_name'], $path.$_FILES['fupload']['name']);
	$oldimage_name=$path.$_FILES['fupload']['name'];
	$new_image_name = $fupload_name;
    list($owidth,$oheight) = getimagesize($oldimage_name);
    $width = $owidth;
	$height = $oheight;   
    $im = imagecreatetruecolor($width, $height);
    $img_src = imagecreatefromjpeg($oldimage_name);
    imagecopyresampled($im, $img_src, 0, 0, 0, 0, $width, $height, $owidth, $oheight);
    $watermark = imagecreatefrompng($image_path);
    list($w_width, $w_height) = getimagesize($image_path);        
    $pos_x = $width - $w_width -20; 
    $pos_y = $height - $w_height - 17;
    imagecopy($im, $watermark, $pos_x, $pos_y, 0, 0, $w_width, $w_height);
    imagejpeg($im, $new_image_name, 100); 
    imagedestroy($im);
    unlink($oldimage_name);
    return $new_image_name;
}

// Watermark untuk galeri
function watermark_galeri($fupload_name){
	$image_show = "../../../images/watermark.png";   // watermark image
	$image_path = $image_show; 
	$path = "../../../img_galeri/";   // folder upload gambar setelah proses watermark
	move_uploaded_file($_FILES['fupload']['tmp_name'], $path.$_FILES['fupload']['name']);
	$oldimage_name=$path.$_FILES['fupload']['name'];
	$new_image_name = $fupload_name;
    list($owidth,$oheight) = getimagesize($oldimage_name);
    $width = $owidth;
	$height = $oheight;   
    $im = imagecreatetruecolor($width, $height);
    $img_src = imagecreatefromjpeg($oldimage_name);
    imagecopyresampled($im, $img_src, 0, 0, 0, 0, $width, $height, $owidth, $oheight);
    $watermark = imagecreatefrompng($image_path);
    list($w_width, $w_height) = getimagesize($image_path);        
    $pos_x = $width - $w_width -20; 
    $pos_y = $height - $w_height - 17;
    imagecopy($im, $watermark, $pos_x, $pos_y, 0, 0, $w_width, $w_height);
    imagejpeg($im, $new_image_name, 100); 
    imagedestroy($im);
    unlink($oldimage_name);
    return $new_image_name;
}
?>