<html>
	<head>
		<title>Address Records</title>
	</head>
	<body>
		<a href=/index.php>Main index</a><br>
		<a href=dns.php>Module index</a>
		<center>
		<center><img src=b.gif><img src=i.gif><img src=n.gif><img src=d.gif>&nbsp;&nbsp;&nbsp;<img src=d.gif><img src=n.gif><img src=s.gif>&nbsp;&nbsp;&nbsp;<img src=s.gif><img src=es.gif><img src=r.gif><img src=v.gif><img src=es.gif><img src=r.gif><br>
		Berkeley Internet Name Domain RHEL 6.0<hr>
		<h1><b><u>EDIT MASTER ZONE</u></b></h1><hr>
		<table border=2><tr><th><img src=a.gif></th><tr></table>
		<h1><b><u>ADDRESS RECORDS</u></b></h1><hr>
		<form action="" method="post">
		<table height=50% width=50% bgcolor=#cccccc border=0>
		<tr height=3% width=30% bgcolor=#9999ff>
		<td>&nbsp;&nbsp;&nbsp;Address Records</td>
		<td width=2% bgcolor=#9999ff></td><td width=18% bgcolor=#9999ff></td></tr>
		<tr height=11% border=1 bgcolor=#cccccc>
		<td width=30%>
		&nbsp;&nbsp;&nbsp;Domain name</td><td width=2%> : </td><td width=18%><input type="text" name="domain"></td></tr>
		<tr height=11% bgcolor=#cccccc>
		<td width=30%>
		&nbsp;&nbsp;&nbsp;Enter The Address Record For The Domain Name</td><td width=2%> : </td><td width=18%><input type="text" name="address"></td></tr>
		<tr height=11% bgcolor=#cccccc>
		<td width=30%>
		&nbsp;&nbsp;&nbsp;Enter The IP Address</td><td width=2%> :  </td><td width=18%><input type="text" name="ip"></td></tr>
		<tr height=10%><th>
		<input type="submit" name="submit" value="Create Address Record"></th></tr>
		</table><br>
		</form>
		<?php
		if(isset($_POST['submit']))
			{	
			if($_POST['domain']=="")
				echo "<b>DOMAIN NAME CAN NOT BE BLANK!!!";
			if($_POST['ip']==""&&$_POST['domain']!="")
			echo "<b>IP ADDRESS CAN NOT BE EMPTY!!!";
			}
		if(isset($_POST['submit'])&&$_POST['domain']!=""&&$_POST['ip']!="")
	                    {
				$a=$_POST['domain'];
				$f=$_POST['address'];
				$g=$_POST['ip'];
				$y=`sudo find / -name $a.hosts`;
				if($y=="")
				{
				echo "<b>MASTER ZONE NAME DOES NOT EXIST !!!";
				}
	                    else
		              {
				$g=$_POST['ip'];
				$v=explode(".",$g);
				if(($v[0]<1||$v[0]>255)||
				($v[1]<0||$v[1]>255)||
				($v[2]<0||$v[2]>255)||
				($v[3]<0||$v[3]>255))
			      {
				echo "<b><i>SORRY !!!! IP ADDRESS \"$g\" NOT VALID!!!</i></b>";
			      }
		           else
	                        {	
				if($f=="")
				{
				    $i=`sudo touch address.sh`;
				    $i=`sudo chmod 777 address.sh`;
				    $i=`echo "echo '$a.  IN  A  $g' >> /var/named/chroot/var/named/$a.hosts" > address.sh `;
					    $h=`sudo bash address.sh`;
					    $h=`sudo rm -rf address.sh`;	
					    echo "ADDRESS RECORD<br><br>&nbsp;&nbsp;<u><b><i>$a</i></u></b>&nbsp;&nbsp;CREATED";   
				}
			else
			{

			    	    $a=$_POST['domain'];  
				    $f=$_POST['address'];
				    $g=$_POST['ip'];
				    $h=`sudo touch address.sh`;
				    $h=`sudo chmod 777 address.sh`;
				    $h=`echo "echo '$f  IN  A  $g' >> /var/named/chroot/var/named/$a.hosts" > address.sh `;
					    $h=`sudo bash address.sh`;
					    $h=`sudo rm -rf address.sh`;	
					    echo "ADDRESS RECORD<br><br>&nbsp;&nbsp;<u><b><i>$f.$a</i></u></b>&nbsp;&nbsp;CREATED";
				}
			    }
			}
		}
		?></center></center><br><hr>
		<form action="" method=post>
		<input type="submit" name="sub" value="Restart Name Server">
		</form>
		<?php
			if(isset($_POST['sub']))
			{
				$c=`sudo service named restart`;
				echo "<center><pre>$c<pre>";
				echo "<b><h3><i><u>DNS SERVICE RESTARTED<br>THE CHANGES HAS BEEN APPLIED !!!!</u></i></h3></b></center>";
			}	
		?><hr></center></b>
		<a href=dns.php ><img src=left.gif align=middle>Return to zone list</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href=edit_master.php >Return to edit master zone index</a>
	</body>
</html>	
