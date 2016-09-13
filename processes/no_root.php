<html>
	<head>
		<title>Processes Not Running As Root</title>
	</head>
	<body>
		<a href=/index.php>Main index</a><br>
		<a href=process.php>Module index</a>
		<center><img src=p.gif><img src=r.gif><img src=os.gif><img src=cs.gif><img src=es.gif><img src=ss.gif><img src=ss.gif><img src=es.gif><img src=ss.gif><br>
		Process Configuration RHEL 6.0 <hr><center>		
		<h1><b><u>PROCESSES NOT RUNNING AS ROOT ON THE SYSTEM</u></b></h1>
		<table border=2><tr><th><img src=noroot.gif></th><tr></table><br><br>
		<form action="" method="post">
		<input type="submit" name="noroot" value="Show Processes">
		</form>
		<?php
		if(isset($_POST['noroot']))
			{
			 $a=`sudo ps -U root -u root -N`;
			 $b=explode("
",$a);
		?>
			<table width=20% border=1>
					<tr>
					<td width=10% bgcolor=#9999ff><b>Sno.  PID TTY TIME CMD</b></td>	
					</tr>
					</table>
			<?php
			for($i=1,$c=1;$i<200;$i++,$c++)
			{
				if($b[$i]!="")
				{
		?>
					<table width=20% border=0>
					<tr>
					<td width=2%><?php echo "$c." ?></td>
					<td width=17%><?php echo "$b[$i]" ?></td>
					</tr></table>
			<?php
					}
				}
			}
		?>
				<hr></center></center>
		<a href=/index.php><img src=left.gif align=middle>Return to Main index</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href=process.php>Return to process index</a>
	</body>
</html>
