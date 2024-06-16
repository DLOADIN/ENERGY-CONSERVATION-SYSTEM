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
  <script src="../JS/js.js"></script>
  <title>NOTIFICATIONS</title>
  
</head>
<body>
  <style>
    #main-contents{
      height: fit-content;
    }
    table{
    margin:0 auto;
    padding: 1vh;
    border-radius:14px
  }
  th{
    padding: .3rem;
    color:black;
    background-color:#C85151;
  }
  td{
    font-weight:bolder;
    font-size:17px;
    padding-left: 13vh;
    padding-top: 2vh;
    background-color: rgb(248, 246, 246);
    opacity:1890%;
    color:#C85151;
  }
  #abtni-1{
  background: #C85151;
  width:fit-content;
  height:fit-content;
  padding:15px 50px;
  border-radius: 20px;
  margin-top:4vh;
  margin-left:5vh;
}
#abtni-1 a{
  color:white;
  font-size:16px;
  text-decoration:none;
}

.lebutton a{
  text-decoration: none;
  color:#33622B;
}

.new-amounts{
  height:270vh
}
.lebutton {
    border-radius: 40px;
    width:100%;
    height: 38px;
    border: none;
    outline: none;
    cursor: pointer;
    font-size: 1em;
    font-weight: 800;
    border-radius: 15px;
    background-color: rosybrown;
    padding: 1rem 3rem 2rem 3rem;
    margin-bottom: .5rem;
    margin-right: 1rem;
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
          <h1>NOTIFICATIONS</h1>
        </div>
        <div class="user-info">
        <div class="gango">
          <?php
            $sql=mysqli_query($con, "SELECT u_name from `admin` WHERE id='$id'");
            $row=mysqli_fetch_array($sql);
            $attorney=$row['u_name'];
            ?>
          <h2 class="my-account-header">
          <?php echo $attorney?>
            </h2>
          <p>User</p></div> 
          <button name="submit" type="submit" class="btn-3" >
            <a href="logout.php">LOGOUT</a>
          </button>
      </div>
</div>
<div class="amount">
  <h1>RECENT</h1>
  <div class="carddan">
    <div class="i-card">
    <i class="fa-solid fa-bell"></i>
      <div class="carr">
        <?php
        $sql = mysqli_query($con, "SELECT SUM(u_quantity) AS total_consumption FROM electricity");
        $row = mysqli_fetch_array($sql);
        $total_consumption = $row['total_consumption'];

        // Example threshold, you can adjust this according to your needs
        $threshold = 200;
        if ($total_consumption > $threshold) {
    echo '<h2>Usage Alert</h2>';
    echo '<p>Your energy consumption has exceeded the threshold set for today.<br>Check your usage and identify potential energy drains.</p>';
  } else {
    echo '<p>No usage alert at the moment.</p>';
  }
  ?>
      </div>
      <h2><?php echo date('H:i'); ?></h2>
    </div>
  </div>
</div>
<div class="amount">
  <h1>BUDGETING NOTIFICATION</h1>
  <div class="carddan">
    <div class="i-card">
    <i class="fa-solid fa-bell"></i>
      <div class="carr">
        <?php
        $sql = mysqli_query($con, "SELECT u_enddate AS end_date FROM budget");
        $row = mysqli_fetch_array($sql);
        $enddate = $row['end_date'];
        $today_date = date('Y-m-d');
        // Check if end date is in the future
        if ($enddate > $today_date) {
          echo '<h2>End Date Alert</h2>';
          echo '<p>Your Budgeting end date is approaching. It is on ' . $enddate .'
          <br>Be on the lookout for potential energy drain.
          .</p>';
        }
        ?>
      </div>
      <?php 
      $sql=mysqli_query($con, "SELECT u_reminddate FROM budget");
      $row=mysqli_fetch_array($sql);
      $startdate=$row['u_reminddate'];?>
      <h2>
        <?php echo $startdate;?>
      </h2>
      <?php 
      $date= date('Y-m-d');
      $sql=mysqli_query($con, "SELECT u_enddate FROM budget");
      $row=mysqli_fetch_array($sql);
      $enddate=$row['u_enddate'];
      if($enddate <= $date){
        $wq=mysqli_query($con,"DELETE * FROM budget WHERE u_enddate <= $date");
      }
      ?>
    </div>
  </div>
</div>

  <style>
    .carr{
      gap:3rem;
    }
    .i-card{
      display: flex;
      flex:3 4 auto;
      line-height:2;
      justify-content: space-evenly;
      justify-items: stretch;
    }
    .carddan{
      margin:3rem 0rem 0rem 0rem;
    }
    .i-card i{
      color:red;
      font-size:60px
    }
    .amount h1{
      margin:0rem 0rem 0rem 2rem;
      color:#C85151;
    }
  </style>
         
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>
