	<?php
class jobbiset
{
	
	public function initialize(){
	$holder = 1;
				$conn = mysqli_connect('classroom.cs.unc.edu', 'jwoltz', 'jhwjohn13', 'jwoltzdb');
				if (!$conn) {
						die('Could not connect: ' . mysqli_error($conn));
				}
				
				mysqli_select_db($conn, "a8_jobbi");
				$sql = "SELECT * FROM a8_jobbi ORDER BY id DESC";       // Select statement that pulls the top 15 rows from the DB to populate the web page
				
				$result = mysqli_query($conn,$sql);
				
				while($row = mysqli_fetch_array($result)){
					if($holder == 5){
						$holder = $row['id'];
					}
					else{
						$holder++;
					}
					
					
				
					echo "<div class=\"post\">";
				echo "<p class=\"content\">". $row['request'] ."</p> ";
					echo "<span class=\"payment\"> Pay: $". $row['payment'] ." </span>    <span class=\"location\"> Location: ". $row['location'] ." </span>";
				echo "<div>";
					echo "<form class=\"buttons\">";
						echo "<input type=\"button\" id=\"cntct".$row['id']."\"  class=\"contact\" value=\"Contact\">";
						echo "<input type=\"button\" id=\"reprt".$row['id']."\" class=\"report\" value=\"Report\">" ;
						echo "<input type=\"button\" id=\"frwrd".$row['id']."\" class=\"forward\" value=\"Forward\">" ;
					echo "</form>";
				echo "</div>";
			echo "</div>";
		
				} 
			mysqli_close($conn);	
	
	}
	
	public function newPost($email, $payment, $location, $request){
		$conn = mysqli_connect('classroom.cs.unc.edu', 'jwoltz', 'jhwjohn13', 'jwoltzdb');
		
			$sql = "INSERT INTO a8_jobbi(email, payment, location, request, reportCount)
					VALUES('$email', '$payment', '$location', '$request', 0)";
		$result = mysqli_query($conn,$sql);
		
	}
	
	
	public function addReport($id){
		$conn = mysqli_connect('classroom.cs.unc.edu', 'jwoltz', 'jhwjohn13', 'jwoltzdb');
		
		$sql = "UPDATE a8_jobbi SET reportCount = reportCount+1 WHERE id='$id'";
		
		$result = mysqli_query($conn,$sql);
		
		$sql =  "SELECT reportCount FROM a8_jobbi WHERE id='$id'";
		
		$result = mysqli_query($conn,$sql);
		$result = mysqli_fetch_array($result);
		
		if($result['reportCount'] >= 3){
			$sql = "DELETE FROM a8_jobbi WHERE id='$id'";
			$result = mysqli_query($conn,$sql);
		}

	}
	
	public function forward($id, $address){
		$conn = mysqli_connect('classroom.cs.unc.edu', 'jwoltz', 'jhwjohn13', 'jwoltzdb');
		$sql = "SELECT email, request FROM a8_jobbi WHERE id='$id'";
		$result = mysqli_query($conn,$sql);
		$result = mysqli_fetch_array($result);
		$request = $result['request'];
		$email = $result['email'];
		
		$subject = "A Jobbi Request has been suggested to you by a friend!";
		$message = "A friend has sent you the following job \n \n '$request' \n Email the poster at: '$email'";
		$header = "From: Jobbi@donotreply.com";
		
		mail($address, $subject, wordwrap($message,70),$header);
	
	}
	
	public function contact($id, $address){
		$conn = mysqli_connect('classroom.cs.unc.edu', 'jwoltz', 'jhwjohn13', 'jwoltzdb');
		$sql = "SELECT email, request FROM a8_jobbi WHERE id='$id'";
		$result = mysqli_query($conn,$sql);
		$result = mysqli_fetch_array($result);
		$request = $result['request'];
		$email = $result['email'];
		
		$subject = "Someone has replied to the job you posted!\n";
		$message = "Your request: \n '$request' \n Has been responded to by: '$address', make sure to get in touch!";
		$header = "From: Jobbi@donotreply.com";
		
		mail($email, $subject, wordwrap($message,70),$header);
	}
	
}
				?>
				
				
				
				
				