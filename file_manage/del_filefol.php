<html>
	<head>
		<title>Delete File or Folder</title>
	</head>
	<body>
		<a href=/index.php>Main index</a><br>
		<a href=file.php>Module index</a>
		<center><img src=f.gif><img src=is.gif><img src=l.gif><img src=es.gif>&nbsp;&nbsp;&nbsp;<img src=m.gif><img src=as.gif><img src=ns1.gif><img src=as.gif><img src=g.gif><img src=es.gif><img src=ms.gif><img src=es.gif><img src=ns1.gif><img src=ts.gif><br>
		File Management RHEL 6.0<hr><center>		
		<h1><b><u>DELETE EXISTING FILE/FOLDER</u></b></h1>
		<table border=2><tr><th><img src=delfile.gif></th><tr></table><hr>
		<form action="" method="post">
		<table height=25% width=50% bgcolor=#cccccc>
		<tr bgcolor=#9999ff height=4%><td>
		<b>&nbsp;&nbsp;&nbsp;&nbsp;Delete a existing file/folder</b></td></tr>
		<tr height=8%><th>
		File/Folder Name : <input type="text" name="folder"></th></tr>
		<tr height=8%><th>
		File/Folder Path (Absolute):  <input type="text" name="path"></th></tr>
		<tr height=5%><th>
		<input type="submit" name="submit" value="Delete file/folder"></th></tr>
		</table>
		</form>
		<?php
			if(isset($_POST['submit']))
			{
			if($_POST['folder']=="")
				echo "<b><i>SORRY !!!! FILE/FOLDER NAME CAN NOT BE BLANK!!!!</i></b>";
			if($_POST['path']==""&&$_POST['folder']!="")
			echo "<b><i>SORRY !!!! FILE/FOLDER PATH CAN NOT BE BLANK!!!!</i></b>";
			}
		if(isset($_POST['submit'])&&$_POST['folder']!=""&&$_POST['path']!="")
			{
				$a=$_POST['folder'];
				$b=$_POST['path'];
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
				$e=`sudo rm -rf $b/$a`;	
				echo "<b><i>FILE/FOLDER \"$a\" DELETED IN \"$b\" !!!!</i></b>";
				}
			      }	
			   }
		?>
				<hr></center></center>
		<a href=/index.php ><img src=left.gif align=middle>Return to Main index</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href=file.php>Return to file management index</a>
	</body>
</html>
