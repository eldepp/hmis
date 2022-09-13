<!DOCTYPE html>
<html>
    <head>
        <title>HMIS</title>
    </head>
    <body>
        <h1>Skin Cancer Diagnosis</h1>
        <form action="skin-cancer-img-upload.php" method="POST" enctype="multipart/form-data">
            <label>Upload sample image:</label>
            <input required type="file" name="img" accept=".jpg,.jpeg,.png">
            <input type="submit" name="submit-img" value="Upload image">
        </form>
    </body>
</html>