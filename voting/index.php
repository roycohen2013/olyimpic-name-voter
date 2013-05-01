
<html>	

	<head>
		<title> Olympic Name Voting</title>
		<link rel="stylesheet" href="vote.css" type="text/css" />
	<!--	<script src="jquery-1.8.0.js" type="text/javascript"></script>
		<script src="scripts.js" type="text/javascript"></script> -->
	</head>
	
	
	<body>
		
		
		
		<div id="container" class="clearfix">
			<div id="heading">
			<h1> Olympic Name Voting</h1>	
			</div>
			
				<div id="wrapper">
					
					<!-- this is where list of names will go -->
					
					<?php 
						echo '<div id="nameList">';
						
						
						
						$txt_file    = file_get_contents('votinglist.txt');
						$rows        = explode("\n", $txt_file);
						$nameList = array();
						
						// format:   ddddd | 333 \n
						
						$url = 'nameSubmission.php?name=';
						
						$name = 'Name';
						
						foreach ($rows as $value) {
							//echo $value.'<br>';
							// read out each item and the number of votes and echo back name of it and count as a url
							
							$res = strpos($value, '|');
							
							if ($res === false){
								echo("Oops! error in voting list");
								exit(1);
							}
							
							$name = trim(substr($value, 0, $res));
							$val =  trim(substr($value, $res+1, strlen($value)));
							
							$url = $url.$name;
							
			
							echo('<div class="nameBox">');
							echo '<a href="'.$url.'" class="name">';
									echo '<div class="nam2">';
										echo($name);
									echo '</div>';
									
									echo '<div class="vals">';
										echo(' Votes: '.$val);
									echo '</div> <!-- end vals -->';
							echo '</a>';
							echo '</div>';
							
							
							
							$url = 'nameSubmission.php?name='; //reset the string
							
							
							//array_shift($rows);
						}
						
						
						//oopen the text file,
					/*	$count = 3;
						for ($i = 0; $i < $count; $i++) {
							// read out each item and the number of votes and echo back name of it and count as a url
							echo '<div class="name">';
							echo '<a href="nameSubmission.php?name='.'Name '.$i.'"  >';
							echo('Name '.$i);
							echo('</a>');
							echo '</div> <!-- end name> -->';
						}
					*/	
						echo '</div> <!-- end nameList -->';
						
						
						//echo '<script src="" type="text/javascript">init();</script>';
					 ?>
					 
				<div id="formstuff"> 
					<form method="post" action="textSubmission.php" >
							<span class="">Choose one of the names or submit a new one below</span>
								 
						 <div id="submission">
						 	<input type="text" name="name" value="" />
						 	<input type="submit" name="submit" value="Submit!" />
						</div> <!-- end submission div -->
						
						<div id="explainantion">
							<p> I programed this site to put all the good senior olympic names together and let people vote for which ones they like the most. The voting done here is not official but it gives us a good idea of what the name would be.</p>
							
							<p> Please dont fill the system with junk/curses/profanities/advertisements and the like.</p>
							
						</div>
				</form> 
			</div>	
			
			</div><!-- wrapper -->
		</div> <!-- container ends -->
	

</html>