<?php
header('Content-type: image/jpeg');
$img = $_GET['src'];
$p = $_GET['p']; if(!$p) $p = 'br';
$q = $_GET['q'];
if(!$q || $q<0 || $q>100) $q = '93';
$filetype = substr($img,strlen($img)-4,4);
$filetype = strtolower($filetype);
if($filetype == ".gif") $image = @imagecreatefromgif($img);
if($filetype == ".jpg") $image = @imagecreatefromjpeg($img);
if($filetype == ".png") $image = @imagecreatefrompng($img);
if (!$image) die();
$img_w = imagesx($image);
$img_h = imagesy($image);
// Gambar watermark menyesuaikan dengan ukuran asli gambar yang di upload ke artikel / detail produk
if($img_w>999) { $watermark = @imagecreatefrompng('images/watermark_1000px.png');
}else if($img_w>899) { $watermark = @imagecreatefrompng('images/watermark_1000px.png');
}else if($img_w>799) { $watermark = @imagecreatefrompng('images/watermark_800px.png');
}else if($img_w>699) { $watermark = @imagecreatefrompng('images/watermark_800px.png');
}else if($img_w>599) { $watermark = @imagecreatefrompng('images/watermark_600px.png');
}else if($img_w>499) { $watermark = @imagecreatefrompng('images/watermark_600px.png');
}else if($img_w>399) { $watermark = @imagecreatefrompng('images/watermark_400px.png');
}else if($img_w>299) { $watermark = @imagecreatefrompng('images/watermark_400px.png');
}else if($img_w>199) { $watermark = @imagecreatefrompng('images/watermark_200px.png');
}else  { $watermark = @imagecreatefrompng('images/watermark.png');
}
//getting the image size for the watermark
$w_w = imagesx($watermark);
$w_h = imagesy($watermark);
if($p == "tl") {
    $dest_x = 0;
    $dest_y = 0;
} elseif ($p == "br") {
    $dest_x = ($img_w - $w_w)/2;
    $dest_y = ($img_h - $w_h)/2;
}
imagecopy($image, $watermark, $dest_x, $dest_y, 0, 0, $w_w, $w_h);
imagejpeg($image, null, $q);
imagedestroy($image);
imagedestroy($watermark);
?>