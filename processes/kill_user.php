<html>
	<head>
		<title>Kill a User</title>
	</head>
	<body>
		<a href=/index.php>Main index</a><br>
		<a href=process.php>Module index</a>
		<center><img src=p.gif><img src=r.gif><img src=os.gif><img src=cs.gif><img src=es.gif><img src=ss.gif><img src=ss.gif><img src=es.gif><img src=ss.gif><br>
		Process Configuration RHEL 6.0 <hr><center>		
		<h1><b><u>KILL A LOGGED IN USER FROM THE SYSTEM</u></b></h1>
		<table border=2><tr><th><img src=killuser.gif></th><tr></table><br><br>
		<form action="" method="post">
		Click to see the users logged in :
		<input type="submit" name="user" value="Show Information">
		</form>
		<?php
		if(isset($_POST['user']))
			{
			 $a=`sudo who -u`;
			 $b=explode("
",$a);
		?>
			<table width=100% border=1>
					<tr>
					<td width=100% bgcolor=#9999ff><b>Sno. USER|TTY|DATE|TIME&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|PID</b></td>	
					</tr>
					</table>
			<?php
			for($i=1,$c=1;$i<200;$i++,$c++)
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
			?>
			<?php
			}
		?>
					<hr><form action="" method="post">
					<i><b><u><h3>DO YOU WANT TO KILL ANY USER ?? IF YES : </h3></u></b></i>
					<b>Enter users PID : </b><input type=text name=kill><br><br> 
					<input type="submit" name="killuser" value="Kill User">
			<?php
				if(isset($_POST['killuser']))
				{
					if($_POST['kill']=="")
					echo "<><br><i><b>SORRY !!!! PROCESS ID FIELD CAN NOT BE BLANK !!!!</b></i>";
				}
				if(isset($_POST['killuser'])&&$_POST['kill']!="")
				{
					$d=$_POST['kill'];
					$e=`sudo who -u | grep $d`;
					if($e=="")
					echo "<br><br><b><i>SORRY !!!! PROCESS ID IS NOT VALID !!!!</i></b>";
					else
					{
						$f=`sudo kill -9 $d`;
						echo "<br><br><b><i>USER HAVING PROCESS ID \"$d\" KILLED !!!!</i></b>";
					}
				}
			?>
					
				</form>
		
				<hr></center></center>
		<a href=/index.php><img src=left.gif align=middle>Return to Main index</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href=process.php>Return to process index</a>
	</body>
</html>
