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
  <title>DASHBOARD</title>
</head>
<body>
  <style>
    #main-contents{
      height:200vh;
    }
    .caradan-products{
      text-decoration: none;
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

    <div class="main-content content-right" id="main-contents">
      <div class="header-wrapper">
        <div class="div">
        </div>
        <div class="header-title">
          <h1>DASHBOARD</h1>
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
         <div class="variant">
          <h1>Hello User!</h1>
          <p>Measure How Fast You’re Growing Monthly<br>Recurring performance management.</p>
          <div class="vabriant">
          <h1>Overview</h1>
          <div class="fired-up">
            <div class="a-card">
            <i class="fa-solid fa-bolt"></i>
            <div class="cardan">
            <?php 
            $sql=mysqli_query($con, "SELECT u_quantity FROM electricity ORDER BY u_date DESC LIMIT 1;");
            $row=mysqli_fetch_array($sql);
            $a=$row['u_quantity'];
            ?>
            <h1><?php echo $a ?> Kwh</h1>
            <p>Today</p>
            </div>
            </div>
            <div class="a-card">
            <i class="fa-solid fa-plug"></i>
            <div class="cardan">
            <?php 
            $sql=mysqli_query($con, "SELECT u_quantity FROM electricity ORDER BY u_date ASC LIMIT 1;");
            $row=mysqli_fetch_array($sql);
            $a=$row['u_quantity'];
            ?>
            <h1><?php echo $a ?> Kwh</h1>
            <p>Yesterday</p>
            </div>
            </div>
            <div class="a-card">
            <i class="fa-solid fa-plug"></i>
            <div class="cardan">
            <?php 
            $currentYear = date('Y');
            $currentMonth = date('m');
            $sql=mysqli_query($con, "SELECT u_quantity FROM electricity WHERE YEAR(u_date) = $currentYear AND MONTH(u_date) = $currentMonth ORDER BY u_date DESC LIMIT 1;");
            $row=mysqli_fetch_array($sql);
            $a=$row['u_quantity'];
            ?>
            <h1><?php echo $a ?> Kwh</h1>
            <p>This Month</p>
            </div>
            </div>
            <div class="a-card">
            <i class="fa-solid fa-bolt"></i>
            <div class="cardan">
            <?php 
            $sql=mysqli_query($con, "SELECT SUM(u_quantity) AS u_quantity FROM electricity");
            $row=mysqli_fetch_array($sql);
            $a=$row['u_quantity'];
            ?>
            <h1><?php echo $a ?> Kwh</h1>
            <p>Total</p></div>
            </div>
          </div>
          </div>
         </div>
         <canvas id="myChart"></canvas>
        </div>
        <style>
          .fired-up{
            display:grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            margin-bottom:10vh
          }
          #myChart:hover{
            transform: scale(1.1);
            transition:all 0.6s linear;
          }
          .a-card{
            width:38vh;
            height:14vh;
            justify-items:center;
            align-items:center;
            background-color:#F4F4F4;
            border-radius:9px;
            border: 1.5px solid black;
            opacity:90%;
            display:flex;
            justify-content: center;
            box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2), 0 6px 20px 0 rgba(0,0,0,0.19);
          }
          .a-card i{
            color:#C85151;
            font-size:40px
          }
          #myChart {
            width: 70rem; /* Adjust width as needed */
            height: 50rem; /* Adjust height as needed */
            margin: 0 auto;
            border:0.5px solid black;
            border-radius:13px;
            box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2), 0 6px 20px 0 rgba(0,0,0,0.19);
        }
          .a-card h1{
            font-size:50px;
            color:#C85151;
          }
          .cardan{
            margin: 1rem 0rem 0rem 0rem;
          }
          .vabriant{
            margin: 3rem 0rem 0rem 0rem;
          }
          h1{
            color: #C85151;
            margin: 0 auto;
          }
           p{
            color: #C85151;
            margin:1.0rem 0rem 0rem 0rem;
          }
          .variant{
            margin:0rem 0rem 0rem 3rem;
          }
        </style>
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
<?php
$sql = mysqli_query($con, "SELECT u_date, u_quantity FROM `electricity`");
$dates = array();
$quantities = array();
while ($row = mysqli_fetch_assoc($sql)) {
    $dates[] = $row['u_date'];
    $quantities[] = $row['u_quantity'];
}
?>
<script>
var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: <?php echo json_encode($dates); ?>,
                datasets: [{
                    label: 'POWER USAGE THROUGHOUT THE PROVIDED DATA',
                    data: <?php echo json_encode($quantities); ?>,
                    borderColor: 'rgb(200, 81, 81)',
                    tension: 0.1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                },
                plugins: {
                    legend: {
                        labels: {
                            font: {
                                size: 30,
                                weight: 'bold'
                            }
                        }
                    }
                }
            }
        });
</script>

</body>
</html>
