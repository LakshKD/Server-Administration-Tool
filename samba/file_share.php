<html>
	<head>
		<title>Create a New File Share</title>
	</head>
	<body>
		<a href=/index.php>Main index</a><br>
		<a href=samba.php>Module index</a>
		<center><img src=s.gif><img src=ac.gif><img src=m.gif><img src=b.gif><img src=ac.gif>&nbsp;&nbsp;&nbsp;<img src=w.gif><img src=is.gif><img src=ns1.gif><img src=ds.gif><img src=os.gif><img src=ws.gif><img src=ss.gif>&nbsp;&nbsp;&nbsp;<img src=f.gif><img src=is.gif><img src=l.gif><img src=es.gif>&nbsp;&nbsp;&nbsp;<img src=s.gif><img src=hs.gif><img src=as.gif><img src=r.gif><img src=is.gif><img src=ns1.gif><img src=g.gif><br>
		SAMBA RHEL 6.0<hr>	
		<h1><b><u>CREATE A NEW FILE SHARE</u></b></h1>
		<table border=2><tr><th><img src=share.gif></th><tr></table><hr>
		<form action="" method="post">
		<table height=60% width=60% bgcolor=#cccccc border=0>
		<tr bgcolor=#9999ff>
		<td width=60% height=5%>
		&nbsp;&nbsp;&nbsp;&nbsp;Create a New File Share</td><td width=2%></td><td width=33%></td></tr>
		<tr height=6%><td width=35%>
		&nbsp;&nbsp;&nbsp;&nbsp;Share Name*</td><td width=2%> : </td><td width=33%><input type="text" name="share"></td></tr>
		<tr height=6%><td width=35%>
		&nbsp;&nbsp;&nbsp;&nbsp;Directory/Folder To Share ( Absolute Path )*</td><td width=2%> :  </td><td width=33%><input type="text" name="dir"></td></tr>
		<tr height=6%><td width=35%>
		&nbsp;&nbsp;&nbsp;&nbsp;Do You Want File Share Writable ? [Click If Yes]*</td><td width=2%> : </td><td width=33%>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="radio" name=write></td></tr>
		<tr height=6%><td width=35%>
		&nbsp;&nbsp;&nbsp;&nbsp;Enter The Comment You Want To Attach</td><td width=2%> : </td><td width=33%><input type="text" name="comment"></td></tr>
		<tr height=6%><td width=35%>
		&nbsp;&nbsp;&nbsp;&nbsp;Enter The New Linux File Creation Mode ( IF WRITABLE )</td><td width=2%> : </td><td width=33%><input type="text" name="filemode"></td></tr>
		<tr height=6%><td width=35%>
		&nbsp;&nbsp;&nbsp;&nbsp;Enter The New Linux Directory Creation Mode ( IF WRITABLE )</td><td width=2%> : </td><td width=33%><input type="text" name="dirmode"></td></tr>
		<tr height=6%><td width=35%>
		&nbsp;&nbsp;&nbsp;&nbsp;Enter The Owner Of Newly Created Files ( IF WRITABLE )**</td><td width=2%> : </td><td width=33%><input type="text" name="owner"></td></tr>
		<tr height=6%><td width=35%>
		&nbsp;&nbsp;&nbsp;&nbsp;Enter The Group Of Newly Created Files  ( IF WRITABLE )**</td><td width=2%> : </td><td width=33%><input type="text" name="group"></td></tr>
		<tr height=6%><td width=35%>
		&nbsp;&nbsp;&nbsp;&nbsp;Enter The List Of Valid Users ( Seperated By comma)</td><td width=2%> : </td><td width=33%><input type="text" name="valid"></td></tr>
		<tr height=6%><td width=35%>
		&nbsp;&nbsp;&nbsp;&nbsp;Enter The List Of Invalid Users ( Seperated By comma)</td><td width=2%> : </td><td width=33%><input type="text" name="invalid"></td></tr></table><br><br>
		<input type="submit" name="submit" value="Create File Share"><br><br>
		</form>
		<?php
			if(isset($_POST['submit']))
			{
			if($_POST['share']=="")
				echo "<b>PLEASE !!!! ENTER SHARE NAME !!!!</b>";
			if($_POST['dir']==""&&$_POST['share']!="")
			echo "<b>PLEASE !!! ENTER DIRECTORY/FOLDER PATH YOU WANT TO SHARE !!!!";
			}
		if(isset($_POST['submit'])&&$_POST['share']!=""&&$_POST['dir']!="")
	                     {
				$a=$_POST['share'];
				$b=$_POST['dir'];
				$d=$_POST['comment'];
				$z=$_POST['filemode'];
				$m=$_POST['dirmode'];
				$n=$_POST['owner'];
				$y=$_POST['valid'];
				$w=$_POST['group'];
				$u=$_POST['invalid'];
				$f=`sudo find $b`;
			     if($f=="")
				{
				    echo "<h3><i><b>SORRY !!!! DIRECTORY/FOLDER DOES NOT EXIST !!!!</h3></i></b> ";
				}
		             else
	                        {			
			
				$search=`sudo cat /etc/samba/smb.conf | grep -w $a`;
				if($search!="")
				{
				echo "<b><h3><i>SORRY !!!! SHARE NAME <u>$a</u> EXISTS !!!!";
				}
		             else
	 	                {
				$e=`sudo touch a.sh`;
				$e=`sudo chmod 777 a.sh`;
				$e=`echo "echo ' [$a] ' >> /etc/samba/smb.conf" > a.sh`;
				$e=`sudo bash a.sh`;
	 			$e=`sudo rm -rf a.sh`;

				$k=`sudo cat /etc/passwd `;
				$l=explode($n,$k);
				if($l[1]=="")
				   {
					echo "<h3><b><i>SORRY !!!!USER ( OWNER )&nbsp;&nbsp;<u>$n</u>&nbsp;&nbsp;DOES NOT EXISTS !!!!</i></b></h3>";
				   }
		
				$x=explode(",",$y);
				for($q=0;$q<30;$q++)
				{
				$t=explode($x[$q],$k);  /*explode(seprator,string) this function converts a string into an array*/
				if($t[1]==""&&$x[$q]!="")
				   {
					$v=1;
					echo "<h3><b><i>SORRY !!!!USER ( VALID )&nbsp;&nbsp;<u>$x[$q]</u>&nbsp;&nbsp;DOES NOT EXISTS !!!!</i></b></h3>";
				    }
				 }
				if($v!=1&&$y!="")
				   {  
					$q=`sudo touch k.sh`;
					$q=`sudo chmod 777 k.sh`;
					$q=`echo "echo '      valid users = $y ' >> /etc/samba/smb.conf" > k.sh`;
					$q=`sudo bash k.sh`;
					$q=`sudo rm -rf k.sh`;	
				   }				

				$o=`sudo cat /etc/group `;
				$gr=explode($w,$o);
				if($gr[1]=="")
				   {
					echo "<h3><b><i>SORRY !!!!GROUP&nbsp;&nbsp;<u>$w</u>&nbsp;&nbsp;DOES NOT EXISTS !!!!</i></b></h3>";
				   }
				$in=explode(",",$u);
				for($vr=0;$vr<30;$vr++)
				{
				$ex=explode($in[$vr],$k);
				if($ex[1]==""&&$in[$vr]!="")
				   {
					$flag=1;
					echo "<h3><b><i>SORRY !!!!USER ( INVALID )&nbsp;&nbsp;<u>$in[$vr]</u>&nbsp;&nbsp;DOES NOT EXISTS !!!!</i></b></h3>";
				    }
				   }
				if($flag!=1&&$u!="")
				   {  
					$inv=`sudo touch k.sh`;
					$inv=`sudo chmod 777 k.sh`;
					$inv=`echo "echo '      invalid users = $u ' >> /etc/samba/smb.conf" > k.sh`;
					$inv=`sudo bash k.sh`;
					$inv=`sudo rm -rf k.sh`;	
				   }


				if($_POST['comment']!="")
				{	$g=`sudo touch p.sh`;
					$g=`sudo chmod 777 p.sh`;
					$g=`echo "echo '      comment =  $d ' >> /etc/samba/smb.conf" > p.sh`;
					$g=`sudo bash p.sh`;
					$g=`sudo rm -rf p.sh`;	
				}
					$h=`sudo touch c.sh`;
					$h=`sudo chmod 777 c.sh`;
					$h=`echo "echo '      path = $b ' >> /etc/samba/smb.conf" > c.sh`;
					$h=`sudo bash c.sh`;
					$h=`sudo rm -rf c.sh`;	
					if($_POST['write']=="on")
					{
					$h=`sudo touch d.sh`;
				        $h=`sudo chmod 777 d.sh`;
					$h=`echo "echo '      writable = yes ' >> /etc/samba/smb.conf" > d.sh`;
				        $h=`sudo bash d.sh`;
				        $h=`sudo rm -rf d.sh`;
					}
					else
					{
					$i=`sudo touch d.sh`;
				        $i=`sudo chmod 777 d.sh`;
				        $i=`echo "echo '      writable = no ' >> /etc/samba/smb.conf" > d.sh`;
				        $i=`sudo bash d.sh`;
				        $i=`sudo rm -rf d.sh`;
					}
				if($_POST['filemode']!="")
					{
					$j=`sudo touch q.sh`;
					$j=`sudo chmod 777 q.sh`;
					$j=`echo "echo '      create mask = $z ' >> /etc/samba/smb.conf" > q.sh`;
					$j=`sudo bash q.sh`;
					$j=`sudo rm -rf q.sh`;	
					}
				if($_POST['dirmode']!="")
					{
					$j=`sudo touch m.sh`;
					$j=`sudo chmod 777 m.sh`;
					$j=`echo "echo '      directory mask = $m ' >> /etc/samba/smb.conf" > m.sh`;
					$j=`sudo bash m.sh`;
					$j=`sudo rm -rf m.sh`;	
					}
				if($l[1]!="")
					{
				        $j=`sudo touch k.sh`;
					$j=`sudo chmod 777 k.sh`;
					$j=`echo "echo '      force user = $n ' >> /etc/samba/smb.conf" > k.sh`;
					$j=`sudo bash k.sh`;
					$j=`sudo rm -rf k.sh`;
					}
			        if($gr[1]!="")
					{
				        $gro=`sudo touch k.sh`;
					$gro=`sudo chmod 777 k.sh`;
					$gro=`echo "echo '      force group = $w ' >> /etc/samba/smb.conf" > k.sh`;
					$gro=`sudo bash k.sh`;
					$gro=`sudo rm -rf k.sh`;
					}

				echo "FILE SHARE<br><br><img src=share.gif><br><br>&nbsp;&nbsp;<u><b><i>$a</i></u></b>&nbsp;&nbsp;CREATED";		
				}	
			}
		}
			
		?><br></center>* fields are necessary<center>
		</center>** fields are not necessary but if u do not enter these fields or these fields does not exist/wrong ,<br> data would be updated except these fields , no wrong data will be updated,specially Owner and Group.<center>
		</center></center><hr><br>
		<form action="" method=post>
		<input type="submit" name="sub" value="Restart Samba Servers">
		</form>
		<?php
			if(isset($_POST['sub']))
			{
				$c=`sudo service smb restart`;
				echo "<center><pre>$c<pre>";
				echo "<b><h3><i><u>SAMBA SERVICE RESTARTED<br>THE CHANGES HAS BEEN APPLIED !!!!</u></i></h3></b></center>";
			}	
		?><hr></center>
		<a href=samba.php ><img src=left.gif align=middle>Return to samba list</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href=/index.php>Return to Main index</a>
	</body>
</html>
