<?php
$project="KrishiSeva";
session_start();
define('DB_SERVER','localhost');
define('DB_USER','root');
define('DB_PASSWORD' ,'');
define('DB_DATABASE', 'db_krishportal');


class DB_con
{
	
 function __construct()
 {
 $con = mysqli_connect(DB_SERVER , DB_USER, DB_PASSWORD, DB_DATABASE);
 $this->db=$con;
// Check connection
	if (mysqli_connect_errno())
	{
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	} 
 }

  public function Login($email,$password)
  {
	$result=mysqli_query($this->db,"select * from tbl_user where uName='".$email."' and uPassword='".$password."'");
	$user_data = mysqli_fetch_array($result);  
	$no_rows = mysqli_num_rows($result); 
	if($no_rows == 1)
	{ 			
		if($user_data['uName']==$email && $user_data['uPassword']==$password)
		{
	        $_SESSION['login'] = true;  
            $_SESSION['uid'] = $user_data['uId'];  
            $_SESSION['username'] = $user_data['name'];  
            $_SESSION['email'] = $user_data['uName'];
            $_SESSION['utype'] = $user_data['uType'];   
            return "success";  
        }    
        else   
            return "Username or Password incorrect";
    }
    else   
       return "Invalid Username or Password"; 
  }

  public function isUserExist($emailid)
  {  
    $qr = mysqli_query($this->db,"SELECT * FROM tbl_user WHERE uName = '".$emailid."'");  
    $row = mysqli_num_rows($qr);  
    if($row > 0)
        return true;  
    else   
        return false;  
  } 
  public function isCurrentPass($pass)
  {  
    $qr = mysqli_query($this->db,"SELECT * FROM tbl_user WHERE uPassword = '".$pass."' and uId='".$_SESSION['uid']."'");  
    $row = mysqli_num_rows($qr);  
    if($row > 0)
        return true;  
    else   
        return false;  
  }
  public function userinfo()
  {
	$result=mysqli_query($this->db,"select * from tbl_user where uId='".$_SESSION['uid']."'");
    $array = array(); 
    while($row = mysqli_fetch_assoc($result))  
           {  
                $array[] = $row;  
           }  
    return $array[0];
      
  }
    
  public function insert($table_name, $data)
  {
		$string = "INSERT INTO ".$table_name." (";            
		$string .= implode(",", array_keys($data)) . ') VALUES (';            
		$string .= "'" . implode("','", array_values($data)) . "')";  
		if(mysqli_query($this->db, $string))  
		    return true;  
		else  
		    return false;  
  }

  public function select($table_name,$id="")  
      {  
           $array = array();  
           $query = "SELECT * FROM ".$table_name."";  
           if($id!='')
           	 $query .= " WHERE $id";
           
           $result = mysqli_query($this->db, $query);  
           while($row = mysqli_fetch_assoc($result))  
           {  
                $array[] = $row;  
           }  
           return $array;  
      }  
  public function update($table_name, $fields, $where_condition)  
      {  
           $query = '';  
           $condition = '';  
           foreach($fields as $key => $value)  
           {  
                $query .= $key . "='".$value."', ";  
           }  
           $query = substr($query, 0, -2);  
           
           foreach($where_condition as $key => $value)  
           {  
                $condition .= $key . "='".$value."' AND ";  
           }  
           $condition = substr($condition, 0, -5);  
           
           $query = "UPDATE ".$table_name." SET ".$query." WHERE ".$condition."";  
           if(mysqli_query($this->db, $query))  
           {  
                return true;  
           }  
      } 
  public function Plantinfo($id)
	{
		$result=mysqli_query($this->db,"select plantdetail.*,plant.plantName,plant.plantImage,plant.plantDescription,fert.fertilizerName,soil.soilName,pest.pestName,pest.pestDose,warm.warmName from tbl_plantdetails as plantdetail 
		LEFT join tbl_plantinfo as plant on plant.plantId=plantdetail.plantId  
		LEFT join tbl_fertilizerinfo as fert on fert.fertilizerId=plantdetail.fertilizerId
		LEFT join tbl_soilinfo as soil on soil.soilId=plantdetail.soilId
		LEFT join tbl_pesticideinfo as pest on pest.pestId=plantdetail.pestId
		LEFT join tbl_warminfo as warm on warm.warmId=plantdetail.warmId 
		where plantdetail.plantId='".$id."'");
		$array = array(); 
		while($row = mysqli_fetch_assoc($result))  
			   {  
					$array[] = $row;  
			   }  
		return $array;
	}  
  public function oldervalue($id)
  {
    $result=mysqli_query($this->db,"SELECT plantId FROM tbl_plantdetails where plantId < $id ORDER BY plantId DESC LIMIT 0, 1");
    $array = array(); 
    while($row = mysqli_fetch_assoc($result))  
         {  
          $array[] = $row["plantId"];  
         }  
     return (!empty($array) && $array[0]!="") ? $array[0]:"0";
  }
  public function newvalue($id)
  {
    $result=mysqli_query($this->db,"SELECT plantId FROM tbl_plantdetails where plantId > $id ORDER BY plantId ASC LIMIT 0, 1");
    $array = array(); 
    while($row = mysqli_fetch_assoc($result))  
         {  
          $array[] = $row["plantId"];  
         }  
     return (!empty($array) && $array[0]!="") ? $array[0]:"0";
  }  
  public function plantcomment($id)
  {
	  $result=mysqli_query($this->db,"select forum.*,user.name from tbl_forum as forum 
		LEFT join tbl_user as user on user.uId=forum.uId   
		where forum.plantid='".$id."'");
		$array = array(); 
		while($row = mysqli_fetch_assoc($result))  
			   {  
					$array[] = $row;  
			   }  
		return $array;
  }
  public function comments($id)
  {
	   $result=mysqli_query($this->db,"select forum.*,user.name from tbl_forumanswer as forum 
		LEFT join tbl_user as user on user.uId=forum.uId   
		where forum.fqId='".$id."'");
		$array = array(); 
		while($row = mysqli_fetch_assoc($result))  
			   {  
					$array[] = $row;  
			   }  
		return $array;
  }
  public function Recentplant($id)
  {
	   $result=mysqli_query($this->db,"select * from tbl_plantinfo where plantId !='".$id."'");
		$array = array(); 
		while($row = mysqli_fetch_assoc($result))  
			   {  
					$array[] = $row;  
			   }  
		return $array;
  }
  public function selectColDstoreBooked()
  {
    $result=mysqli_query($this->db,"select * from tbl_coldstorage as cs
    LEFT join tbl_coldstorage_booking as csb on csb.cId=cs.cId  
    LEFT join tbl_user as us on us.uId=csb.uId 
    where cs.uId='".$_SESSION['uid']."' and csb.cId=cs.cId");
    $array = array(); 
    while($row = mysqli_fetch_assoc($result))  
         {  
          $array[] = $row;  
         }  
    return $array;
  }  
}
?>