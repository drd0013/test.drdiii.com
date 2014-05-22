<!DOCTYPE html>
<html>
 <head>
  <meta charset="UTF-8">
  <title>Widget Login</title>
      <script type="text/javascript">
      function validateForm()
    {
    var a=document.forms["reg"]["email"].value;
    var b=document.forms["reg"]["password"].value;
    if ((a==null || a=="") && (b==null || b==""))
    {
    alert("All Fields must be filled out");
    return false;
    }
	var atpos=a.indexOf("@");
    var dotpos=a.lastIndexOf(".");
    if (atpos<1 || dotpos<atpos+2 || dotpos+2>=a.length)
    {
    alert("Please enter your registered e-mail address");
    return false;
	}
    }
    </script> 
    
 </head>
 <body>
 
 Welcome to Widget Inc! 
 Please fill out and submit the form below to login

    <form name="reg" onsubmit="return validateForm()" action="./script/login_exec.php" method="post">
    <table width="274" border="0" align="center" cellpadding="2" cellspacing="0">
    <tr>
    <td colspan="2">
    <div align="center">
    <?php
    $remarks=$_GET['remarks'];
    if ($remarks==null and $remarks=="")
    {
        echo 'Login Here';
    }
    if ($remarks=='nfd')
    {
        echo 'Email/Password Incorrect';
    }		
    ?>	
    </div></td>
    </tr>
    <tr>
    <td width="95"><div align="right">Email:</div></td>
    <td width="171"><input type="text" name="email" /></td>
    </tr>
    <tr>
    <td><div align="right">Password:</div></td>
    <td><input type="password" name="password" /></td>
    </tr>
    <tr>
    <td><div align="right"></div></td>
    <td><input name="submit" type="submit" value="Submit" /></td>
    </tr>
    </table>
    </form>

 </body>
</html>





