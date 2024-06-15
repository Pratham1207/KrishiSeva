<?php
session_start();
include '../connection.php';
@mysqli_query($con,'set names utf8');
$table="tbl_slider";

if(isset($_REQUEST["action"]))
{	//List 
	if($_REQUEST["action"]=="List") 
	{
		$sql = @mysqli_query($con,"select * from $table");
		  
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
				$rand=rand(11111,99999);
				$fileData = pathinfo(basename($_FILES["image"]["name"]));
				$targetPath = "../images/slider/".$rand."slider.".$fileData['extension'];
				$photo=$rand."slider.".$fileData['extension'];
				
			}
		}
		mysqli_query($con,'set names utf8');
		$sql=mysqli_query($con,"insert into tbl_slider (title,description,img_url,isactive) values ('".$_REQUEST["txtTitle"]."','".$_REQUEST["txtDescription"]."','".$photo."','Y')");	
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
				$targetPath = "../images/slider/".$_POST["txttitle"].$rand.".".$ext;
				$photo=$_POST["txttitle"].$rand.".".$ext;
				move_uploaded_file($sourcePath,$targetPath);
				if($_REQUEST['oldimg']!=NULL){
						unlink("../images/slider/".$_REQUEST['oldimg']);
					}
				}
				else
				{
				$photo=$_REQUEST['oldimg'];
				}
			}

		$sql=mysqli_query($con,"update tbl_slider set title='".$_POST["txttitle"]."',description='".$_POST["txtdesc"]."',img_url='".$photo."' where slider_id='".$_POST["txtcid"]."'");
		if($sql)
			$output["msg"]="Success";
		else
			$output["msg"]="Error";
		echo json_encode($output);

	}
	//Singel Delete
	else if($_REQUEST["action"]=="singleDelete")
	{
		$sid = $_POST['del_id'];
		$res=mysqli_query($con,"select img_url from tbl_slider WHERE slider_id ='$sid'");
		while($r=mysqli_fetch_array($res))
		{
		 $photo=$r["img_url"];
		}
		$qry = "DELETE FROM tbl_slider WHERE slider_id ='$sid'";
		$result=mysqli_query($con,$qry);
		if(isset($result)) {
		   unlink("../images/slider/".$photo);
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
		$result=mysqli_query($con,"DELETE FROM tbl_slider WHERE slider_id ='".$del_id."'");
		} 
		echo (isset($result)) ? "YES":"NO";
	}	
	//getUpdate
	else if($_REQUEST["action"]=="getUpdate")
	{
		$cid = $_POST['sid'];
		$sql = @mysqli_query($con,"select * from tbl_slider where slider_id='$cid'");
		$rows = array();
		while($r = mysqli_fetch_assoc($sql)) {
		  $rows[] = $r;
		}
		//echo result as json
		echo json_encode($rows);
	}
	//change status
	else if($_REQUEST["action"]=="status")
	{
		$sid = $_POST['s_id'];
		$satus =$_POST["status"];
		$qry = "update tbl_slider set isactive='".$satus."' WHERE slider_id ='$sid'";
		$result=mysqli_query($con,$qry);
		echo (isset($result)) ? "YES":"NO";
	}	

}	

?>