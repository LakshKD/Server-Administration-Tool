<html>
	<head>
		<title>Delete existing User</title>
	</head>
	<body>
		<a href=/index.php>Main index</a>
		<center><img src=u.gif><img src=s.gif><img src=e.gif><img src=rc.gif>&nbsp;&nbsp;&nbsp;<img src=m.gif><img src=as.gif><img src=ns1.gif><img src=as.gif><img src=g.gif><img src=es.gif><img src=ms.gif><img src=es.gif><img src=ns1.gif><img src=ts.gif><br>
		USER Management RHEL 6.0<hr>
			<h1><b><u>DELETE EXISTING USER</u></b></h1>
		<form action="" method="post">
		<table height=30% width=40% bgcolor=#cccccc border=0>
		<tr height=3% width=40% bgcolor=#9999ff>
		<td>&nbsp;&nbsp;&nbsp;&nbsp;Delete Existing User</td>
		<td width=2% bgcolor=#9999ff></td><td width=18% bgcolor=#9999ff></td></tr>
		<tr height=15% border=1 bgcolor=#cccccc>
		<td width=20%>
		&nbsp;&nbsp;&nbsp;&nbsp;Enter Username to delete</td><td width=2%> : </td><td width=18%><input type="text" name="nam"></td></tr>
		<tr height=12%><th>
		<input type="submit" name="sub" value="DELETE USER"></th></tr>		
		</table>
		</form>
		<center>
		<?php
			if(isset($_POST['sub']))
			         {
					if($_POST['nam']=="")
					echo "<b><i>PLEASE ENTER USERNAME !!!!</i></b>";
				 }
			if(isset($_POST['sub'])&&$_POST['nam']!="")
			{
				$a=$_POST['nam']; //username
				$o=`sudo cat /etc/passwd `; //the string of the passwd file
				$b=explode($a,$o);
				if($b[1]=="")
				   {
					echo "<b><i>SORRY !!!! USER \"$a\" DOES NOT EXISTS !!!!</i></b>";
					}
				else
				{
				  $b=`sudo userdel -rf $a`;
				echo "<b>USER&nbsp;&nbsp;<i><u>$a</u></i>&nbsp;&nbsp; DELETED</b>";  		                        }		
			}
		?>
		</center></center>
		<br><hr>
		<a href=user.php ><img src=left.gif align=middle>Return to User Management index</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href=/index.php >Return to Main index</a>
	</body>
</html>
