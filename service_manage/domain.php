<html>
	<head>
		<title>DNS Service Management</title>
	</head>
	<body>
			<a href=/index.php>Main index</a>
		<center><img src=s.gif><img src=e.gif><img src=rc.gif><img src=vc.gif><img src=i.gif><img src=c.gif><img src=e.gif>&nbsp;&nbsp;&nbsp;<img src=m.gif><img src=as.gif><img src=ns1.gif><img src=as.gif><img src=g.gif><img src=es.gif><img src=ms.gif><img src=es.gif><img src=ns1.gif><img src=ts.gif><br>
		SERVICE Management RHEL 6.0<hr>
			<h1><b><u>DNS MANAGEMENT</u></b></h1>
		<form name="myform" action="" method="post">
			<input type="submit" name="start" value="START">&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" name="stop" value="STOP">&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" name="status" value="STATUS">&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" name="restart" value="RESTART">
		</form>
		<?php
			if(isset($_POST['start']))
			{
			 $a=`sudo /etc/init.d/named start`;
			 echo "<pre>$a</pre>"."<br>"."<b><u>DNS SERVICE STARTED</u></b>";
			}
			if(isset($_POST['stop']))
			{
			 $b=`sudo /etc/init.d/named stop`;
			 echo "<pre>$b</pre>"."<br>"."<b><u>DNS SERVICE STOPED</u></b>";
			}
			if(isset($_POST['status']))
			{
			 $c=`sudo /etc/init.d/named status`;
			 echo "<pre>$c</pre>"."<br>";
			}
			if(isset($_POST['restart']))
			{
			 $d=`sudo /etc/init.d/named restart`;
			 echo "<pre>$d</pre>"."<br>"."<b><u>DNS SERVICE RESTARTED</u></b>";
			}
		?></center>
		<br><hr></center>
		<a href=/index.php ><img src=left.gif align=middle>Return to Main index</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href=service.php >Return to Service Management index</a>
	</body>
</html>
			
