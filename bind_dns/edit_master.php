<html>
	<head>
		<title>Edit Master Zone</title>
	</head>
	<body>
		<a href=/index.php>Main index</a><br>
		<a href=dns.php>Module index</a>
		<center>
		<center><img src=b.gif><img src=i.gif><img src=n.gif><img src=d.gif>&nbsp;&nbsp;&nbsp;<img src=d.gif><img src=n.gif><img src=s.gif>&nbsp;&nbsp;&nbsp;<img src=s.gif><img src=es.gif><img src=r.gif><img src=v.gif><img src=es.gif><img src=r.gif><br>
		Berkeley Internet Name Domain RHEL 6.0<hr>
		<h1><b><u>EDIT MASTER ZONE</u></b></h1>
			<table border=0 width=100% height=30%>
		<tr width=100% align=center valign=middle>
		<th width=25% bgcolor=white>
		<a href="address.php"><table border=2><tr><th><img src=a.gif></th><tr></table></a><br><a href="address.php">Address Records</a></th>
		<th bgcolor=white width=25%>
		<a href="nameserver.php"><table border=2><tr><th><img src=ns.gif></th><tr></table></a><br><a href="nameserver.php">Name Server Records</a></th>
		<th width=25% bgcolor=white>
		<a href="namealias.php"><table border=2><tr><th><img src=cname.gif></th><tr></table></a><br><a href="namealias.php">Name Alias Records</a></th>
		<th bgcolor=white width=25%>
		<a href="mailserver.php"><table border=2><tr><th><img src=mx.gif></th><tr></table></a><br><a href="mailserver.php">Mail Server Records</a></th>
		</tr>
		</table><br>
		</center></center></center><hr><br>
		<form action="" method=post>
		<input type="submit" name="sub" value="Restart Name Server">
		</form>
		<?php
			if(isset($_POST['sub']))
			{
				$c=`sudo service named restart`;
				echo "<center><pre>$c<pre>";
				echo "<b><h3><i><u>DNS SERVICE RESTARTED<br>THE CHANGES HAS BEEN APPLIED !!!!</u></i></h3></b></center>";
			}	
		?><hr></center>
		<a href=dns.php ><img src=left.gif align=middle>Return to zone list</a>
	</body>
</html>
