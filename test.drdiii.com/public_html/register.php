<!DOCTYPE html>
<html>
 <head>
  <meta charset="UTF-8">
  <title>Widget Registration</title>
      <script type="text/javascript">
      function validateForm()
    {
    var a=document.forms["reg"]["custid"].value;
    var b=document.forms["reg"]["contact"].value;
    var c=document.forms["reg"]["email"].value;
    var d=document.forms["reg"]["email1"].value;
    var e=document.forms["reg"]["password"].value;
    var f=document.forms["reg"]["password1"].value;
    if ((a==null || a=="") && (b==null || b=="") && (c==null || c=="") && (d==null || d=="") && (e==null || e=="") && (f==null || f==""))
    {
    alert("All Fields must be filled out");
    return false;
    }
	if (b.length != 10)
    {
    alert("Please list 10 digit phone number in format 1234567890");
    return false;
    }
	var atpos=c.indexOf("@");
    var dotpos=c.lastIndexOf(".");
    if (atpos<1 || dotpos<atpos+2 || dotpos+2>=c.length)
    {
    alert("Not a valid e-mail address");
    return false;
	}
    if (c!=d)
    {
    alert("e-mails must match");
    return false;
    }
	if (e.length < 8){
    alert("password must be at least 8 digits");
	}
    if (e!=f)
    {
    alert("passwords must match");
    return false;
    }
    }
    </script> 
    
 </head>
 <body>
 
 Welcome to Widget Registration! 
 Please fill out and submit the form below to complete registration
 

    <form name="reg" onsubmit="return validateForm()" action="register_exec.php" method="post">
    <table width="274" border="0" align="center" cellpadding="2" cellspacing="0">
    <tr>
    <td colspan="2">
    <div align="center">
    <?php
    $remarks=$_GET['remarks'];
    if ($remarks==null and $remarks=="")
    {
        echo 'Register Here';
    }
    if ($remarks=='success')
    {
        echo 'Registration Success';
    }
    elseif($remarks=='failcust')
    {
        echo 'Customer id not found';
    }
	elseif($remarks=='failexists')
    {
	    echo 'Customer already registered';    
    }
	elseif($remarks=='failnum')
	{
		echo 'Customer ID and Contact Number do not match';
	}
		
    ?>	
    </div></td>
    </tr>
    <tr>
    <td width="95"><div align="right">Customer ID:</div></td>
    <td width="171"><input type="text" name="custid" /></td>
    </tr>
    <tr>
    <td><div align="right">Contact No.:</div></td>
    <td><input type="text" name="contact" /></td>
    </tr>
    <tr>
    <td><div align="right">E-mail:</div></td>
    <td><input type="text" name="email" /></td>
    </tr>
    <tr>
    <td><div align="right">Verify E-mail:</div></td>
    <td><input type="text" name="email1" /></td>
    </tr>
    <tr>
    <td><div align="right">Password:</div></td>
    <td><input type="password" name="password" /></td>
    </tr>
    <tr>
    <td><div align="right">Verify Password:</div></td>
    <td><input type="password" name="password1" /></td>
    </tr>
    <tr>
    <td><div align="right"></div></td>
    <td><input name="submit" type="submit" value="Submit" /></td>
    </tr>
    </table>
    </form>

 </body>
</html>





