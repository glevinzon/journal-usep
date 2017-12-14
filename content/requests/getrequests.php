<?php
session_start();
require_once 'db.php';	

// Superadmin
if($_SESSION['user_type'] == 'Superadmin'){
	$getrequests = mysqli_query($conn, "SELECT * FROM journal.requests WHERE req_status='pending'");

	while($row = mysqli_fetch_array($getrequests)){
		$req_count=mysqli_num_rows($getrequests);
		$req_id = $row['id'];
		$req_type = $row['req_type'];
		$req_user = $row['req_user'];
		$req_file_id = $row['req_file_id'];
		$req_file_col = $row['req_file_college'];
		$req_status = $row['req_status'];
		$req_posted = $row['req_posted'];

		if($req_posted == "False"){
			$updaterequest = mysqli_query($conn, "UPDATE journal.requests SET req_posted='True' WHERE id='$req_id'");
			// Get Filenames
			$file = mysqli_query($conn, "SELECT * from $req_file_col WHERE id='$req_file_id'");
			$row2 = mysqli_fetch_array($file);
			
			echo
			  "<a class='noti-item' id='noti$req_id' onclick='show_req($req_id)'>
				Download Request <span id='reqclose' class='reqclosebtn'>x</span>
				<div style='display:none' class='hidden_req'>
				<span style='font-size:10px'>From: ".$req_user."</span><br>
				<span style='font-size:10px'>File Requested: ".$row2['name']."</span><br>
				<span class='notistat'></span><br>
				<button class='btn btn-success' value='accept' onclick='respondReq(this.value, ".$req_id.")'>Accept</button>
				<button class='btn btn-danger' value='decline' onclick='respondReq(this.value, ".$req_id.")'>Decline</button>
				</div>
			  </a>";
		}	
	}
}


// Users
if($_SESSION['user_type'] == 'User'){
	$getrequests = mysqli_query($conn, "SELECT * FROM journal.requests WHERE req_status='pending'");

	while($row = mysqli_fetch_array($getrequests)){
		$req_count=mysqli_num_rows($getrequests);
		$req_id = $row['id'];
		$req_type = $row['req_type'];
		$req_user = $row['req_user'];
		$req_file_id = $row['req_file_id'];
		$req_file_col = $row['req_file_college'];
		$req_status = $row['req_status'];
		$req_posted = $row['req_posted'];

		if($req_posted == "False"){
			$updaterequest = mysqli_query($conn, "UPDATE journal.requests SET req_posted='True' WHERE id='$req_id'");
			// Get Filenames
			$file = mysqli_query($conn, "SELECT * from $req_file_col WHERE id='$req_file_id'");
			$row2 = mysqli_fetch_array($file);
			echo
			  "<a class='noti-item' id='noti$req_id' onclick='show_req($req_id)'>
				Download Request <span id='reqclose' class='reqclosebtn'>x</span>
				<div style='display:none' class='hidden_req'>
				<span style='font-size:10px'>File Requested: ".$row2['name']."</span><br>";
			
			if($req_status == 'pending')
				$notify = 'Waiting for approval';
			if($req_status == 'accept'){
				$notify = 'Request approved';
				$dlpath= $row2["path"];
			}
			if($req_status == 'decline')
				$notify = 'Request declined';

			echo 
			  "<span class='notistat'>$notify</span>";

			if(isset($dlpath)){
				echo '<form enctype="multipart/form-data" method="POST" action="./download.php">
							<input type="hidden" name="typ" value="download">
							<input type="hidden" name="college" value="'.$req_file_col.'">
							<input type="hidden" name="id" value="'.$req_file_id.'">
						<button type="submit" name="submitdownload" class="btn btn-success">Download</button>
					</form>';
				unset($dlpath);
			}
			
			echo '</div></a>';
		}	
	}
}



?>