<html>
	<head>
		<title>Convert a Linux User to Samba User</title>
	</head>
	<body>
		<a href=/index.php>Main index</a><br>
		<a href=samba.php>Module index</a>
		<center><img src=s.gif><img src=ac.gif><img src=m.gif><img src=b.gif><img src=ac.gif>&nbsp;&nbsp;&nbsp;<img src=w.gif><img src=is.gif><img src=ns1.gif><img src=ds.gif><img src=os.gif><img src=ws.gif><img src=ss.gif>&nbsp;&nbsp;&nbsp;<img src=f.gif><img src=is.gif><img src=l.gif><img src=es.gif>&nbsp;&nbsp;&nbsp;<img src=s.gif><img src=hs.gif><img src=as.gif><img src=r.gif><img src=is.gif><img src=ns1.gif><img src=g.gif><br>
		SAMBA RHEL 6.0<hr>	
		<h1><b><u>CONVERT A LINUX USER TO SAMBA USER</u></b></h1>
		<table border=2><tr><th><img src=convert.gif></th><tr></table><hr><br>
		<form action="" method="post">
		<table height=30% width=50% bgcolor=#cccccc border=0>
		<tr height=3% width=50% bgcolor=#9999ff>
		<td>&nbsp;&nbsp;&nbsp;&nbsp;Connvert a Linux User to Samba User</td>
		<td width=2% bgcolor=#9999ff></td><td width=18% bgcolor=#9999ff></td></tr>
		<tr height=11% border=1 bgcolor=#cccccc>
		<td width=38%>
		&nbsp;&nbsp;&nbsp;&nbsp;Enter The Linux Username You Want to Convert to Samba User</td><td width=2%> : </td><td width=18%><input type="text" name="user"></td></tr>
		<tr height=10%><th>
		<input type="submit" name="submit" value="Change User"></th></tr>
		</table>
		</form>
		<?php
			if(isset($_POST['submit']))
			{
			if($_POST['user']=="")
				echo "<b><i>PLEASE !!! ENTER USERNAME !!!!</b>";
			}
		if(isset($_POST['submit'])&&$_POST['user']!="")
			{
				$a=$_POST['user'];
				$o=`sudo cat /etc/passwd `;
				$c=explode($a,$o); /*$c[1] is empty if user does not exist*/
				if($c[1]=="")
				   {
					echo "<h3><b><i>SORRY !!!!USER DOES NOT EXISTS !!!!</i></b></h3>";
				   }
				else
                                   {
				$b=`sudo smbpasswd -a $a`;
				/*echo "$b";*/
				echo "<b><u><h3>USER&nbsp;&nbsp;<i>$a</i>&nbsp;&nbsp;CONVERTED ";
				   }
			}
			
		?></center></center><hr><br>
		<form action="" method=post>
		<input type="submit" name="sub" value="Samba Service Restart">
		</form>
		<?php
			if(isset($_POST['sub']))
			{
				$c=`sudo service smb restart`;
				echo "<center><pre>$c<pre>";
				echo "<b><h3><i><u>SAMBA SERVICE RESTARTED<br>THE CHANGES HAS BEEN APPLIED !!!!</u></i></h3></b></center>";
			}	
		?><hr></center>
		<a href=samba.php ><img src=left.gif align=middle>Return to samba list</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href=/index.php>Return to Main index</a>
	</body>
</html>
