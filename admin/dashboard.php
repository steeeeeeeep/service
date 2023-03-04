<?php 
require_once "../scripts/session.php";
include_once "../scripts/db_conn.php"; 


if (!isset($_SESSION['username'])) {
  $_SESSION['msg'] = "You must log in first";
  header('location: index.php');
}
if (isset($_GET['logout'])) {
  session_destroy();
  unset($_SESSION['username']);
  header("location: index.php");
}
if(!ISSET($_SESSION['admin_id']))
  {
    header('location:index.php');
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="../images/Logo-Title.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/
	bootstrap.min.css" rel="stylesheet" integrity=
	"sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" 
	crossorigin="anonymous">
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="../css/loader.css">
    <link rel="stylesheet" href="../css/reqs.css">
    <link rel="stylesheet" href="../css/nav.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <title>WorkGO/Admin</title>
</head>
<style>
  .side-bar{
  grid-template-rows: 0fr 0fr 1fr 0fr 0fr;
}
</style>
<body onload="loadingPage()" style="margin:0">

<?php 
include_once "../include/admin_header.php"?>

	<div class="container-fluid">
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="dashboard">
                    <div id="box1" class="danger"><div class="icon"><i class="fa fa-bar-chart"></i></div><span>Daily Booking</span></div>
                    <div id="box2" class="info1"><div class="icon"><i class="fa fa-users"></i></div><span>Weekly Booking</span></div>
                    <div id="box3" class="warning"><div class="icon"><i class="fa fa-graph"></i></div><span>Monthly Booking</span></div>
                </div>
            </div><br>
            <div class="main3">
                <div class="panel">
                  <?php // Fetch bookings per month
                    $month = mysqli_query($db_home_service_111, "SELECT DATE_FORMAT(sched_date, '%M-%Y') AS month, COUNT(*) AS count FROM bookings GROUP BY month ORDER BY month ASC;");
                    $bookingsPerMonth = [];
                    while ($row = mysqli_fetch_assoc($month)) {
                        $bookingsPerMonth[$row['month']] = $row['count'];
                    }

                    // Fetch bookings per week
                    $week = mysqli_query($db_home_service_111, "SELECT YEAR(sched_date) AS year, WEEK(sched_date) AS week, COUNT(*) AS count FROM bookings GROUP BY year, week ORDER BY year ASC, week ASC;");
                    $bookingsPerWeek = [];
                    while ($row = mysqli_fetch_assoc($week)) {
                        $bookingsPerWeek[$row['year'] . '- Week ' . $row['week']] = $row['count'];
                    }

                    // Fetch bookings per day
                    $days = mysqli_query($db_home_service_111, "SELECT sched_date AS day, COUNT(*) AS count FROM bookings GROUP BY day ORDER BY day ASC;");
                    $bookingsPerDay = [];
                    while ($row = mysqli_fetch_assoc($days)) {
                        $bookingsPerDay[$row['day']] = $row['count'];
                    }
                  ?>
                    <div class="container 1" id="con1">
                        <div class="daily-booking">
                            <h5>Daily Bookings</h5>
                            <div class="graph">
                                <canvas id="daily"></canvas>

                                <script>
                                    const daily = document.getElementById('daily');
                                  
                                    new Chart(daily, {
                                      type: 'bar',
                                      data: {
                                        labels: <?php
                                            $startDate = new DateTime('2023-01-01');
                                            $endDate = new DateTime();
                                            $interval = DateInterval::createFromDateString('1 day');
                                            $period = new DatePeriod($startDate, $interval, $endDate);
                                            $labels = array();
                                            foreach ($period as $dt) {
                                              $labels[] = $dt->format("M d");
                                            }
                                            echo json_encode($labels);
                                            ?>,
                                        datasets: [{
                                          label: 'No. of Bookings per Day',
                                          data: <?php echo json_encode(array_values($bookingsPerDay)); ?>,
                                          borderWidth: 1,
                                              backgroundColor: 'rgba(255, 99, 132, 0.2)',
                                              borderColor: 'rgba(255, 99, 132, 1)',
                                              pointBackgroundColor: 'rgba(255, 99, 132, 1)',
                                              pointBorderColor: '#fff',
                                              pointHoverBackgroundColor: '#fff',
                                              pointHoverBorderColor: 'rgba(255, 99, 132, 1)'
                                      }]
                                      },
                                      options: {
                                        scales: {
                                          y: {
                                            beginAtZero: true,
                                            suggestedMax: <?php echo (max($bookingsPerDay) + 2); ?>,
                                            grid: {
                                               color: 'gray' // Set the color of the y-axis grid lines
                                              }
                                            }
                                          }
                                        }
                                    });
                                  </script>
                                

                                <span>Rate of Booking per Day</span>
                            </div>
                        </div>
                    </div>
                    <div class="container 2" id="con2" style="display:none">
                        <div class="week-booking">
                            <h5>Weekly Bookings</h5>
                            <div class="graph">
                                <canvas id="week"></canvas>

                                <script>
                                    const weekly = document.getElementById('week');
                                  
                                    new Chart(weekly, {
                                      type: 'bar',
                                      data: {
                                        labels:  <?php
                                            $startDate = new DateTime('2023-01-01');
                                            $endDate = new DateTime();
                                            $interval = DateInterval::createFromDateString('1 week');
                                            $period = new DatePeriod($startDate, $interval, $endDate);
                                            $labels = array();
                                            foreach ($period as $dt) {
                                              $labels[] = $dt->format("M d");
                                            }
                                            echo json_encode($labels);
                                            ?>,
                                        datasets: [{
                                          label: 'No. of Bookings per Week',
                                          data: <?php echo json_encode(array_values($bookingsPerWeek)); ?>,
                                          borderWidth: 1,
                                              backgroundColor: 'rgba(255, 99, 132, 0.2)',
                                              borderColor: 'rgba(255, 99, 132, 1)',
                                              pointBackgroundColor: 'rgba(255, 99, 132, 1)',
                                              pointBorderColor: '#fff',
                                              pointHoverBackgroundColor: '#fff',
                                              pointHoverBorderColor: 'rgba(255, 99, 132, 1)'
                                      }]
                                      },
                                      options: {
                                        scales: {
                                          y: {
                                            beginAtZero: true,
                                            grid: {
                                               color: 'gray' // Set the color of the y-axis grid lines
                                              }
                                            }
                                          }
                                      }
                                    });
                                  </script>
                                

                                <span>Rate of Booking per Week</span>
                            </div>
                        </div>
                    </div>
                    <div class="container 3" id="con3" style="display:none">
                        <div class="month-booking">
                            <h5>Monthly Bookings</h5>
                            <div class="graph">
                                <canvas id="month"></canvas>

                                <script>
                                    $(function() {
                                        var ctx = $('#month');
                                        var month = new Chart(ctx, {
                                            type: 'bar',
                                            data: {
                                            labels:  <?php
                                            $startDate = new DateTime('2023-01-01');
                                            $endDate = new DateTime();
                                            $interval = DateInterval::createFromDateString('1  month');
                                            $period = new DatePeriod($startDate, $interval, $endDate);
                                            $labels = array();
                                            foreach ($period as $dt) {
                                              $lastDay = $dt->format("t"); // Get the number of days in the current month
                                              $labels[] = $dt->format("M 1") . "-" . $dt->format("M") . " " . $lastDay; // Format label to show month range and last day
                                            }
                                            echo json_encode($labels);
                                            ?>,
                                            datasets: [{
                                              label: 'No. of Bookings per Month',
                                              data: <?php echo json_encode(array_values($bookingsPerMonth)); ?>,
                                              borderWidth: 1,
                                              backgroundColor: 'rgba(255, 99, 132, 0.2)',
                                              borderColor: 'rgba(255, 99, 132, 1)',
                                              pointBackgroundColor: 'rgba(255, 99, 132, 1)',
                                              pointBorderColor: '#fff',
                                              pointHoverBackgroundColor: '#fff',
                                              pointHoverBorderColor: 'rgba(255, 99, 132, 1)'
                                          }]
                                            },
                                            options: {
                                            scales: {
                                                y: {
                                            beginAtZero: true,
                                            grid: {
                                               color: 'gray' // Set the color of the y-axis grid lines
                                              }}
                                            }
                                            }
                                        });
                                        });

                                  </script>
                                  
                                <span>Rate of Booking per Month</span>
                            </div>
                        </div>
                    </div>

                      <?php 
                      $db_home_service_111->close();
                      ?>
                </div>
            </div>
        </div>
    </div>
    </div>
    <script src="../js/navs.js"></script>
    <script src="../js/show.js"></script>
    <script src="../js/loaders.js"></script>
</body>
</html>