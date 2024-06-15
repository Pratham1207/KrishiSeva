<?php
include_once("include/function.php");
$fetchdata=new DB_con();
if(!isset($_SESSION['login'])){ echo "<script>window.location='index.php';</script>"; }
?>
<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Plant Diseases - <?php echo $project;  ?></title>
    <meta name="robots" content="noindex, follow" />
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="assets/images/favicon.ico">

    <!-- CSS
	============================================ -->
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/css/vendor/bootstrap.min.css">
    <!-- FontAwesome -->
    <link rel="stylesheet" href="assets/css/vendor/font.awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="assets/css/vendor/ionicons.min.css">
    <!-- Slick CSS -->
    <link rel="stylesheet" href="assets/css/plugins/slick.min.css">
    <!-- Animation -->
    <link rel="stylesheet" href="assets/css/plugins/animate.min.css">
    <!-- jQuery Ui -->
    <link rel="stylesheet" href="assets/css/plugins/jquery-ui.min.css">
    <!-- Nice Select -->
    <link rel="stylesheet" href="assets/css/plugins/nice-select.min.css">
    <!-- Magnific Popup -->
    <link rel="stylesheet" href="assets/css/plugins/magnific-popup.css">
	<link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.min.css">
    <!-- Vendor & Plugins CSS (Please remove the comment from below vendor.min.css & plugins.min.css for better website load performance and remove css files from the above) -->

    <!-- <link rel="stylesheet" href="assets/css/vendor/vendor.min.css">
    <link rel="stylesheet" href="assets/css/plugins/plugins.min.css"> -->

    <!-- Main Style CSS (Please use minify version for better website load performance) -->
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- <link rel="stylesheet" href="assets/css/style.min.css"> -->
</head>

<body>

    <div class="contact-wrapper">
       <?php include 'include/header.php'; ?>
        <!-- Breadcrumb Area Start Here -->
        <div class="breadcrumbs-area position-relative">
            <div class="container">
                <div class="row">
                    <div class="col-12 text-center">
                        <div class="breadcrumb-content position-relative section-content">
                            <h3 class="title-3">Plant Diseases</h3>
                            <ul>
                                <li><a href="index.html">Home</a></li>
                                <li>Plant Diseases</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Breadcrumb Area End Here -->
        <!-- Wishlist main wrapper start -->
        <div class="wishlist-main-wrapper mt-no-text mb-no-text">
            <div class="container container-default-2 custom-area">
                <div class="row">
                    <div class="col-lg-12 text-center">
                       
                        <!-- Wishlist Table Area -->
						<h2>Identify plants and plant diseases</h2>
						<h6></h6>
						<br/>
                        <br/>
                            <center>    
                            <form  method="post" enctype="multipart/form-data">   
                            <div class="col-md-6 col-custom">
                                    <div class="input-item mb-4">
                                        <input class="border rounded-0 w-100 input-area name" type="file" name="image" id="con_name" placeholder="Name" required="">
                                    </div>
                            </div>
                             <br/>       
                            <div class="col-12 col-custom mt-40">
                                <button type="submit" name="btnsave" class="btn obrien-button primary-btn rounded-0 mb-0">Upload Image</button>
                            </div>
                            </form>
                            </center>
                        <br/>
                        <?php 
                            if(isset($_REQUEST["btnsave"]))
                            {
                              $name=$_FILES['image']['name'];
                              $data="";
                               $res=mysqli_query($fetchdata->db,"select * from tbl_plantdieases where plantImage='".$name."'");
                               if(mysqli_num_rows($res)>0)
                               {
                                  while($row=mysqli_fetch_array($res))
                                    { $data=$row["description"]; }  
                                 // $datas=str_replace("'", "\'", json_decode($data,true));
                                 $datas=json_decode($data,true);

                               }
                               else {
                                if(is_uploaded_file($_FILES['image']['tmp_name'])) 
                                {
                                    $sourcePath = $_FILES['image']['tmp_name'];
                                    $ext = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
                                    $rand=date('Ymdhis')."plant";
                                    $targetPath = "assets/demo/".$rand.".".$ext;
                                    $photo=$rand.".".$ext;
                                    move_uploaded_file($sourcePath,$targetPath);
                                  }
                                // $data=identifyPlants([$targetPath]);
                                 $datas=json_decode($data,true);
                                 
                                 $datas=str_replace("'", "\'", json_decode($data,true));
                                 mysqli_query($fetchdata->db,"Insert into tbl_plantdieases (plantImage,description) values ('".$photo."','".mysqli_real_escape_string($fetchdata->db,$data)."')"); 
                         }        

                       if($datas!="false" && $datas!="" && $datas!=null) {          
                       ?>
                       <table border="1" width="80%" class="table cell-border">
                        <tr>
                            <td colspan="2"><img src="<?php print_r($datas["images"][0]["url"]); ?>" /> </td>

                        </tr>
                        <tr>
                            <td colspan="2"><h2><?php print_r($datas["suggestions"][0]["plant_name"]); ?></h2> </td>

                        </tr>
                        <tr>
                            <td colspan="2">
                              <h5>Common Name</h5>
                              <?php $cname=json_encode($datas["suggestions"][0]["plant_details"]["common_names"]);  echo str_replace('"', "",str_replace(array('[',']'),'',$cname)); 
                              ?>
                              
                            </td>

                        </tr>
                        <td colspan="2">
                              <h5>Description</h5>
                              <?php print_r($datas["suggestions"][0]["plant_details"]["wiki_description"]["value"]);
                              ?>
<br/>
                              <a href="<?php print_r($datas["suggestions"][0]["plant_details"]["url"]); ?>" target="_blank"><b>For More Detail </b></a>
                            </td>

                        </tr>
                        <td colspan="2" align="center">
                              <h5>Taxonomy</h5>
                              <table width="30%">
                                <?php  $array=$datas["suggestions"][0]["plant_details"]["taxonomy"];   
                         foreach($array as $key=>$v) { 
                            echo "<tr><th>".ucwords($key)."</th><td> : ".$v."</td></tr>";
                               }  ?>
                             </table>
                              </td>

                        </tr>
                        <td colspan="2">
                              <h5>Synonyms</h5>
                               <?php  $array=$datas["suggestions"][0]["plant_details"]["synonyms"];   
                         foreach($array as $key) { 
                            echo ucwords($key)."<br/>";
                               }  ?>
                             
                           </td>

                        </tr>
                        <?php
                         $array=$datas["health_assessment"]["diseases"];   
                         foreach($array as $key) { ?>  
                             <tr style="background-color: crimson; color: #fff"><td colspan="2"><< --- --- << --- << Disease/Treatment >> --- >> --- ---  >></td></tr>
                        <tr>
                            <th>Name</th><td><?php echo $key["name"]; ?></td>
                        </tr>
                        <tr>
                            <td><img src='<?php echo $key["similar_images"][0]["url_small"]; ?>'/> </td>
                            <td><img src='<?php echo $key["similar_images"][1]["url_small"]; ?>'/></td>
                        </tr>
                           <tr>
                            <th>Disease Name</th>
                            <td><?php echo $key["disease_details"]["name"]; ?></td>
                        </tr>   
                        <tr>
                            <td colspan="2"><p><b>Disease Details</b></p><?php echo $key["disease_details"]["description"]; ?></td>
                        </tr>
                        <tr>

                            <td colspan="2"> 
                             <table width="100%" class="table cell-border" style="background-color: antiquewhite;">
                                        <tr>
                                             <th colspan="2" style="background-color: darkcyan;
 color: #fff"> Treatment</th>
                                        </tr>
                                        <tr><th width="50%">Prevention</th>
                                            <th width="50%">Biological</th>
                                         </tr>   
                                        <tr>
                            <td width="50%"><?php 
                                     if(isset($key["disease_details"]["treatment"]["prevention"]))
                                     {   
                                    $d=json_encode($key["disease_details"]["treatment"]["prevention"]);
                                   echo ($d!="" && $d!=null) ? str_replace('"', "",str_replace(array('[',']'),'',$d)):"-";
                               } else { echo "-";}
                             ?></td>
                            <td width="50%"><?php
                                      if(isset($key["disease_details"]["treatment"]["biological"]))
                                      {          
                                     $b=json_encode($key["disease_details"]["treatment"]["biological"]);
                                echo ($b!="" && $b!=null) ? str_replace('"', "",str_replace(array('[',']'),'',$b)):"-";
                                        } else {
                                            echo "-";
                                        }     
                             ?></td>
                        </tr>
                             </table>       
                            </td>
                        </tr>

                        
                    <?php } ?>
                       </table>
                      <?php } } ?> 
                    </div>
                </div>
            </div>
        </div>
        <!-- Wishlist main wrapper end -->
         <?php include 'include/footer.php'; ?>
<?php

function encodeImages($images){
    $encoded_images = array();
    foreach($images as $image){
        $encoded_images[] = base64_encode(file_get_contents($image));
    }
    return $encoded_images;
}
function identifyPlants($file_names){
    $encoded_images = encodeImages($file_names);
    $api_key = "T0qXZvzc8KU0Pp5BnV6tWhcWDOIyZYO3VuV8IJ3LXz1ldGrmi6";
    $params = array(
        "api_key" => $api_key,
        "images" => $encoded_images,
        // modifiers docs: https://github.com/flowerchecker/Plant-id-API/wiki/Modifiers
        "modifiers" => ["crops_fast", "similar_images", "health_all", "disease_similar_images"],
        "plant_language" => "en",
        // plant details docs: https://github.com/flowerchecker/Plant-id-API/wiki/Plant-details
        "plant_details" => array("common_names",
                            "url",
                            "name_authority",
                            "wiki_description",
                            "taxonomy",
                            "synonyms"),
        // disease details docs: https://github.com/flowerchecker/Plant-id-API/wiki/Disease-details
        "disease_details" => array("common_names", "url", "description"),
        );
    $params = json_encode($params);
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'https://api.plant.id/v2/identify');
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array("Content-Type:application/json"));
    $result = curl_exec($ch);

    return $result;
}
?>

</body>

</html>