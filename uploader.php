<?php

header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

$uploadDir = './';
$keys = ['1234'];

if (isset($_POST['key']) && in_array($_POST['key'], $keys)) {
    if (isset($_POST['dir'])) {
        $targetDir = $uploadDir . $_POST['dir'] . '/';
        if (!file_exists($targetDir)) {
            mkdir($targetDir, 0777, true);
        }
        $targetFile = $targetDir . 'image.jpg';
        if (isset($_FILES['image'])) {
            if (file_exists($targetFile)) {
                unlink($targetFile);
            }
            move_uploaded_file($_FILES['image']['tmp_name'], $targetFile);
        }
    }
}
