

<?php 
include("header.htm");


//var_dump($_POST);
$voteStatus = $_COOKIE["vote"];

if (isset($_POST['name']) && $_POST['name'] != ""){
	
	$name = $_POST['name'];
	
	$name = trim($name);
	$name = strtolower($name);
	
	$filename = 'votinglist.txt';
	
	
	$contents = file_get_contents($filename);
	
	$txt_file    = file_get_contents('votinglist.txt');
	$rows        = explode("\n", $txt_file);
	
	$found = false;
	
	$count = 0;
	
	foreach ($rows as $value) {
		
		if (strpos($value, $name) !== false){
		
			$res = strpos($value, '|');
			
			if ($res === false){
				echo("Oops! error in voting list");
				exit(1);
			}
		
		
		
			$nam = trim(substr($value, 0, $res));
			$val =  trim(substr($value, $res+1, strlen($value)));
		
		
			if($voteStatus !== "test"){		
				$newvalue = str_replace($val, intval($val)+1, $value);						
			} else {
				$newvalue = str_replace($val, intval($val), $value);
			}
		
			
		
			$rows[$count] = $newvalue; 
			
			$found = true;
			break;
		
		
							
		}
		
		$count++;
	}
	
	
	
	if ($found === false) {
		$newName = $name.'| '.'1';
		array_push($rows, $newName);
	}
	
	
	//$new_contents = str_replace('Alice', 'John', $contents);
	
	$new_contents = implode("\n", $rows);
	
	file_put_contents($filename, $new_contents);
	
	
	echo("<h3> Congrats! </h3>");
	
	$num = intval($val)+1;
	
	if ($found === false){
		echo("The name ".$name." has been added");
	}else{
	
		if($voteStatus !== "test"){
			echo("The name ".$name." now has ".$num." votes!");
		} else {
			echo("The name you submited is already on the list and you have already voted");
		}
	
	}
	
	
}else{
	echo 'Error, not a valid olympic name';
}


include("footer.htm");
?>


