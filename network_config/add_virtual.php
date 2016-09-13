<html>
	<head>
		<title>Add Virtual Interface</title>
	</head>
	<body>
		<a href=/index.php>Main index</a><br>
		<a href=network.php>Module index</a>
		<center><img src=n.gif><img src=es.gif><img src=ts.gif><img src=ws.gif><img src=os.gif><img src=r.gif><img src=ks.gif>&nbsp;&nbsp;&nbsp;<img src=i.gif><img src=ns1.gif><img src=ts.gif><img src=es.gif><img src=r.gif><img src=fs.gif><img src=as.gif><img src=cs.gif><img src=es.gif><img src=ss.gif><br>
		Network Configuration RHEL 6.0 <hr><center>		
		<h1><b><u>ADD VIRTUAL INTERFACE</u></b></h1>
		<table border=2><tr><th><img src=virtual.gif></th><tr></table><hr>
		<form action="" method="post">
		<table height=50% width=50% bgcolor=#cccccc>
		<tr height=5%>
		<th width=50% bgcolor=#9999ff>&nbsp;&nbsp;&nbsp;&nbsp;Add virtual interface</th></tr>
		<tr height=9%><td width=10%>
		&nbsp;&nbsp;&nbsp;&nbsp;Network interface Name( With Virtual interface no.)</td><td width=2%>:</td><td width=15%><input type="text" name="name"></td><td>:</td><td width=23%><input type="text" name="virtual"></td></tr>
		<tr height=8%><td width=24%>
		&nbsp;&nbsp;&nbsp;&nbsp;IP Address</td><td width=2%> :  </td><td width=24%><input type="text" name="ip"></td></tr>
		<tr height=8%><td width=24%>
		&nbsp;&nbsp;&nbsp;&nbsp;Network Address</td><td> :  </td><td width=24%><input type="text" name="network"></td></tr>
		<tr height=8%><td width=24%>
		&nbsp;&nbsp;&nbsp;&nbsp;Netmask</td><td> :  </td><td width=24%><input type="text" name="netmask"></td></tr>
		<tr height=8%><td width=24%>
		&nbsp;&nbsp;&nbsp;&nbsp;Broadcast Address</td><td> :  </td><td width=24%><input type="text" name="broadcast"></td></tr>
		<tr height=5%><th width=50%>
		<input type="submit" name="submit" value="ADD VIRTUAL INTERFACE"></th></tr>
		</table>
		</form>
		<?php
			if(isset($_POST['submit']))
			{
			if($_POST['name']=="")
				echo "<b><i>SORRY !!!! INTERFACE NAME CAN NOT BE BLANK!!!!</i></b>";
			if($_POST['virtual']==""&&$_POST['name']!="")
				echo "<b><i>SORRY !!!! VIRTUAL INTERFACE NAME CAN NOT BE BLANK!!!!</i></b>";
			if($_POST['ip']==""&&$_POST['name']!=""&&$_POST['virtual']!="")
			echo "<b><i>SORRY !!!! IP ADDRESS FIELD CAN NOT BE EMPTY!!!</i></b>";
			if($_POST['network']==""&&$_POST['ip']!=""&&$_POST['name']!=""&&$_POST['virtual']!="")
			echo "<b><i>SORRY !!!! NETWORK ADDRESS FIELD CAN NOT BE EMPTY!!!</i></b>";	
			if($_POST['netmask']==""&&$_POST['network']!=""&&$_POST['ip']!=""&&$_POST['name']!=""&&$_POST['virtual']!="")
			echo "<b><i>SORRY !!!! NETMASK CAN NOT BE EMPTY!!!</i></b>";
			if($_POST['broadcast']==""&&$_POST['netmask']!=""&&$_POST['network']!=""&&$_POST['ip']!=""&&$_POST['name']!=""&&$_POST['virtual']!="")
			echo "<b><i>SORRY !!!! BROADCAST ADDRESS FIELD CAN NOT BE EMPTY!!!</i></b>";
			}

		if(isset($_POST['submit'])&&$_POST['broadcast']!=""&&$_POST['netmask']!=""&&$_POST['network']!=""&&$_POST['ip']!=""&&$_POST['name']!=""&&$_POST['virtual']!="")
{
				$a=$_POST['name'];
				$vir=$_POST['virtual'];
				$b=$_POST['ip'];
				$c=$_POST['network'];
				$d=$_POST['netmask'];
				$e=$_POST['broadcast'];
				$f=`sudo find /etc/sysconfig/network-scripts/ifcfg-$a`;
				if ($f=="")
				{	 
					echo "<b>NETWORK INTERFACE DOES NOT EXISTS!!!!";
				}
		               else
    				{
				$find=`sudo find /etc/sysconfig/network-scripts/ifcfg-$a:$vir`;
				if($find!="")
				{	 
					echo "<b>VIRTAL INTERFACE \"$a:$vir\" ALREADY EXISTS!!!!";
				}
			       else
       				{

				if($vir>=1&&$vir<=20)
				{
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
				$i=explode(".",$c);
				if(($i[0]<1||$i[0]>255)||
				($i[1]<0||$i[1]>255)||
				($i[2]<0||$i[2]>255)||
				($i[3]<0||$i[3]>255))
				{
				echo "<b><i>SORRY !!!! NETWORK ADDRESS \"$c\" NOT VALID!!!</i></b>";
				}
				else
	          		{
				$net=explode(".",$d);
				if(($net[0]<1||$net[0]>255)||
				($net[1]<0||$net[1]>255)||
				($net[2]<0||$net[2]>255)||
				($net[3]<0||$net[3]>255))
				{
				echo "<b><i>SORRY !!!! NETMASK \"$d\" NOT VALID!!!</i></b>";
				}
				else
	          		{
				$bro=explode(".",$e);
				if(($bro[0]<1||$bro[0]>255)||
				($bro[1]<0||$bro[1]>255)||
				($bro[2]<0||$bro[2]>255)||
				($bro[3]<0||$bro[3]>255))
				{
				echo "<b><i>SORRY !!!! BROADCAST ADDRESS \"$e\" NOT VALID!!!</i></b>";
				}
		     		else
		    		{
				/*$z=`ls /etc/sysconfig/network-scripts/`;
				$y=explode("ifcfg-",$z);
				$t=explode("ifcfg-",$y[0]);
				for($x=1,$j=1;$x<15;$x++)
				{
				  $s=`cat /etc/sysconfig/network-scripts/ifcfg-$t[1] `;  
				  $w=`cat /etc/sysconfig/network-scripts/ifcfg-$y[$x] `;
					$q=explode("IPADDR=",$s);
					$u=explode("IPADDR=",$w);
					$p=explode("NETWORK",$q[1]);
					$r=explode("NETWORK",$u[1]);
					$n=explode(".",$p[0]);
					$m=explode(".",$r[0]);
					$k=explode(" ",$n[3]);
					$l=explode(" ",$m[3]);
					$v=explode(".",$b);		
					if(($v[0]==$n[0]&&$v[1]==$n[1]&&$v[2]==$n[2]&&$v[3]==$k[0])||($v[0]==$m[0]&&$v[1]==$m[1]&&$v[2]==$m[2]&&$v[3]=$l[0]))
					if($j==1)
					   {
						echo "SORRY !!!! ANOTHER INTERFACE IS ALREADY USING THE SAME NETWORK IP !!!!";
						$j=0;
					    }
				  }   		 	
					
			if($j==1)*/
	    			{
				
				$g=`sudo touch add.sh`;
				$g=`sudo chmod 777 add.sh`;
				$h=`sudo touch /etc/sysconfig/network-scripts/ifcfg-$a:$vir`;
				$h=`sudo chmod 777 /etc/sysconfig/network-scripts/ifcfg-$a:$vir`;
				$g=`echo "echo '
BOOTPROTO=static
DEVICE=$a:$vir
NETMASK=$d
MTU=\"\"
BROADCAST=$e
IPADDR=$b
NETWORK=$c
ONBOOT=yes' >> /etc/sysconfig/network-scripts/ifcfg-$a:$vir" > add.sh`;
				$g=`sudo bash add.sh`;
				$g=`sudo rm -rf add.sh`;
				echo "<b>VIRTUAL NETWORK INTERFACE&nbsp;&nbsp;<u><b><i>\"$a:$vir\"</i></u>&nbsp;&nbsp;ADDED !!!!</b>";
				}
			      }
			     }				
			    }
			}
			}
			else 
			echo "<b><i>SORRY !!!! VIRTUAL INTERFACE \"$vir\" NOT VALID !!!</i></b>";
			}
		     }
		}
		?></center></center><hr><br>
		<form action="" method=post>
		<input type="submit" name="sub" value="Apply Configuration">
		</form>
		<?php
			if(isset($_POST['sub']))
			{
				$i=`sudo service network restart`;
				echo "<center><pre>$i<pre>";
				echo "<b><h3><i><u>THE CHANGES HAS BEEN APPLIED !!!!</u></i></h3></b></center>";
			}	
		?><hr></center>
		<a href=/index.php ><img src=left.gif align=middle>Return to Main index</a>&nbsp;&nbsp;|&nbsp;&nbsp;
		<a href=network.php >Return to network index</a>
	</body>
</html>
