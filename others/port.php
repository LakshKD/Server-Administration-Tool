<html>
	<head>
		<title>Port Status</title>
	</head>
	<body>
			<a href=/index.php>Main index</a>
		<center><img src=o.gif><img src=t.gif><img src=h.gif><img src=e.gif><img src=rc.gif><img src=s.gif><br>
		OTHERS services RHEL 6.0<hr>
			<h1><b><u>PORT STATUS</u></b></h1><br>
		<form action="" method="post">
			<input type="submit" name="sub" value="SHOW PORT STATUS"></center>				
		</form>
		<center>
		<?php
			if(isset($_POST['sub']))
			{
				$a=`sudo nmap localhost`;
				echo "<b><pre>$a</pre></b>";
			}
		?><br><hr></center>
		<a href=/index.php ><img src=left.gif align=middle>Return to Main index</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href=other.php >Return to Others index</a>
	</body>
</html>







