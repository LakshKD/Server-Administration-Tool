<html>
	<head>
		<title>Delete Existing Interface</title>
	</head>
	<body>
		<a href=/index.php>Main index</a><br>
		<a href=network.php>Module index</a>
		<center><img src=n.gif><img src=es.gif><img src=ts.gif><img src=ws.gif><img src=os.gif><img src=r.gif><img src=ks.gif>&nbsp;&nbsp;&nbsp;<img src=i.gif><img src=ns1.gif><img src=ts.gif><img src=es.gif><img src=r.gif><img src=fs.gif><img src=as.gif><img src=cs.gif><img src=es.gif><img src=ss.gif><br>
		Network Configuration RHEL 6.0 <hr><center>		
		<h1><b><u>DELETE NETWORK AND VIRTUAL INTERFACES</u></b></h1>
		<table border=2><tr><th><img src=delinter.gif></th><tr></table><hr>
		<form action="" method="post">
		<table height=25% width=50% bgcolor=#cccccc>
		<tr height=8% bgcolor=#9999ff><th>
		Delete Network interface</th></tr>
		<tr height=12%><th>
		Network interface name : <input type="text" name="name"></th></tr>
		<tr height=5%><th>
		<input type="submit" name="submit" value="DELETE INTERFACE"></th></tr>
		</table>
		</form>
		<form action="" method="post">
		<table height=25% width=50% bgcolor=#cccccc>
		<tr height=8% bgcolor=#9999ff><th>
		Delete Virtual interface</th></tr>
		<tr height=12%><th>
		Network interface name : <input type=text name="name1">:<input type=text name="virtue"></th></tr>
		<tr height=5%><th>
		<input type="submit" name="sub" value="DELETE VIRTUAL INTERFACE"></th></tr>
		</table>
		</form><br>
		<?php
			if(isset($_POST['submit']))
			{
			if($_POST['name']=="")
				echo "<b><i>SORRY !!!! INTERFACE NAME CAN NOT BE BLANK!!!!</i></b>";
			}

		if(isset($_POST['submit'])&&$_POST['name']!="")
	      		{
				$a=$_POST['name'];
				$b=`sudo find /etc/sysconfig/network-scripts/ifcfg-$a `;
				if($b=="")
				{	 
					echo "<b>NETWORK INTERFACE \"$a\" DOES NOT EXISTS!!!!";
				}
			else
   		 	{
				$h=`sudo rm -rf  /etc/sysconfig/network-scripts/ifcfg-$a`;		
				echo "<b><i>NETWORK INTERFACE \"$a\" DELETED";
			}
			}
		?>
		<?php
			if(isset($_POST['sub']))
			{
			if($_POST['name1']=="")
				echo "<b><i>SORRY !!!! INTERFACE NAME CAN NOT BE BLANK!!!!</i></b>";
			if($_POST['virtue']==""&&$_POST['name1']!="")
				echo "<b><i>SORRY !!!! VIRTUAL INTERFACE CAN NOT BE BLANK!!!!</i></b>";
			}
		if(isset($_POST['sub'])&&$_POST['virtue']!=""&&$_POST['name1']!="")
			{
				$w=$_POST['name1'];
				$x=$_POST['virtue'];
				$y=`sudo find /etc/sysconfig/network-scripts/ifcfg-$w:$x `;
				if($y=="")
				{	 
					echo "<b>VIRTUAL INTERFACE \"$w:$x\" DOES NOT EXISTS!!!!";
				}
			else
			{
				$z=`sudo rm -rf  /etc/sysconfig/network-scripts/ifcfg-$w:$x`;		
				echo "<b><i>VIRTUAL INTERFACE \"$w:$x\" DELETED";
			}
			}		
		?>
		</center></center><hr><br>
		<form action="" method=post>
		<input type="submit" name="subm" value="Apply Configuration">
		</form>
		<?php
			if(isset($_POST['subm']))
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
