<?php
//dir the file will be uploaded to
$upload_dir = "uploads/";

if ($_FILES['upload']['name'] && isset($_POST['submit'])) {
	//get the total number of files to be uploaded
	$total = count ($_FILES['upload']['name']);
	
	//loop through each file
	for ($i=0; $i<$total; $i++) {
		//create the target file dir
		$upload_file = $upload_dir . basename($_FILES['upload']['name'][$i]);
		//uploads the files into the target dir
		if (move_uploaded_file($_FILES['upload']['tmp_name'][$i], $upload_file)) {
			echo ("The file <font color='red'>". basename( $_FILES['upload']['name'][$i])."</font> has been uploaded.<br>");			
		} else {
			echo ("There was an error uploading the file.");
		}
	}
} else {
	echo ("You must select the files you would like to upload.");
}

?>
<a href="upload.html"> << back </a>