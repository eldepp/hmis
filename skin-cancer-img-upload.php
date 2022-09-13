<?php

require_once('machine-learning.php');

if(isset($_POST['submit-img'])){
    $extension = pathinfo($_FILES["img"]["name"], PATHINFO_EXTENSION);
    $dst_fname =  getcwd() . '/skin-images/' . time() . uniqid(rand()) . '.' . $extension;
    $dst_fname = str_replace('\\', '/', $dst_fname);
    move_uploaded_file($_FILES["img"]["tmp_name"],  $dst_fname);
    $result = classify_image($dst_fname);
} else {
    header("Location: index.php");
    exit();
}

?>



<!DOCTYPE html>
<html>
    <head>
        <title>HMIS</title>
        <style>
            table, td, th {
                border: 1px solid black;
            }
            table {
                border-collapse: collapse;
            }
            th {
                text-align: right;
                background-color: rgb(203, 240, 227);
            }
            th, td {
                padding: 10px;
            }
        </style>
    </head>
    <body>
        <h1>Skin Cancer Diagnosis Result</h1>
        <table>
            <tr>
                <th>Result</th>
                <td><?php echo $result['class_name'] ?></td>
            </tr>
            <tr>
                <th>Probability of benign</th>
                <td><?php echo $result['prob_benign'] ?></td>
            </tr>
            <tr>
                <th>Probability of malignant</th>
                <td><?php echo $result['prob_malignant'] ?></td>
            </tr>
        </table>
        <p>
            To return to previous page <a href="index.php">click here</a>
        </p>
    </body>
</html>