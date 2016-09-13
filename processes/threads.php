<html>
	<head>
		<title>Information About Threads On The System</title>
	</head>
	<body>
		<a href=/index.php>Main index</a><br>
		<a href=process.php>Module index</a>
		<center><img src=p.gif><img src=r.gif><img src=os.gif><img src=cs.gif><img src=es.gif><img src=ss.gif><img src=ss.gif><img src=es.gif><img src=ss.gif><br>
		Process Configuration RHEL 6.0 <hr><center>		
		<h1><b><u>INFORMATION ABOUT THREADS ON THE SYSTEM</u></b></h1>
		<table border=2><tr><th><img src=thread.gif></th><tr></table><br><br>
		<form action="" method="post">
		<input type="submit" name="threads" value="Show Information">
		</form>
		<?php
		if(isset($_POST['threads']))
			{
			 $a=`sudo ps -eLF`;
			 $b=explode("
",$a);
		?>
			<table width=100% border=1>
					<tr>
					<td width=100% bgcolor=#9999ff><b>Sno. UID|PID|PPID|LWP|C|NLWP|SZ|RSS|PSR|STIME|TTY|TIME|CMD </b></td>	
					</tr>
					</table>
			<?php
			for($i=1,$c=1;$i<400;$i++,$c++)
			{
				if($b[$i]!="")
				{
		?>
					<table width=100% border=0>
					<tr>
					<td width=3%><?php echo "$c." ?></td>
					<td width=97%><?php echo "$b[$i]" ?></td>
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
