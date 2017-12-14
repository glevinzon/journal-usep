<?php 

	include 'register_process.php';

 ?>


<!DOCTYPE html>
<html>
<head>
	<title></title>

	  <!-- Bootstrap Core CSS/ custom css -->
  <link href="content/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="content/css/style.css">
  <link rel="stylesheet" type="text/css" href="content/css/filestyle.css">

  <style type="text/css">
  body{
  	background-image: url("img/background.jpg");
  	background-position: center center;
	background-repeat: no-repeat;
	background-attachment: fixed;
	background-size: cover;
  }
  	.center-page{
  		color: rgb(182, 182, 182);
  		display: block !important;
  		background-color: rgba(0, 0, 0, 0.60);
  		box-shadow: 0 3px 6px rgba(0, 0, 0, 0.16), 0 3px 6px rgba(0, 0, 0, 0.23);
  		padding: 10px;
  		width: 400px;
  		margin-top: 3%;
  		margin-left: 68%;

  	}

  	.center-page input[type="text"], input[type="password"]{
  		margin-bottom: 5px;
  		width: 100%;
      color: #000;
  	}
  	h1{
  		color: #FFF;
  	}
  	select{
  		color: #000;
  	}


  </style>
</head>
<body><br><br>
<br>
<div class="center-page">
          <form method="POST">
          <center><h1>Register</h1><br></center>
            <label for="newusername">Username</label>
            <br>
            <input type="text" name="create_user" id="newusername" required>  
            <br>
            <label for="newpass">Password</label> 
            <br>
            <input type="password" name="create_pass" id="newpass" required>  
      			<br>
            <label for="fname">First Name</label> 
            <br>
            <input type="text" name="create_firstname" id="fname" required>
            <br>
            <label for="lname">Last Name</label> 
            <br>
            <input type="text" name="create_lastname" id="lname" required>
            <br>
            <label for="mname">Middle Name</label> 
            <br>
            <input type="text" name="create_middlename" id="mname" required>
            <br>
            <br>
            <select name="create_college" required>
              <option value="">Select College</option>
              <option value="ic">Institute of Computing (IC)</option>
              <option value="ce">College of Engineering (CE)</option>
              <option value="cgb">College of Governance and Business (CGB)</option>
              <option value="cas">College of Arts and Sciences (CAS)</option>
              <option value="ct">College of Technology (CT)</option>
              <option value="ced">College of Education (CED)</option>
              <option value="saec">School of Applied Economics (SAEC)</option>
            </select>


         
            <button type="submit" name="submit_newacc" class="btn btn-info accsubmit">Register</button>
          </form>
          </div>
 </center>


<!-- Modal Account End -->

</body>
</html>

             <!-- <select name="create_accType" required>
              <option value="">Account Type</option>
              <option value="Admin">Admin</option>
              <option value="User">User</option>
            </select> -->

