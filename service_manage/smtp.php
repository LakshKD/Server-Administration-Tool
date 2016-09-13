<html>
	<head>
		<title>Sendmail Service Management</title>
	</head>
	<body>
			<a href=/index.php>Main index</a>
		<center><img src=s.gif><img src=e.gif><img src=rc.gif><img src=vc.gif><img src=i.gif><img src=c.gif><img src=e.gif>&nbsp;&nbsp;&nbsp;<img src=m.gif><img src=as.gif><img src=ns1.gif><img src=as.gif><img src=g.gif><img src=es.gif><img src=ms.gif><img src=es.gif><img src=ns1.gif><img src=ts.gif><br>
		SERVICE Management RHEL 6.0 <hr>
			<h1><b><u>SMTP MANAGEMENT</u></b></h1>
		<form name="myform" action="" method="post">
			<input type="submit" name="start" value="START">&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" name="stop" value="STOP">&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" name="status" value="STATUS">&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" name="restart" value="RESTART">
		</form>
		<?php
			if(isset($_POST['start']))
			{
			 $a=`sudo service postfix start`;
			 echo "<pre>$a</pre>"."<br>"."<b><u>SENDMAIL SERVICE STARTED</u></b>";
			}
			if(isset($_POST['stop']))
			{
			 $b=`sudo service postfix stop`;
			 echo "<pre>$b</pre>"."<br>"."<b><u>SENDMAIL SERVICE STOPED</u></b>";
			}
			if(isset($_POST['status']))
			{
			 $c=`sudo service postfix status`;
			 echo "<pre>$c</pre>"."<br>";
			}
			if(isset($_POST['restart']))
			{
			 $d=`sudo service postfix restart`;
			 echo "<pre>$d</pre>"."<br>"."<b><u>SENDMAIL SERVICE RESTARTED</u></b>";
			}
		?></center>
		<br><hr></center>
		<a href=/index.php ><img src=left.gif align=middle>Return to Main index</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href=service.php >Return to Service Management index</a>
	</body>
</html>
			
