<html>
	<head>
		<title>Change Password of a Samba User</title>
	</head>
	<body>
		<a href=/index.php>Main index</a><br>
		<a href=samba.php>Module index</a>
		<center><img src=s.gif><img src=ac.gif><img src=m.gif><img src=b.gif><img src=ac.gif>&nbsp;&nbsp;&nbsp;<img src=w.gif><img src=is.gif><img src=ns1.gif><img src=ds.gif><img src=os.gif><img src=ws.gif><img src=ss.gif>&nbsp;&nbsp;&nbsp;<img src=f.gif><img src=is.gif><img src=l.gif><img src=es.gif>&nbsp;&nbsp;&nbsp;<img src=s.gif><img src=hs.gif><img src=as.gif><img src=r.gif><img src=is.gif><img src=ns1.gif><img src=g.gif><br>
		SAMBA RHEL 6.0<hr>	
		<h1><b><u>CHANGE PASSWORD OF A SAMBA USER</u></b></h1>
		<table border=2><tr><th><img src=smbpass.gif></th><tr></table><hr><br>
		<form action="" method="post">
		<table height=50% width=50% bgcolor=#cccccc border=0>
		<tr height=3% width=50% bgcolor=#9999ff>
		<td>&nbsp;&nbsp;&nbsp;&nbsp;Change Password of a Samba User</td>
		<td width=2% bgcolor=#9999ff></td><td width=18% bgcolor=#9999ff></td></tr>
		<tr height=11% border=1 bgcolor=#cccccc>
		<td width=30%>
		&nbsp;&nbsp;&nbsp;&nbsp;Enter The Username You Want to Change Password</td><td width=2%> : </td><td width=18%><input type="text" name="user"></td></tr>
		<tr height=11% bgcolor=#cccccc>
		<td width=30%>
		&nbsp;&nbsp;&nbsp;&nbsp;Enter New Password</td><td width=2%> : </td><td width=18%><input type="password" name="pwd"></td></tr>
		<tr height=11% bgcolor=#cccccc>
		<td width=30%>
		&nbsp;&nbsp;&nbsp;&nbsp;Confirm Password</td><td width=2%> :  </td><td width=18%><input type="password" name="pass"></td></tr>
		<tr height=10%><th>
		<input type="submit" name="submit" value="Change Password"></th></tr>
		</table>
		</form>
		<?php
			if(isset($_POST['submit']))
			{
			if($_POST['user']=="")
				echo "<b><i>PLEASE !!! ENTER USERNAME !!!!</b>";
			if($_POST['user']!=""&&$_POST['pwd']=="")
					echo "<b><i>PLEASE !!!!  ENTER PASSWORD !!!!</i></b>";
					if($_POST['user']!=""&&$_POST['pwd']!=""&&$_POST['pass']=="")
					echo "<b><i>PLEASE !!!! CONFIRM PASSWORD !!!!</i></b>";
			}
		if(isset($_POST['submit'])&&$_POST['user']!=""&&$_POST['pwd']!=""&&$_POST['pass'])
				{
				$a=$_POST['user'];
				$pwd=$_POST['pwd'];
				$pass=$_POST['pass'];
				$p=`sudo cat /etc/passwd`;
				$r=explode($a,$p);/* checking that user exists or not*/
				if($r[1]=="")
				   {
					echo "<h3><b><i>SORRY !!!! USER DOES NOT EXISTS !!!!</i></b></h3>";
				   }
				else
                               {
				$o=`sudo cat /etc/samba/smbpasswd`;
				$b=explode($a,$o);
				if($b[1]=="")
				   {
					echo "<h3><b><i>SORRY !!!! <u>SAMBA</u> USER DOES NOT EXISTS !!!! ( NORMAL USER )</i></b></h3>";
				   }
				else
                                      {
					if($pwd!=$pass)
						{
							echo "<b><i>PASSWORD DO NOT MATCH !!!!</i></b>";
						}
					else
						{
					$c=`sudo touch passwd.sh`;
					$c=`echo "echo $pwd | smbpasswd --stdin $a " > passwd.sh`;
					$c=`sudo bash passwd.sh`;
					$c=`sudo rm -rf passwd.sh`;
					echo "<b><h3> PASSWORD OF USER&nbsp;&nbsp;<i>$a</i>&nbsp;&nbsp;CHANGED ";
					}
			 	}
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
