<html>
	<head>
		<title>Name Server Records</title>
	</head>
	<body>
		<a href=/index.php>Main index</a><br>
		<a href=dns.php>Module index</a>
		<center>
		<center><img src=b.gif><img src=i.gif><img src=n.gif><img src=d.gif>&nbsp;&nbsp;&nbsp;<img src=d.gif><img src=n.gif><img src=s.gif>&nbsp;&nbsp;&nbsp;<img src=s.gif><img src=es.gif><img src=r.gif><img src=v.gif><img src=es.gif><img src=r.gif><br>
		Berkeley Internet Name Domain RHEL 6.0<hr>
		<h1><b><u>EDIT MASTER ZONE</u></b></h1><hr>
		<table border=2><tr><th><img src=ns.gif></th><tr></table>
		<h1><b><u>NAME SERVER RECORDS</u></b></h1><hr>
		<form action="" method="post">
		<table height=40% width=60% bgcolor=#cccccc border=0>
		<tr height=3% width=60% bgcolor=#9999ff>
		<td>&nbsp;&nbsp;&nbsp;Name Server Records</td>
		<td width=2% bgcolor=#9999ff></td><td width=18% bgcolor=#9999ff></td></tr>
		<tr height=11% border=1 bgcolor=#cccccc>
		<td width=50%>
		&nbsp;&nbsp;&nbsp;Domain Name</td><td width=2%> : </td><td width=18%><input type="text" name="domain"></td></tr>
		<tr height=11% bgcolor=#cccccc>
		<td width=50%>
		&nbsp;&nbsp;&nbsp;Enter The Name Server For The Domain Name (Must end With dot(.))</td><td width=2%> : </td><td width=18%><input type="text" name="nameserver"></td></tr>
		<tr height=10%><th>
		<input type="submit" name="submit" value="Create Name Server"></th></tr>
		</table><br>
		</form>
		<?php
		if(isset($_POST['submit']))
			{
				if($_POST['domain']=="")
				echo "<b>DOMAIN NAME CAN NOT BE BLANK!!!";
			if($_POST['nameserver']==""&&$_POST['domain']!="")
				echo "<b>NAME SERVER RECORD CAN NOT BE BLANK!!!";
			}
		if(isset($_POST['submit'])&&$_POST['domain']!=""&&$_POST['nameserver']!="")
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
					    $f=$_POST['nameserver'];
					    $h=`sudo touch nameserver.sh`;
					    $h=`sudo chmod 777 nameserver.sh`;
					    $h=`echo "echo '$a.  IN  NS  $f' >> /var/named/chroot/var/named/$a.hosts" > nameserver.sh `;
					    $h=`sudo bash nameserver.sh`;
					    $h=`sudo rm -rf nameserver.sh`;	
					    echo "NAME SERVER RECORD<br><br>&nbsp;&nbsp;<u><b><i>$f</i></u></b>&nbsp;&nbsp;CREATED";
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
