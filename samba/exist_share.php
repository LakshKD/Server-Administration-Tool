<html>
	<head>
		<title>Existing File Share</title>
	</head>
	<body>
		<a href=/index.php>Main index</a>
		<center><img src=s.gif><img src=ac.gif><img src=m.gif><img src=b.gif><img src=ac.gif>&nbsp;&nbsp;&nbsp;<img src=w.gif><img src=is.gif><img src=ns1.gif><img src=ds.gif><img src=os.gif><img src=ws.gif><img src=ss.gif>&nbsp;&nbsp;&nbsp;<img src=f.gif><img src=is.gif><img src=l.gif><img src=es.gif>&nbsp;&nbsp;&nbsp;<img src=s.gif><img src=hs.gif><img src=as.gif><img src=r.gif><img src=is.gif><img src=ns1.gif><img src=g.gif><br>
		SAMBA RHEL 6.0<hr>	
			<h1><b><u>EXISTING FILE SHARE NAME</u></b></h1>
		<form action="" method="post">
			<input type="submit" name="sub" value="SHOW EXISTING SHARE NAME"></center>				
		</form>
		<center>
		<?php
			if(isset($_POST['sub']))
			         {
					$a=`sudo cat /etc/samba/smb.conf`;
					$b=explode("[",$a);
		?>
					<table width=100% border=1>
					<tr>
					<td width=10% bgcolor=#9999ff><b>Sno.</b></td>	
					<td width=90% bgcolor=#9999ff><b>Share name</b></td>		
					</tr>
		<?php			
					for($i=2,$d=1;$i<50;$i++,$d++)
				     {
					if($b[$i]!="")
				     {
					$c=explode("]",$b[$i]);
		?>
					<table width=100% border=0>
					<tr>
					<td width=10%><?php echo "$d" ?></td>
					<td width=90%><b><u><?php echo "$c[0]" ?></b></u></td>
					</tr>
					</table>
			<?php
				       }
				    }	
				 } 		                        
		?></center></center>
		<br><hr>
		<a href=samba.php ><img src=left.gif align=middle>Return to Samba list</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href=/index.php >Return to Main index</a>
	</body>
</html>
