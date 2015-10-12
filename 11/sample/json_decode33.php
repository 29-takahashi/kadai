<?php
$url  = "data/sample3.json";
$json_data = file_get_contents($url, true);
$data = json_decode($json_data);
// var_dump($data);

echo $data->name . "<br>";
echo $data->gender . "<br>";
echo $data->info->living . "<br>";
echo $data->info->birthday . "<br>";



foreach ($data as $key => $value){
	if (!is_object($value)) {
		echo $key . " = " .$value . "<br>";
	} else {
		echo $key . "<br>";
		foreach ($value as $key => $value2) {
			echo "　" . $key . " = " .$value2 . "<br>";
		} 
		else{
			$hobby = $data->info->hobby; 
			foreach ($hobby as $key => $value3) {
			echo "" . $key. $value3."<br>";	
}
		}
	}
}

?>
<html>
<head>
<meta charset="utf-8">
<title></title>
</head>
<body>
<span><a href="index.php">index.php</a></span>
</body>