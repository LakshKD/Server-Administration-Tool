<html>
	<head>
		<title>Linux Firewall Services</title>
	</head>
	<body>
		<a href=/index.php>Main index</a><br>
		<a href=firewall.php>Module index</a>
		<center><img src=lc.gif><img src=is.gif><img src=ns1.gif><img src=us.gif><img src=x.gif>&nbsp;&nbsp;&nbsp;<img src=f.gif><img src=is.gif><img src=r.gif><img src=es.gif><img src=ws.gif><img src=as.gif><img src=l.gif><img src=l.gif><br>
		Linux Firewall Configuration RHEL 6.0 <hr><center>		
		<h1><b><u>CONFIGURE FIREWALL ON THE SYSTEM</u></b></h1>
		<table border=2><tr><th><img src=servicefire.gif></th><tr></table><br><br>
		<form action="" method="post">
		<input type="submit" name="start" value="Start Firewall Service">&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" name="stop" value="Stop Firewall Service">&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" name="status" value="Status of Firewall Service">&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" name="restart" value="Restart Firewall Service">&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" name="flush" value="Flush Firewall Service">
		</form>
		<?php
		if(isset($_POST['start']))
			{
			 $a=`sudo service iptables start`;
			 echo "<pre><b>$a</pre>"."<br>"."<b><u>FIREWALL SERVICE STARTED ON YOUR SYSTEM</u></b>";
			}
			if(isset($_POST['stop']))
			{
			 $b=`sudo service iptables stop`;
			 echo "<pre><b>$b</pre>"."<br>"."<b><u>FIREWALL SERVICE STOPED ON YOUR SYSTEM</u></b>";
			}
			if(isset($_POST['status']))
			{
			 $c=`sudo service iptables status`;
			 echo "<pre><b>$c</pre>";
			}
			if(isset($_POST['restart']))
			{
			 $d=`sudo service iptables restart`;
			 echo "<pre><b>$d</pre>"."<br>"."<b><u>FIREWALL SERVICE STOPED ON YOUR SYSTEM</u></b>";
			}
			if(isset($_POST['flush']))
			{
			 $e=`sudo iptables -F`;
			 echo "<pre><b>$e</pre>"."<br>"."<b><u>FIREWALL SERVICE FLUSHED FROM YOUR SYSTEM</u></b>";
			}
		?></center></center><hr><br>
		<form action="" method=post>
		<input type="submit" name="sub" value="Save Firewall configuration">
		</form>
		<?php
			if(isset($_POST['sub']))
			{
				$c=`sudo service iptables save`;
				echo "<center><pre>$c<pre>";
				echo "<b><h3><i><u>FIREWALL CONFIGURATION SAVED<br>THE CHANGES HAS BEEN APPLIED !!!!</u></i></h3></b></center>";
			}	
		?>
				<hr></center></center></b>
		<a href=/index.php><img src=left.gif align=middle>Return to Main index</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href=firewall.php>Return to firewall index</a>
	</body>
</html>
