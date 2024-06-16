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
  <title>REPORT</title>
</head>
<body>
  <style>
    #main-contents{
      height: fit-content;
    }
    table{
    margin:0 auto;
    padding: 1vh;
    border-radius:14px;
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
        <li>
          <!-- <a href="messages.php">
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
          <h1>VIEW REPORT</h1>
        </div>
        <style>
          *{
            margin:0;
            padding:0;
            box-sizing:border-box;
          }
          .box{
            width:fit-content;
            height:50px;
            background:#C85151;
            border-radius:30px;
            display:flex;
            align-items:center;
            padding:20px;
          }

          form input[type='text']{
            border-radius:13px;
            border:none;
            width:30rem;
            height:2rem;
            padding-left:2rem
          }

          .box > i{
            font-family:20px;
            color:#777;
          }
          .box i{
            font-size:20px;
          }

          .box > input{
            flex:1;
            height:40px;
            border:none;
            outline:none;
            font-size:18px;
          }
          .formed-button{
            padding:0rem 3rem;
            height:30px;
            border:1px solid black;
            border-radius:5px;
          }
        </style>
        <div class="header-title">
          <div class="box">
          <i class="fa-solid fa-magnifying-glass"></i>
          <form method="GET">
            <input type="text" name="search">
            <button type="submit" class="formed-button">SEARCH</button>
        </form>
          </div>
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
        <div class="new-amounts"> 
        <table>
          <tr>
            <th>#</th>
            <th>CONDITION</th>
            <th>DATE</th>
            <th>QUANTITY</th>
            <th>STATUS</th>
            <th>DELETE</th>
            </tr>
          <?php
          $search = '';
          if(isset($_GET['search'])) {
              $search = $_GET['search'];
          }
          $sql = "SELECT * FROM `electricity`";
          if(!empty($search)) {
              $sql .= " WHERE 
                          `u_condition` LIKE '%$search%' OR 
                          `u_date` LIKE '%$search%' OR 
                          `u_quantity` LIKE '%$search%' OR 
                          `u_status` LIKE '%$search%'";
          }
          
          $sql .= " ORDER BY `u_date` DESC";
          $result = mysqli_query($con, $sql);
          
          if(mysqli_num_rows($result) > 0) {
              $number = 0;
              while($row = mysqli_fetch_assoc($result)) {
                  $number++;
          ?>
          <tbody>
          <tr>
            <td><?php echo $number;?></td>
            <td><?php echo $row['u_condition']?></td>
            <td><?php echo $row['u_date']?></td>
            <td><?php echo $row['u_quantity']?></td>
            <td><?php echo $row['u_status']?></td>
            <td>
              <button class="lebutton" onclick="alert('Are You Really Sure You Want To Delete This')"><a style="color: red;" href="delete.php?id=<?php echo $row['id']?>">DELETE</a></button>
            </td>
            <?php
      }}
      ?>
        </tr></tbody>
      </table>
      <button class="abtn-1" id="abtni-1"><a href="./pdf/viewpdf.php">PRINT</a></button>
         </div>
         
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>
