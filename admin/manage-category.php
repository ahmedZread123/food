<?php
include "../layout_admin\main.php";

 ?>
<div class="main-content">
    <div class="wrapper">
        <h1>Manage Category</h1>

        <br>
        <!-- Button to Add Admin -->
        <a href="add-category.php" class="btn-primary">Add Category</a>


        <table class="tbl-full">
            <tr>
                <th>S.N.</th>
                <th>Title</th>
                <th>Image</th>
                <th>Featured</th>
                <th>Active</th>
                <th>Actions</th>
            </tr>
             <?php
             $sql = "select * from category " ;
             $res = mysqli_query($coon , $sql);
             if($res->num_rows>0){
               while ($row = $res->fetch_assoc()) {
                $id= $row['id'] ;
                $title= $row['title'];
                $imag_name= $row['image_name'];
                $featured= $row['featured'];
                $active=  $row['active'];

               ?>
               <tr>
                   <td> <?php echo $id ;  ?></td>
                   <td> <?php echo $title ; ?></td>

                   <td>
                       <img src="<?php echo $imag_name ;?> " width="50px">


                   </td>

                   <td><?php echo $featured ;?></td>
                   <td><?php echo $active ;?></td>
                   <td>
                       <a href="update-category.php?id=<?php echo $id ;  ?>" class="btn-secondary">Update Category</a>
                       <a href="delete-category.php?id=<?php echo $id ;  ?>" class="btn-danger">Delete Category</a>
                   </td>
               </tr>
          <?php

          }
             }
              ?>



            <tr>
                <td colspan="6">
                    <div class="Print">
                      <?php if (isset($_SESSION['admin'])) {
                      echo $_SESSION['admin'];
                      unset($_SESSION['admin']);
                    } ?>
                  </div>
                </td>
            </tr>


        </table>
    </div>

</div>
<?php

include "../layout_admin/footer.php";

 ?>
