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
  <title>FUTURE PREDICTIONS</title>
</head>
<body>
  <style>
    #main-contents{
      height: 180vh;
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
          <h1>HAVE A LOOK ON FUTURE PREDICTIONS</h1>
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
          <h1>Save Your Energy!</h1>
          <p>Measure How Fast You’re Growing Monthly Recurring<br> performance management.</p>
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
          </div>
         </div>
        <div class="fardays"><canvas id="myChart"></canvas>
          <div class="crashed">
                <h1>Tips</h1>
                <div class="grider">
                  <div class="fail">
                    <i class="fa-solid fa-lightbulb"></i>
                  <div class="failed">
                    <h2>Turn off  lights</h2>
                    <h6>Illuminate Responsibly, Save Power Daily.</h6>
                  </div>
                </div>
                  <div class="fail">
                    <i class="fa-solid fa-temperature-arrow-down"></i>
                  <div class="failed">
                    <h2>Optimize Heating/Cooling</h2>
                    <h6>Comfort with Conservation, Set Smartly.</h6>
                  </div>
                </div>
                  <div class="fail">
                    <i class="fa-solid fa-temperature-arrow-up"></i>
                  <div class="failed">
                    <h2>Limit Hot Water Usage</h2>
                    <h6>Set your water heater to a lower temperature</h6>
                  </div>
                </div>
                  <div class="fail">
                    <i class="fa-solid fa-battery-three-quarters"></i>
                  <div class="failed">
                    <h2>Unplug Devices</h2>
                    <h6>Cut the Cord, Trim your Energy Bill.</h6>
                  </div>
                </div>
            </div>
          </div>
        </div>
         </div>
        <style>
          .fardays{
            display: flex;
            margin:0 auto;
            
          }
          .grider{
            display: grid;
          }
          .fired-up{
            display:grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            margin-bottom:10vh
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
          .crashed h1{
            font-size:46px;
            text-align: left;
            color: black;
            padding-left:3rem;
          }
          .crashed{
            height:fit-content;
            width:fit-content;
            margin: 0rem 3rem 0rem 3rem;
            background-color:#F2F5F6;
            border-radius:9px;
            border: 1.5px solid black;
            display:grid;
            justify-content: left;
            box-shadow: 0 6px 10px 0 rgba(0,0,0,0.2), 0 9px 20px 0 rgba(0,0,0,0.19);
          }
          .fail{
            display:flex;
            padding:2rem;
          }
          .fail i{
            color:black;
            font-size:60px
          }
          .failed{
            padding: 0rem 0rem 0rem 2rem;
          }
          #myChart:hover{
            transform: scale(1.1);
            transition:all 0.6s linear;
          }
          #myChart {
            width: 20rem; /* Adjust width as needed */
            height: 20rem; /* Adjust height as needed */
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
// Fetch data from the query result and store it in $dates and $quantities arrays
// Define the number of future months to predict
$num_future_months = 6; // For example, predict data for the next 6 months

// Fetch data from the query result and store it in $dates and $quantities arrays
$sql = mysqli_query($con, "SELECT u_date, u_quantity FROM `electricity`");
$dates = array();
$quantities = array();
while ($row = mysqli_fetch_assoc($sql)) {
    $dates[] = $row['u_date'];
    $quantities[] = $row['u_quantity'];
}

// Predict future dates
$last_date = end($dates);
for ($i = 1; $i <= $num_future_months; $i++) {
    $future_date = date('Y-m', strtotime("+$i month", strtotime($last_date)));
    $dates[] = $future_date;
}

// Exponential smoothing to predict future quantities
function exponential_smoothing($series, $alpha, $num_future_months) {
    $smoothed = array();
    $smoothed[0] = $series[0];
    for ($i = 1; $i < count($series); $i++) {
        $smoothed[$i] = $alpha * $series[$i] + (1 - $alpha) * $smoothed[$i - 1];
    }
    $forecast = array();
    $last_value = end($series);
    for ($i = 0; $i < $num_future_months; $i++) {
        $forecast[] = $alpha * $last_value + (1 - $alpha) * end($smoothed);
        $last_value = end($forecast);
    }
    return $forecast;
}

$alpha = 0.2; // You can adjust this parameter based on your data characteristics

// Perform exponential smoothing to predict future quantities
$future_quantities = exponential_smoothing($quantities, $alpha, $num_future_months);

?>
<script>
    var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: <?php echo json_encode(array_merge($dates, array_fill(0, $num_future_months, ''))); ?>,
                datasets: [{
                    label: 'FUTURE PREDICTIONS',
                    data: <?php echo json_encode(array_merge($quantities, $future_quantities)); ?>,
                    borderColor: 'rgb(200, 81, 81)',
                    tension: 0.1 // Adjust tension for curved lines
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
                                size: 30, // Set font size
                                weight: 'bold' // Set font weight
                            }
                        }
                    }
                }
            }
        });
    </script>
</script>
</body>
</html>
