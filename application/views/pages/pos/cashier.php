<?php
	require_once('../includes/auth.php');
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"><!-- End Required meta tags -->
    <!-- Begin SEO tag -->
    <title> PharmXpress POS - Checkout</title>
    <!-- FAVICONS -->
    <link rel="apple-touch-icon" sizes="144x144" href="../assets/apple-touch-icon.png">
    <link rel="shortcut icon" href="../assets/images/favicon.ico">
    <meta name="theme-color" content="#3063A0"><!-- End FAVICONS -->
    <!-- GOOGLE FONT -->
    <link href="https://fonts.googleapis.com/css?family=Fira+Sans:400,500,600" rel="stylesheet"><!-- End GOOGLE FONT -->
    <!-- BEGIN PLUGINS STYLES -->
    <link rel="stylesheet" href="../assets/vendor/open-iconic/font/css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="https://kit.fontawesome.com/11f9d33883.css" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/vendor/select2/css/select2.min.css">
    <link rel="stylesheet" href="../assets/vendor/tributejs/tribute.css">
    <link rel="stylesheet" href="//cdn.materialdesignicons.com/5.3.45/css/materialdesignicons.min.css"><!-- END PLUGINS STYLES -->
    <!-- BEGIN THEME STYLES -->
    <link rel="stylesheet" href="../assets/stylesheets/theme.min.css" data-skin="dark">
    <link rel="stylesheet" href="../assets/stylesheets/theme-dark.min.css" data-skin="dark">
    <link rel="stylesheet" href="../assets/stylesheets/custom.css">
   <script>
      var myVar = setInterval(function () {
        myTimer();
      }, 1000);

      function myTimer() {
        var d = new Date();
        document.getElementById("time").innerHTML = d.toLocaleTimeString("en-US", {
          timeZone: "Asia/Manila",
        });
      }
    </script>
    <!-- END THEME STYLES -->
    <style>
      .a-text {
        font-size: 1rem;
      }
    .fa-cart-shopping:after{
        content:attr(value);
        font-size:8px;
        background: skyblue;
        border-radius:50%;
        padding:4px;
        position:relative;
        left:-7px;
        top:-10px;
        opacity:0.9;
}
        .servertime{
            @media (max-width:576px){display:none}
        }
        }
        @media (min-width:992px){
        .sidebar-custom{
            max-width: 32rem; width: 32rem;
        }
        }
        @media (min-width:1200px){
        .sidebar-custom{
            max-width: 32rem; width: 32rem;
        }
        } 
        .pharmxlogo{
            margin-left: 2rem;
        }
        .pharmxicon{
            margin-left: 2px;
        }
        @media (min-width:1200px){
            .inner-custom{
            margin-right: 35rem !important;
            }
        }
        .bottombar {
          position: fixed;
          bottom: 0;
          right: 0;
          width: 100%; 
          background-color: #2D2D3F;
          height: 3.5rem;
          padding: 0.5rem; 
          display: flex; 
          justify-content: space-between; 
          align-items: center; 
        }

        .paynowbtn {
          height: 100%; 
          width: 7rem; 
          font-weight: bolder;
          font-size: 1rem;
        }

        .totalamt {
            margin-left: 0.8rem;
            font-weight: bold;
            font-size: 1rem; 
            color: #d6d8e1;
        }

        @media (max-width: 768px) {
          .bottombar {
            width: 100vw; 
            height: 3.5rem;
          }
          .paynowbtn {
            width: 40%; 
          }
          .totalamt {
            margin-left: 0.5rem;
            font-weight: bold;
            font-size: 1rem; 
            color: #d6d8e1;
          }
        }
        .productCard{
            margin-right: 1em;
        }
        
        @media (min-width:1200px){
            .search-product{
                width: 60rem; !important
            }
        }
        body{
            overflow-x: auto; !important
        }
        @media (min-width: 992px){
            .page-inner{
                width: 60%;
            }
        }
        .margin-top-md{
            margin-top: 5px;
        }
    </style>
  </head>
  <body>
   <?php
      $accountRank = $_SESSION['SESS_MEMBER_POSITION'];
    ?>
    

    <!-- .app -->
    <div class="app has-fullwidth">
      <!--[if lt IE 10]>
      <div class="page-message" role="alert">You are using an <strong>outdated</strong> browser. Please <a class="alert-link" href="http://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</div>
      <![endif]-->
   <!-- .app-header -->
      <header class="app-header app-header-dark">
        <!-- .top-bar -->
        <div class="top-bar">
          <!-- .top-bar-brand -->
          <div class="top-bar-brand">
            <!-- toggle aside menu -->
            <button class="hamburger hamburger-squeeze" type="button" data-toggle="aside" aria-label="Menu">
              <span class="hamburger-box">
                <span class="hamburger-inner"></span>
              </span>
            </button>
            <!-- /toggle aside menu -->
            <a>
              <img src="../assets/images/pharmxpress_main.png" width="140" height="40" alt="PharmXpress logo">
            </a>
          </div>
          <!-- /.top-bar-brand -->
          <!-- .top-bar-list -->
          <div class="top-bar-list">
            <!-- .top-bar-item -->
            <div class="top-bar-item px-2 d-md-none d-lg-none d-xl-none">
              <!-- toggle menu -->
              <button class="hamburger hamburger-squeeze" type="button" data-toggle="aside" aria-label="toggle menu">
                <span class="hamburger-box">
                  <span class="hamburger-inner"></span>
                </span>
              </button>
              <!-- /toggle menu -->
              <img src="../assets/images/pharmxpress_main.png" width="140" height="40" alt="PharmXpress logo">
            </div>
            <!-- /.top-bar-item -->
            <!-- .top-bar-item -->
            <div class="top-bar-item top-bar-item-right px-0 d-none d-sm-flex">
              <!-- .nav -->
              <ul class="header-nav nav">
                <!-- NOTIFICATIONS -->
                <li class="nav-item dropdown header-nav-dropdown has-notified">
                  <a class="nav-link" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="fas fa-bell"></span>
                  </a>
                  <!-- .dropdown-menu -->
                  <div class="dropdown-menu dropdown-menu-rich dropdown-menu-right">
                    <div class="dropdown-arrow"></div>
                    <h6 class="dropdown-header stop-propagation">
                      <span>Notifications <span class="badge">(2)</span>
                      </span>
                    </h6>
                    <!-- .dropdown-scroll -->
                    <div class="perfect-scrollbar">
                      <!-- .dropdown-item -->
                      <a class="dropdown-item unread">
                        <div>
                          <i class="fa-sharp fa-solid fa-square-info"></i>
                        </div>
                        <div class="dropdown-item-body">
                          <p class="text"> You sent ₱7,000 to an account number ending 7343 </p>
                          <span class="date">8 hours ago</span>
                        </div>
                      </a>
                      <!-- /.dropdown-item -->
                      <!-- .dropdown-item -->
                      <a class="dropdown-item unread">
                        <div>
                          <i class="fa-sharp fa-solid fa-square-info"></i>
                        </div>
                        <div class="dropdown-item-body">
                          <p class="text"> You made an update to your account. </p>
                          <span class="date">10 hours ago</span>
                        </div>
                      </a>
                      <!-- /.dropdown-item -->
                    </div>
                    <!-- /.dropdown-scroll -->
                  </div>
                  <!-- /.dropdown-menu -->
                </li>
                <!-- /NOTIFICATIONS -->
                  <li class="nav-item dropdown header-nav-dropdown">
                  <a class="nav-link" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="fas fa-cart-shopping" value=5></span>
                  </a>
                  </li>
              </ul>
              <!-- /.nav -->
              <!-- .btn-account -->
              <div class="dropdown d-none d-md-flex">
                <button class="btn-account" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <span class="user-avatar user-avatar-md">
                    <img src="../assets/images/avatars/me.jpg" alt="">
                  </span>
                  <span class="account-summary pr-lg-4 d-none d-lg-block">
                    <span class="account-name"><?php echo $_SESSION['SESS_FIRST_NAME']; ?></span>
                    <span class="account-description"><?php echo $accountRank = $_SESSION['SESS_MEMBER_POSITION']; ?></span>
                  </span>
                </button>
                <!-- .dropdown-menu -->
                <div class="dropdown-menu">
                  <div class="dropdown-arrow d-lg-none"></div>
                  <div class="dropdown-arrow ml-3 d-none d-lg-block"></div>
                  <h6 class="dropdown-header d-none d-md-block d-lg-none"><?php echo $_SESSION['SESS_FIRST_NAME']; ?></h6>
                  <a class="dropdown-item" href="dashboard/account-settings">
                    <span class="dropdown-icon oi oi-person"></span> Account Settings </a>
                  <a class="dropdown-item" href="../functions/doLogout.php">
                    <span class="dropdown-icon oi oi-account-logout"></span> Logout </a>
                </div>
                <!-- /.dropdown-menu -->
              </div>
              <!-- /.btn-account -->
            </div>
            <!-- /.top-bar-item -->
          </div>
          <!-- /.top-bar-list -->
        </div>
        <!-- /.top-bar -->
      </header>
      <!-- /.app-header -->
    <!-- .app-aside -->
      <aside class="app-aside app-aside-light">
        <!-- .aside-content -->
        <div class="aside-content">
          <!-- .aside-header -->
          <header class="aside-header d-block d-md-none">
            <!-- .btn-account -->
            <button class="btn-account" type="button" data-toggle="collapse" data-target="#dropdown-aside">
              <span class="user-avatar user-avatar-lg">
               <img src="../assets/images/avatars/me.jpg">
              </span>
              <span class="account-icon">
                <span class="fa fa-caret-down fa-lg"></span>
              </span>
              <span class="account-summary">
                <span class="account-name" id="aside-username"><?php echo $_SESSION['SESS_FIRST_NAME']; ?></span>
                <span class="account-description" id="aside-role"><?php echo $accountRank = $_SESSION['SESS_MEMBER_POSITION']; ?></span>
              </span>
            </button>
            <!-- /.btn-account -->
            <!-- .dropdown-aside -->
            <div id="dropdown-aside" class="dropdown-aside collapse">
              <!-- dropdown-items -->
              <div class="pb-3">
                <a class="dropdown-item" href="/dashboard/account-settings">
                  <span class="dropdown-icon oi oi-person"></span> Account Settings </a>
                <a class="dropdown-item" href="../functions/doLogout.php">
                  <span class="dropdown-icon oi oi-account-logout"></span> Logout </a>
              </div>
              <!-- /dropdown-items -->
            </div>
            <!-- /.dropdown-aside -->
          </header>
          <!-- /.aside-header -->
          <!-- .aside-menu -->
          <div class="aside-menu overflow-hidden">
            <!-- .stacked-menu -->
            <nav id="stacked-menu" class="stacked-menu" style="padding-top: 0rem">
              <!-- .menu -->
              <ul class="menu">
                <!-- .menu-header -->
                <li class="menu-header">Main </li>
                <!-- /.menu-header -->
                <!-- .menu-item -->
                <li class="menu-item">
                  <a href="/dashboard" class="menu-link">
                    <span class="menu-icon fas fa-home"></span>
                    <span class="menu-text">Home</span>
                  </a>
                </li>
                <!-- /.menu-item -->
                <!-- .menu-item -->
                <li class="menu-item">
                  <a href="/dashboard/pos" class="menu-link">
                    <span class="menu-icon fas fa-cash-register"></span>
                    <span class="menu-text">Start Point of Sale</span>
                  </a>
                </li>
                <!-- /.menu-item -->
                <!-- .menu-header -->
                <li class="menu-header">Inventory </li>
                <!-- /.menu-header -->
                <!-- .menu-item -->
                <li class="menu-item">
                  <a href="/dashboard/products" class="menu-link">
                    <span class="menu-icon fas fa-duotone fa-capsules"></span>
                    <span class="menu-text">Pharmacy Products</span>
                  </a>
                </li>
                <!-- /.menu-item -->
                <!-- .menu-header -->
                <li class="menu-header">Sales Analytics </li>
                <!-- /.menu-header -->
                <!-- .menu-item -->
                <li class="menu-item">
                  <a href="/dashboard/sales/products-sold" class="menu-link">
                    <span class="menu-icon fas fa-solid fa-chart-simple"></span>
                    <span class="menu-text">Products Sold</span>
                  </a>
                </li>
                <!-- /.menu-item -->
                <!-- .menu-item -->
                <li class="menu-item has-child">
                  <a href="#" class="menu-link">
                    <span class="menu-icon fas fa-solid fa-hand-holding-circle-dollar"></span>
                    <span class="menu-text">Profits</span>
                  </a>
                  <!-- child menu -->
                  <ul class="menu">
                    <li class="menu-item">
                      <a href="/dashboard/sales/today-revenue" class="menu-link">Today's Profit</a>
                    </li>
                    <li class="menu-item">
                      <a href="/dashboard/sales/weekly-revenue" class="menu-link">Weekly Profit</a>
                    </li>
                    <li class="menu-item">
                      <a href="/dashboard/sales/monthly-revenue" class="menu-link">Monthly Profit</a>
                    </li>
                  </ul>
                  <!-- /child menu -->
                </li>
                <!-- /.menu-item -->
                <!-- /.menu-item -->
                <!-- .menu-item -->
                <li class="menu-item">
                  <a href="/dashboard/sales/invoices" class="menu-link">
                    <span class="menu-icon fas fa-sharp fa-solid fa-receipt"></span>
                    <span class="menu-text">Invoices</span>
                  </a>
                </li>
                <!-- /.menu-item -->
                <!-- .menu-header -->
                <li class="menu-header">Users </li>
                <!-- /.menu-header -->
                <!-- .menu-item -->
                <li class="menu-item has-child">
                  <a href="/dashboard/user/list" class="menu-link">
                    <span class="menu-icon fas fa-solid fa-user"></span>
                    <span class="menu-text">Users</span>
                  </a>
                  <!-- child menu -->
                  <ul class="menu">
                    <li class="menu-item">
                      <a href="/dashboard/user/manage" class="menu-link">Manage All User</a>
                    </li>
                    <li class="menu-item">
                      <a href="/dashboard/" class="menu-link">Add New User</a>
                    </li>
                  </ul>
                  <!-- /child menu -->
                </li>
                <!-- /.menu-item -->
                <!-- .menu-item -->
                <li class="menu-item has-child">
                  <a href="#" class="menu-link">
                    <span class="menu-icon fas fa-regular fa-square-user"></span>
                    <span class="menu-text">Customers</span>
                  </a>
                  <!-- child menu -->
                  <ul class="menu">
                    <li class="menu-item">
                      <a href="/dashboard/customer/list" class="menu-link">View All Customers</a>
                    </li>
                    <li class="menu-item">
                      <a href="/dashboard/customer/add-new" class="menu-link">Add New Customer</a>
                    </li>
                  </ul>
                  <!-- /child menu -->
                </li>
                <!-- /.menu-item -->
                <!-- .menu-header -->
                <li class="menu-header">Other Services </li>
                <!-- /.menu-header -->
                <!-- .menu-item -->
                <li class="menu-item">
                  <a href="/dashboard/account-settings" class="menu-link">
                    <span class="menu-icon fas fa-sliders"></span>
                    <span class="menu-text">Acocunt Settings</span>
                  </a>
                </li>
                <!-- /.menu-item -->
              </ul>
              <!-- /.menu -->
            </nav>
            <!-- /.stacked-menu -->
          </div>
          <!-- /.aside-menu -->
          <!-- Skin changer -->
          <footer class="aside-footer border-top p-2">
            <button class="btn btn-light btn-block text-primary" data-toggle="skin">
              <span class="d-compact-menu-none">Night mode</span>
              <i class="fas fa-moon ml-1"></i>
            </button>
          </footer>
          <!-- /Skin changer -->
        </div>
        <!-- /.aside-content -->
      </aside>
      <!-- /.app-aside -->
    <?php
      
      if($accountRank == 'Admin') {
          
  
    ?>
       <!-- .app-main -->
      <main class="app-main">
        <!-- .wrapper -->
        <div class="wrapper">
          <!-- .page -->
          <div class="page has-sidebar has-sidebar-expand-lg">
            <!-- .page-inner -->
            <div class="page-inner">
              <!-- .page-title-bar -->
              <header class="page-title-bar">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                          <a href="/dashboard"><i class="breadcrumb-icon fa fa-angle-left mr-2"></i> Home</a>
                        </li>
                        <li class="breadcrumb-item active">Point of Sale </li>
                  </ol>
                </nav>
                 <h5> Cashier </h5><button class="btn btn-primary btn-floated d-lg-none" type="button" data-toggle="sidebar"><i class="fa-solid fa-cart-shopping-fast"></i></button>
              </header><!-- /.page-title-bar -->
             <div class="page-section">
                <div class="section-block">
                     <div class="card-deck-xl">
                  <!-- .card -->
                  <div class="card card-fluid">
                    <!-- .card-body -->
                    <div class="card-body">
                      <form>
                        <!-- .form-group -->
                        <div class="form-group">
                          <label class="control-label">Search for a product name or category</label> 
                            <div class="row" style="margin-top: 0.7rem">

                            <div class="col-md-7 margin-top-md">
                            <input name="productSearch" type="text" class="form-control" placeholder="Brand name or product name" autocomplete="off" spellcheck="false" style="position: relative; vertical-align: top; background-color: transparent;">
                            </div>
                        <input type="hidden" name="transactionDate" value="<?php
                        $date = new DateTime('now', new DateTimeZone('Asia/Manila'));
                        echo $date->format('F j, Y');
                        ?>" />
                      <div class="col-sm-6 col-xs-6 col-md-5 margin-top-md">
                        <button id="searchProductbtn" class="btn btn-outline-info"><i class="fa-solid fa-magnifying-glass"></i> &nbsp;Search Product</button>
                      </div>
                        </div>
                        </div><!-- /.form-group -->
                      </form><!-- /form -->
                      </div>
                     </div>
                    </div>
                    
                    <h6 style="margin-bottom: 1rem; margin-top: 1rem"> All Products </h6>
                
                    <div class="table-responsive">
                      <table class="table" id="productTable">
                        <!-- thead -->
                        <thead style="background-color: #346cb0">
                          <tr>
                            <th> Brand Name </th>
                            <th> Generic Name </th>
                            <th> Category </th>
                            <th> Expiration Date </th>
                            <th> Selling Price </th>
                            <th> Remaining Stocks </th>
                            <th> Quantity </th>
                            <th> Action </th>
                          </tr>
                        </thead><!-- /thead -->
                        <!-- tbody -->
                        <tbody id="productTableBody">
                          <?php

                          include('../config/connection.php');

                          $query = "SELECT *, selling_price * quantity as total FROM products ORDER BY product_id DESC";
                          $result = mysqli_query($conn, $query);

                          while($row = mysqli_fetch_assoc($result)) {
                              $total = $row['total'];
                              $availableqty = $row['qty_sold'];
                              $badgeClass = $row['qty_sold'] < 10 ? 'badge-danger' : 'badge-success';
                              echo '
                                  <tr class="' . ($availableqty < 10 ? 'bg-secondary' : '') . ' productrecord">
                                      <td class="align-middle">
                                          ' . $row['brand_name'] . '
                                      </td>
                                      <td class="align-middle">
                                          ' . $row['generic_name'] . '
                                      </td>
                                      <td class="align-middle">
                                          ' . $row['category'] . '
                                      </td>
                                      <td class="align-middle">
                                          ' . $row['expiry_date'] . '
                                      </td>
                                      <td class="align-middle">
                                          ₱' . $row['selling_price'] . '
                                      </td>
                                      <td class="align-middle">
                                          <span class="badge badge-subtle ' . $badgeClass . '">
                                              ' . $row['qty_sold'] . ' pieces
                                          </span>
                                      </td>
                                      <td class="align-middle">
                                     <div class="custom-number" style="width: 4rem">
                                    <input type="number" class="form-control" name="qty" min="1" step="1" value="1" placeholder="Quantity">
                                    </div>
                                    <td class="align-middle">
                                           <button class="btn btn-success" id="pi' . $row['product_id'] . '"><i class="fa-sharp fa-solid fa-cart-plus"> </i></button>
                                        </td>   
                                      </td>
                                  </tr>
                               </tbody>';
                             }
                         ?>
                      </table><!-- /.table -->
                 </div>
                   </div>
              </div><!-- /.page-section -->
            <footer class="app-footer">
              <div class="copyright">
                <span class="float-none d-block mt-1 mt-sm-0 text-center" style="margin-bottom: 5px"><i class="mdi mdi-circle text-success"></i>
                            All Systems Operational
                </span>
                <span class="float-none float-sm-center d-block mt-1 mt-sm-0 text-center" >Server Time: &nbsp;
                            <span id="time"></span> PST</span>
              </div>
            </footer>
            </div><!-- /.page-inner -->
            <!-- .page-sidebar -->
            <div class="page-sidebar page-sidebar-fixed sidebar-custom">
              <!-- .sidebar-header -->
              <header class="sidebar-header d-sm-none">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item active">
                      <a href="#" onclick="Looper.toggleSidebar()"><i class="breadcrumb-icon fa fa-angle-left mr-2"></i>Back</a>
                    </li>
                  </ol>
                </nav>
              </header><!-- /.sidebar-header -->
              <!-- .sidebar-section -->
            <div class="sidebar-section">
              <button type="button" class="close mt-n1 d-none d-xl-none d-sm-block" onclick="Looper.toggleSidebar()" aria-label="Close"><span aria-hidden="true">×</span></button>
            
              <h5> Cart </h5>
                    <!-- .table-responsive -->
                    <div class="table-responsive" style="margin-top: 2rem;">
                      <!-- .table -->
                      <table class="table" id="addedProducts">
                        <!-- thead -->
                        <thead>
                          <tr>
                            <th style="min-width: 100px; text-align: center; margin-right: 0.5rem;"> Product Name </th>
                            <th style="margin-right: 0.5rem"> Quantity </th>
                            <th style="margin-right: 0.5rem"> Price </th>
                            <th> &nbsp; </th>
                          </tr>
                        </thead><!-- /thead -->
                        <!-- tbody -->
                        <tbody id="addedProductsdata">
                        </tbody><!-- /tbody -->
                      </table><!-- /.table -->
                    </div><!-- /.table-responsive -->
                 <div class="bottombar">
                <div class="totalamt">Total Amount: &nbsp; ₱0.00</div>
                <button type="button" class="btn btn-success paynowbtn" data-toggle="modal" data-target="#paymentModal">Pay Now</button>
              </div>
            </div><!-- /.sidebar-section -->
            </div><!-- /.page-sidebar -->
          </div><!-- /.page -->
        </div><!-- /.wrapper -->
            <div id="searchResult" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                        <!-- .modal-dialog -->
                        <div class="modal-dialog modal-lg" role="document">
                          <!-- .modal-content -->
                          <div class="modal-content">
                            <!-- .modal-header -->
                            <div class="modal-header">
                              <h5 id="myLargeModalLabel" class="modal-title"> Search result </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                               <span aria-hidden="true">&times;</span>
                               </button>
                            </div><!-- /.modal-header -->
                            <!-- .modal-body -->
                            <div class="modal-body">
                              <div class="table-responsive">
                                <table class="table" id="productTable">
                                    <!-- thead -->
                                       <thead style="background-color: #5F4B8B">
                                          <tr>
                                             <th> Brand Name </th>
                                                <th> Generic Name </th>
                                             <th> Category </th>
                                            <th> Expiration Date </th>
                                          <th> Selling Price </th>
                                        <th> Remaining Stocks </th>
                                      <th> Quantity </th>
                                     <th> Action </th>
                                  </tr>
                                </thead><!-- /thead -->
                               <!-- tbody -->
                             <tbody id="productBody">
                            </table><!-- /.table -->
                          </div>  
                        </div><!-- /.modal-body -->
                      </div><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->
                  </div><!-- /.modal -->
          
                      <div class="modal fade" id="paymentModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 id="exampleModalCenterLabel" class="modal-title"> Choose Payment Method </h5>
                            </div>
                            <div class="modal-body">
                              <p> Laudantium praesentium similique natus consequuntur, quae amet, sequi non velit placeat distinctio excepturi tempore quos expedita veritatis at corporis beatae maiores iste. </p>
                              <p> Omnis velit praesentium, incidunt voluptatibus voluptatem iure corporis minima error ipsum itaque magnam vero laborum molestiae vel. Saepe modi atque, iure dolores nulla dolor quia, eius libero ullam dicta explicabo! </p>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-primary" data-dismiss="modal">Click Me</button> <button type="button" class="btn btn-light">Secondary Action</button>
                            </div>
                          </div>
                        </div>
                      </div>
              </main><!-- /.app-main -->
           </div>
      <?php } ?>
    <!-- BEGIN BASE JS -->
    <script src="../assets/vendor/jquery/jquery.min.js"></script>
    <script src="../assets/vendor/popper.js/umd/popper.min.js"></script>
    <script src="../assets/vendor/bootstrap/js/bootstrap.min.js"></script> <!-- END BASE JS -->
    <!-- BEGIN PLUGINS JS -->
    <script src="../assets/vendor/pace-progress/pace.min.js"></script>
    <script src="../assets/vendor/stacked-menu/js/stacked-menu.min.js"></script>
    <script src="../assets/vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="../assets/vendor/handlebars/handlebars.min.js"></script>
    <script src="../assets/vendor/typeahead.js/typeahead.bundle.min.js"></script>
    <script src="../assets/vendor/select2/js/select2.min.js"></script> <!-- END PLUGINS JS -->
    <!-- BEGIN THEME JS -->
    <script src="../assets/javascript/theme.min.js"></script> <!-- END THEME JS -->
    <!-- BEGIN PAGE LEVEL JS -->
    <script src="../assets/javascript/pages/select2-demo.js"></script> <!-- END PAGE LEVEL JS -->
      
     <script>
      var transaction = [];

        $('#searchProductbtn').on('click', function(e) {
          e.preventDefault();
          var productName = $('input[name="productSearch"]').val();
  
          $.ajax({
            type: 'POST',
            url: '../functions/searchProductfunc.php',
            data: { productName: productName},
            success: function(data) {
              $('#searchResult').modal('show'); // show the modal
              $('#productBody').html(data); // populate the modal body with the search result
  
            }
          });
            
        });
         
         
$(document).ready(function() {
  // Listen for click event on buttons with product ID
  $(document).on('click', 'button[id^="pi"]', function() {
    // Get the product ID from the button
    var productId = $(this).attr('id');

    var productName = $(this).closest('tr').find('td:eq(0)').text();
    var brandName = $(this).closest('tr').find('td:eq(1)').text();
    var productCategory = $(this).closest('tr').find('td:eq(2)').text();
    var productPrice = $(this).closest('tr').find('td:eq(4)').text();
    var quantity = $(this).closest('tr').find('input[name="qty"]').val();

    // Update the Cart sidebar
    $('#addedProductsdata').append(`
      <tr>
        <td class="align-middle">${productName} | ${brandName} - ${productCategory}</td>
        <td class="align-middle">${quantity}</td>
        <td class="align-middle">${productPrice}</td>
        <td class="align-middle"><button class="btn btn-sm btn-icon btn-secondary remove-product"><i class="far fa-trash-alt"></i> <span class="sr-only">Remove</span></button></td>
      </tr>
    `);

    // Update the total amount
    var totalAmount = 0;
    $('#addedProductsdata tr').each(function() {
      var price = $(this).find('td:eq(2)').text().replace('₱', '');
      var quantity = $(this).find('td:eq(1)').text();
      totalAmount += parseFloat(price) * parseInt(quantity);
    });
    $('.totalamt').text(`Total Amount: ₱${totalAmount.toFixed(2)}`);
  });

  // Listen for remove product event
  $(document).on('click', '#addedProductsdata .remove-product', function() {
    $(this).closest('tr').remove();
    updateTotalAmount();
  });

  function updateTotalAmount() {
    var totalAmount = 0;
    $('#addedProductsdata tr').each(function() {
      var price = $(this).find('td:eq(2)').text().replace('₱', '');
      var quantity = $(this).find('td:eq(1)').text();
      totalAmount += parseFloat(price) * parseInt(quantity);
    });
    $('.totalamt').text(`Total Amount: ₱${totalAmount.toFixed(2)}`);
  }
});
         
    </script>
  </body>
</html>