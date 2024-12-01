<?php
defined('BASEPATH') or exit('No direct script access allowed');

if (!$this->session->userdata('SESS_MEMBER_ID')) {
    redirect('login');
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>PharmXpress POS - Admin Dashboard</title>
    <link rel="apple-touch-icon" sizes="144x144" href="<?php echo base_url();?>assets/images/favicon.ico">
    <link rel="shortcut icon" href="<?php echo base_url();?>assets/images/favicon.ico">
    <meta name="theme-color" content="#3063A0">
    <link href="https://fonts.googleapis.com/css?family=Fira+Sans:400,500,600" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/vendor/open-iconic/font/css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="//cdn.materialdesignicons.com/5.3.45/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="https://kit.fontawesome.com/11f9d33883.css" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/stylesheets/theme.min.css" data-skin="dark">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/stylesheets/theme-dark.min.css" data-skin="dark">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/stylesheets/custom.css">
    <script>
      var myVar = setInterval(function() {
        myTimer();
      }, 1000);

      function myTimer() {
        var d = new Date();
        document.getElementById("time").innerHTML = d.toLocaleTimeString("en-US", {
          timeZone: "Asia/Manila",
        });
      }
    </script>
    <script>
      var skin = localStorage.getItem('skin') || 'dark';
      var isCompact = JSON.parse(localStorage.getItem('hasCompactMenu'));
      var disabledSkinStylesheet = document.querySelector('link[data-skin]:not([data-skin="' + skin + '"])');
      // Disable unused skin immediately
      disabledSkinStylesheet.setAttribute('rel', '');
      disabledSkinStylesheet.setAttribute('disabled', true);
      // add flag class to html immediately
      if (isCompact == true) document.querySelector('html').classList.add('preparing-compact-menu');
    </script>
    <style>
      .a-text {
        font-size: 1rem;
      }

      .fa-cart-shopping:after {
        content: attr(value);
        font-size: 8px;
        background: skyblue;
        border-radius: 50%;
        padding: 4px;
        position: relative;
        left: -7px;
        top: -10px;
        opacity: 0.9;
      }
      .d-flex .mr-auto{
        color: #d6d8e1; !important
        }
    </style>
  </head>
  <body>
    <div class="app">
    <?php 
        include(base_url()."assets/includes/app-header.php");
        include(base_url()."assets/includes/app-aside.php");
     ?>
      <main class="app-main">
        <div class="wrapper">
          <div class="page">
            <div class="page-inner">
              <header class="page-title-bar">
                <div class="d-flex flex-column flex-md-row">
                  <p class="lead">
                    <span class="font-weight-bold">Welcome aboard, <?php echo $this->session->userdata('SESS_FIRST_NAME'); ?>!</span>
                    <span class="d-block text-muted a-text">Here’s the summary of what you have.</span>
                  </p>
                </div>
              </header>
              <div class="page-section">
                <div class="section-block">
                  <div class="row">
                    <div class="col-12 col-lg-12 col-xl-4">
                      <div class="card card-fluid">
                        <div class="card-header border-0">
                          <div class="d-flex align-items-center">
                            <h6 class="mr-auto">Today's Profit</h6>
                            <div class="card-header-control">
                              <div class="dropdown">
                                <button type="button" class="btn btn-icon btn-light" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                  <i class="fa fa-fw fa-ellipsis-v"></i>
                                </button>
                                <div class="dropdown-menu dropdown-menu-right">
                                  <div class="dropdown-arrow"></div>
                                  <a href="#" class="dropdown-item">
                                    <i class="fas fa-rotate-right"></i> Refresh </a>
                                  <a href="/dashboard/myaccount/savings" target="_blank" class="dropdown-item">
                                    <i class="fas fa-arrow-up-right-from-square"></i> View all your profit </a>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="card-body">
                          <h5 class="card-text" style="text-align: center">
                            <i class="fas fa-solid fa-money-bill text-pink"></i>&nbsp; ₱8,150.39
                          </h5>
                          <p class="card-text" style="text-align: center">as of 
                        <?php
                        $date = new DateTime('now', new DateTimeZone('Asia/Manila'));
                        echo $date->format('F j, Y');
                        ?></p>
                        </div>
                      </div>
                    </div>
                    <div class="col-12 col-lg-12 col-xl-4">
                      <div class="card card-fluid">
                        <div class="card-header border-0">
                          <div class="d-flex align-items-center">
                            <h6 class="mr-auto">Total Customers</h6>
                            <div class="card-header-control">
                              <div class="dropdown">
                                <button type="button" class="btn btn-icon btn-light" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                  <i class="fa fa-fw fa-ellipsis-v"></i>
                                </button>
                                <div class="dropdown-menu dropdown-menu-right">
                                  <div class="dropdown-arrow"></div>
                                  <a href="#" class="dropdown-item">
                                    <i class="fas fa-rotate-right"></i> Refresh </a>
                                  <a href="/dashboard/myaccount/checking" target="_blank" class="dropdown-item">
                                    <i class="fas fa-arrow-up-right-from-square"></i> Go to your Checking Account </a>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="card-body">
                          <h5 class="card-text" style="text-align: center">
                            <i class="fas fa-users text-teal"></i>&nbsp; 12
                          </h5>
                          <p class="card-text" style="text-align: center">Customers</p>
                        </div>
                      </div>
                    </div>
                    <div class="col-12 col-lg-12 col-xl-4">
                      <div class="card card-fluid">
                        <div class="card-header border-0">
                          <div class="d-flex align-items-center">
                            <h6 class="mr-auto">No. Sold Products</h6>
                            <div class="card-header-control">
                              <div class="dropdown">
                                <button type="button" class="btn btn-icon btn-light" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                  <i class="fa fa-fw fa-ellipsis-v"></i>
                                </button>
                                <div class="dropdown-menu dropdown-menu-right">
                                  <div class="dropdown-arrow"></div>
                                  <a href="#" class="dropdown-item">
                                    <i class="fas fa-rotate-right"></i> Refresh </a>
                                  <a href="/dashboard/myaccount/loan" target="_blank" class="dropdown-item">
                                    <i class="fas fa-arrow-up-right-from-square"></i> Go to your Loans </a>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="card-body">
                          <h5 class="card-text align-middle" style="text-align: center">
                            <i class="fas fa-sharp fa-solid fa-pills text-purple"></i>&nbsp; 20
                          </h5>
                          <p class="card-text" style="text-align: center;">Products have been sold today</p>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="d-flex flex-column flex-md-row">
                    <p class="lead">
                      <span class="font-weight-bold" style="font-size: 1.0rem">My Shortcuts:</span>
                      <span class="d-block text-muted a-text"></span>
                    </p>
                  </div>
                  <div class="row">
                    <div class="col-sm-2" style="height: 20%">
                      <div class="card card-fluid curved" style="background-color: #33C1FF">
                        <div class="card-body">
                          <h4 class="text-center">
                            <i class="fa-solid fa-cash-register"></i>
                          </h4>
                          <h4 class="card-title text-center" style="margin-top: 10px; font-size: 0.9rem">Start POS</h4>
                          <a href="pos" class="stretched-link"></a>
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-2">
                      <div class="card card-fluid curved" style="background-color: #ec935e">
                        <div class="card-body">
                          <h4 class="text-center">
                            <i class="fa-sharp-duotone fa-solid fa-capsules"></i>
                          </h4>
                          <h4 class="card-title text-center" style="margin-top: 10px; font-size: 0.9rem">View Products</h4>
                          <a href="products" class="stretched-link"></a>
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-2">
                      <div class="card card-fluid curved" style="background-color: #f7c46c">
                        <div class="card-body">
                          <h4 class="text-center">
                            <i class="fa-regular fa-receipt"></i>
                          </h4>
                          <h4 class="card-title text-center" style="margin-top: 10px; font-size: 0.9rem">View Invoices</h4>
                          <a href="/dashboard/sales/invoices" class="stretched-link"></a>
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-2">
                      <div class="card card-fluid curved" style="background-color: #a7c796">
                        <div class="card-body">
                          <h4 class="text-center">
                            <i class="fa-regular fa-users"></i>
                          </h4>
                          <h5 class="card-title text-center" style="margin-top: 10px; font-size: 0.9rem">View Customers</h5>
                          <a href="#" class="stretched-link"></a>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="card-deck-xl" style="margin-top: 1rem">
                    <div class="card card-fluid">
                      <div class="card-body">
                        <h4 class="card-title">Recent Activities</h4>
                        <div>
                          <div class="table-responsive" style="display: table-cell">
                            <table class="table">
                              <tbody>
                                <tr>
                                  <td class="align-middle">Ascorbic acid Apcee was sold in a quantity of 5 pieces.</td>
                                  <td class="align-middle">2mins ago</td>
                                </tr>
                                <tr>
                                  <td class="align-middle">You added Cefalexin Saphlexin to your new product.</td>
                                  <td class="align-middle">10mins ago</td>
                                </tr>
                                <tr>
                                  <td class="align-middle">You added Dopamine Dopan to your new product.</td>
                                  <td class="align-middle">11hrs ago</td>
                                </tr>
                                <tr>
                                  <td class="align-middle">Acetazolamide Diamox was sold in a quantity of 3 pieces.</td>
                                  <td class="align-middle">12hrs ago</td>
                                </tr>
                                <tr>
                                  <td class="align-middle">You added Clindamycin Clindamax to your new product.</td>
                                  <td class="align-middle">12hrs ago</td>
                                </tr>
                              </tbody>
                            </table>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="card card-fluid">
                      <div class="card-body">
                        <h3 class="card-title mb-4"> Product Summary </h3>
                        <div class="chartjs" style="height: 292px">
                          <div class="chartjs-size-monitor">
                            <div class="chartjs-size-monitor-expand">
                              <div class=""></div>
                            </div>
                            <div class="chartjs-size-monitor-shrink">
                              <div class=""></div>
                            </div>
                          </div>
                          <canvas id="profit" style="display: block; width: 303px; height: 292px;" width="303" height="292" class="chartjs-render-monitor"></canvas>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <footer class="app-footer">
          <div class="copyright">
            <span class="float-none d-block mt-1 mt-sm-0 text-center" style="margin-bottom: 5px">
              <i class="mdi mdi-circle text-success"></i> All Systems Operational </span>
            <span class="float-none float-sm-center d-block mt-1 mt-sm-0 text-center">Server Time: &nbsp; <span id="time"></span> PST </span>
          </div>
        </footer>
      </main>
    </div>
      
<script>
    document.addEventListener('DOMContentLoaded', function() {
    fetch('<?php echo base_url("DashboardController/getProfitData"); ?>')
        .then(response => response.json())
        .then(data => {
            const expiredCount = data.expired_count; 
            const totalProducts = data.total_products; 
            const prescriptionRequiredCount = data.prescription_required_count; 
            const lowStockCount = data.low_stock_count; 
            const prescriptionNotRequiredCount = totalProducts - prescriptionRequiredCount;

            const ctx = document.getElementById('profit').getContext('2d');
        
            const myChart = new Chart(ctx, {
                type: 'bar', 
                data: {
                    labels: ['Expired Products', 'Prescription Required', 'Prescription Not Required', 'Low Stock Products'], 
                    datasets: [{
                        label: 'Value',
                        data: [expiredCount, prescriptionRequiredCount, prescriptionNotRequiredCount, lowStockCount], 
                        backgroundColor: ['#ea6759', '#346cb0', '#5f4b8b', '#ec935e'], 
                        borderColor: ['#ea6759', '#346cb0', '#5f4b8b', '#ec935e'],
                        borderWidth: 1  
                    }]
                },
                
    
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            display: false
                        },
                        title: {
                            display: false
                        }
                    },
                    scales: {
                    yAxes: [{
                      gridLines: {
                        display: true,
                        drawBorder: false
                      },
                      ticks: {
                        beginAtZero: true,
                        stepSize: 2
                      }
                    }],
                    x: {
                        grid: {
                        display: true,
                        drawBorder: false,
                        drawOnChartArea: false
                      },
                        ticks: {
                        maxRotation: 0,
                        maxTicksLimit: 3
                            }
                        }
                    }
                }
            });
        })
        .catch(error => console.error('Error fetching data:', error));
    });
</script>
      
      
    <script src="<?php echo base_url();?>assets/vendor/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url();?>assets/vendor/popper.js/umd/popper.min.js"></script>
    <script src="<?php echo base_url();?>assets/vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url();?>assets/vendor/pace-progress/pace.min.js"></script>
    <script src="<?php echo base_url();?>assets/vendor/stacked-menu/js/stacked-menu.min.js"></script>
    <script src="<?php echo base_url();?>assets/vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="<?php echo base_url();?>assets/vendor/flatpickr/flatpickr.min.js"></script>
    <script src="<?php echo base_url();?>assets/vendor/easy-pie-chart/jquery.easypiechart.min.js"></script>
    <script src="<?php echo base_url();?>assets/vendor/chart.js/Chart.min.js"></script>
    <script src="<?php echo base_url();?>assets/javascript/theme.min.js"></script>
  </body>
</html>