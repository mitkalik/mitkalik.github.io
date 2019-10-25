<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link href="style.css" rel="stylesheet" type="text/css">
	<title>Document</title>
</head>
<body>
<h2><a id="head" href="index.php">File-Sharing</a></h2>
<div id="upload" align="center">
	<form action="#" method="POST" enctype="multipart/form-data">
	Select the file:<input id="b1" type="file" name="userfile" title="click to choose"/> 
	<input id="b2" type="submit" value="Upload" alt="sss" title="Click to upload">	
<?php 																			//file upload
$folder = "upload/";
	if($_FILES['userfile']['size']<2000000)										// file_size < 2Mb
	{
		$uploadfile = $folder.basename($_FILES['userfile']['name']);
		if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile))
		{
			echo "<br><br>Mesage:<div class='mesage'>File upload completed</div>";
		}
		else 
		{
			echo "<br><br>Mesage:<div class='mesage'>File not selected</div>";
		}
	}
	else
	{
		echo "<br><br>Mesage:<div class='mesage'>Error: file size greater than 2Mb</div>";
	}	 ;
		 
?>
	</form>
	
</div>
<br>	
<div>
	<table align="center">
		<tr>
			<td>File_name</td><td>File_size(kb)</td><td>Operations</td>
		</tr>
		
		<thead>
	    	<tr>
	      		<th>Files</th>
	    	</tr>
	    </thead>
	    
	    <tbody>
<?php 
if(isset($_GET['delete']) )							//lile delete
		    {
		    unlink($_GET['delete']);
		    }      
	      
	                                                 // show list downloaded files
$path = 'upload/';
	    $files = scandir('./upload');
	    	        foreach($files as $file)
	        if ($file != "." && $file != "..")
	    	      
		    {
	      echo
	        '<tr>
	      		<td>'.$file.'</td>
	      		<td>'.(filesize('upload/'.$file.'')/1024).'</td>
				<td>
					<div >
						<a class="operation" href="/upload/'.$file.'">Download</a>
					</div>  
					<div >
					<a class="operation" href="?delete='.$path.$file.'">delete</a>
						
					</div>														
				</td> 
	      	</tr>';

	      	
	    }	
	     			
	    ?>
	    </tbody>
	</table>

</div>
</body>
</html>