<html>
	<head>
		<title>Working with DNS</title>
	</head>
	<body>
		<a href=/index.php>Main index</a><br>
		<center><img src=d.gif><img src=is.gif><img src=ss.gif><img src=ks.gif>&nbsp;&nbsp;&nbsp;<img src=m.gif><img src=as.gif><img src=ns1.gif><img src=as.gif><img src=g.gif><img src=es.gif><img src=ms.gif><img src=es.gif><img src=ns1.gif><img src=ts.gif><br>
		Disk Management RHEL 6.0 <hr><center>		
		<h1><b><u>DISK MANAGEMENT</u></b></h1>
		<table border=2><tr><th><img src=diskmanage.gif></th><tr></table><br><br>
		<form action="" method="post">
		<input type="submit" name="view" value="View Partition Table">&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" name="free" value="Free Disk Space">&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" name="ram" value="Status of RAM">&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" name="mount" value="Mounting Information">
		</form>
		<?php
		if(isset($_POST['view']))
			{
			 $a=`sudo fdisk -l`;
			 echo "<pre><b>$a</b></pre>";
			}
			if(isset($_POST['free']))
			{
			 $b=`sudo df -h`;
			 echo "<pre><b>$b</pre></b>";
			}
			if(isset($_POST['ram']))
			{
			 $c=`sudo free`;
			 echo "<pre><b>$c</b></pre>";
			}
			if(isset($_POST['mount']))
			{
			 $d=`sudo mount`;
			 echo "<pre><b>$d</b></pre>";
			}
			
		?></center></center><hr><br>
		<a href=/index.php><img src=left.gif align=middle>Return to Main index</a>
	</body>
</html>
