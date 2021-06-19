<?php
include "../layout_admin\main.php";

 ?>
<div class="main-content">
    <div class="wrapper">
        <h1>Add Category</h1>

        <br><br>



        <br><br>

        <!-- Add CAtegory Form Starts -->
        <form action="" method="POST" enctype="multipart/form-data">

            <table class="tbl-30">
                <tr>
                    <td>Title: </td>
                    <td>
                        <input type="text" name="title" placeholder="Category Title">
                    </td>
                </tr>

                <tr>
                    <td>Select Image: </td>
                    <td>
                        <input type="file" name="image">
                    </td>
                </tr>

                <tr>
                    <td>Featured: </td>
                    <td>
                        <input type="radio" name="featured" value="Yes" checked> Yes
                        <input type="radio" name="featured" value="No"> No
                    </td>
                </tr>

                <tr>
                    <td>Active: </td>
                    <td>
                        <input type="radio" name="active" value="Yes" checked> Yes
                        <input type="radio" name="active" value="No"> No
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add Category" class="btn-secondary">
                    </td>
                </tr>

            </table>

        </form>
        <!-- Add CAtegory Form Ends -->


    </div>
</div>

<?php
if(isset($_POST['submit'])){
  $title = $_POST['title'];
  $Active = $_POST['active'] ;
  $featured =$_POST['featured'];
  if(isset($_FILES['image']['name']) && $_FILES['image']['name']!=""){
     $img_name = $_FILES['image']['name'];
     $temp = $_FILES['image']['tmp_name'];


  $ex = explode(".",$img_name) ;
  $en = end($ex);
  $det = "../images/".time()."_".$title.".".$en ;
  $uploded = move_uploaded_file($temp , $det);
  $img_name = $det;
  }
  else{
    $img_name = "../images/pizza.jpg";
  }

  $sql = "insert into category SET
  title = '$title',
  image_name = '$img_name',
  featured = '$featured',
  active ='$Active'
  ";
  $res = mysqli_query($coon , $sql);
  if($res){
  $_SESSION['admin'] = "category is added";
  header("location:manage-category.php");
  }else{
    $_SESSION['admin'] = "category is not added";
    header("location:manage-category.php");
  }
}

include "../layout_admin/footer.php";

 ?>
