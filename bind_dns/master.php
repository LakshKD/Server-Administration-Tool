<html>
	<head>
		<title>Create Master Zone</title>
	</head>
	<body>
		<a href=/index.php>Main index</a><br>
		<a href=dns.php>Module index</a>
		<center><img src=b.gif><img src=i.gif><img src=n.gif><img src=d.gif>&nbsp;&nbsp;&nbsp;<img src=d.gif><img src=n.gif><img src=s.gif>&nbsp;&nbsp;&nbsp;<img src=s.gif><img src=es.gif><img src=r.gif><img src=v.gif><img src=es.gif><img src=r.gif><br>
		Berkeley Internet Name Domain RHEL 6.0<hr><center>		
		<h1><b><u>CREATE MASTER ZONE</u></b></h1>
		<table border=2><tr><th><img src=master.gif></th><tr></table><hr>
		<form action="" method="post">
		<table height=40% width=40% bgcolor=#cccccc border=0>
		<tr height=3% width=40% bgcolor=#9999ff>
		<td>&nbsp;&nbsp;&nbsp;&nbsp;Create a Master Zone</td>
		<td width=2% bgcolor=#9999ff></td><td width=18% bgcolor=#9999ff></td></tr>
		<tr height=11% border=1 bgcolor=#cccccc>
		<td width=20%>
		&nbsp;&nbsp;&nbsp;&nbsp;Domain Name</td><td width=2%> : </td><td width=18%><input type="text" name="domain"></td></tr>
		<tr height=11% bgcolor=#cccccc>
		<td width=20%>
		&nbsp;&nbsp;&nbsp;&nbsp;E-mail Address</td><td width=2%> : </td><td width=18%><input type="text" name="email"></td></tr>
		<tr height=10%><th>
		<input type="submit" name="submit" value="Create Master Zone"></th></tr>
		</table><br>
		</form>
		<?php
			if(isset($_POST['submit']))
			{
			if($_POST['domain']=="")
				echo "<b>DOMAIN NAME CAN NOT BE BLANK!!!!";
			if($_POST['email']==""&&$_POST['domain']!="")
			echo "<b>EMAIL FIELD CAN NOT BE EMPTY!!!";
			}
		if(isset($_POST['submit'])&&$_POST['domain']!=""&&$_POST['email']!="")
			{
				$a=$_POST['domain'];
				$y=`sudo find / -name $a.hosts`;
				$q=`sudo cat /etc/named.conf | grep -w /var/named/$a.hosts`;
				$r=`sudo cat /etc/named.conf | grep -w $a`;
				if (`$q >> /dev/null`||$y!=""||$r!="")
				{	 
					echo "<b>DOMAIN NAME ALREADY EXISTS!!!!";
				}
			       else
				{
				$a=$_POST['domain'];
				$x=$_POST['email'];
				$b=`sudo touch dns.sh`;
				$b=`sudo chmod 777 dns.sh`;
				$b=`echo "echo '
zone \"$a\" {
	type master;
	file \"/var/named/$a.hosts\";
	};' >> /etc/named.conf">dns.sh`;
				$b=`sudo bash dns.sh`;
				$b=`sudo rm -rf dns.sh`;
				echo "MASTER ZONE<br><br><img src=master.gif><br><br>&nbsp;&nbsp;<u><b><i>$a</i></u></b>&nbsp;&nbsp;CREATED";
				
				$d=`sudo touch /var/named/chroot/var/named/$a.hosts`;
				$d=`sudo chmod 777 /var/named/chroot/var/named/$a.hosts`;			
				$b=`sudo touch dns1.sh`;
				$b=`sudo chmod 777 dns1.sh`;
				$b=`echo "echo '
\$ ttl 38400
$a		    IN    SOA      abc.$x (
				20062011
				10800
				3600
			   604800
		38400)'  >> /var/named/chroot/var/named/$a.hosts" > dns1.sh`;
				$b=`sudo bash dns1.sh`;
				$b=`sudo rm -rf dns1.sh`;
				$d=`sudo chmod 644 /var/named/chroot/var/named/$a.hosts`;		
		?>
		<?php
				}
			}
		?></center></center><hr><br>
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
