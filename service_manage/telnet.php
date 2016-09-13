<html>
	<head>
		<title>Telnet Service Management</title>
	</head>
	<body>
			<a href=/index.php>Main index</a>
		<center><img src=s.gif><img src=e.gif><img src=rc.gif><img src=vc.gif><img src=i.gif><img src=c.gif><img src=e.gif>&nbsp;&nbsp;&nbsp;<img src=m.gif><img src=as.gif><img src=ns1.gif><img src=as.gif><img src=g.gif><img src=es.gif><img src=ms.gif><img src=es.gif><img src=ns1.gif><img src=ts.gif><br>
		SERVICE Management RHEL 6.0 <hr>
			<h1><b><u>TELNET MANAGEMENT</u></b></h1>
		<form name="myform" action="" method="post">
			<input type="submit" name="start" value="START">&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" name="stop" value="STOP">&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" name="status" value="STATUS">&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" name="restart" value="RESTART">
		</form>
		<?php
			if(isset($_POST['start']))   //&nbsp represents non-breaking space
			{
			 $a=`sudo chkconfig xinetd on`;
			 $a=`sudo service xinetd start`;
			 echo "<pre>$a</pre>"."<br>"."<b><u>TELNET PORT STARTED</u></b>";
			}
			if(isset($_POST['stop']))
			{
			 $a=`sudo chkconfig xinetd off`;
			 $b=`sudo service xinetd stop`;
			 echo "<pre>$b</pre>"."<br>"."<b><u>TELNET PORT STOPPED</u></b>";
			}
			if(isset($_POST['status']))
			{
			 $c=`sudo service xinetd status`;
			 echo "<pre>$c</pre>";
			}
			if(isset($_POST['restart']))
			{
			 $d=`sudo service xinetd restart`;
			 echo "<pre>$d</pre>"."<br>"."<b><u>TELNET PORT RESTARTED</u></b>";
			}
		?></center>
		<br><hr></center>
		<a href=/index.php ><img src=left.gif align=middle>Return to Main index</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href=service.php >Return to Service Management index</a>
	</body>
</html>
			
