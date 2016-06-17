<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$imgErrorsE = array();
if(isset($_POST['confirmE'])) {
    $target_file = "Application/Uploads/Images/" . basename($_FILES["fotografiaE"]["name"]);
    $file_name =  basename($_FILES["fotografiaE"]["name"]);
    $uploadOk = 1;
    $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
//​
//// Check if image file is a actual image or fake image
//    if (isset($_POST['confirmP'])) {
//        $check = getimagesize($_FILES["fotografiaP"]["name"]);
//        if ($check !== false) {
//            $uploadOk = 1;
//        } else {
//            $imgErrors['img'] = 'Ficheiro não suportado.';
//            $uploadOk = 0;
//        }
//    }
//​
//// Check file size
//    if ($_FILES["fotografiaP"]["size"] > 500000) {
//        $imgErrors['img'] = 'Ficheiro com tamanho demasiado grande.';
//        $uploadOk = 0;
//    }
// Allow certain file formats
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
        $imgErrorsE['img'] = 'Tipo de ficheiro não suportado.';
        $uploadOk = 0;
    }
// Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        $imgErrorsE['img'] = 'Erro no upload da imagem.';
        // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["fotografiaE"]["tmp_name"], $target_file) === FALSE) {
            echo "Erro no upload da imagem.";
            $imgErrorsE['img'] = 'Erro no upload da img.';
        }
    }
}