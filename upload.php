<?php
//dir the file will be uploaded to
$upload_dir = "uploads/";

if ($_FILES['upload']['name'] && isset($_POST['submit'])) {
	//get the total number of files to be uploaded
	$total = count ($_FILES['upload']['name']);
	
	//loop through each file
	for ($i=0; $i<$total; $i++) {
                $uploadCheck = 1;
		//create the target file dir
		$upload_file = $upload_dir . basename($_FILES['upload']['name'][$i]);
                //checks if file already exists
                if (file_exists($upload_file)) {
                    echo ("The file <font color='blue'>".basename($_FILES['upload']['name'][$i])."</font> already exits.<br>");
                    $uploadCheck = 0;
                }
                //checks the file size, in this case it checks if its more than 5GB.
                if ($_FILES['upload']['size'][$i] > 5000000000) {
                    echo ("The file <font color='green'>".basename($_FILES['upload']['name'][$i])."</font> size is too big.<br>");
                    $uploadCheck = 0;
                }
                //checks if $uploadCheck encountered and errors
                if ($uploadCheck == 0) {
                    echo ("The file <font color='red'>".basename($_FILES['upload']['name'][$i])."</font> was not uploaded.<br>");
                    $uploadCheck = 1;
                } else {
		//uploads the files into the target dir
		if (move_uploaded_file($_FILES['upload']['tmp_name'][$i], $upload_file)) {
			echo ("The file <font color='green'>". basename( $_FILES['upload']['name'][$i])."</font> has been uploaded.<br>");
		} else {
			echo ("There was an error uploading the file.<br>");
		}
                }
	}
} else {
	echo ("You must select the files you would like to upload.");
}

?>
<br><a href="upload.html"> << back </a>