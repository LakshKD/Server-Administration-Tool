<html>
	<head>
		<title>Security Information About The System</title>
	</head>
	<body>
		<a href=/index.php>Main index</a><br>
		<a href=process.php>Module index</a>
		<center><img src=p.gif><img src=r.gif><img src=os.gif><img src=cs.gif><img src=es.gif><img src=ss.gif><img src=ss.gif><img src=es.gif><img src=ss.gif><br>
		Process Configuration RHEL 6.0 <hr><center>		
		<h1><b><u>SECURITY INFORMATION ABOUT THE SYSTEM</u></b></h1>
		<table border=2><tr><th><img src=security.gif></th><tr></table><br><br>
		<form action="" method="post">
		<input type="submit" name="security" value="Show Information">
		</form>
		<?php
		if(isset($_POST['security']))
			{
			 $a=`sudo ps -eM`;
			 $b=explode("
",$a);
		?>
			<table width=30% border=1>
					<tr>
					<td width=30% bgcolor=#9999ff><b>Sno.  LABEL PID TTY TIME CMD</b></td>	
					</tr>
					</table>
			<?php
			for($i=1,$c=1;$i<200;$i++,$c++)
			{
				if($b[$i]!="")
				{
		?>
					<table width=30% border=0>
					<tr>
					<td width=2%><?php echo "$c." ?></td>
					<td width=27%><?php echo "$b[$i]" ?></td>
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
