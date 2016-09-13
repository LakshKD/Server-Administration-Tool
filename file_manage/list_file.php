<html>
	<head>
		<title>List The Existing Files</title>
	</head>
	<body>
		<a href=/index.php>Main index</a><br>
		<a href=file.php>Module index</a>
		<center><img src=f.gif><img src=is.gif><img src=l.gif><img src=es.gif>&nbsp;&nbsp;&nbsp;<img src=m.gif><img src=as.gif><img src=ns1.gif><img src=as.gif><img src=g.gif><img src=es.gif><img src=ms.gif><img src=es.gif><img src=ns1.gif><img src=ts.gif><br>
		File Management RHEL 6.0<hr><center>		
		<h1><b><u>LIST ALL FILES IN A EXISTING FOLDER</u></b></h1>
		<table border=2><tr><th><img src=listfile.gif></th><tr></table><hr>
		<form action="" method="post">
		<table height=17% width=50% bgcolor=#cccccc>
		<tr bgcolor=#9999ff height=4%><td>
		<b>&nbsp;&nbsp;&nbsp;&nbsp;List all files in a existing folder</b></td></tr>
		<tr height=8%><th>
		Folder Path (Absolute):  <input type="text" name="path"></th></tr>
		<tr height=5%><th>
		<input type="submit" name="submit" value="List Files"></th></tr>
		</table>
		</form>
		<?php
			if(isset($_POST['submit']))
			{
			if($_POST['path']=="")
			echo "<b><i>SORRY !!!! FOLDER PATH CAN NOT BE BLANK!!!!</i></b>";
			}
	if(isset($_POST['submit'])&&$_POST['path']!="")
	{
				$b=$_POST['path'];
				$c=`sudo find $b`;
				if ($c=="")
				{	 
					echo "<b><i>SORRY!!!! PATH \"$b\" DOES NOT EXISTS!!!!</i></b>";
				}
		else
		     {
				$d=`sudo ls -la $b`;
				$e=explode("
",$d);
		?>
				<table width=40% border=1>
					<tr>
					<td width=2% bgcolor=#9999ff><b>Sno.</b></td>	
					<td width=10% bgcolor=#9999ff><b>permission&nbsp;Owner&nbsp;Group&nbsp;Memory&nbsp;Date&nbsp;File/Folder</b></td>		
					</tr></table>
			<?php
				for($i=0,$g=1;$i<100;$i++,$g++)
				{
				if($e[$i]!="")
				{
				$f=explode(" *",$e[$i]);
				$h=`sudo ls -la $b | grep -w total`;
				if($h=="")
				{
			?>
				<table width=40% border=0>
					<tr>
					<td width=1.2%><?php echo "$g" ?></td>
					<td width=10%><?php echo "<b>  $f[0] </b>" ?></td></tr></table>
					
			<?php
					  }
				else
				{
			?>
					<table width=40% border=0>
					<tr>
					<?php $k=$g-1; ?>
					<td width=1.2%><?php echo "$k" ?></td>
					<td width=10%><?php echo "<b>$f[0]</b>" ?></td></tr></table>
			<?php
				}
					}
				     }			
			      }	
			   }
		?>
				<hr></center></center>
		<a href=/index.php ><img src=left.gif align=middle>Return to Main index</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href=file.php>Return to file management index</a>
	</body>
</html>
