<?php
session_start();
if ($_POST['Submit'] == 'Send')
{

	{

  } 
$to = $_POST['toemail'];
$subject = $_POST['subject'];
$message = '<html><body>';
$message .= $_POST['textarea'];
$message .= "</body></html>";
$fromemail = $_POST['fromemail'];
$fromname = $_POST['fromname'];
$lt= '<';
$gt= '>';
$sp= ' ';
$from= 'From:';
$headers .= 'From: '.$from."\r\n".
    'Reply-To: '.$from."\r\n" .
    'X-Mailer: PHP/' . phpversion();
$headers = $from.$fromname.$sp.$lt.$fromemail.$gt;
$headers .= " $fromname\r\n";
$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
mail($to,$subject,$message,$headers);
header("Location: admin.php?msg= Your message has been sent successfully.");
exit();
}
?>
<html>
<div class="container">
<head>

<style type="text/css">

html,body {
  /* Extra Styles */
  background: #fff;
  color: #425363;
  font-family: avenir, 'segoe ui', sans-serif;
}

@keyframes move {
	0% { 
		background-position: 0 60%, 0 50%;
	}
	100% { 
	  background-position: 0 60%, 100% 50%;
	}
}

.container {
  background-color: #263645;
	background-image: url('http://timteeling.com/dev/img/network.svg'), radial-gradient(200px 500px at center, red 0%, rgba(0,10,11,20) 50%, rgba(10,20,30,40));
	background-size: 125%, 50% 100%;
  background-position: 0 60%, 0 100%;
  animation: move 5s linear infinite;
  
  /* Extra Styles */
  height: 100px;
  /*box-shadow: inset 0 0 25px rgba(0,0,0,.5);*/
  border: 2px solid #263645;
  border-right: 0;
  border-left: 0;
}


/* Extra Styles */
h1 {
  text-align: center;
  font-weight: 600;
  font-size: 1em;
}

p {
  text-align: center;
  font-size: .75em;
}

a {
  color: #ff8300;
}

</style>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<script src="nicEdit.js" type="text/javascript"></script>
<script type="text/javascript">bkLib.onDomLoaded(nicEditors.allTextAreas);</script>
<center>
<title>Fake Mail Sender</title>
<link rel="icon" 
      type="image/png" 
      href="/favicon.png">
</head>
<h2 style="color:white;">Fake Mail Sender</h2>
<h3 style="color:red;">
|*| Educational Purposes Only |*|
</h3><br>
<p style="margin-left:15px">
<form action="admin.php" method="POST">
<b style="color: green">From Name:</b><br>
<input type="text" name="fromname" size="50"><br>
<br><b style="color: red">From Email:</b><br>
<input type="text" name="fromemail" size="50"><br>
<br><b style="color: red">To Email:</b><br>
<input type="text" name="toemail" size="50"><br>
<br><b style="color: green">Subject:</b><br>
<input type="text" name="subject" size="50"><br>
<br><b style="color: green">Your Message:</b><br>
<textarea type="text/html" name="textarea" rows="5" cols="50"style="width: 50%;"></textarea>
<br>
<input type="submit" name="Submit" value="Send">
<input type="reset" value="Reset">
</form>
</center>
</p>
<?php if (isset($_GET['msg'])) { echo "<font color=\"red\"><h3 align=\"center\"> $_GET[msg] </h3></font>"; } ?>
<h3 align="center">
<w><b>WARNING: </b></w><w1>Use at your own risk and responsibility.</w1>
</h3>
<style type="text/css">
  w{
    color: red;
  }
</style>
<style type="text/css">
  w1{
    color: black;
    font-size: 17;
  }
</style>
<style type="text/css">
  input{
    color: black;
    font-size: 15;
  }
</style>
 </div>
</body>
</html>

