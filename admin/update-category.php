<?php
include "../layout_admin\main.php";
$id = $_GET['id'];
$sql = "select * from category where id='$id'";
$res = mysqli_query($coon , $sql);
if ($res->num_rows > 0) {
  $row = $res->fetch_assoc() ;
  $id= $row['id'] ;
  $title= $row['title'];
  $old_imag_name= $row['image_name'];
  $featured= $row['featured'];
  $active=  $row['active'];

}
 ?>
<div class="main-content">
    <div class="wrapper">
        <h1>Update Category</h1>

        <br><br>


        <form action="" method="POST" enctype="multipart/form-data">

            <table class="tbl-30">
                <tr>
                    <td>Title:</td>
                    <td>
                        <input type="text" name="title" value="<?php echo $title; ?>">
                    </td>
                </tr>

                <tr>
                    <td>Current Image:</td>
                    <td>
                         <?php echo $old_imag_name; ?>
                    </td>
                </tr>

                <tr>
                    <td>New Image:</td>
                    <td>
                        <input type="file" name="image">
                    </td>
                </tr>

                <tr>
                    <td>Featured:</td>
                    <td>
                        <input <?php if($featured == "Yes")echo "checked"; ?>
                         type="radio" name="featured" value="Yes"> Yes

                        <input <?php if($featured == "No")echo "checked"; ?>
                        type="radio" name="featured" value="No"> No
                    </td>
                </tr>

                <tr>
                    <td>Active:</td>
                    <td>
                        <input <?php if($active == "Yes")echo "checked"; ?>
                         type="radio" name="active" value="Yes"> Yes

                        <input <?php if($active == "No")echo "checked"; ?>
                        type="radio" name="active" value="No"> No
                    </td>
                </tr>

                <tr>
                    <td>
                        <input type="hidden" name="current_image" value="">
                        <input type="hidden" name="id" value="">
                        <input type="submit" name="submit" value="Update Category" class="btn-secondary">
                    </td>
                </tr>

            </table>

        </form>


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
    $img_name = $old_imag_name;
  }

  $sql = "update  category SET
  title = '$title',
  image_name = '$img_name',
  featured = '$featured',
  active ='$Active'
  where id='$id'
  ";
  $res = mysqli_query($coon , $sql);
  if($res){
  $_SESSION['admin'] = "category is update";
  header("location:manage-category.php");
  }else{
    $_SESSION['admin'] = "category is not update";
    header("location:manage-category.php");
  }
}
include "../layout_admin/footer.php";

 ?>
