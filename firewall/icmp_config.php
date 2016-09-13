<html>
	<head>
		<title>ICMP Configuration</title>
	</head>
	<body>
		<a href=/index.php>Main index</a><br>
		<a href=firewall.php>Module index</a>
		<center><img src=lc.gif><img src=is.gif><img src=ns1.gif><img src=us.gif><img src=x.gif>&nbsp;&nbsp;&nbsp;<img src=f.gif><img src=is.gif><img src=r.gif><img src=es.gif><img src=ws.gif><img src=as.gif><img src=l.gif><img src=l.gif><br>
		Linux Firewall Configuration RHEL 6.0 <hr><center>		
		<h1><b><u>ICMP Configuration</u></b></h1>
		<table border=2><tr><th><img src=icmp.gif></th><tr></table><hr>
		<form action="" method="post">
		<table height=40% width=60% bgcolor=#cccccc>
		<tr height=5% bgcolor=#9999ff><td width=40%>&nbsp;&nbsp;&nbsp;&nbsp;configure icmp</td><td width=5%></td><td width=25%></td></tr>
		<tr><td width=30%>
		&nbsp;&nbsp;&nbsp;&nbsp;Enter Whether To Modify incoming or outgoing ports (INPUT or OUTPUT)</td><td width=5%> : </td><td width=25%><input type="text" name="input"></td></tr>
		<tr><td width=30%>
		&nbsp;&nbsp;&nbsp;&nbsp;Enter Whether To accept or reject incoming or outgoing ports (ACCEPT or REJECT)</td><td width=5%> : </td><td width=25%><input type="text" name="accept"></td></tr>
		<tr><td width=30%>
		&nbsp;&nbsp;&nbsp;&nbsp;Enter the IP or network address (in CIDR format)</td><td width=5%> : </td><td width=25%><input type="text" name="ip"></td></tr>
		<tr height=5%><th width=70%>
		<input type="submit" name="submit" value="Configure ICMP">
		</th></tr></table>
		</form>
		<?php
			if(isset($_POST['submit']))
			{
			if($_POST['input']=="")
				echo "<b><i>SORRY !!!! INCOMING/OUTGOING FIELD CAN NOT BE BLANK !!!!</i></b>";
			if($_POST['accept']==""&&$_POST['input']!="")
			echo "<b><i>SORRY !!!! ACCEPT/REJECT FIELD CAN NOT BE BLANK !!!!</i></b>";
			if($_POST['ip']==""&&$_POST['accept']!=""&&$_POST['input']!="")
			echo "<b><i>SORRY !!!! IP ADDRESS CAN NOT BE BLANK !!!!</i></b>";
			}
		if(isset($_POST['submit'])&&$_POST['ip']!=""&&$_POST['accept']!=""&&$_POST['input']!="")
	{
				$a=$_POST['input'];
				$b=$_POST['accept'];
				$e=$_POST['ip'];
				if($a=="INPUT"||$a=="OUTPUT")
	    {
				if($b=="ACCEPT"||$b=="REJECT")
		{
				$f=explode(".",$e);
				if(($f[0]>=0&&$f[0]<=255)&&
				   ($f[1]>=1&&$f[1]<=255)&&
				   ($f[2]>=1&&$f[2]<=255))
			{
				$g=explode("/",$f[3]);
				if($g[0]>=1&&$g[0]<=255)
			  {
				if($g[1]>=0&&$g[1]<=32)
			     {
				$d=`sudo iptables -A $a -s $e -p icmp --icmp-type echo-request -j $b`;
				echo "$d<br>";			
				echo "<b><i>FIREWALL CONFIGURED SUCCESFULLY</i></b>";
			     }
				else

				if($g[1]=="")
			     {
				$d=`sudo iptables -A $a -s $e -p icmp --icmp-type echo-request -j $b`;
				echo "$d<br>";			
				echo "<b><i>FIREWALL CONFIGURED SUCCESFULLY</i></b>";
			     }
				else 
				echo "<b><i>SORRY !!!! IP/NETWORK ADDRESS \"$e\" NOT VALID !!!!</i></b>";
			   }
				else 
				echo "<b><i>SORRY !!!! IP/NETWORK ADDRESS \"$e\" NOT VALID !!!!</i></b>";
		        }
				else
				echo "<b><i>SORRY !!!! IP/NETWORK ADDRESS \"$e\" NOT VALID !!!!</i></b>";
		    }
				else
				echo "<b><i>SORRY !!!! STRING FOR ACCEPTING OR REJECTING PORTS \"$b\" NOT VALID!!!!</i></b>";
		}
	    			else
				echo "<b><i>SORRY !!!! STRING FOR MODIFY PORTS \"$a\" NOT VALID!!!! </i></b>";
	    }
		?></center></center><hr><br>
		<form action="" method=post>
		<input type="submit" name="sub" value="Save Firewall configuration">
		</form>
		<?php
			if(isset($_POST['sub']))
			{
				$h=`sudo service iptables save`;
				echo "<center><pre>$h<pre>";
				echo "<b><h3><i><u>FIREWALL CONFIGURATION SAVED<br>THE CHANGES HAS BEEN APPLIED !!!!</u></i></h3></b></center>";
			}	
		?>
				<hr></center></center>
		<a href=/index.php><img src=left.gif align=middle>Return to Main index</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href=firewall.php>Return to firewall index</a>
	</body>
</html>
