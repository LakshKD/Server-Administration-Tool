<html>
	<head>
		<title>Delete Existing Groups</title>
	</head>
	<body>
		<a href=/index.php>Main index</a>
		<center><img src=gc.gif><img src=rc.gif><img src=o.gif><img src=u.gif><img src=p.gif>&nbsp;&nbsp;&nbsp;<img src=m.gif><img src=as.gif><img src=ns1.gif><img src=as.gif><img src=g.gif><img src=es.gif><img src=ms.gif><img src=es.gif><img src=ns1.gif><img src=ts.gif><br>
			GROUP Management RHEL 6.0 <hr>
			<h1><b><u>DELETE GROUPS</u></b></h1>
		<form action="" method="post">
		<table height=30% width=40% bgcolor=#cccccc border=0>
		<tr height=4% bgcolor=#9999ff><td>&nbsp;&nbsp;&nbsp;&nbsp;Delete Groups</td><td width=2%></td><td width=13%></td></tr>
		<tr height=3% width=40%>
		<td width=15%>&nbsp;&nbsp;&nbsp;&nbsp;Enter group to delete</td>
		<td width=2%> : </td><td width=13%><input type="text" name="nam"></td></tr>
		<tr height=5%><th><input type="submit" name="sub" value="DELETE GROUPS"></th></tr>
		</table>			
		</form>
		<center>
		<?php
			if(isset($_POST['sub']))
			{
				if($_POST['nam']=="")
					{
						echo "<b><i>PLEASE ENTER GROUP !!!!</i></b>";
					}
			  	else
					{
					$a=$_POST['nam'];
					$o=`sudo cat /etc/group`;
					$x=explode($a,$o);
					if($x[1]=="")
				        echo "<b><i>GROUP \"$a\" DOES NOT EXISTS !!!!</i></b>";
					else
						{
					$b=`sudo groupdel $a`;
					echo "<b>GROUP&nbsp;&nbsp;&nbsp;<u><i>$a</i></u>&nbsp;&nbsp;&nbsp;DELETED</b>";
						}
					}
			}
		?><br><hr></center></center>
		<a href=group.php ><img src=left.gif align=middle>Return to Group Management index</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href=/index.php >Return to Main index</a>
	</body>
</html>





