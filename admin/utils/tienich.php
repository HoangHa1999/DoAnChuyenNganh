<?php

function uploadFiles($uploadFiles){
    $files = array();
    $errors = array();

    foreach ($uploadFiles as $key => $value){
        foreach ($value as $index => $value){
            $files[$index][$key] = $value;
        }
    }

    $uploadPath = './assets/images/faces/';
    if(!is_dir($uploadPath)){
        mkdir($uploadPath, 0777, true);
    }
    foreach($files  as $file){
        $file = validateUploadFile($file, $uploadPath);
        if($file != false){
            move_uploaded_file($file["tmp_name"], $uploadPath . '/' . $file["name"]);
        
        }else{
            $errors[] = "The file " . basename($file["name"]) . " isn't valid.";

        }
        return $errors;
    }
}

function validateUploadFile($file, $uploadPath){
    if($file['size'] > 2 *1024* 1024){
        return false;
    }
   
    $validTypes = array("jpg", "jpeg", "png", "bmp");
    $fileType = substr($file['name'], strrpos($file['name'], ".") + 1);
    if(!in_array($fileType, $validTypes)){
        return false;
    }

    $num = 1;
    $fileName = substr($file['name'], 0, strrpos($file['name'], "."));
    while (file_exists($uploadPath . '/' . $fileName . '.' . $fileType)){
        $fileName = $fileName."(".$num.")";
        $num++;
    }
    $file['name'] = $fileName .".". $fileType;
    return $file;
}
?>