<?php
// ini_set('display_errors','on');
// ini_set('memory_limit', '-1');
// print_r($_POST);
// die();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "studentdata";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}

if(isset($_POST['bodydataobj']) == true)
{
	// if()
	// {
		/*Create image folder*/
		$postData= json_decode($_POST["bodydataobj"], true);
		// print_r($postData);die();
		$fileName= explode(',',$postData["phtouplod"]);
		$imgSrc  = json_decode($_POST['imgsrc']);
		$removefileArr  = $postData['removefile'];
		// var_dump($removefileArr);die();

		/*-File Data Entry-*/
		$validFilename= '';
		if(isset($imgSrc))
		{
			foreach($imgSrc as $key => $value)
			{
				if($fileName[$key] != 'empty' && !file_exists($fileName[$key]) && !in_array($fileName[$key], $removefileArr))
				{
					$validFilename.= $fileName[$key].',';
					$img = $imgSrc[$key];
					$img = str_replace('data:image/png;base64,', '', $img);
					$img = str_replace(' ', '+', $img);
					$data = base64_decode($img);
					$file = $fileName[$key];
					$success = file_put_contents($file, $data);
				}
			}
		}

		foreach($postData['studata'] as $key => $value)
		{
			if(rtrim($validFilename,',') == '')
			{
				$validFilename= 'empty';
			}
			else
			{
				$validFilename= rtrim($validFilename,',');
			}
			$insrtSql = "INSERT INTO studenttable (batchname, name, email, contactnumber, active, filenames)
						VALUES ('".$postData['batchname']."','".$value['name']."','".$value['email']."',".$value['contnum'].",'1','".$validFilename."')";
			$resultQry = $conn->query($insrtSql);
		}	

		$selSql = "SELECT * FROM studenttable";
		$result = $conn->query($selSql);
		$resultQryFtch= $result->fetch_all(MYSQLI_ASSOC);
		echo json_encode($resultQryFtch);
	// }	
}
else
{
	// print_r($_POST);die();
	if(isset($_POST['funcid']))
	{
		if($_POST['funcid'] == 1)
		{
			$delSql = 'DELETE FROM studenttable WHERE slno='.$_POST['rowid'];
			$resultQry = $conn->query($delSql);
		}		
	}
	
	$selSql = "SELECT * FROM studenttable";
	$result = $conn->query($selSql);
	$resultQryFtch= $result->fetch_all(MYSQLI_ASSOC);
	echo json_encode($resultQryFtch);
}


$conn->close();
?> 