<?php
      if(isset($_FILES['file'])) {
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES['file']['name']);
        $uploadOK = 1;
        $fileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

        // Check if file already exists
        if (file_exists($target_file)) {
          echo "Sorry, file already exists.";
          $uploadOK = 0;
        }

        // Allow certain file formats
        if($fileType != "pdf" && $fileType != "doc" && $fileType != "docx") {
          echo "Sorry, only PDF, DOC, and DOCX files are allowed.";
          $uploadOK = 0;
        }

        // Check if $uploadOK is set to 0 by an error
        if ($uploadOK == 0) {
          echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
        } else {
          if (move_uploaded_file($_FILES['file']['tmp_name'], $target_file)) {
            echo "The file ". htmlspecialchars( basename( $_FILES["file"]["name"])). " has been uploaded.";
          } else {
            echo "Sorry, there was an error uploading your file.";
          }
        }
      }
    ?>
  </body>
</html>