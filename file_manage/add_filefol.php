<html>
	<head>
		<title>Add File or Folder</title>
	</head>
	<body>
		<a href=/index.php>Main index</a><br>
		<a href=file.php>Module index</a>
		<center><img src=f.gif><img src=is.gif><img src=l.gif><img src=es.gif>&nbsp;&nbsp;&nbsp;<img src=m.gif><img src=as.gif><img src=ns1.gif><img src=as.gif><img src=g.gif><img src=es.gif><img src=ms.gif><img src=es.gif><img src=ns1.gif><img src=ts.gif><br>
		File Management RHEL 6.0<hr><center>		
		<h1><b><u>CREATE FILE/FOLDER</u></b></h1>
		<table border=2><tr><th><img src=addfile.gif></th><tr></table><hr>
		<form action="" method="post">
		<table height=25% width=50% bgcolor=#cccccc>
		<tr bgcolor=#9999ff height=4%><td>
		<b>&nbsp;&nbsp;&nbsp;&nbsp;Create a new folder</b></td></tr>
		<tr height=8%><th>
		Folder Name : <input type="text" name="folder"></th></tr>
		<tr height=8%><th>
		Folder Path (Absolute):  <input type="text" name="path"></th></tr>
		<tr height=5%><th>
		<input type="submit" name="submit" value="Create folder"></th></tr>
		</table>
		</form>
		<form action="" method="post">
		<table height=33% width=50% bgcolor=#cccccc>
		<tr bgcolor=#9999ff height=4%><td>
		<b>&nbsp;&nbsp;&nbsp;&nbsp;Create a new file</b></td></tr>
		<tr height=8%><th>
		File Name : <input type="text" name="file"></th></tr>
		<tr height=8%><th>
		File Path (Absolute) :  <input type="text" name="path1"></th></tr>
		<tr height=8%><th>
		Content of file : <input type="text" name="content"></th></tr>
		<tr height=5%><th>
		<input type="submit" name="sub" value="Create file"></th></tr>
		</table>
		</form>
		<?php
			if(isset($_POST['submit']))
			{
			if($_POST['folder']=="")
				echo "<b><i>SORRY !!!! FOLDER NAME CAN NOT BE BLANK!!!!</i></b>";
			if($_POST['path']==""&&$_POST['folder']!="")
			echo "<b><i>SORRY !!!! FOLDER PATH CAN NOT BE BLANK!!!!</i></b>";
			}
		if(isset($_POST['submit'])&&$_POST['folder']!=""&&$_POST['path']!="")
			{
				$a=$_POST['folder'];
				$b=$_POST['path'];
				$c=`sudo find $b`;
				if ($c=="")
				{	 
					echo "<b><i>SORRY!!!! PATH \"$b\" DOES NOT EXISTS PLEASE ENTER A VALID PATH!!!!</i></b>";
				}
			        else
			        {
				$d=`sudo find $b/$a`;
				if($d!="")
				{
					echo "<b><i>SORRY !!!! FILE/FOLDER NAME \"$a\" ALREADY EXISTS IN PATH \"$b\" !!!!</b></i>";
				}	
			        else
				{
				$e=`sudo mkdir $b/$a`;	
				echo "<b><i>FOLDER \"$a\" CREATED IN \"$b\" !!!!</i></b>";
				}
			      }	
			   }
			

			if(isset($_POST['sub']))
			{
			if($_POST['file']=="")
				echo "<b><i>SORRY !!!! FILE NAME CAN NOT BE BLANK!!!!</i></b>";
			if($_POST['path1']==""&&$_POST['file']!="")
			echo "<b><i>SORRY !!!! FILE PATH CAN NOT BE BLANK!!!!</i></b>";
			}
		if(isset($_POST['sub'])&&$_POST['file']!=""&&$_POST['path1']!="")
			{
				$f=$_POST['file'];
				$g=$_POST['path1'];
				$k=$_POST['content'];
				$h=`sudo find $g`;
				if ($h=="")
				{	 
					echo "<b><i>SORRY !!!! PATH \"$g\" DOES NOT EXISTS !!!!</i></b>";
				}
			else
			     {
				$i=`sudo find $g/$f`;
				if($i!="")
				{
					echo "<b><i>SORRY !!!! FILE/FOLDER NAME \"$f\" ALREADY EXISTS IN PATH \"$g\" !!!!</i></b>";
				}	
			else
				{
				$j=`sudo touch $g/$f`;	
				echo "<b><i>File \"$f\" CREATED IN \"$g\"</i></b> !!!!";
				if($k!="")
				{
				$l=`sudo touch a.sh`;
				$l=`sudo chmod 777 a.sh`;
				$l=`echo "echo $k >> $g/$f" > a.sh`;
				$l=`sudo bash a.sh`;
				$l=`sudo rm -rf a.sh`;
				} 
				}
			      }	
			   }	
		?>
				<hr></center></center>
		<a href=/index.php ><img src=left.gif align=middle>Return to Main index</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href=file.php>Return to file management index</a>
	</body>
</html>
