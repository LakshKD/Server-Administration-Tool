<html>
	<head>
		<title>Connection Status</title>
	</head>
	<body>
			<a href=/index.php>Main index</a>
		<center><img src=o.gif><img src=t.gif><img src=h.gif><img src=e.gif><img src=rc.gif><img src=s.gif><br>
		OTHERS services RHEL 6.0 <hr><br>
			<h1><b><u>CONNECTION STATUS</u></b></h1>
		<form action="" method="post">
		<table height=30% width=40% bgcolor=#cccccc border=0>
		<tr height=3% width=40% bgcolor=#9999ff>
		<td>&nbsp;&nbsp;&nbsp;&nbsp;Connection Status</td>
		<td width=2% bgcolor=#9999ff></td><td width=18% bgcolor=#9999ff></td></tr>
		<tr height=15% border=1 bgcolor=#cccccc>
		<td width=20%>
		&nbsp;&nbsp;&nbsp;&nbsp;Enter IP</td><td width=2%> : </td><td width=18%><input type="text" name="ip"></td></tr>
		<tr height=12%><th>
			<input type="submit" name="sub" value="PING"></center></th></tr>
		</table>				
		</form>
		<center>
		<?php
			if(isset($_POST['sub']))
	{
				if($_POST['ip']=="")
				{
						echo "<b><i><u><h3>PLEASE ENTER IP !!!! </h3></u></i></b>";
				}
		else
		{
				$b=$_POST['ip'];
				$v=explode(".",$b);
				if(($v[0]<1||$v[0]>255)||
				($v[1]<0||$v[1]>255)||
				($v[2]<0||$v[2]>255)||
				($v[3]<0||$v[3]>255))
			{
				echo "<b><i>SORRY !!!! IP ADDRESS \"$b\" NOT VALID!!!</i></b>";
			}
		else
	        {
					$b=$_POST['ip'];
					$a=`sudo ping -c 4 $b`;
					echo "<b><pre>$a</pre></b>"; 
					if(!$a)
						echo "<pre><b><h2><i><u>NOT CONNECTED !!!!</u></i></h2></b></pre>";
					}	
				}
			}
		?><br><hr></center></center>
		<a href=/index.php ><img src=left.gif align=middle>Return to Main index</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href=other.php >Return to Others index</a>
	</body>
</html>







