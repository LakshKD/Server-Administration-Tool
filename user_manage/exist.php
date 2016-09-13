<html>
	<head>
		<title>Existing Users</title>
	</head>
	<body>
		<a href=/index.php>Main index</a>
		<center><img src=u.gif><img src=s.gif><img src=e.gif><img src=rc.gif>&nbsp;&nbsp;&nbsp;<img src=m.gif><img src=as.gif><img src=ns1.gif><img src=as.gif><img src=g.gif><img src=es.gif><img src=ms.gif><img src=es.gif><img src=ns1.gif><img src=ts.gif><br>
		USER Management RHEL 6.0<hr>
			<h1><b><u>EXISTING USERS</u></b></h1>
		<form action="" method="post">
			<input type="submit" name="sub" value="SHOW EXISTING USERS"></center>				
		</form>
		<center>
		<?php
			if(isset($_POST['sub']))
			         {
					$a=`sudo cat /etc/passwd`;
					$b=explode("
",$a);
		?>
					<table width=100% border=1>
					<tr>
					<td width=5% bgcolor=#9999ff><b>Sno.</b></td>	
					<td width=19% bgcolor=#9999ff><b>Username</b></td>		
					<td width=9% bgcolor=#9999ff><b>User ID</b></td>	
					<td width=19% bgcolor=#9999ff><b>Real name</b></td>
					<td width=24% bgcolor=#9999ff><b>Home directory</b></td>
					<td width=24% bgcolor=#9999ff><b>Shell</b></td>
					</tr>	

		<?php
					for($i=0,$d=1;$i<130;$i++,$d++)
				   {
					if($b[$i]!="")
				   {
					$c=explode(":",$b[$i]);
		?>
					<table width=100% border=0>
					<tr>
					<td width=5%><?php echo "$d" ?></td>
					<td width=19%><?php echo "$c[0]" ?></td>
					<td width=9%><?php echo "$c[2]" ?></td>
					<td width=19%><?php echo "$c[4]" ?></td>
					<td width=24%><?php echo "$c[5]" ?></td>
					<td width=24%><?php echo "$c[6]" ?></td>
					</tr>
					</table>
					
			<?php
					}
				    }
			
				  } 		                        
		?></center></center>
		<br><hr>
		<a href=user.php ><img src=left.gif align=middle>Return to User Management index</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href=/index.php >Return to Main index</a>
	</body>
</html>
