<html>
<head>
<title>
FTP client    
</title>
</head>
<body>
<?php

//Getting request parameters from HTML    
$ftpServer = $_POST["websiteurl"]; 
$ftpUser = $_POST["username"]; 
$ftpPass = $_POST["password"]; 

set_time_limit(160); 

//Initializing connection    
$conn = @ftp_connect($ftpServer) 
or die("Couldn't connect to FTP server");  
    
//Attempting Login
$login = @ftp_login($conn, $ftpUser, $ftpPass) 
or die("Login credentials were rejected"); 

//Printing working directory once server access is granted
$workingDir = ftp_pwd($conn); 
echo "You are in the directory: $workingDir"; 
    
$fList = @ftp_nlist($conn, $workingDir); 

if (is_array($fList)) { 
    for($i = 0; $i < sizeof($fList); $i++) { 
    echo $fList[$i] . "<br>"; 
    } 
} else { 
    echo "$workingDir contains no files."; 
} 

ftp_quit($conn);     
?>    
    
<form>
<input type="button" value="Home Page" onclick="javascript:location.href='/PHP Files/ftpClient.html'" />
</form>

</body>
</html>