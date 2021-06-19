<?php
include "../layout_admin\main.php";

 ?>
<div class="main-content">
    <div class="wrapper">
        <h1>Manage Food</h1>

        <br/><br/>

        <!-- Button to Add Admin -->
        <a href="add-food.php" class="btn-primary">Add Food</a>

        <br/><br/><br/>


        <table class="tbl-full">
            <tr>
                <th>S.N.</th>
                <th>Title</th>
                <th>Price</th>
                <th>Image</th>
                <th>Featured</th>
                <th>Active</th>
                <th>Actions</th>
            </tr>


            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td>
                    <a href="#" class="btn-secondary">Update Food</a>
                    <a href="#" class="btn-danger">Delete Food</a>
                </td>
            </tr>


        </table>
    </div>

</div>

<?php
include "../layout_admin/footer.php";

 ?>
