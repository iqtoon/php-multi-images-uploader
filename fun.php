<?php

if (isset($_FILES['images']['name'])){

	$targetDir = "uploads/"; 

	$allowTypes = array('jpg','png','jpeg','gif');

	foreach($_FILES['images']['name'] as $key=>$val){ 

		$imgfile = $_FILES['images']['name'][$key];

		$fileName = basename($_FILES['images']['name'][$key]); 

		$targetFilePath = $targetDir . $fileName; 

		$fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION); 

		$rand = rand(1, 1000000000);

		$newname = $rand . date(Ymd);

		if(in_array($fileType, $allowTypes)){     

			$filename = $_FILES['images']['tmp_name'][$key];

			if(move_uploaded_file($filename, $targetFilePath . $newname . '.' . $fileType)){ 
				
				// this will rename each image name
				rename($targetFilePath . $newname . '.' . $fileType, $targetDir . $newname . '.' . $fileType); 
			
			} 
		} 
	}
}

?>
