<html>
	<head>
		<title>Command Executer</title>
	</head>
	<body>
			<a href=/index.php>Main index</a>
		<center>
			<img src=c.gif><img src=o.gif><img src=m.gif><img src=m.gif><img src=ac.gif><img src=n.gif><img src=d.gif>&nbsp;&nbsp;&nbsp;<img src=e.gif><img src=x.gif><img src=es.gif><img src=cs.gif><img src=us.gif><img src=ts.gif><img src=es.gif><img src=r.gif><br>
		COMMAND EXECUTER RHEL 6.0<hr><br><br>
		<form action="" method="post">
		<table height=30% width=30% bgcolor=#cccccc>
		<tr height=5% bgcolor=#9999ff><td>
		&nbsp;&nbsp;&nbsp;&nbsp;Command Executer</td><td width=2%></td><td width=13%></td></tr>
		<tr height=10%><td width=15%>
			&nbsp;&nbsp;&nbsp;&nbsp;Enter Command</td><td width=2%> : </td><td width=13%><input type="text" name="command"></td></tr>
		<tr height=15%><th>
			<input type="submit" name="sub" value="EXECUTE COMMAND"></th></tr></table>
</center>				
		</form>
		<center>
		<?php
			if(isset($_POST['sub']))
			{
				if($_POST['command']=="")
				{
						echo "<b><h3><i> ENTER COMMAND TO EXECUTE !!!!</i></h3></b>";
				} 
				else
				{
				$a=$_POST['command'];
				$b=`sudo $a`;
				echo "<b><pre>$b</pre></b>";
				if(!$b)
					echo "<b><h3><i>COMMAND NOT FOUND !!!!</i></h3></b>";
				
				}
			}
		?></center><br><hr>
		<a href=/index.php ><img src=left.gif align=middle>Return to Main index</a>
	</body>
</html>







