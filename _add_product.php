<?php
error_reporting(0);
session_start();
if($_SESSION["admin"]!=$_SESSION["user"]){
  header("Location:profile.php");
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Add Product</title>
	<meta charset="UTF-8">
	<link rel="icon" href="image/fevicon.png">
	<link href="https://fonts.googleapis.com/css?family=Noto+Sans|Roboto:400,900" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
	<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
	<script type="text/javascript" src="js/popper.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="css/style.css">

	<style type="text/css">
	   body{
      margin-top: 130px;
     }

    .contents{
      min-height: 450px;
      min-width: 100%;
      border: 1px solid rgba(0,0,0,0.2);
      border-radius: 3px;
      padding:40px 40px 40px 40px;
    }
	</style>

  <script type="text/javascript">
    $(document).ready(function(){

      $(".gen").change(function(){
        if($(this).val()=="men"){
          $(".cat").html("<select name='catg'><option value='tshirt'>tshirt</option><option value='casual_shirt'>casual shirt</option><option value='formal_shirt'>Formal Shirt</option><option value='jacket'>Jacket</option><option value='blazer'>Blazer</option><option value='suit'>Suit</option><option value='jeans'>Jeans</option><option value='casual_trouser'>Casual Trouser</option><option value='formal_trouser'>Formal Trouser</option><option value='shorts'>Shorts</option><option value='track_pant'>Track Pant</option><option value='kurta'>Kurta</option><option value='shervani'>Sherwani</option><option value='nehru_jacket'>Nehru Jacket</option><option value='active_tshirt'>Active Tshirt</option></select>");
        }else{
          $(".cat").html("<select name='catg'><option value='tops'>Tops</option><option value='casual_shirt'>casual shirt</option><option value='tshirt'>TShirt</option><option value='jacket'>Jacket</option><option value='blazer'>Blazer</option><option value='dress'>Dresses</option><option value='jeans'>Jeans</option><option value='trouser'>Trouser</option><option value='formal_trouser'>Formal Trouser</option><option value='shorts'>Shorts</option><option value='skirt'>Skirt</option><option value='kurti'>Kurti</option><option value='suit'>Suit</option><option value='active_tshirt'>Active Tshirt</option></select>");
        }
      });

    });
  </script>
</head>
<body>

	<?php
  require('nav.html');
  ?>



    <div class="inner_cont4">
      <center>
      <div class="container">
        <div class="row">
  


          <div class="col-sm-12">
            <div class="contents">
              <div style="font-size: 20pt; color: rgba(0,0,0,0.5); font-weight: lighter;">Add Product</div><br>
              <hr>

              <br>
              <form enctype="multipart/form-data" method="post" action="_ap_script.php">
              <table cellpadding="0" cellspacing="0" width="500px" style="min-height: 600px">
                <tr>
                  <td>Product id</td>
                  <td><input type="text" name="id" required style="width: 100%"></td>
                </tr>
                <tr>
                  <td>Product title</td>
                  <td><input type="text" name="title" required style="width: 100%"></td>
                </tr>
                <tr>
                  <td>Product brand</td>
                  <td><input type="text" name="brand" required style="width: 100%"></td>
                </tr>
                <tr>
                  <td>Product image</td>
                  <td><input type="file" name="file" required style="width: 100%"></td>
                </tr>
                <tr>
                  <td>Product detail</td>
                  <td><input type="text" name="detail" required style="width: 100%"></td>
                </tr>
                <tr>
                  <td>Gender</td>
                  <td><input type="radio" name="gen" value="men" class="gen">Male &nbsp <input type="radio" name="gen" class="gen" value="women">Female</td>
                </tr>
                <tr>
                  <td>category</td>
                  <td class="cat">
                </td>
                </tr>
                <tr>
                  <td>Color</td>
                  <td><select name="color">
                    <option value="1">White</option>
                    <option value="2">Black</option>
                    <option value="3">Blue</option>
                    <option value="4">Green</option>
                    <option value="5">Red</option>
                    <option value="6">Yellow</option>
                    <option value="7">Brown</option>
                    <option value="8">Orange</option>
                    <option value="9">Mixed</option>
                  </select></td>
                </tr>
                <tr>
                  <td>Size Type</td>
                  <td><select name="sizetyp"><option value="1">S,M,L,XL</option><option value="2">30,31,32</option></select></td>
                </tr>
                <tr>
                  <td>Price</td>
                  <td><input type="text" name="price" required style="width: 100%" placeholder="In Rupees"></td>
                </tr>
                <tr>
                  <td colspan="2" align="right"><input type="submit" name="" value="Add" class="btn btn-info" style="box-shadow:0px 10px 25px 1px rgba(0,0,0,0.1)"></td>
                </tr>
              </table>
              </form>
            </div>
              <br>
              <br>
          </div>

        </div>
      </div>
      </center>
    </div>

    



</body>
</html>