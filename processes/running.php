<html>
	<head>
		<title>Running Processes</title>
	</head>
	<body>
		<a href=/index.php>Main index</a><br>
		<a href=process.php>Module index</a>
		<center><img src=p.gif><img src=r.gif><img src=os.gif><img src=cs.gif><img src=es.gif><img src=ss.gif><img src=ss.gif><img src=es.gif><img src=ss.gif><br>
		Process Configuration RHEL 6.0 <hr><center>		
		<h1><b><u>RUNNING PROCESSES ON THE SYSTEM</u></b></h1>
		<table border=2><tr><th><img src=running.gif></th><tr></table><br><br>
		<form action="" method="post">
		<input type="submit" name="running" value="Show Running Processes">
		</form>
		<?php
		if(isset($_POST['running']))
			{
			 $a=`sudo ps aux`;
			 $b=explode("
",$a);
		?>
			</center></center><table width=100% border=1>
					<tr>
					<td width=100% bgcolor=#9999ff><b>Sno. User|PID|%CPU|%MEM|VSZ|TTY|STAT|START|TIME|COMMMAND</b></td>	
					</tr>
					</table>
			<?php
			for($i=1,$c=1;$i<300;$i++,$c++)
			{
				if($b[$i]!="")
				{
		?>
					<table width=100% border=0>
					<tr>
					<td width=2.6%><?php echo "$c." ?></td>
					<td width=95%><?php echo "$b[$i]" ?></td>
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
