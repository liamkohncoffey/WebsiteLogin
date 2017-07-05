<?php
	
	$con = mysqli_connect('127.0.0.1', 'root', '', "assignment_one");
	
	if (!empty($_GET['companyname'])) {
		$CompNam = $_GET['companyname'];
		$q=$_GET['Note'];
		$q1=$_GET['UserName'];
		$q2=$_GET['DivID'];	
		$query = "SELECT * FROM `stocks` WHERE companyname='$CompNam'";
		$query1 = "SELECT * FROM `notes` WHERE UserName='$q1' AND CompanyName='$q2' LIMIT 1";
		//$query2 = "UPDATE `notes` SET Note='$q' WHERE UserName='$q1' AND CompanyName='$q2'";
		$result2 = mysqli_query($con, $query);
		$result1 = mysqli_query($con, $q2);
		//mysqli_query($con, $query2);
		$row2 = mysqli_fetch_assoc($result2);
		$r = mysqli_query($con, $query1);
		$Row2 = mysqli_fetch_assoc($r);
		sleep(.5);
		echo "<li>"."Stock ID = " . $row2['id'] . "</li>";
		echo "<li>" ."Current Price = " . $row2['currentprice'] . "</li>";	
		echo "<li>" ."Recent Change = " . $row2['recentchange'] . "</li>";	
		echo "<li>" ."Annual Trend = " . $row2['annualtrend'] . "</li>";	
		echo "<li>" ."Recent Changed Direction = " . $row2['recentchangedirection'] . "</li>";
		echo $Row2['Note'];		
	}
	
	if (!empty($_GET['user_name'])) {
		$username = $_GET['user_name'];
		$password = $_GET['Password'];
		$query = "SELECT * FROM `users` WHERE username='$username' LIMIT 1";
		$result = mysqli_query($con, $query);
		$row = mysqli_fetch_assoc($result);
		if($username == $row['username'] ){
			if($password == $row['password']){
				echo "OK";
			}
			else {
			echo "Password";
			}
		}
		else {
			echo "username";
		}
	}
	
	if (!empty($_GET['note'])) {
	$q=$_GET['note'];
	$q1=$_GET['UserName'];
	$q2=$_GET['CompanyName'];
	$q3=$_GET['companyName'];
	$query1 = "UPDATE `notes` SET Note='$q' WHERE UserName='$q1' AND CompanyName='$q2'";
	$query2 = "SELECT * FROM `notes` WHERE UserName='$q1' AND CompanyName='$q2' LIMIT 1";
	$query3 = "SELECT * FROM `stocks` WHERE companyname='$q3'";
	//$query = "INSERT INTO notes (UserName, ID, CompanyName, Note) 
	//VALUES ('Fred','6','Acme','TEST'), ('Jo','12','Acme','TEST'), ('Judy','23','Acme','TEST'),('Bill','24','Acme','TEST')"; 
	
	if (mysqli_query($con, $query1) === TRUE) {
		
    	$result1 = mysqli_query($con, $query1);
		$result2 = mysqli_query($con, $query2);
		$result3 = mysqli_query($con, $query3);
		$r2 = mysqli_fetch_assoc($result2);
		$roow2 = mysqli_fetch_assoc($result3);
		sleep(.5);
		echo "<li>"."Stock ID = " . $roow2['id'] . "</li>";
		echo "<li>" ."Current Price = " . $roow2['currentprice'] . "</li>";	
		echo "<li>" ."Recent Change = " . $roow2['recentchange'] . "</li>";	
		echo "<li>" ."Annual Trend = " . $roow2['annualtrend'] . "</li>";	
		echo "<li>" ."Recent Changed Direction = " . $roow2['recentchangedirection'] . "</li>";
		echo $r2['Note'];	
		
		
	} else {
	    echo "Error updating record: " . $con->error;
	}
	mysqli_close($con);
	}
?>