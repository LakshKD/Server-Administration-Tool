<html>
	<head>
		<title>Existing Groups</title>
	</head>
	<body>
		<a href=/index.php>Main index</a>
		<center><img src=gc.gif><img src=rc.gif><img src=o.gif><img src=u.gif><img src=p.gif>&nbsp;&nbsp;&nbsp;<img src=m.gif><img src=as.gif><img src=ns1.gif><img src=as.gif><img src=g.gif><img src=es.gif><img src=ms.gif><img src=es.gif><img src=ns1.gif><img src=ts.gif><br>
		GROUP Management RHEL 6.0<hr>
			<h1><b><u>EXISTING GROUPS</u></b></h1>
		<form action="" method="post">
			<input type="submit" name="sub" value="SHOW EXISTING GROUPS"></center>				
		</form>
		<center>
		<?php
			if(isset($_POST['sub']))
			         {
					$a=`sudo cat /etc/group`;
					$b=explode("
",$a);
		?>
					<table width=100% border=1>
					<tr>
					<td width=5% bgcolor=#9999ff><b>Sno.</b></td>	
					<td width=25% bgcolor=#9999ff><b>Group name</b></td>		
					<td width=10% bgcolor=#9999ff><b>Group ID</b></td>	
					<td width=60% bgcolor=#9999ff><b>Members</b></td>
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
					<td width=25%><?php echo "$c[0]" ?></td>
					<td width=10%><?php echo "$c[2]" ?></td>
					<td width=60%><?php echo "$c[3]" ?></td>
					</tr>
					</table>
			<?php
				       }
				    }	
				 } 		                        
		?></center></center>
		<br><hr>
		<a href=group.php ><img src=left.gif align=middle>Return to Group Management index</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href=/index.php >Return to Main index</a>
	</body>
</html>
