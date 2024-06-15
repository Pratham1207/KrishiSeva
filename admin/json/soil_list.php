<?php
session_start();
include '../connection.php';
@mysqli_query($con,'set names utf8');
$table="tbl_soilinfo";

if(isset($_REQUEST["action"]))
{	//List 
	if($_REQUEST["action"]=="List") 
	{
		$sql = @mysqli_query($con,"SELECT * FROM `tbl_soilinfo`");
		  
		$rows = array();
		while($r = mysqli_fetch_assoc($sql)) {
		  $rows[] = $r;
		}
		echo json_encode($rows);
	}
	//Insert
	elseif($_POST["action"]=="add")
	{
		mysqli_query($con,'set names utf8');
		$sql=mysqli_query($con,"insert into tbl_soilinfo (soilName,soilPh,soilDescription) values ('".$_REQUEST["txttitle"]."','".$_REQUEST["txtdose"]."','".$_REQUEST["txtdesc"]."')");	
		if($sql)
	 		$output["msg"]="Success";
		else
			$output["msg"]="Error";
		echo json_encode($output);
	}
	//Update 
    else if($_POST["action"]=="update")
	{

		$sql=mysqli_query($con,"update tbl_soilinfo set soilName='".$_POST["txttitle"]."',soilDescription='".$_POST["txtdesc"]."',soilPh='".$_POST["txtdose"]."' where soilId  ='".$_POST["txtcid"]."'");
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
		$qry = "DELETE FROM tbl_soilinfo WHERE soilId ='$sid'";
		$result=mysqli_query($con,$qry);
		echo (isset($result)) ? "YES":"NO";
	}
	//Multiple Delete
	else if($_REQUEST["action"]=="multiDelete")
	{
		$checkbox = $_POST['delall'];
		$myArray = explode(',', $checkbox);
		foreach($myArray as $my_Array){
		    $del_id = $my_Array; 
		$result=mysqli_query($con,"DELETE FROM tbl_soilinfo WHERE soilId ='".$del_id."'");
		} 
		echo (isset($result)) ? "YES":"NO";
	}	
	//getUpdate
	else if($_REQUEST["action"]=="getUpdate")
	{
		$cid = $_POST['pId'];
		$sql = @mysqli_query($con,"select * from tbl_soilinfo where soilId ='$cid'");
		$rows = array();
		while($r = mysqli_fetch_assoc($sql)) {
		  $rows[] = $r;
		}
		//echo result as json
		echo json_encode($rows);
	}
}	

?>