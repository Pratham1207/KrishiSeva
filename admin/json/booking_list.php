<?php
session_start();
include '../connection.php';
@mysqli_query($con,'set names utf8');

if(isset($_REQUEST["action"]))
{	//List 
	if($_REQUEST["action"]=="List") 
	{
		$sql = @mysqli_query($con,"select *,(select name from tbl_user where uId=tbl_coldstorage_booking.uId) as uname,(select title from tbl_coldstorage where cId=tbl_coldstorage_booking.cId) as cname from tbl_coldstorage_booking");
		  
		$rows = array();
		while($r = mysqli_fetch_assoc($sql)) {
		  $rows[] = $r;
		}
		echo json_encode($rows);
	}
	//Singel Delete
	else if($_REQUEST["action"]=="singleDelete")
	{
		$sid = $_REQUEST['del_id'];
		$qry = "DELETE FROM tbl_coldstorage_booking WHERE BookingId  ='$sid'";
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
		$result=mysqli_query($con,"DELETE FROM tbl_coldstorage_booking WHERE BookingId  ='".$del_id."'");
		} 
		echo (isset($result)) ? "YES":"NO";
	}	
}	

?>