<?php

if($_SESSION['login']){

}else{
  $_SESSION['login'] = "you must Login first";
  header("location:login.php");
}
