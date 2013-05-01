<?php 




?>

<html>	

	<head>
		<title> Olympic Name Voting</title>
	</head>
	
	
	<body>
		
		
		
		<div id="container">
			<h1> Olympic Name Voting</h1>	
			
			<form method="post" action="voting.php">
					<span class="">Choose one of the names or submit a new one below</span>
					
					<!-- this is where list of names will go -->
					
					<?php 
						echo '<div id="nameList">';
						
						//oopen the text file,
						$count = 3;
						for ($i = 0; $i < $count; $i++) {
							// read out each item and the number of votes and echo back name of it and count as a url
							echo '<div class="name">'
							echo '<a href="nameSubmission.php?name='.'Name '.$i.'"  >'
							echo('Name '.$i);
							echo('</a>')
							echo '</div> <!-- end name>';
						}
						
						echo '</div> <!-- end nameList -->';
						
					 ?>
					 
					 <div id="submission">
					 	<input type="text" name="name" value="name" />
					 	<input type="submit" name="submit" value="submission" />
					</div> <!-- end submission div -->
			</form> 
		
		</div> <!-- container ends -->
	
	</body>

</html>