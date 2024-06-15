<?php
session_start();
include '../connection.php';
@mysqli_query($con,'set names utf8');
$table="tbl_coldstorage";

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
	//Singel Delete
	else if($_REQUEST["action"]=="singleDelete")
	{
		$sid = $_POST['del_id'];
		$qry = "DELETE FROM tbl_coldstorage WHERE cId ='$sid'";
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
		$result=mysqli_query($con,"DELETE FROM tbl_coldstorage WHERE cId ='".$del_id."'");
		} 
		echo (isset($result)) ? "YES":"NO";
	}	
	//change status
	else if($_REQUEST["action"]=="status")
	{
		$sid = $_POST['s_id'];
		$satus =$_POST["status"];
		$qry = "update tbl_coldstorage set isactive='".$satus."' WHERE cId ='$sid'";
		$result=mysqli_query($con,$qry);
		echo (isset($result)) ? "YES":"NO";
	}	

}	

?>