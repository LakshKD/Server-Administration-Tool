<html>
	<head>
		<title>Existing Zones</title>
	</head>
	<body>
		<a href=/index.php>Main index</a><br>
		<a href=dns.php>Module index</a>
		<center><img src=b.gif><img src=i.gif><img src=n.gif><img src=d.gif>&nbsp;&nbsp;&nbsp;<img src=d.gif><img src=n.gif><img src=s.gif>&nbsp;&nbsp;&nbsp;<img src=s.gif><img src=es.gif><img src=r.gif><img src=v.gif><img src=es.gif><img src=r.gif><br>
		Berkeley Internet Name Domain RHEL 6.0<hr><center>		
			<h1><b><u>EXISTING ZONES</u></b></h1>
		<form action="" method="post">
			<input type="submit" name="sub" value="SHOW EXISTING ZONES"></center>				
		</form>
		<center>
		<?php
			if(isset($_POST['sub']))
			         {
					$a=`sudo cat /etc/named.conf`;
					$b=explode("zone \"",$a);
		?>
					<table width=100% border=1>
					<tr>
					<td width=10% bgcolor=#9999ff><b>Sno.</b></td>	
					<td width=20% bgcolor=#9999ff><b>Tag</b></td>		
					<td width=70% bgcolor=#9999ff><b>Zone name</b></td>	
					</tr>
		<?php
					for($i=1,$d=1;$i<50;$i++,$d++)
				   {
					if($b[$i]!="")
				   {
					$c=explode("\"",$b[$i]);
		?>
					<table border=0 width=100%>
					<tr>
					<td width=10%><?php echo "$d" ?></td>
					<td width=20%>
					<table border=2><tr><td><img src=bind.gif></td></table>
					<td width=70%><b><u>
					<?php echo "$c[0]" ?></u></b></td> 
					</tr>
					</table>
			<?php
					}
				    }
				  } 		                        
		?></center></center>
		<br><hr>
		<a href=dns.php ><img src=left.gif align=middle>Return to zone list</a>
	</body>
</html>
