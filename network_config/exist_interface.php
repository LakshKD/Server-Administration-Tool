<html>
	<head>
		<title>Existing Interfaces</title>
	</head>
	<body>
		<a href=/index.php>Main index</a><br>
		<a href=network.php>Module index</a>
		<center><img src=n.gif><img src=es.gif><img src=ts.gif><img src=ws.gif><img src=os.gif><img src=r.gif><img src=ks.gif>&nbsp;&nbsp;&nbsp;<img src=i.gif><img src=ns1.gif><img src=ts.gif><img src=es.gif><img src=r.gif><img src=fs.gif><img src=as.gif><img src=cs.gif><img src=es.gif><img src=ss.gif><br>
		Network Configuration RHEL 6.0<hr><center>		
			<h1><b><u>EXISTING NETWORK AND VIRTUAL INTERFACES </u></b></h1>
		<form action="" method="post">
			<input type="submit" name="sub" value="SHOW EXISTING INTERFACES"></center>				
		</form>
		<center>
		<?php
			if(isset($_POST['sub']))
			         {
				$a=`sudo ls /etc/sysconfig/network-scripts/`;
				$b=explode("ifcfg-",$a);
				$c=explode("ifcfg-",$b[0]);
		?>
					<table width=100% border=1>
					<tr>
					<td width=10% bgcolor=#9999ff><b>Sno.</b></td>	
					<td width=20% bgcolor=#9999ff><b>Tag</b></td>		
					<td width=70% bgcolor=#9999ff><b>interface</b></td>	
					</tr>
					</table>
		<?php
					
					for($i=2,$j=1,$d=1;$i<40;$i++,$j++,$d++)
				   {
					if($b[$j]!="")
					{
					$m=$i-1;
		?>
					<table border=0 width=100% bgcolor=grey>
					<tr>
					<td width=10%><?php echo "$d" ?></td>
					<td width=20%>
					<table border=2><tr><td><img src=interface.gif></td></table></td>
					<td width=70%><b><u>
					<?php echo "$b[$m]" ?></u></b></td> 
	 				</tr>
					</table>
			<?php  
					$j=$i;
					$k=$d+1;
					$l=explode("",$b[$j]);
					}
				    }
			?>
					<table border=0 width=100%>
					<tr>
					<td width=10%><?php echo "$k" ?></td>
					<td width=20%>
					<table border=2><tr><td><img src=interface.gif></td></table></td>
					<td width=70%><b><u>
					<?php echo "$l[0]" ?></u></b></td> 
					</tr>
					</table>
			<?php
				  } 		                        
	?></center></center>
		<br><hr>
		<a href=/index.php ><img src=left.gif align=middle>Return to Main index</a>&nbsp;&nbsp;|&nbsp;&nbsp;
		<a href=network.php >Return to network index</a>
	</body>
</html>
