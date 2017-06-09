<?php
//student controller
function openPdf($filePath, $filename) {

    header('Content-type: application/pdf');
    header('Content-Disposition: inline; filename="' . $filename . '"');
    header('Content-Transfer-Encoding: binary');
    header('Accept-Ranges: bytes');
    @readfile($filePath);
}

if (isset($_POST['open'])) {
   //to open pdf file
    $path = $_POST['path'];
    $title = $_POST['title'];
    openPdf($path, $title);
}
if (isset($_POST["updateimg"])) {
    
    if(isset($_FILES))
    {$file = $_FILES["file"];
       $allowedExts = array("jpg", "png");
         $maxSize = 1024000;
           include '../model/upload.php';
            $destination = "../uploads/stdimg/";
           $upload = new upload($file, $allowedExts, $maxSize, $destination);
         if($upload->updateimg()) {
         header("location: http://localhost:3333/David%20last%20updates/PhpProject1/PhpProject1/view/studentpage.php");}
		 
         else echo"error ";
        
    }
    else echo"error update img";
}