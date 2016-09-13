<html>
	<head>
		<title>Create a New Virtual Server</title>
          
	</head>
	<body>
		<a href=/index.php>Main index</a><br>
		<center><img src=ac.gif><img src=p.gif><img src=ac.gif><img src=c.gif><img src=h.gif><img src=e.gif>&nbsp;&nbsp;&nbsp;<img src=w.gif><img src=es.gif><img src=bs.gif><img src=ss.gif><img src=es.gif><img src=r.gif><img src=v.gif><img src=es.gif><img src=r.gif><br>
		APACHE Webserver RHEL 6.0 <hr><center>		
		<h1><b><u>CREATE A NEW VIRTUAL SERVER</u></b></h1>
		<table border=2><tr><th><img src=apachecreate.gif></th><tr></table><hr>
		<form action="" method="post">
		<table height=50% width=40% bgcolor=#cccccc border=0>
		<tr height=3% width=40% bgcolor=#9999ff>
		<td>&nbsp;&nbsp;&nbsp;&nbsp;Create a New Virtual Server</td>
		<td width=2% bgcolor=#9999ff></td><td width=18% bgcolor=#9999ff></td></tr>
		<tr height=11% border=1 bgcolor=#cccccc>
		<td width=20%>
		&nbsp;&nbsp;&nbsp;&nbsp;Handle Connections To Address</td><td width=2%> : </td><td width=18%><input type="text" name="address"></td></tr>
		<tr height=11% bgcolor=#cccccc>
		<td width=20%>
		&nbsp;&nbsp;&nbsp;&nbsp;Document Root</td><td width=2%> : </td><td width=18%><input type="text" name="root"></td></tr>
		<tr height=11% bgcolor=#cccccc>
		<td width=20%>
		&nbsp;&nbsp;&nbsp;&nbsp;Server Name</td><td width=2%> :  </td><td width=18%><input type="text" name="server"></td></tr>
		<tr height=10%><th>
		<input type="submit" name="submit" value="Create Virtual Server"></th></tr>
		</table><br><br>
		</form>
		<?php
			if(isset($_POST['submit']))
			{
			if($_POST['address']=="")
				echo "<b>CAN NOT CREATE VIRTUAL SERVER !!!! <h3><i>&nbsp;&nbsp;NO ADDRESS ENTERED&nbsp;&nbsp;</h3></i> !!!! </b>";
			if($_POST['server']==""&&$_POST['address']!="")
			echo "<b>CAN NOT CREATE VIRTUAL SERVER !!!! <h3><i>&nbsp;&nbsp;NO SERVER NAME ENTERED&nbsp;&nbsp;</h3></i> !!!! </b>";
			
			if($_POST['root']==""&&$_POST['server']!=""&&$_POST['address']!="")
			echo "<b>VIRTUAL SERVER WITH DEFAULT DOCUMENT ROOT <h3><i>&nbsp;&nbsp;/var/www/html&nbsp;&nbsp;</i></h3>WILL BE CREATED !!!! </b>";
			}
		if(isset($_POST['submit'])&&$_POST['address']!=""&&$_POST['server']!="")
	{			
				$a=$_POST['address'];
				$v=explode(".",$a);
				if(($v[0]<1||$v[0]>255)||
				($v[1]<0||$v[1]>255)||
				($v[2]<0||$v[2]>255)||
				($v[3]<0||$v[3]>255))
			{
				echo "<b><i>SORRY !!!! IP ADDRESS \"$a\" NOT VALID!!!</i></b>";
			}	
		else
		{		

				$a=$_POST['address'];
				$b=$_POST['server'];
				$c=$_POST['root'];
				
				$e=`sudo find $c`;
				if($e=="")
				{
				   echo "<b><i>SORRY !!!! DOCUMENT ROOT YOU ENTERED DOES NOT EXIST !!!! ";
				}
		              else
	                        { 

				$j=`sudo cat /etc/httpd/conf/httpd.conf | grep $b `;
				if($j!="")
				{
					echo "<b><i>SORRY !!!! SERVER NAME &nbsp;&nbsp;<u>$b</u>&nbsp;&nbsp;ALREADY EXISTS !!!!";
				}			
		
		             else
	                       {

				$d=`sudo touch create.sh`;
				$d=`sudo chmod 777 create.sh`;
				$d=`echo "echo '<VirtualHost $a:80> ' >> /etc/httpd/conf/httpd.conf " > create.sh`;
				$d=`sudo bash create.sh`;
				$d=`sudo rm -rf create.sh`;
			
				if($e!=""&&$c!="")
				{
				$f=`sudo touch create.sh`;
				$f=`sudo chmod 777 create.sh`;
				$f=`echo "echo 'DocumentRoot \"$c\" ' >> /etc/httpd/conf/httpd.conf " > create.sh`;
				$f=`sudo bash create.sh`;
				$f=`sudo rm -rf create.sh`;
				}
				
				$g=`sudo touch create.sh`;
				$g=`sudo chmod 777 create.sh`;
				$g=`echo "echo 'ServerName $b ' >> /etc/httpd/conf/httpd.conf " > create.sh`;
				$g=`sudo bash create.sh`;
				$g=`sudo rm -rf create.sh`;	
				
				if($e!=""&&$c!="")
				{
				$h=`sudo touch create.sh`;
				$h=`sudo chmod 777 create.sh`;
				$h=`echo "echo '<Directory \"$c\">
                                                                 allow from all  
                   					         Options +Indexes
                                                                 </Directory> ' >> /etc/httpd/conf/httpd.conf " > create.sh`;
				$h=`bash create.sh`;
				$h=`rm -rf create.sh`;
				}
				
				$i=`sudo touch create.sh`;
				$i=`sudo chmod 777 create.sh`;
				$i=`echo "echo '</VirtualHost> ' >> /etc/httpd/conf/httpd.conf " > create.sh`;
				$i=`sudo bash create.sh`;
				$i=`sudo rm -rf create.sh`;
				
				echo "<b><i><font color=black>NEW VIRTUAL SERVER CREATED</font></i></b>";
						}

					}
				}
			}
		?></center></center><hr><br>
			<form action="" method=post>
		<input type="submit" name="sub" value="Start Apache Webserver">
		</form>
		<?php
			if(isset($_POST['sub']))
			{
				$c=`sudo service httpd start`;
				echo "<center><pre>$c<pre>";
				echo "<b><h3><i><u>APACHE STARTED<br>THE CHANGES HAS BEEN APPLIED !!!!</u></i></h3></b></center>";
			}	
		?><hr></center>
		<a href=apache.php ><img src=left.gif align=middle>Return to Apache index</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href=/index.php >Return to Main index</a>
	</body>
</html>
