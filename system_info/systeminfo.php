<html>
	<head>
		<title>System Information</title>
	</head>
	<body>
			<a href=/index.php>Main index</a>
		<center><img src=s.gif><img src=es.gif><img src=r.gif><img src=v.gif><img src=es.gif><img src=r.gif>&nbsp;&nbsp;&nbsp;<img src=i.gif><img src=ns1.gif><img src=fs.gif><img src=os.gif><img src=r.gif><img src=ms.gif><img src=as.gif><img src=ts.gif><img src=is.gif><img src=os.gif><img src=ns1.gif><br>
		SERVER INFORMATION RHEL 6.0 <hr>
			<h1><b><u>SERVER INFORMATION</u></b></h1>
		<form name="myform" action="" method="post">
			<input type="submit" name="start" value="Running Kernel Version">&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" name="stop" value="Operating System Information">&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" name="status" value="See GRUB Entry">&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" name="restart" value="See FSTAB Entry">
		</form>
		<?php
			if(isset($_POST['start']))
			{
			 $a=`sudo uname -r`;
			 echo "<pre><b>$a</b></pre>";
			}
			if(isset($_POST['stop']))
			{
			 $b=`sudo uname -a`;
			 echo "<pre><b>$b</b></pre>";
			}
			if(isset($_POST['status']))
			{
			 $c=`sudo cat /etc/grub.conf`;
			 echo "<pre><b>$c</b></pre>";
			}
			if(isset($_POST['restart']))
			{
			 $d=`sudo cat /etc/fstab`;
			 echo "<pre><b>$d</b></pre>";
			}
		?></center>
		<br><hr></center>
		<a href=/index.php ><img src=left.gif align=middle>Return to Main index</a>
	</body>
</html>
