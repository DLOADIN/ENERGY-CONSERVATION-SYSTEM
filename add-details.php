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
  <link rel="shortcut icon" href="./image/idCvAAYI-f_logos.png" type="image/x-icon">
  <script src="https://kit.fontawesome.com/14ff3ea278.js" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script src="jsfile.js"></script>
  <title>ENERGY DETAILS</title>
</head>
<body>
  <style>
    #main-contents{
      height: fit-content;
    }
    .caradan-products{
      text-decoration: none;
    }
    .formation-1{
  display: grid;
  grid-template-columns: 130px 700px 150px 300px;
  row-gap: 30px;
  column-gap: 30px;
  padding-top: 10vh;
  }
  textarea{
        padding: 2rem;
        border-top: 2px solid #33622B;
        border-bottom: 2px solid #33622B;
        border-left: 5px solid #33622B;
        border-right: 5px solid #33622B;
        border-radius: 15px;
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
        <h1>ADD DETAILS</h1>
      </div>
      <div class="user-info">
      <div class="gango">
        <?php
          $sql=mysqli_query($con, "SELECT u_name from `admin` WHERE id='$id'");
          $row=mysqli_fetch_array($sql);
          $attorney=$row['u_name'];
          ?>
        <h3 class="my-account-header">
        <?php echo $attorney?>
          </h3>
        <p>USER</p></div>   
        <button name="submit" type="submit" class="btn-3" >
          <a href="logout.php">LOGOUT</a>
        </button>
      </div>       
       </div>
       <div class="catch">
        <form action="" method="post" class="form-form">
          <div class="formation-1">
          <label for="">CONDITION</label>
          <input type="text" name="u_condition" id="" placeholder="CASH POWER'S CONDITION" required>
          <label for="">TODAY'S DATE</label>
          <input type="text" name="u_date" value="<?php echo date('Y-m-d')?>" read-only required>
          <label for="">QUANTITY</label>
          <input type="number" name="u_quantity" id="" placeholder="KWH" required>
        </div>
          <button name="submit" type="submit" class="btn-3" id="button-btn">SUBMIT</a>
          </button>
        </form>
       </div>
      </div>

<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>
<?php 
if(isset($_POST['submit'])){
  $u_condition=$_POST['u_condition'];
  $u_date= date('Y-m-d',strtotime($_POST['u_date']));
  $u_quantity=$_POST['u_quantity'];
  if($u_quantity > 400){
    $status = 'ABNORMAL';
  } else {
    $status = 'NORMAL';
  }
$sql=mysqli_query($con,"INSERT into `electricity` VALUES('','$u_condition','$u_date','$u_quantity','$status')");
if($sql){
  echo "<script>alert('Saved the records successfully')</script>";
}
else{
  echo "<script>alert('Failed to Save your records ')</script>";
}
}
?>