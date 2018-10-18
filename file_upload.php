<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
</head>
<body>
<!-- in action, put the path to the php file if you plan on seperating the html form and the php below. -->
<form action=""
      method="POST" enctype="multipart/form-data">
    <input type="file" name="file">
    <button type="submit" name="submit">Upload</button>
</form>
</body>
</html>

<?php

if ( isset($_POST['submit']) ) {
    $file = $_FILES['file'];

    $file_name     = $_FILES['file']['name'];
    $file_tmp_name = $_FILES['file']['tmp_name'];
    $file_size     = $_FILES['file']['size'];
    $file_error    = $_FILES['file']['error'];
    $file_type     = $_FILES['file']['type'];

    $file_ext = explode('.', $file_name);
    $file_actual_ext = strtolower(end($file_ext));

    $allowed = array('csv', 'xltx', 'xlx', 'pdf', 'xlx');

    if( in_array($file_actual_ext, $allowed) ) {
        if( $file_error === 0 ) {
            if( $file_size < 1000000000 ) {
                $file_new_name = uniqid('', true).".".$file_actual_ext;
                // here add the destination to the folder where you want the files to be uploaded
                $file_dest = '--ADD DESTINATION--'.$file_new_name;

                move_uploaded_file($file_tmp_name, $file_dest);
                header('Content-Type: text/plain; charset=utf-8');
                echo 'success';
            } else {
                echo "File is too big...";
            }
        } else {
            echo "Error occurred during upload...";
        }
    } else {
        echo "Cannot upload files of this type..";
    }
}
