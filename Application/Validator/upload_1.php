<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$imgErrors = array();
if(isset($_POST['confirmE'])) {
    $target_file = "Application/Uploads/imgs/" . basename($_FILES["fotografiaE"]["name"]);
    $file_name =  basename($_FILES["fotografiaE"]["name"]);
    $uploadOk = 1;
    $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);

// Allow certain file formats
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
        $imgErrors['img'] = 'Tipo de ficheiro não suportado.';
        $uploadOk = 0;
    }
// Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        $imgErrors['img'] = 'Erro no upload da imagem.';
        // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["fotografiaE"]["tmp_name"], $target_file) === FALSE) {
            echo "Erro no upload da imagem.";
            $imgErrors['img'] = 'Erro no upload da img.';
        }
    }
}