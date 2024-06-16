<?php
  require "connection.php";
  if(!empty($_SESSION["id"])){
  $id = $_SESSION["id"];
  $check = mysqli_query($con,"SELECT * FROM `admin` WHERE id=$id ");
  $row = mysqli_fetch_array($check);
  }
  else{
  header('location:loginadmin.php');
  } 
?>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./CSS/newfriend.css">
  <link rel="stylesheet" href="./CSS/another-one.css">
  <link rel="stylesheet" href="./CSS/form.css">
  <link rel="shortcut icon" href="./image/idCvAAYI-f_logos.png" type="image/x-icon">
  <script src="https://kit.fontawesome.com/14ff3ea278.js" crossorigin="anonymous"></script><link rel="shortcut icon" href="../images/🇷🇼.jpeg" type="image/x-icon">
  <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
  <script src="jsfile.js"></script>
  <title>YOUR PERSONAL DETAILS</title>
</head>
<body>
  <style>
    #main-contents{
      height: 250vh;
    }
    .formation-1{
      display: grid;
      grid-template-columns: 130px 700px 150px 300px;
      row-gap: 30px;
      column-gap: 30px;
      padding-top: 10vh;
      }
      .btn-3{
        background:#C85151;
      }
  </style>
<div class="sidebar" id="sidebar">
      <ul class="menu">
        <div class="logout">
        <li>
          <a href="dashboard.php">
            <i class="fa-solid fa-house-chimney"></i>
            <span>DASHBOARD</span>
          </a>
        </li>
        <li>
          <a href="add-details.php">
            <i class="fa-solid fa-suitcase"></i>
            <span>ADD DETAILS</span>
          </a>
        </li>
        <li>
          <a href="report.php">
            <i class="fa-solid fa-people-group"></i>
            <span>REPORT</span>
          </a>
        </li>
        <li>
          <a href="future-prediction.php">
          <i class="fa-brands fa-red-river"></i>
            <span>FUTURE PREDICTION</span>
          </a>
        </li>
        <!-- <li>
          <a href="messages.php">
          <i class="fa-solid fa-message"></i>
            <span>MESSAGING</span>
          </a>
        </li> -->
        <li>
          <a href="notifications.php">
          <i class="fa-solid fa-bell"></i>
            <span>NOTIFICATIONS</span>
          </a>
        </li>
        <li>
          <a href="index.html">
          <i class="fa-solid fa-globe"></i>
            <span>HOME</span>
          </a>
        </li>
        <li>
          <a href="carbon.php">
          <i class="fa-solid fa-shoe-prints"></i>
            <span>CARBON FOOTPRINT</span>
          </a>
        </li>
        <li>
          <a href="profile.php">
            <i class="fa-solid fa-gear"></i>
            <span>SETTINGS</span>
          </a>
        </li>
      </div>
    </ul>
  </div>

  <div class="main-content" id="main-contents">
    <div class="header-wrapper">
      <div class="div">
      </div>
      <div class="header-title">
      <h2 class="h2">SETTINGS</h2>
      </div>
      <div class="user-info">
      <div class="gango">
        <?php
          $sql=mysqli_query($con, "SELECT u_name from `admin` WHERE id='$id' ");
          $row=mysqli_fetch_array($sql);
          $attorney=$row['u_name'];
          ?>
        <h3 class="my-account-header">
        <?php echo $attorney ?>
          </h3>
        <p>User</p></div> 
        <button name="submit" type="submit" class="btn-3" >
          <a href="logout.php">LOGOUT</a>
        </button>
      </div>       
       </div>
       <div class="modd">
       <div class="hastings-1 ">
        <H1>YOUR OVERALL INFORMATION</H1>
        <?php
        $sql=mysqli_query($con,"SELECT * FROM `admin` WHERE id='$id' ");
        $row = mysqli_num_rows($sql);
        if($row){
          while($row=mysqli_fetch_array($sql))
          { ?>
        <form action="" method="post" class="formation">
          <div class="real-form">
            <label for="">YOUR NAMES</label>
            <input type="text" name="u_name" value="<?php echo $row['u_name']?>" required></DIV>
          <div class="real-form">
            <label for="">POWER LINE NUMBER</label>
            <input type="text" name="u_phonenumber" required maxlength="15" value="<?php echo $row['u_phonenumber']?>">
            <label for="">PASSWORD</label>
            <input type="text" name="u_password" required value="<?php echo $row['u_password']?>">
          </div>
          <div class="real-form">
            
            <button name="submit" type="submit" class="btn-2" id="btns">UPDATE</button></div>
            <?php
            } 
          }?>
        </form>
      </div>

       <div class="hastings-1 another-hastings">
        <H2>Fill This Form To Set Budget Projection</H2>
        <form action="" method="post" class="formation">
          <div class="real-form">
            <label for="">START DATE</label>
            <input type="date" name="u_startdate" required maxlength="15" value="<?php echo date('Y-m-d')?>">
            <label for="">END DATE</label>
            <input type="date" name="u_enddate" required placeholder="END DATE" required>
          </div>
          <div class="real-form">
            <label for="">BUDGET</label>
            <input type="text" name="u_name" placeholder="PROJECTED BUDGET" required>
        </div>
          <div class="real-form">
            <label for="">REMINDER</label>
            <input type="date" name="u_reminddate" required placeholder="END DATE" required>
            <button name="typeshit" type="submit" class="btn-2" id="btns">SUBMIT</button></div>
        </form>
      </div>
      </div>
      </div>

<?php 
  if(isset($_POST['typeshit'])){
    $u_startdate = $_POST['u_startdate'];
    $u_enddate = $_POST['u_enddate'];
    $u_name = $_POST['u_name'];
    $u_reminddate = $_POST['u_reminddate'];
    $sql = "INSERT into budget VALUES('','$u_startdate','$u_enddate','$u_name','$u_reminddate')";
    $query = mysqli_query($con, $sql);
    if($query){
      echo "<script>alert('Inserted Successfully')</script>";
    }
    else{
      echo "<script>alert('failed to update')</script>";
    }
  }
?>
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
<style>
.btn-2{
  margin:0 auto;
  background-color:#C85151;
}

.modd{
  margin:0 auto;
}
.hastings-1{
  margin: 0 auto;
  padding:1rem;
  width: 170vh;
  height:65vh;
  border-radius: 20px;
  background-color: #ecebf3;
  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2), 0 6px 20px 0 rgba(0,0,0,0.19);
}
.another-hastings{
  margin: 0 auto;
  margin-top: 5vh;
  padding:1rem;
}
</style>
</body>
</html>

<?php
  if(isset($_POST['submit'])){
    $name = $_POST['u_name'];
    $phonenumber = $_POST['u_phonenumber'];
    $password = $_POST['u_password'];
    $sql=mysqli_query($con,"UPDATE `admin` SET u_name='$name', u_phonenumber='$phonenumber',u_password='$password' WHERE id='$id' ");
    
    if($sql){
      echo "<script>alert('Updated Successfully')</script>";
    }
    else{
      echo "<script>alert('failed to update')</script>";
    }
  }
?>

