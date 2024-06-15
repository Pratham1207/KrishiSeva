<?php
session_start();
include '../connection.php';
@mysqli_query($con,'set names utf8');

if(isset($_REQUEST["action"]))
{	//List 
	if($_REQUEST["action"]=="List") 
	{
		$sql = @mysqli_query($con,"select * from tbl_plantinfo");
		  
		$rows = array();
		while($r = mysqli_fetch_assoc($sql)) {
		  $rows[] = $r;
		}
		echo json_encode($rows);
	}
	//Insert
	elseif($_POST["action"]=="add")
	{
		$photo="";
		if(is_array($_FILES)) {
			if(is_uploaded_file($_FILES['image']['tmp_name'])) {
				$sourcePath = $_FILES['image']['tmp_name'];
				$ext = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
				$rand=rand(11111,99999);
				$targetPath = "../images/plan/".$_POST["txttitle"].$rand.".".$ext;
				$photo=$_POST["txttitle"].$rand.".".$ext;

			}
		}
		$sql=mysqli_query($con,"insert into tbl_plantinfo (plantName,plantDescription,plantImage) values ('".$_POST["txttitle"]."','".$_POST["txtdesc"]."','".$photo."')");
		if($sql)
		{
	 		move_uploaded_file($sourcePath,$targetPath);
			$output["msg"]="Success";
		}
		else
		  $output["msg"]="Error";
		echo json_encode($output);
	}
	//Update 
    else if($_POST["action"]=="update")
	{

		$photo="";
		if(is_array($_FILES))
		   {
			if(is_uploaded_file($_FILES['image']['tmp_name']))
				{
				$sourcePath = $_FILES['image']['tmp_name'];
				$rand=rand(11111,99999);
				$ext = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
				$targetPath = "../images/plan/".$_POST["txttitle"].$rand.".".$ext;
				$photo=$_POST["txttitle"].$rand.".".$ext;
				move_uploaded_file($sourcePath,$targetPath);
				if($_REQUEST['oldimg']!=NULL){
						unlink("../images/plan/".$_REQUEST['oldimg']);
					}
				}
				else
				{
				$photo=$_REQUEST['oldimg'];
				}
			}

		$sql=mysqli_query($con,"update tbl_plantinfo set plantName='".$_POST["txttitle"]."',plantDescription='".$_POST["txtdesc"]."',plantImage='".$photo."' where plantId ='".$_POST["txtcid"]."'");
		if($sql)
			$output["msg"]="Success";
		else
			$output["msg"]="Error";
		echo json_encode($output);

	}
	//Singel Delete
	else if($_REQUEST["action"]=="singleDelete")
	{
		$sid = $_REQUEST['del_id'];
		$res=mysqli_query($con,"select plantImage from tbl_plantinfo WHERE plantId ='$sid'");
		while($r=mysqli_fetch_array($res))
		{
		 $photo=$r["plantImage"];
		}
		$qry = "DELETE FROM tbl_plantinfo WHERE plantId ='$sid'";
		$result=mysqli_query($con,$qry);
		if(isset($result)) {
		   unlink("../images/plan/".$photo);
		   echo "YES";
		} else 
		   echo "NO";
	}
	//Multiple Delete
	else if($_REQUEST["action"]=="multiDelete")
	{
		$checkbox = $_POST['delall'];
		$myArray = explode(',', $checkbox);
		foreach($myArray as $my_Array){
		    $del_id = $my_Array; 
		$result=mysqli_query($con,"DELETE FROM tbl_plantinfo WHERE plantId ='".$del_id."'");
		} 
		echo (isset($result)) ? "YES":"NO";
	}	
	//getUpdate
	else if($_REQUEST["action"]=="getUpdate")
	{
		$cid = $_POST['plantId'];

		$sql = @mysqli_query($con,"select * from tbl_plantinfo where plantId='$cid'");
		  
		$rows = array();
		while($r = mysqli_fetch_assoc($sql)) {
		  $rows[] = $r;
		}  
		//echo result as json
		echo json_encode($rows);
	}

}	

?>