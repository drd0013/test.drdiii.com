    <?php
    include('./includes/connection.php');
    $custid=$_POST['custid'];
    $contact=$_POST['contact'];
    $email = $_POST['email'];
	$escapedPW = mysql_real_escape_string($_POST['password']);
	$salt = bin2hex(mcrypt_create_iv(32, MCRYPT_DEV_URANDOM));

	$saltedPW =  $escapedPW . $salt;

	$hashedPW = hash('sha256', $saltedPW);

	
    $found = mysqli_query($con,
	"SELECT *
	FROM userdata 
	WHERE cust_id = '$custid'") 
	or die("Failed to Connect 1" . mysqli_error($con));
	
    if (mysqli_num_rows($found) < 1) {
    	header("location: register.php?remarks=failcust");
		mysqli_close($con);
		exit();
    }
    $phones = mysqli_fetch_row($found);
    if ($contact == $phones[1] or $contact == $phones[2]){
    $exists = mysqli_query($con,
	"SELECT COUNT(cust_id) AS count
	FROM userlogin 
	WHERE cust_id = '$custid'")
	or die("Failed to connect 2" . mysqli_error($con));
    }
	else{
		header("location: register.php?remarks=failnum");
		mysqli_close($con);
		exit();
	}
	$count=mysqli_fetch_assoc($exists);
	$count1 = $count['count'];
    if(0 + intval($count1) < 1) {
    	mysqli_query($con,
		"INSERT INTO userlogin 
		VALUES ('$custid', '$email', '$hashedPW', '$salt', 0)")
		or die("Failed to Connect3." . mysqli_error($con));
    	header("location: register.php?remarks=success"); 
		include('./includes/sendmail.php');
	}
    else{
    	header("location: register.php?remarks=failexists");
    	}
    mysqli_close($con);
    ?>