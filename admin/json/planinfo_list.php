<?php
session_start();
include '../connection.php';
@mysqli_query($con,'set names utf8');

if(isset($_REQUEST["action"]))
{	//List 
	if($_REQUEST["action"]=="List") 
	{
		$sql = @mysqli_query($con,"select *,(select plantName from tbl_plantinfo where plantId=tbl_plantdetails.plantId) as plantName from tbl_plantdetails");
		  
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
		$sql=mysqli_query($con,"insert into tbl_plantdetails (plantId,plantSubType,plantBestSeason,plantDistance,fertilizerId,fertilizerTime,tempreture,water,soilId,pestId,growthTime,warmId) values ('".$_POST["plantId"]."','".$_POST["SubType"]."','".$_POST["BestSeason"]."','".$_POST["Distance"]."','".$_POST["fertilizerId"]."','".$_POST["fertilizerTime"]."','".$_POST["tempreture"]."','".$_POST["water"]."','".$_POST["soilId"]."','".$_POST["pestId"]."','".$_POST["growthTime"]."','".$_POST["warmId"]."')");
		if($sql)
		{
	 		$output["msg"]="Success";
		}
		else
		  $output["msg"]="Error";
		echo json_encode($output);
	}
	//Update 
    else if($_POST["action"]=="update")
	{

		

		$sql=mysqli_query($con,"update tbl_plantdetails set plantId='".$_POST["plantId"]."',plantSubType='".$_POST["SubType"]."',plantBestSeason='".$_POST["BestSeason"]."',plantDistance='".$_POST["Distance"]."',fertilizerId='".$_POST["fertilizerId"]."',fertilizerTime='".$_POST["fertilizerTime"]."',tempreture='".$_POST["tempreture"]."',water='".$_POST["water"]."',soilId='".$_POST["soilId"]."',pestId='".$_POST["pestId"]."',growthTime='".$_POST["growthTime"]."',warmId='".$_POST["warmId"]."'
			where plantDetailId ='".$_POST["txtcid"]."' ");
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
		
		$qry = "DELETE FROM tbl_plantdetails WHERE plantDetailId ='$sid'";
		$result=mysqli_query($con,$qry);
		if(isset($result)) {
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
		$result=mysqli_query($con,"DELETE FROM tbl_plantdetails WHERE plantDetailId ='".$del_id."'");
		} 
		echo (isset($result)) ? "YES":"NO";
	}	
	//getUpdate
	else if($_REQUEST["action"]=="getUpdate")
	{
		$cid = $_POST['plantId'];

		$sql = @mysqli_query($con,"select * from tbl_plantdetails where plantDetailId='$cid'");
		  
		$rows = array();
		while($r = mysqli_fetch_assoc($sql)) {
		  $rows[] = $r;
		}  
		//echo result as json
		echo json_encode($rows);
	}

}	

?>