<?php
error_reporting(0);
// filtering method untuk menghalau tamper data upload image
// penggunaan :
// $cek=checkingtype($_FILES["file"]["name"]);
// if($cek == 0){echo "Lolos";} else{echo "Gagal Upload";}
// bisa juga dengan if($cek != 0){echo "Gagal Upload";}

// Algoritmanya simple.
// Kebanyakan kalo kita mengambil ekstensi biasanya dengan explode kemudian mengambil array terakhir.
// Namun algoritma ini mengambil ekstensi dari awal.
// Mencari tanda titik (.) kemudian menganggap karakter setelah titik sebagai ekstensi.
// Makanya kalo ada ekstensi seperti .php.jpeg Ngga akan bisa lolos.
// Tapi kalo file imagenya mengandung karakter titik juga ngga lolos! Misal: gambar.ku.jpg

function checkingtype($file)
    {
        $datype=NULL;
        $flag=0;
        
        $type[0]=".jpg";
        $type[1]=".png";
        $type[2]=".jpeg";
        $type[3]=".gif";
        $type[4]=".tif";
        
        for ($i=1; $i<=strlen($file); $i++)
        {
            $temp=substr($file,$i,1);
            if ($temp==".")
            {
                $datype=substr($file,$i);
                break;
            } 
        }
        
        for($a=0;$a<count($type);$a++)
        {
            $b=$type[$a];
            $flag=strcasecmp($datype,$b);
            if ($flag==0)
            {
                break;
            }
        }
        return $flag;
    } 
?>