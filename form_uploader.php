/* upload text input by user */
/* i.e., personal info to server */
/* all input fields will be uploaded to a csv file */

if (isset($_POST['field1']) &&
    isset($_POST['field2']) &&
    isset($_POST['field3']) &&
    isset($_POST['field4']) &&
    isset($_POST['field5']) &&
    isset($_POST['field6']) ) {

    $data =      'f1: ' .$_POST['field1'] .
        "\r\n" . 'f2: ' .$_POST['field2'] .
        "\r\n" . 'f3: ' .$_POST['field3'] .
        "\r\n" . 'f4: ' .$_POST['field4'] .
        "\r\n" . 'f5: ' .$_POST['field5'] .
        "\r\n" . 'f6: ' .$_POST['field6'] . ".";

    // to distinguish file name, its title will be the time it was uploaded
    $date_time = date("Y-m-d") .'-'. date("h:i:sa");
    // setting uniqid( , true) will generate 32 chars name where false generates 13 chars
    $new_file_name = uniqid($date_time.'_', false) . ".csv";
    $ret = file_put_contents('/link-to-your-server/' . $new_file_name,
        $data, FILE_APPEND | LOCK_EX);
    if($ret === false) {
        die("<p class='p'>There was an error writing this file</p>");
    }
    else {
        //echo "$ret bytes written to file";
        echo "<p class='p'>File Uploaded Successfully!</p>";
    }
} else {
    die("<p class='p'>No post data to process</p>");
}
?>

<style>
    .p {
        text-align: center;
        vertical-align: middle;
    }
</style>
