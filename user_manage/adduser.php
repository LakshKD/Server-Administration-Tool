<html>
	<head>
		<title>Add New User</title>
	</head>
	<body>
		<a href=/index.php>Main index</a>
		<center><img src=u.gif><img src=s.gif><img src=e.gif><img src=rc.gif>&nbsp;&nbsp;&nbsp;<img src=m.gif><img src=as.gif><img src=ns1.gif><img src=as.gif><img src=g.gif><img src=es.gif><img src=ms.gif><img src=es.gif><img src=ns1.gif><img src=ts.gif><br>
		USER Management RHEL 6.0<hr>
			<h1><b><u>ADD NEW USER</u></b></h1>
		<form action="" method="post">
		<table height=30% width=40% bgcolor=#cccccc border=0>
		<tr height=3% width=40% bgcolor=#9999ff>
		<td>&nbsp;&nbsp;&nbsp;&nbsp;Add a new user</td>
		<td width=2% bgcolor=#9999ff></td><td width=18% bgcolor=#9999ff></td></tr>
		<tr height=11% border=1 bgcolor=#cccccc>
		<td width=20%>
		&nbsp;&nbsp;&nbsp;&nbsp;Enter Username</td><td width=2%> : </td><td width=18%><input type="text" name="nam"></td></tr>
		<tr height=11% bgcolor=#cccccc>
		<td width=20%>
		&nbsp;&nbsp;&nbsp;&nbsp;Enter Password</td><td width=2%> : </td><td width=18%><input type="password" name="pass"></td></tr>
		<tr height=10%><th>
		<input type="submit" name="sub" value="CREATE USER"></th></tr>
		</table>				
		</form>
		<center>
		<?php
			if(isset($_POST['sub']))
			         {
					if($_POST['nam']==""||$_POST['pass']=="")
					echo "<b><i>PLEASE ENTER USERNAME/PASSWORD !!!!</i></b>";
				 }
			if(isset($_POST['sub'])&&$_POST['nam']!=""&&$_POST['pass']!="")
			{
				$a=$_POST['nam'];
				$pass=$_POST['pass'];
				$o=`sudo cat /etc/passwd`;
				$x=explode($a,$o);
				if($x[1]!="")
				   echo "<b>SORRY !!!! USER \"$a\" EXISTS !!!!</b>";
				else
				{
				  $b=`sudo useradd $a`;
				$b=`sudo touch useradd.sh`;
				$b=`echo "echo $pass | passwd --stdin $a">useradd.sh`;
				$b=`sudo bash useradd.sh`;
				$b=`sudo rm -rf useradd.sh`;
				echo "<b>USER&nbsp;&nbsp;<i><u>$a</u></i>&nbsp;&nbsp;ADDED</b>";  		                        }		
			}
		?></center></center>
		<br><hr>
		<a href=user.php ><img src=left.gif align=middle>Return to User Management index</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href=/index.php >Return to Main index</a>
	</body>
</html>
