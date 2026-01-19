<?php

class uploadImage {

  public function uploadImage($subfolder = '') {

    if (!isset($_FILES["image"])) {
        die('No file in $_FILES.');
    }

    $image_file = $_FILES["image"];

    if ($image_file['error'] !== UPLOAD_ERR_OK) {
        die('Upload error: ' . $image_file['error']);
    }

    if (filesize($image_file["tmp_name"]) <= 0) {
        die('Uploaded file has no contents.');
    }

    $image_type = exif_imagetype($image_file["tmp_name"]);
    if (!$image_type) {
        die('Uploaded file is not an image.');
    }

    // Déterminer le dossier de destination
    $destination_folder = ROOT . "/assets/images/" . $subfolder;

    // Créer le dossier s'il n'existe pas
    if (!is_dir($destination_folder)) {
        mkdir($destination_folder, 0755, true);
    }

    // Déplacer le fichier
    $destination = $destination_folder . basename($image_file["name"]);

    if (!move_uploaded_file($image_file["tmp_name"], $destination)) {
        die('Failed to move uploaded file.');
    }
  }
}
