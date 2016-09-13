<html>
	<head>
		<title>Create Slave Zone</title>
	</head>
	<body>
		<a href=/index.php>Main index</a><br>
		<a href=dns.php>Module index</a>
		<center>
		<center><img src=b.gif><img src=i.gif><img src=n.gif><img src=d.gif>&nbsp;&nbsp;&nbsp;<img src=d.gif><img src=n.gif><img src=s.gif>&nbsp;&nbsp;&nbsp;<img src=s.gif><img src=es.gif><img src=r.gif><img src=v.gif><img src=es.gif><img src=r.gif><br>
		Berkeley Internet Name Domain RHEL 6.0
			<hr>
		<h1><b><u>CREATE SLAVE ZONE</u></b></h1>
		<table border=2><tr><th><img src=slave.gif></th><tr></table><hr>
		<form action="" method="post">
		<table height=40% width=40% bgcolor=#cccccc border=0>
		<tr height=3% width=40% bgcolor=#9999ff>
		<td>&nbsp;&nbsp;&nbsp;&nbsp;Create a Slave Zone</td>
		<td width=2% bgcolor=#9999ff></td><td width=18% bgcolor=#9999ff></td></tr>
		<tr height=11% border=1 bgcolor=#cccccc>
		<td width=20%>
		&nbsp;&nbsp;&nbsp;&nbsp;Domain Name</td><td width=2%> : </td><td width=18%><input type="text" name="domain"></td></tr>
		<tr height=11% bgcolor=#cccccc>
		<td width=20%>
		&nbsp;&nbsp;&nbsp;&nbsp;Enter The IP Address Of Master Zone</td><td width=2%> : </td><td width=18%><input type="text" name="ip"></td></tr>
		<tr height=10%><th>
		<input type="submit" name="submit" value="Create Slave Zone"></th></tr>
		</table><br>
		</form>
		<?php
			if(isset($_POST['submit']))
			{
			if($_POST['domain']=="")
				echo "<b>DOMAIN NAME CAN NOT BE BLANK!!!!";
			if($_POST['ip']==""&&$_POST['domain']!="")
			echo "<b>IP ADDRESS CAN NOT BE BLANK!!!";
			}
			if(isset($_POST['submit'])&&$_POST['domain']!=""&&$_POST['ip']!="")
			{
				$a=$_POST['domain'];
				$x=$_POST['ip'];

				$y=`sudo find / -name $a.hosts`;
				$q=`sudo cat /etc/named.conf | grep -w /var/named/$a.hosts`;
				$r=`sudo cat /etc/named.conf | grep -w $a`;
				if (`$q >> /dev/null`||$y!=""||$r!="")
				{	 
					echo "<b>DOMAIN NAME ALREADY EXISTS!!!!";
				}
	else
	    {
				$v=explode(".",$x);
				if(($v[0]<1||$v[0]>255)||
				($v[1]<0||$v[1]>255)||
				($v[2]<0||$v[2]>255)||
				($v[3]<0||$v[3]>255))
			{
				echo "<b><i>SORRY !!!! IP ADDRESS \"$x\" NOT VALID!!!</i></b>";
			}
		else
	        {

				$a=$_POST['domain'];
				$x=$_POST['ip'];
				$b=`sudo touch slave.sh`;
				$b=`sudo chmod 777 slave.sh`;
				$b=`echo "echo '
zone \"$a\" {
	type slave;
	masters {
$x;
  };
	file \"/var/named/slaves/$a.hosts\";
	};' >> /etc/named.conf">slave.sh`;
				$b=`sudo bash slave.sh`;
				$b=`sudo rm -rf slave.sh`;
				echo "SLAVE ZONE<br><br><img src=slave.gif><br><br>&nbsp;&nbsp;<u><b><i>$a</i></u></b>&nbsp;&nbsp;CREATED";
					}
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
