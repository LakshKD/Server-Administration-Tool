<html>
	<head>
		<title>Schedule a task</title>
	</head>
	<body>
		<a href=/index.php>Main index</a>
		<center>&nbsp;&nbsp;&nbsp;&nbsp<img src=c.gif><img src=r.gif><img src=os.gif><img src=ns1.gif>&nbsp;&nbsp;&nbsp;<img src=p.gif><img src=r.gif><img src=os.gif><img src=cs.gif><img src=es.gif><img src=ss.gif><img src=ss.gif><br>
		CRON JOB RHEL 6.0<hr>
			<h1><b><u>SCHEDULE A NEW PROCESS</u></b></h1>
		<form action="" method="post">
		<table height=40% width=50% bgcolor=#cccccc border=0>
		<tr height=3% width=40% bgcolor=#9999ff>
		<td>&nbsp;&nbsp;Schedule a new Process</td>
		<td width=2% bgcolor=#9999ff></td><td width=18% bgcolor=#9999ff></td></tr>
		<tr height=11% border=1 bgcolor=#cccccc>
		<td width=20%>
		 &nbsp;&nbsp;Enter the task and where you want to perform it</td><td width=2%>  &nbsp; :  </td> <td width=3%>&nbsp;<input type="text" name="path"></td></tr>
		<tr height=11% bgcolor=#cccccc>
		<td width=20%>
		  &nbsp; Enter the command for the task in the given format</td><td width=2%>     &nbsp;  :  </td> <td width=3%>&nbsp;<input type="text" name="cmd"></td></tr>
		<tr height=10%><th>
		<input type="submit" name="sub" value="SCHEDULE"></th></tr>
		</table>				
		</form>
		<center>
		<?php
			if(isset($_POST['sub']))
			         {
					if($_POST['path']==""||$_POST['cmd']=="")
					echo "<b><i>PLEASE ENTER THE TASK AND THE COMMAND !!!!</i></b>";
				 }
			if(isset($_POST['sub'])&&$_POST['path']!=""&&$_POST['cmd']!="")
			{
				$path=$_POST['path'];
				$cmd=$_POST['cmd'];
                                $l=`sudo touch a.sh`;
				$l=`sudo chmod 777 a.sh`;
				$l=`echo "echo $cmd $path >> /var/spool/cron/root"> a.sh`;
				$l=`sudo bash a.sh`;
				$l=`sudo rm -rf a.sh`;
                                echo "<b>TASK&nbsp;<i><u>$a</u></i>&nbsp;&nbsp;SCHEDULED</b>";                 		
		         }
		?></center></center><hr><br>
		<form action="" method=post>
		<input type="submit" name="sub1" value="Crond Service Restart">
		</form>
		<?php
			if(isset($_POST['sub1']))
			{
				$c=`sudo service crond restart`;
				echo "<center><pre>$c<pre>";
				echo "<b><h3><i><u>CROND SERVICE RESTARTED<br>THE CHANGES HAS BEEN APPLIED !!!!</u></i></h3></b></center>";
			}	
		?><hr></center>
		<a href=schedule.php ><img src=left.gif align=middle>Return to Cron index</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href=/index.php >Return to Main index</a>
	</body>
</html>
