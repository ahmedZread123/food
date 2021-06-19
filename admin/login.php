
<?php
include "../config\constants.php";

 ?>

 <html>
 <head>
     <title> Login Page</title>

     <link rel="stylesheet" href="../css/admin.css">
 </head>

    <body>

        <div class="login">
            <h1 class="text-center">Login</h1>
            <br><br>


            <br><br>
             <?php
             if(isset($_SESSION['login'])){
               echo $_SESSION['login'] ;
               unset($_SESSION['login'] );
             }
              ?>
            <!-- Login Form Starts HEre -->
            <form action="" method="POST" class="text-center">
            Username: <br>
            <input type="text" name="username" placeholder="Enter Username"><br><br>

            Password: <br>
            <input type="password" name="password" placeholder="Enter Password"><br><br>

            <input type="submit" name="submit" value="Login" class="btn-primary">
            <br><br>
            </form>
            <!-- Login Form Ends HEre -->

        </div>


    <!-- Footer Section Ends -->


    <?php
    if(isset($_POST['submit'])){
      $username =$_POST['username'] ;
      $password =$_POST['password'] ;
      $sql= "select * from admin where username='$username' and password='$password' ";
        $res = mysqli_query($coon ,$sql );
        echo $username;
// $res->num_rows >
      if($res ){

        $_SESSION['login']=$username;
        header("location:index.php");

      }else{
        $_SESSION['login']="<span style ='color:red'>incorrect usernam or Password";
        header("location:login.php");
      }
    }

    include "../layout_admin/footer.php";

     ?>
