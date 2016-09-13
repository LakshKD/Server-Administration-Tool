/*Under development*/
<html>
	<head>
		<title>Change Group</title>
	</head>
	<body>
		<a href=/index.php>Main index</a><br>
		<a href=file.php>Module index</a>
		<center><img src=f.gif><img src=is.gif><img src=l.gif><img src=es.gif>&nbsp;&nbsp;&nbsp;<img src=m.gif><img src=as.gif><img src=ns1.gif><img src=as.gif><img src=g.gif><img src=es.gif><img src=ms.gif><img src=es.gif><img src=ns1.gif><img src=ts.gif><br>
		File Management RHEL 6.0<hr><center>		
		<h1><b><u>CHANGE GROUP OF EXISTING FILE/FOLDER</u></b></h1>
		<table border=2><tr><th><img src=chgrp.gif></th><tr></table><hr>
		<form action="" method="post">
		<table height=33% width=50% bgcolor=#cccccc>
		<tr bgcolor=#9999ff height=4%><td>
		<b>&nbsp;&nbsp;&nbsp;&nbsp;Change Group of a existing file/folder</b></td></tr>
		<tr height=8%><th>
		File/Folder Name : <input type="text" name="folder"></th></tr>
		<tr height=8%><th>
		File/Folder Path (Absolute) :  <input type="text" name="path"></th></tr>
		<tr height=8%><th>
		New Group :  <input type="text" name="group"></th></tr>
		<tr height=5%><th>
		<input type="submit" name="submit" value="Change Group"></th></tr>
		</table>
		</form>
		<?php
			if(isset($_POST['submit']))
			{
			if($_POST['folder']=="")
				echo "<b><i>SORRY !!!! FILE/FOLDER NAME CAN NOT BE BLANK!!!!</i></b>";
			if($_POST['path']==""&&$_POST['folder']!="")
			echo "<b><i>SORRY !!!! FILE/FOLDER PATH CAN NOT BE BLANK!!!!</i></b>";
			if($_POST['group']==""&&$_POST['path']!=""&&$_POST['folder']!="")
			echo "<b><i>SORRY !!!! GROUP NAME CAN NOT BE BLANK!!!!</i></b>";
			}
		if(isset($_POST['submit'])&&$_POST['folder']!=""&&$_POST['path']!=""&&$_POST['group']!="")
			{
				$a=$_POST['folder'];
				$b=$_POST['path'];
				$f=$_POST['group'];
				$c=`sudo find $b`;
				if ($c=="")
				{	 
					echo "<b><i>SORRY!!!! PATH \"$b\" DOES NOT EXISTS ENTER A VALID PATH!!!!</i></b>";
				}
			       else
		                {
				$d=`sudo find $b/$a`;
				if($d=="")
				{
					echo "<b><i>SORRY !!!! FILE/FOLDER NAME \"$a\" DOES NOT EXISTS IN PATH \"$b\" !!!!</b></i>";
				}
			       else
			        {
				$e=`sudo cat /etc/group | grep -w $f`;
				if($e=="")
				{
					echo "<b><i>SORRY !!!! GROUP \"$f\" DOES NOT EXIST</i></b>";	
				}	
			       else
		                {
				$g=`sudo chgrp $f $b/$a`;
				echo "<b><i>FILE/FOLDER \"$a\" IN \"$b\" GROUP CHANGED i.e. \"$f\" !!!!</i></b>";
			        }
			 }	
		 }
	}
		?>
				<hr></center></center>
		<a href=/index.php ><img src=left.gif align=middle>Return to Main index</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href=file.php>Return to file management index</a>
	</body>
</html>
