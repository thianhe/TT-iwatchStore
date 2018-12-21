<?php
    $id = $_POST['watch_id'];
    $dir = './image/product/'.$id.'/';
    $table= 'WATCH';
    $key_column = 'watch_id';
    Database::get()->delete($table, $key_column, $id);
    if (file_exists('./image/product/'.$id)) {
        $images= scandir($dir); 
        array_shift($images);
        array_shift($images);
        foreach($images as $image){
            unlink($dir.$image);
        }
        rmdir($dir);
    }
    header('Location: product_setting');
?>