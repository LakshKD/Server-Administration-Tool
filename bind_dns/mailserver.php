<html>
	<head>
		<title>Mail Server Records</title>
	</head>
	<body>
		<a href=/index.php>Main index</a><br>
		<a href=dns.php>Module index</a>
		<center>
		<center><img src=b.gif><img src=i.gif><img src=n.gif><img src=d.gif>&nbsp;&nbsp;&nbsp;<img src=d.gif><img src=n.gif><img src=s.gif>&nbsp;&nbsp;&nbsp;<img src=s.gif><img src=es.gif><img src=r.gif><img src=v.gif><img src=es.gif><img src=r.gif><br>
		Berkeley Internet Name Domain RHEL 6.0<hr>
		<h1><b><u>EDIT MASTER ZONE</u></b></h1><hr>
		<table border=2><tr><th><img src=mx.gif></th><tr></table>
		<h1><b><u>MAIL SERVER RECORDS</u></b></h1><hr>
		<form action="" method="post">
		<table height=50% width=60% bgcolor=#cccccc border=0>
		<tr height=3% width=50% bgcolor=#9999ff>
		<td>&nbsp;&nbsp;&nbsp;Mail Server Records</td>
		<td width=2% bgcolor=#9999ff></td><td width=18% bgcolor=#9999ff></td></tr>
		<tr height=11% border=1 bgcolor=#cccccc>
		<td width=50%>
		&nbsp;&nbsp;&nbsp;Domain name</td><td width=2%> : </td><td width=18%><input type="text" name="domain"></td></tr>
		<tr height=11% bgcolor=#cccccc>
		<td width=50%>
		&nbsp;&nbsp;&nbsp;Enter The Mail Server For The Domain Name (Must end With dot(.))</td><td width=2%> : </td><td width=18%><input type="text" name="mailserver"></td></tr>
		<tr height=11% bgcolor=#cccccc>
		<td width=50%>
		&nbsp;&nbsp;&nbsp;Enter Priority [recommended 7-12]</td><td width=2%> :  </td><td width=18%><input type="text" name="prio"></td></tr>
		<tr height=10%><th>
		<input type="submit" name="submit" value="Create Mail Server"></th></tr>
		</table><br>
		</form>
		<?php
		if(isset($_POST['submit']))
			{
				if($_POST['domain']=="")
				echo "<b>DOMAIN NAME CAN NOT BE BLANK!!!";
			if($_POST['mailserver']==""&&$_POST['domain']!="")
				echo "<b>MAIL SERVER RECORD CAN NOT BE BLANK!!!";
			if($_POST['prio']==""&&$_POST['mailserver']!=""&&$_POST['domain']!="")
				echo "<b>PRIORITY MUST BE ASSIGNED !!!";
			}
		if(isset($_POST['submit'])&&$_POST['domain']!=""&&$_POST['mailserver']!=""&&$_POST['prio']!="")
			{
				$a=$_POST['domain'];
				$y=`sudo find / -name $a.hosts`;
				if($y=="")
				{
				echo "<b>MASTER ZONE NAME DOES NOT EXIST !!!";
				}
				else
				{
				       	$a=$_POST['domain'];  
					    $f=$_POST['mailserver'];
					    $g=$_POST['prio'];
					    $h=`sudo touch mailserver.sh`;
					    $h=`sudo chmod 777 mailserver.sh`;
					    $h=`echo "echo '$a.  IN  MX  $g   $f' >> /var/named/chroot/var/named/$a.hosts" > mailserver.sh `;
					    $h=`sudo bash mailserver.sh`;
					    $h=`sudo rm -rf mailserver.sh`;	
					    echo "MAIL SERVER RECORD<br><br>&nbsp;&nbsp;<u><b><i>$f</i></u></b>&nbsp;&nbsp;CREATED";
				}
			}
		?></center></center><br><hr>
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
		?><hr></center></b>
		<a href=dns.php ><img src=left.gif align=middle>Return to zone list</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href=edit_master.php >Return to edit master zone index</a>
	</body>
</html>	
