<?php
defined('BASEPATH') or exit('No direct script access allowed');

if (!$this->session->userdata('SESS_MEMBER_ID')) {
    redirect('login');
}
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- End Required meta tags -->
        <title>Product List - PharmXpress</title>
        <!-- FAVICONS -->
        <link rel="apple-touch-icon" sizes="144x144" href="<?php echo base_url();?>assets/apple-touch-icon.png">
        <link rel="shortcut icon" href="<?php echo base_url();?>assets/images/favicon.ico">
        <meta name="theme-color" content="#3063A0">
        <!-- End FAVICONS -->
        <!-- GOOGLE FONT -->
        <link href="https://fonts.googleapis.com/css?family=Fira+Sans:400,500,600" rel="stylesheet">
        <!-- End GOOGLE FONT -->
        <!-- BEGIN PLUGINS STYLES -->
        <link rel="stylesheet" href="<?php echo base_url();?>assets/vendor/open-iconic/font/css/open-iconic-bootstrap.min.css">
        <link rel="stylesheet" href="//cdn.materialdesignicons.com/5.3.45/css/materialdesignicons.min.css">
        <link rel="stylesheet" href="https://kit.fontawesome.com/11f9d33883.css" crossorigin="anonymous">
        <!-- END PLUGINS STYLES -->
        <!-- BEGIN THEME STYLES -->
        <link rel="stylesheet" href="<?php echo base_url();?>assets/stylesheets/theme.min.css" data-skin="dark">
        <link rel="stylesheet" href="<?php echo base_url();?>assets/stylesheets/theme-dark.min.css" data-skin="dark">
        <link rel="stylesheet" href="<?php echo base_url();?>assets/stylesheets/custom.css">
        <script src="<?php echo base_url();?>assets/vendor/jquery/jquery.min.js"></script>
        <script src="<?php echo base_url();?>assets/vendor/toastr/tata.js"></script>
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
        <!-- END THEME STYLES -->
        <style>
            .a-text {
                font-size: 1rem;
            }
            .drop-zone {
                width: 400px;
                height: 270px;
                background-color: #222230;
                border: 2px dashed #ccc;
                border-radius: 10px;
                display: flex;
                flex-direction: column;
                justify-content: center;
                align-items: center;
                text-align: center;
                color: white;
                padding: 20px;
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
                    
            }
            .drop-zone input {
                position: absolute;
                top: 0;
                left: 0;
                margin: 0;
                width: 100%;
                height: 100%;
                opacity: 0;
                direction: ltr;
                cursor: pointer;
                z-index: 2;
            }
            .drop-zone i {
                font-size: 40px;
                margin-bottom: 20px;
            }
            .drop-zone h4 {
                font-size: 20px;
                font-weight: bold;
                margin-bottom: 10px;
            }
            .drop-zone p {
                font-size: 14px;
                color: #ccc;
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
            .infocard{
                margin-bottom: 0.5rem;
             }
            .hidden{
                display: none;
            }
        </style>
    </head>

    <body>
        <!-- .app -->
        <div class="app">
            <?php 
        include(base_url()."assets/includes/app-header.php");
        include(base_url()."assets/includes/app-aside.php");
     ?>
                <!-- .app-main -->
                <main class="app-main">
                    <!-- .wrapper -->
                    <div class="wrapper">
                        <!-- .page -->
                        <div class="page">
                            <!-- .page-inner -->
                            <div class="page-inner">
                                <!-- .page-title-bar -->
                                <header class="page-title-bar">
                                    <!-- page title stuff goes here -->
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item">
                                            <a href="dashboard"><i class="breadcrumb-icon fa fa-angle-left mr-2"></i> Home</a>
                                        </li>
                                        <li class="breadcrumb-item active">Product Inventory </li>
                                    </ol>
                                    <div class="d-flex flex-column flex-md-row">
                                        <p class="lead">
                                            <span class="font-weight-bold">Product Inventory</span>
                                            <span class="d-block text-muted a-text">Here’s the summary of what you have.</span>
                                        </p>
                                    </div>
                                </header>
                                <!-- /.page-title-bar -->
                                <!-- .page-section -->
                                <div class="page-section">
                                    <!-- .section-block -->
                                    <div class="section-block">
                                        <!-- page content goes here -->
                                        <div class="row">
                                            <!-- grid column -->
                                            <div class="col-12 col-lg-3 col-xl-3">
                                                <!-- .card -->
                                                <div class="card card-fluid">
                                                    <!-- .card-header -->
                                                    <div class="card-header border-0">
                                                        <!-- .d-flex -->
                                                        <div class="d-flex align-items-center">
                                                            <h6 class="mr-auto">Total No. of Products</h6>
                                                            <!-- .card-header-control -->
                                                            <div class="card-header-control">
                                                            </div>
                                                            <!-- /.card-header-control -->
                                                        </div>
                                                        <!-- /.d-flex -->
                                                    </div>
                                                    <!-- /.card-header -->
                                                    <!-- .card-body -->
                                                    <div class="card-body infocard">
                                                        <h5 class="card-text" style="text-align: center"><i class="fas fa-sharp fa-solid fa-pills text-purple"></i>&nbsp; 
                       <span id="totalProductsQty"> <?php echo $numOfTotalProducts; ?></span></h5>
                                                    </div>
                                                    <!-- /.card-body -->
                                                </div>
                                                <!-- /.card -->
                                            </div>
                                            <!-- /grid column -->
                                            <!-- grid column -->
                                            <div class="col-12 col-lg-3 col-xl-3">
                                                <!-- .card -->
                                                <div class="card card-fluid">
                                                    <!-- .card-header -->
                                                    <div class="card-header border-0">
                                                        <!-- .d-flex -->
                                                        <div class="d-flex align-items-center">
                                                            <h6 class="mr-auto">Total Products Sold</h6>
                                                            <!-- .card-header-control -->
                                                            <div class="card-header-control">
                                                            </div>
                                                            <!-- /.card-header-control -->
                                                        </div>
                                                        <!-- /.d-flex -->
                                                    </div>
                                                    <!-- /.card-header -->
                                                    <!-- .card-body -->
                                                    <div class="card-body infocard">
                                                        <h5 class="card-text" style="text-align: center"><i class="fas fa-sharp fa-solid fa-bag-shopping text-teal"></i>&nbsp; 45</h5>
                                                    </div>
                                                    <!-- /.card-body -->
                                                </div>
                                                <!-- /.card -->
                                            </div>
                                            <!-- /grid column -->
                                            <!-- grid column -->
                                            <div class="col-12 col-lg-3 col-xl-3">
                                                <!-- .card -->
                                                <div class="card card-fluid">
                                                    <!-- .card-header -->
                                                    <div class="card-header border-0">
                                                        <!-- .d-flex -->
                                                        <div class="d-flex align-items-center">
                                                            <h6 class="mr-auto">Low Stocks Product</h6>
                                                            <!-- .card-header-control -->
                                                            <div class="card-header-control">
                                                            </div>
                                                            <!-- /.card-header-control -->
                                                        </div>
                                                        <!-- /.d-flex -->
                                                    </div>
                                                    <!-- /.card-header -->
                                                    <!-- .card-body -->
                                                    <div class="card-body infocard">
                                                        <h5 class="card-text align-middle" style="text-align: center"><i class="fa-solid fa-chart-line-down text-pink"></i>&nbsp; 
                              <span id="lowQty"><?php echo $numOfLowProducts; ?></span>
                          </h5>
                                                    </div>
                                                    <!-- /.card-body -->
                                                </div>
                                                <!-- /.card -->
                                            </div>
                                            <!-- /grid column -->
                                            <!-- grid column -->
                                            <div class="col-12 col-lg-3 col-xl-3">
                                                <!-- .card -->
                                                <div class="card card-fluid">
                                                    <!-- .card-header -->
                                                    <div class="card-header border-0">
                                                        <!-- .d-flex -->
                                                        <div class="d-flex align-items-center">
                                                            <h6 class="mr-auto">Expired Products</h6>
                                                            <!-- .card-header-control -->
                                                            <div class="card-header-control">
                                                            </div>
                                                            <!-- /.card-header-control -->
                                                        </div>
                                                        <!-- /.d-flex -->
                                                    </div>
                                                    <!-- /.card-header -->
                                                    <!-- .card-body -->
                                                    <div class="card-body infocard">
                                                        <h5 class="card-text" style="text-align: center"><i class="fas fa-sharp fa-solid fa-pills text-purple"></i>&nbsp; 
                       <span id="totalProductsQty"> <?php echo $numOfExpiredProducts; ?></span></h5>
                                                    </div>
                                                    <!-- /.card-body -->
                                                </div>
                                                <!-- /.card -->
                                            </div>
                                            <!-- /grid column -->
                                        </div>
                                        <!-- .card -->
                                        <div class="card card-fluid" style="margin-top: 2rem">
                                            <!-- .card-header -->
                                            <div class="card-header">
                                                <!-- .nav-tabs -->
                                                <ul class="nav nav-tabs card-header-tabs">
                                                    <li class="nav-item">
                                                        <a class="nav-link active show" data-toggle="tab" href="#tab1">All</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link" data-toggle="tab" href="#tab2">Low Stocks</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link" data-toggle="tab" href="#tab3">Expired Products</a>
                                                    </li>
                                                </ul>
                                                <!-- /.nav-tabs -->

                                            </div>
                                            <!-- /.card-header -->
                                            <!-- .card-body -->
                                            <div class="card-body">
                                                <div class="d-flex">
                                                    <input type="text" class="form-control" id="searchInput" placeholder="Search for a brand name or category" style="width: 50%">
                                                    <button id="showAddProduct" type="button" class="btn btn-primary ml-auto" data-toggle="modal" data-target="#addProduct"><i class="fa-sharp fa-solid fa-plus"></i> Add a new product</button>
                                                    <button id="showDataImport" type="button" class="btn btn-warning ml-3" data-toggle="modal" data-target="#dataImport"><i class="fa-solid fa-up-from-bracket"></i> Import data</button>
                                                </div>
                                            </div>
                                            <!-- /.card-body -->

                                            <div class="modal fade" id="dataImport" tabindex="-1" role="dialog" aria-labelledby="addProductLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h6 class="modal-title" id="exampleModalLabel">Import Product Data</h6>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <!-- .card-body -->
                                                            <div class="card-body">
                                                                <label>Upload your excel file below to import it into the database.</label>
                                                                <br>
                                                                <br>
                                                                <center>
                                                                    <div class="drop-zone" id="dropzone">
                                                                        <i class="fas fa-upload"></i>
                                                                        <h4>DROP FILES HERE</h4>
                                                                        <p>Drag and drop your file here.</p>
                                                                        <input id="fileupload-dropzone" type="file" name="files[]" multiple="" style="display:none">
                                                                    </div>
                                                                </center>

                                                                <!--
                          <label>Upload below your excel files to import it to the database.</label><br><br>
                        <div id="dropzone" class="fileinput-dropzone" style="width:50%; height: 200px; margin: auto; border: 2px dashed; display: flex; align-items: center; justify-content: center;">
                            <i class="fas fa-upload"></i>
                          <span>Drop files or click to upload.</span>
                          <input id="fileupload-dropzone" type="file" name="files[]" multiple="">
                        </div>
-->
                                                            </div>
                                                            <!-- /.card-body -->
                                                            <!-- The progress bar -->
                                                            <div id="progress" class="progress progress-xs rounded-0 fade">
                                                                <div class="progress-bar progress-bar-striped progress-bar-animated bg-success" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
                                                            </div>
                                                            <!-- The container for the uploaded files -->
                                                            <div id="uploadList" class="list-group list-group-flush list-group-divider">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="modal fade" id="addProduct" tabindex="-1" role="dialog" aria-labelledby="addProductLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-lg" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h6 class="modal-title" id="exampleModalLabel">Add a new product</h6>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="col-md-8" style="margin-bottom: 1rem; font-style: italic;">
                                                                <medium>Note: Fields marked with <span style="color: #e8320b">*</span> are required.</medium>
                                                            </div>
                                                            <form action="#" id="addProductForm" enctype="multipart/form-data">
                                                                <tr class="row-details bg-light">
                                                                    <td colspan="12">
                                                                        <div class="row">
                                                                            <div class="col-md-6">
                                                                                <table class="table table-bordered">
                                                                                    <tbody>
                                                                                        <tr>
                                                                                            <td>Brand Name: <span style="color: #e8320b">*</span></td>
                                                                                            <td>
                                                                                                <input name="brand_name" type="text" class="form-control" placeholder="Enter the Brand Name" required />
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td>Generic Name: <span style="color: #e8320b">*</span></td>
                                                                                            <td>
                                                                                                <input name="generic_name" type="text" class="form-control" placeholder="Enter the Generic Name" required />
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td>Category: <span style="color: #e8320b">*</span></td>
                                                                                            <td>
                                                                                                <input name="category" type="text" class="form-control" placeholder="Enter the product category" />
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td>Arrival Date: <span style="color: #e8320b">*</span></td>
                                                                                            <td>
                                                                                                <input type="date" name="arrival_date" id="arrivalDate" min="" value="" class="form-control" placeholder="Enter when is the product arrived" required />
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td>Expiration Date: <span style="color: #e8320b">*</span></td>
                                                                                            <td>
                                                                                                <input type="date" name="expiry_date" id="expiryDate" min="" value="" class="form-control" placeholder="Enter when will the product expires" required />
                                                                                            </td>
                                                                                        </tr>
                                                                                    </tbody>
                                                                                </table>
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <table class="table table-bordered">
                                                                                    <tbody>
                                                                                        <tr>
                                                                                            <td style="font-size: 13px">Product Quantity: <span style="color: #e8320b">*</span></td>
                                                                                            <td>
                                                                                                <input type="number" class="form-control" placeholder="Enter the product quantity" id="qty" name="quantity" onkeyup="sum();" />
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td>Selling Price: <span style="color: #e8320b">*</span></td>
                                                                                            <td>
                                                                                                <div class="input-group">
                                                                                                    <label class="input-group-prepend" for="sellingPrice"><span class="input-group-text"><span class="far fa-peso-sign"></span></span>
                                                                                                    </label>
                                                                                                    <input class="form-control" name="selling_price" id="sellingPrice" placeholder="Enter the selling price" onkeyup="sum();">
                                                                                                </div>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td>Original Price: <span style="color: #e8320b">*</span></td>
                                                                                            <td>
                                                                                                <div class="input-group">
                                                                                                    <label class="input-group-prepend" for="originalPrice"><span class="input-group-text"><span class="far fa-peso-sign"></span></span>
                                                                                                    </label>
                                                                                                    <input class="form-control" name="original_price" id="originalPrice" placeholder="Enter the original price" onkeyup="sum();">
                                                                                                </div>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr style="display: none;">
                                                                                            <td>Profit: <span style="color: #e8320b">*</span></td>
                                                                                            <td>
                                                                                                <div class="input-group">
                                                                                                    <label class="input-group-prepend" for="profit"><span class="input-group-text"><span class="far fa-peso-sign"></span></span>
                                                                                                    </label>
                                                                                                    <input type="number" class="form-control" name="profit" id="profit" readonly>
                                                                                                </div>
                                                                                            </td>
                                                                                            <input type="hidden" class="form-control" name="qty_sold" id="qty_sold" readonly />
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td>Prescription: <span style="color: #e8320b">*</span></td>
                                                                                            <td>
                                                                                                <select name="prescription_required" class="form-control">
                                                                                                    <option value="Not Required">Not Required</option>
                                                                                                    <option value="Required">Required</option>
                                                                                                </select>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td style="font-size: 13px">Product Image: <span style="color: #e8320b">*</span></td>
                                                                                            <td>
                                                                                                <div class="custom-file">
                                                                                                    <input type="file" class="custom-file-input" name="product_image" multiple="" onchange="updateLabel(this)">
                                                                                                    <label class="custom-file-label" for="fileupload-customInput">Choose files</label>
                                                                                                </div>
                                                                                            </td>
                                                                                        </tr>
                                                                                    </tbody>
                                                                                </table>
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                <div class="modal-footer" style="margin-top: -0.5rem;">
                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                                    <button type="button" class="btn btn-primary" id="toAddProduct">Add Product</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- .tab-content -->
                                            <div class="tab-content">
                                                <div class="tab-pane fade show active" id="tab1">
                                                    <!-- .card -->
                                                    <div class="card card-fluid">
                                                        <div class="text-muted px-3 mb-2"> Showing <span><?php echo $numOfTotalProducts. ($numOfTotalProducts < 2? " product" : " products");?></span>
                                                        </div>
                                                        <!-- .card-body -->
                                                        <div class="card-body">
                                                            <div class="table-responsive">
                                                                <!-- .table -->
                                                                <table class="table" id="productTable">
                                                                    <!-- thead -->
                                                                    <thead>
                                                                        <tr>
                                                                            <th>
                                                                                <div class="thead-dd dropdown">
                                                                                    <span class="custom-control custom-control-nolabel custom-checkbox"><input type="checkbox" class="custom-control-input" id="check-handle2" onclick="toggleSelectAll(this)"> <label class="custom-control-label" for="check-handle2"></label></span>
                                                                                    <div class="thead-btn" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                                        <span class="fa fa-caret-down"></span>
                                                                                    </div>
                                                                                    <div class="dropdown-menu">
                                                                                        <div class="dropdown-arrow"></div><a class="dropdown-item" onclick="selectAll()">Select all</a> <a class="dropdown-item">Unselect all</a>
                                                                                        <div class="dropdown-divider"></div><a class="dropdown-item" onclick="unselectAll()">Bulk remove</a> <a class="dropdown-item">Bulk edit</a> <a class="dropdown-item">Separate actions</a>
                                                                                    </div>
                                                                                </div>
                                                                            </th>
                                                                            <th></th>
                                                                            <th> Brand Name </th>
                                                                            <th> Generic Name </th>
                                                                            <th> Category </th>
                                                                            <th> Date Arrived </th>
                                                                            <th> Expiration Date </th>
                                                                            <th> Selling Price </th>
                                                                            <th> Product Quantity </th>
                                                                            <th> Prescription </th>
                                                                            <th> Remaining Stocks </th>
                                                                            <th> TOTAL </th>
                                                                            <th> ACTIONS </th>
                                                                        </tr>
                                                                    </thead>
                                                                    <!-- /thead -->
                                                                    <!-- tbody -->
                                                                    <tbody id="productBody">
                                                                        <?php foreach ($products as $row) {
    
                              $total = $row['total'];
                              $availableqty = $row['qty_sold'];
                              $badgeClass = $row['qty_sold'] <= 10 ? 'badge-danger' : 'badge-success';
                              $prescriptionBadgeClass = $row['prescription_required'] == "Required" ? 'badge-warning' : 'badge-dark';
                              echo '
                                  <tr class="' . ($availableqty < 10 ? 'bg-secondary' : '') . ' productrecord">
                                      <td class="align-middle col-checker">
                                          <div class="custom-control custom-control-nolabel custom-checkbox">
                                              <input type="checkbox" class="custom-control-input" id="cid' . $row['product_id'] . '"> <label class="custom-control-label" for="cid' . $row['product_id'] . '"></label>
                                          </div>
                                      </td>
                                      <td>
                                          <a class="tile tile-img mr-1"><img class="img-fluid" src="' . base_url() . 'uploads/products/'.$row['product_image'].'"></a>
                                        </td>
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
                                          ' . $row['date_arrival'] . '
                                      </td>
                                      <td class="align-middle">
                                          ' . $row['expiry_date'] . '
                                      </td>
                                      <td class="align-middle">
                                          ₱' . $row['selling_price'] . '
                                      </td>
                                      <td class="align-middle">
                                          ' . $row['quantity'] . '
                                      </td>
                                      <td class="align-middle">
                                          <span class="badge badge-subtle '. $prescriptionBadgeClass .'">' . $row['prescription_required'] . '</span>
                                      </td>
                                      <td class="align-middle">
                                          <span class="badge badge-subtle ' . $badgeClass . '">
                                              ' . $row['qty_sold'] . ' pieces
                                          </span>
                                      </td>
                                      <td class="align-middle">
                                          ₱' . $total . '
                                      </td>
                                      <td class="align-middle text-right">
                                          <button class="btn btn-sm btn-icon btn-secondary" data-toggle="collapse" data-target="#pi' . $row['product_id'] . '"><i class="fa fa-pencil-alt"></i> <span class="sr-only">Edit</span></button> <button class="btn btn-sm btn-icon btn-secondary removeProduct" id="' . $row['product_id'] . '"><i class="far fa-trash-alt"></i> <span class="sr-only">Remove</span></button>
                                      </td>
                                  </tr>
                                  <form action="#" id="updateProductForm">
                                  <tr class="row-details bg-light collapse lowquantity" id="pi' . $row['product_id'] . '">
                                      <td colspan="12">
                                          <div class="row">
                                              <div class="col-md-6">
                                                  <table class="table table-bordered">
                                                            <tbody>
                                                                 <tr>
                                                                    <td>Product Image:</td>
                                                                    <td>
                                                                        <div class="custom-file">
                                                                            <input type="file" class="custom-file-input" name="product_image" multiple="" id="fileupload-customInput-'.$row['product_id'].'" onchange="updateLabel(this)">
                                                                            <label class="custom-file-label" for="fileupload-customInput-'.$row['product_id'].'" id="fileLabel-'.$row['product_id'].'">Choose files</label>
                                                                        </div>
                                                                      <input type="hidden" name="existing_image" value="' . $row['product_image'] . '">
                                                                    </td>
                                                                </tr>
                                                              <tr>
                                                                <td> Brand Name: </td>
                                                                <td> <input class="form-control" name="brand_name" placeholder="' . $row['brand_name'] . '" value="' . $row['brand_name'] . '"> 
                                                                <input name="product_id" value="' . $row['product_id'] . '" type="hidden"> 
                                                                </td>
                                                              </tr>
                                                              <tr>
                                                                <td> Generic Name: </td>
                                                                <td> <input class="form-control" name="generic_name" placeholder="' . $row['generic_name'] . '" value="' . $row['generic_name'] . '"> </td>
                                                              </tr>
                                                              <tr>
                                                                <td> Category: </td>
                                                                <td> <input class="form-control" name="category" placeholder="' . $row['category'] . '" value="' . $row['category'] . '"> </td>
                                                              </tr>
                                                              <tr>
                                                                <td> Arrival Date: </td>
                                                                <td> <input class="form-control" name="arrival_date" value="' . $row['date_arrival'] . '" type="date"> </td>
                                                              </tr>
                                                              <tr>
                                                                <td> Expiration Date: </td>
                                                                <td> <input class="form-control" name="expiry_date" value="' . $row['expiry_date'] . '" type="date"> </td>
                                                              </tr>
                                                            </tbody>
                                                          </table>
                                                        </div>
                                                        <div class="col">
                                                          <table class="table table-bordered">
                                                            <tbody>
                                                              <tr>
                                                                <td> Selling Price: </td>
                                                                <td> <input class="form-control" id="updSellPrice"  name="selling_price" type="number" placeholder="₱' . $row['selling_price'] . '" value="' . $row['selling_price'] . '" onkeyup="toSum();"> </td>
                                                              </tr>
                                                              <tr>
                                                                <td> Original Price: </td>
                                                                <td> <input class="form-control" id="updOrgPrice" name="original_price" type="number" placeholder="₱' . $row['original_price'] . '" value="' . $row['original_price'] . '" onkeyup="toSum();"> 
                                                                <input type="hidden" class="form-control" name="updProfit" id="updProfit"/></td>
                                                              </tr>
                                                              <tr>
                                                                <td> Product Quantity: </td>
                                                                <td> <input class="form-control" name="quantity" placeholder="' . $row['quantity'] . '" value="' . $row['quantity'] . '" id="updQty" type="number" onkeyup="toSum();"> </td>
                                                              </tr>
                                                              <tr>
                                                                <td> Remaining Stocks: </td>
                                                                <td> <input class="form-control" name="remaining_stocks" placeholder="' . $row['qty_sold'] . '" value="' . $row['qty_sold'] . '" type="number" id="updSoldQty"> </td>
                                                              </tr> 
                                                                <tr>
                                                              <td>Prescription:</td>
                                                              <td>
                                                            <select name="prescription_required" class="form-control">
                                                                <option value="Not Required" ' . ($row['prescription_required'] == 'Not Required' ? 'selected' : '') . '>Not Required</option>
                                                                <option value="Required" ' . ($row['prescription_required'] == 'Required' ? 'selected' : '') . '>Required</option>
                                                            </select>
                                                          </td>
                                                            </tr>
                                                            </tbody>
                                                          </table>
                                                            <button class="btn btn-primary" id="updateProductbtn" type="button" style="float: right;">Save Changes</button>
                                                        </div>
                                                      </div>
                                                    </td>
                                                  </tr>
                                                  </form>
                                                </tbody>';
                                              }
                                          ?>
                                         </table>
                                         <!-- /.table -->
                                         </div>
                                          <!-- /.table-responsive -->
                                            </div>
                                               <!-- /.card-body -->
                                                </div>
                                                    <!-- /.card -->
                                                </div>

                                                <div class="tab-pane fade" id="tab2">
                                                    <!-- .card -->
                                                    <div class="card card-fluid">
                                                        <div class="text-muted px-3 mb-2"> Showing <span><?php echo $numOfLowProducts . ($numOfLowProducts < 2? " product" : " products");?></span>
                                                        </div>
                                                        <!-- .card-body -->
                                                        <div class="card-body">
                                                            <div class="table-responsive">
                                                                <!-- .table -->
                                                                <table class="table" id="productTable">
                                                                    <!-- thead -->
                                                                    <thead>
                                                                        <tr>
                                                                            <th>
                                                                                <div class="thead-dd dropdown">
                                                                                    <span class="custom-control custom-control-nolabel custom-checkbox"><input type="checkbox" class="custom-control-input" id="check-handle2"> <label class="custom-control-label" for="check-handle2"></label></span>
                                                                                    <div class="thead-btn" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                                        <span class="fa fa-caret-down"></span>
                                                                                    </div>
                                                                                    <div class="dropdown-menu">
                                                                                        <div class="dropdown-arrow"></div><a class="dropdown-item" href="#">Select all</a> <a class="dropdown-item" href="#">Unselect all</a>
                                                                                        <div class="dropdown-divider"></div><a class="dropdown-item" href="#">Bulk remove</a> <a class="dropdown-item" href="#">Bulk edit</a> <a class="dropdown-item" href="#">Separate actions</a>
                                                                                    </div>
                                                                                </div>
                                                                            </th>
                                                                            <th></th>
                                                                            <th> Brand Name </th>
                                                                            <th> Generic Name </th>
                                                                            <th> Category </th>
                                                                            <th> Date Arrived </th>
                                                                            <th> Expiration Date </th>
                                                                            <th> Selling Price </th>
                                                                            <th> Product Quantity </th>
                                                                            <th> Prescription </th>
                                                                            <th> Remaining Stocks </th>
                                                                            <th> TOTAL </th>
                                                                            <th> ACTIONS </th>
                                                                        </tr>
                                                                    </thead>
                                                                    <!-- /thead -->
                                                                    <!-- tbody -->
                                                                    <tbody id="productBody">
                                                                        <?php foreach ($lowProducts as $row) {

                              $badgeClass = $row['qty_sold'] <= 10 ? 'badge-danger' : 'badge-success';
                              $prescriptionBadgeClass = $row['prescription_required'] == "Required" ? 'badge-warning' : 'badge-dark';
                              echo '
                                  <tr class="' . ($availableqty < 10 ? 'bg-secondary' : '') . ' productrecord">
                                      <td class="align-middle col-checker">
                                          <div class="custom-control custom-control-nolabel custom-checkbox">
                                              <input type="checkbox" class="custom-control-input" id="cid' . $row['product_id'] . '"> <label class="custom-control-label" for="cid' . $row['product_id'] . '"></label>
                                          </div>
                                      </td>
                                      <td>
                                          <a class="tile tile-img mr-1"><img class="img-fluid" src="' . base_url() . 'uploads/products/'. $row['product_image'] . '"></a>
                                        </td>                              
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
                                          ' . $row['date_arrival'] . '
                                      </td>
                                      <td class="align-middle">
                                          ' . $row['expiry_date'] . '
                                      </td>
                                      <td class="align-middle">
                                          ₱' . $row['selling_price'] . '
                                      </td>
                                      <td class="align-middle">
                                          ' . $row['quantity'] . '
                                      </td>
                                      <td class="align-middle">
                                          <span class="badge badge-subtle '. $prescriptionBadgeClass .'">' . $row['prescription_required'] . '</span>
                                      </td>
                                      <td class="align-middle">
                                          <span class="badge badge-subtle ' . $badgeClass . '">
                                              ' . $row['qty_sold'] . ' pieces
                                          </span>
                                      </td>
                                      <td class="align-middle">
                                          ₱' . $total . '
                                      </td>
                                      <td class="align-middle text-right">
                                          <button class="btn btn-sm btn-icon btn-secondary" data-toggle="collapse" data-target="#pi' . $row['product_id'] . '"><i class="fa fa-pencil-alt"></i> <span class="sr-only">Edit</span></button> <button class="btn btn-sm btn-icon btn-secondary removeProduct" id="' . $row['product_id'] . '"><i class="far fa-trash-alt"></i> <span class="sr-only">Remove</span></button>
                                      </td>
                                  </tr>
                                   <form action="#" id="updateProductForm">
                                  <tr class="row-details bg-light collapse lowquantity" id="pi' . $row['product_id'] . '">
                                      <td colspan="12">
                                          <div class="row">
                                              <div class="col-md-6">
                                                  <table class="table table-bordered">
                                                            <tbody>
                                                                 <tr>
                                                                    <td>Product Image:</td>
                                                                    <td>
                                                                        <div class="custom-file">
                                                                            <input type="file" class="custom-file-input" name="product_image" multiple="" id="fileupload-customInput-'.$row['product_id'].'" onchange="updateLabel(this)">
                                                                            <label class="custom-file-label" for="fileupload-customInput-'.$row['product_id'].'" id="fileLabel-'.$row['product_id'].'">Choose files</label>
                                                                        </div>
                                                                      <input type="hidden" name="existing_image" value="' . $row['product_image'] . '">
                                                                    </td>
                                                                </tr>
                                                              <tr>
                                                                <td> Brand Name: </td>
                                                                <td> <input class="form-control" name="brand_name" placeholder="' . $row['brand_name'] . '" value="' . $row['brand_name'] . '"> 
                                                                <input name="product_id" value="' . $row['product_id'] . '" type="hidden"> 
                                                                </td>
                                                              </tr>
                                                              <tr>
                                                                <td> Generic Name: </td>
                                                                <td> <input class="form-control" name="generic_name" placeholder="' . $row['generic_name'] . '" value="' . $row['generic_name'] . '"> </td>
                                                              </tr>
                                                              <tr>
                                                                <td> Category: </td>
                                                                <td> <input class="form-control" name="category" placeholder="' . $row['category'] . '" value="' . $row['category'] . '"> </td>
                                                              </tr>
                                                              <tr>
                                                                <td> Arrival Date: </td>
                                                                <td> <input class="form-control" name="arrival_date" value="' . $row['date_arrival'] . '" type="date"> </td>
                                                              </tr>
                                                              <tr>
                                                                <td> Expiration Date: </td>
                                                                <td> <input class="form-control" name="expiry_date" value="' . $row['expiry_date'] . '" type="date"> </td>
                                                              </tr>
                                                            </tbody>
                                                          </table>
                                                        </div>
                                                        <div class="col">
                                                          <table class="table table-bordered">
                                                            <tbody>
                                                              <tr>
                                                                <td> Selling Price: </td>
                                                                <td> <input class="form-control" id="updSellPrice"  name="selling_price" type="number" placeholder="₱' . $row['selling_price'] . '" value="' . $row['selling_price'] . '" onkeyup="toSum();"> </td>
                                                              </tr>
                                                              <tr>
                                                                <td> Original Price: </td>
                                                                <td> <input class="form-control" id="updOrgPrice" name="original_price" type="number" placeholder="₱' . $row['original_price'] . '" value="' . $row['original_price'] . '" onkeyup="toSum();"> 
                                                                <input type="hidden" class="form-control" name="updProfit" id="updProfit"/></td>
                                                              </tr>
                                                              <tr>
                                                                <td> Product Quantity: </td>
                                                                <td> <input class="form-control" name="quantity" placeholder="' . $row['quantity'] . '" value="' . $row['quantity'] . '" id="updQty" type="number" onkeyup="toSum();"> </td>
                                                              </tr>
                                                              <tr>
                                                                <td> Remaining Stocks: </td>
                                                                <td> <input class="form-control" name="remaining_stocks" placeholder="' . $row['qty_sold'] . '" value="' . $row['qty_sold'] . '" type="number" id="updSoldQty"> </td>
                                                              </tr> 
                                                                <tr>
                                                              <td>Prescription:</td>
                                                              <td>
                                                            <select name="prescription_required" class="form-control">
                                                                <option value="Not Required" ' . ($row['prescription_required'] == 'Not Required' ? 'selected' : '') . '>Not Required</option>
                                                                <option value="Required" ' . ($row['prescription_required'] == 'Required' ? 'selected' : '') . '>Required</option>
                                                            </select>
                                                          </td>
                                                            </tr>
                                                            </tbody>
                                                          </table>
                                                            <button class="btn btn-primary" id="updateProductbtn" type="button" style="float: right;">Save Changes</button>
                                                        </div>
                                                      </div>
                                                    </td>
                                                  </tr>
                                                  </form>
                                                </tbody>';
                                              }
                                          ?>
                                                                </table>
                                                                <!-- /.table -->
                                                            </div>
                                                            <!-- /.table-responsive -->
                                                        </div>
                                                        <!-- /.card-body -->
                                                    </div>
                                                    <!-- /.card -->
                                                </div>

                                                <div class="tab-pane fade" id="tab3">
                                                    <!-- .card -->
                                                    <div class="card card-fluid">
                                                        <div class="text-muted px-3 mb-2"> Showing <span><?php echo $numOfExpiredProducts. ($numOfExpiredProducts < 2? " product" : " products");?></span>
                                                        </div>
                                                        <!-- .card-body -->
                                                        <div class="card-body">
                                                            <div class="table-responsive">
                                                                <!-- .table -->
                                                                <table class="table" id="productTable">
                                                                    <!-- thead -->
                                                                    <thead>
                                                                        <tr>
                                                                            <th>
                                                                                <div class="thead-dd dropdown">
                                                                                    <span class="custom-control custom-control-nolabel custom-checkbox"><input type="checkbox" class="custom-control-input" id="check-handle2"> <label class="custom-control-label" for="check-handle2"></label></span>
                                                                                    <div class="thead-btn" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                                        <span class="fa fa-caret-down"></span>
                                                                                    </div>
                                                                                    <div class="dropdown-menu">
                                                                                        <div class="dropdown-arrow"></div><a class="dropdown-item" href="#">Select all</a> <a class="dropdown-item" href="#">Unselect all</a>
                                                                                        <div class="dropdown-divider"></div><a class="dropdown-item" href="#">Bulk remove</a> <a class="dropdown-item" href="#">Bulk edit</a> <a class="dropdown-item" href="#">Separate actions</a>
                                                                                    </div>
                                                                                </div>
                                                                            </th>
                                                                            <th></th>
                                                                            <th> Brand Name </th>
                                                                            <th> Generic Name </th>
                                                                            <th> Category </th>
                                                                            <th> Date Arrived </th>
                                                                            <th> Expiration Date </th>
                                                                            <th> Selling Price </th>
                                                                            <th> Product Quantity </th>
                                                                            <th> Prescription </th>
                                                                            <th> Remaining Stocks </th>
                                                                            <th> TOTAL </th>
                                                                            <th> ACTIONS </th>
                                                                        </tr>
                                                                    </thead>
                                                                    <!-- /thead -->
                                                                    <!-- tbody -->
                                                                    <tbody id="productBody">
                                                                        <?php foreach ($expiredProducts as $row) {
                              $total = $row['total'];
                              $availableqty = $row['qty_sold'];
                              $badgeClass = $row['qty_sold'] <= 10 ? 'badge-danger' : 'badge-success';
                              $prescriptionBadgeClass = $row['prescription_required'] == "Required" ? 'badge-warning' : 'badge-dark';
                              echo '
                                  <tr class="' . ($availableqty < 10 ? 'bg-secondary' : '') . ' productrecord">
                                      <td class="align-middle col-checker">
                                          <div class="custom-control custom-control-nolabel custom-checkbox">
                                              <input type="checkbox" class="custom-control-input" id="cid' . $row['product_id'] . '"> <label class="custom-control-label" for="cid' . $row['product_id'] . '"></label>
                                          </div>
                                      </td>
                                      <td>
                                          <a class="tile tile-img mr-1"><img class="img-fluid" src="' . base_url() . 'uploads/products/'. $row['product_image'] . '"></a>
                                        </td>
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
                                          ' . $row['date_arrival'] . '
                                      </td>
                                      <td class="align-middle">
                                          ' . $row['expiry_date'] . '
                                      </td>
                                      <td class="align-middle">
                                          ₱' . $row['selling_price'] . '
                                      </td>
                                      <td class="align-middle">
                                          ' . $row['quantity'] . '
                                      </td>
                                      <td class="align-middle">
                                          <span class="badge badge-subtle '. $prescriptionBadgeClass .'">' . $row['prescription_required'] . '</span>
                                      </td>
                                      <td class="align-middle">
                                          <span class="badge badge-subtle ' . $badgeClass . '">
                                              ' . $row['qty_sold'] . ' pieces
                                          </span>
                                      </td>
                                      <td class="align-middle">
                                          ₱' . $total . '
                                      </td>
                                      <td class="align-middle text-right">
                                          <button class="btn btn-sm btn-icon btn-secondary" data-toggle="collapse" data-target="#pi' . $row['product_id'] . '"><i class="fa fa-pencil-alt"></i> <span class="sr-only">Edit</span></button> <button class="btn btn-sm btn-icon btn-secondary removeProduct" id="' . $row['product_id'] . '"><i class="far fa-trash-alt"></i> <span class="sr-only">Remove</span></button>
                                      </td>
                                  </tr>
                                   <form action="#" id="updateProductForm">
                                  <tr class="row-details bg-light collapse lowquantity" id="pi' . $row['product_id'] . '">
                                      <td colspan="12">
                                          <div class="row">
                                              <div class="col-md-6">
                                                  <table class="table table-bordered">
                                                            <tbody>
                                                                 <tr>
                                                                    <td>Product Image:</td>
                                                                    <td>
                                                                        <div class="custom-file">
                                                                            <input type="file" class="custom-file-input" name="product_image" multiple="" id="fileupload-customInput-'.$row['product_id'].'" onchange="updateLabel(this)">
                                                                            <label class="custom-file-label" for="fileupload-customInput-'.$row['product_id'].'" id="fileLabel-'.$row['product_id'].'">Choose files</label>
                                                                        </div>
                                                                      <input type="hidden" name="existing_image" value="' . $row['product_image'] . '">
                                                                    </td>
                                                                </tr>
                                                              <tr>
                                                                <td> Brand Name: </td>
                                                                <td> <input class="form-control" name="brand_name" placeholder="' . $row['brand_name'] . '" value="' . $row['brand_name'] . '"> 
                                                                <input name="product_id" value="' . $row['product_id'] . '" type="hidden"> 
                                                                </td>
                                                              </tr>
                                                              <tr>
                                                                <td> Generic Name: </td>
                                                                <td> <input class="form-control" name="generic_name" placeholder="' . $row['generic_name'] . '" value="' . $row['generic_name'] . '"> </td>
                                                              </tr>
                                                              <tr>
                                                                <td> Category: </td>
                                                                <td> <input class="form-control" name="category" placeholder="' . $row['category'] . '" value="' . $row['category'] . '"> </td>
                                                              </tr>
                                                              <tr>
                                                                <td> Arrival Date: </td>
                                                                <td> <input class="form-control" name="arrival_date" value="' . $row['date_arrival'] . '" type="date"> </td>
                                                              </tr>
                                                              <tr>
                                                                <td> Expiration Date: </td>
                                                                <td> <input class="form-control" name="expiry_date" value="' . $row['expiry_date'] . '" type="date"> </td>
                                                              </tr>
                                                            </tbody>
                                                          </table>
                                                        </div>
                                                        <div class="col">
                                                          <table class="table table-bordered">
                                                            <tbody>
                                                              <tr>
                                                                <td> Selling Price: </td>
                                                                <td> <input class="form-control" id="updSellPrice"  name="selling_price" type="number" placeholder="₱' . $row['selling_price'] . '" value="' . $row['selling_price'] . '" onkeyup="toSum();"> </td>
                                                              </tr>
                                                              <tr>
                                                                <td> Original Price: </td>
                                                                <td> <input class="form-control" id="updOrgPrice" name="original_price" type="number" placeholder="₱' . $row['original_price'] . '" value="' . $row['original_price'] . '" onkeyup="toSum();"> 
                                                                <input type="hidden" class="form-control" name="updProfit" id="updProfit"/></td>
                                                              </tr>
                                                              <tr>
                                                                <td> Product Quantity: </td>
                                                                <td> <input class="form-control" name="quantity" placeholder="' . $row['quantity'] . '" value="' . $row['quantity'] . '" id="updQty" type="number" onkeyup="toSum();"> </td>
                                                              </tr>
                                                              <tr>
                                                                <td> Remaining Stocks: </td>
                                                                <td> <input class="form-control" name="remaining_stocks" placeholder="' . $row['qty_sold'] . '" value="' . $row['qty_sold'] . '" type="number" id="updSoldQty"> </td>
                                                              </tr> 
                                                                <tr>
                                                              <td>Prescription:</td>
                                                              <td>
                                                            <select name="prescription_required" class="form-control">
                                                                <option value="Not Required" ' . ($row['prescription_required'] == 'Not Required' ? 'selected' : '') . '>Not Required</option>
                                                                <option value="Required" ' . ($row['prescription_required'] == 'Required' ? 'selected' : '') . '>Required</option>
                                                            </select>
                                                          </td>
                                                            </tr>
                                                            </tbody>
                                                          </table>
                                                            <button class="btn btn-primary" id="updateProductbtn" type="button" style="float: right;">Save Changes</button>
                                                        </div>
                                                      </div>
                                                    </td>
                                                  </tr>
                                                  </form>
                                                </tbody>';
                                              } 
                                          ?>
                                                                </table>
                                                                <!-- /.table -->
                                                            </div>
                                                            <!-- /.table-responsive -->
                                                        </div>
                                                        <!-- /.card-body -->
                                                    </div>
                                                    <!-- /.card -->
                                                </div>
                                            </div>
                                            <!-- /.tab-content -->
                                        </div>
                                        <!-- /.card -->
                                    </div>
                                    <!-- /modal -->
                                    <div class="modal fade" id="confirmToRemove" tabindex="-1" role="dialog" aria-labelledby="removeModallabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h6 class="modal-title" id="removeModallabel">Confirm to remove</h6>
                                                </div>
                                                <div class="modal-body">
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-light" id="cancelRemovebtn" data-dismiss="modal">Cancel</button>
                                                    <button type="button" class="btn btn-warning" id="confirmRemovebtn">Delete</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.modal -->
                                    <!-- /.section-block -->
                                </div>
                                <!-- /.page-section -->
                            </div>
                            <!-- /.page-inner -->
                        </div>
                        <!-- /.page -->
                    </div>
                    <!-- /.wrapper -->
                    <footer class="app-footer">
                        <div class="copyright">
                            <span class="float-none d-block mt-1 mt-sm-0 text-center" style="margin-bottom: 5px"><i class="mdi mdi-circle text-success"></i>
                                        All Systems Operational
                            </span>
                            <span class="float-none float-sm-center d-block mt-1 mt-sm-0 text-center">Server Time: &nbsp;
                                        <span id="time"></span> PST</span>
                        </div>
                    </footer>
                </main>
        </div>

        <script type="text/javascript">
            "use strict";
    
            // jQuery FIle Upload Demo
            // =============================================================
            $(function () {
              // Change this to the location of your server-side upload handler:
              var url = "<?php echo base_url('InventoryController/importData'); ?>";
             // File upload using button
              // =============================================================
    
              var uploadButton = $('<button/>').addClass('btn btn-sm btn-primary').prop('disabled', true).text('Processing...').on('click', function () {
                var $this = $(this);
                var data = $this.data();
                $this.off('click').text('Abort').on('click', function () {
                  data.abort();
                });
                data.submit().always(function () {
                  $('#progress').removeClass('show').children().css('width', 0);
                });
              });
              var removeButton = $('<button/>').addClass('btn btn-sm btn-secondary').html('<i class="far fa-trash-alt"></i>').on('click', function () {
                $(this).parents('.list-group-item').remove();
              });
              var doneButton = $('<button/>').addClass('btn btn-sm btn-secondary').text('Done').on('click', function () {
                $(this).parents('.list-group-item').fadeOut();
              });
              $('#fileupload-customInput, #fileupload-btn, #fileupload-dropzone').fileupload({
                url: url,
                dropZone: null,
                dataType: 'json',
                autoUpload: false,
                acceptFileTypes: /(\.|\/)(gif|jpe?g|png|xlsx)$/i,
                maxFileSize: 999000,
                // Enable image resizing, except for Android and Opera,
                // which actually support image resizing, but fail to
                // send Blob objects via XHR requests:
                disableImageResize: /Android(?!.*Chrome)|Opera/.test(window.navigator.userAgent),
                previewMaxWidth: 32,
                previewMaxHeight: 32,
                previewCrop: true
              }).on('fileuploadadd', function (e, data) {
                data.context = $('<div/>').addClass('list-group-item').prependTo('#uploadList');
                $.each(data.files, function (index, file) {
                  var fileName = $('<div/>').addClass('media-body').text(file.name);
                  var media = $('<div/>').addClass('media align-items-center').append(fileName);
                  var node = $('<div/>').addClass('list-group-item-body').append(media);
    
                  if (!index) {
                    var mediaAction = $('<div/>').addClass('media-actions').append(uploadButton.clone(true).data(data));
                    node.find('.media').append(mediaAction);
                  }
    
                  node.prependTo(data.context);
                });
              }).on('fileuploadprocessalways', function (e, data) {
                var index = data.index;
                var file = data.files[index];
                var node = $(data.context.children()[index]);
                var figure, figPreview;
    
                if (file.preview) {
                  figure = $('<div/>').addClass('tile tile-img').append(file.preview);
                } else {
                  figure = $('<div />').addClass('tile bg-danger').text('NA');
                }
    
                figPreview = $('<div/>').addClass('list-group-item-figure').append(figure);
                data.context.prepend(figPreview);
    
                if (index + 1 === data.files.length) {
                  data.context.find('button').text('Upload').prop('disabled', !!data.files.error);
                }
    
                if (file.error) {
                  node.append($('<p class="list-group-item-text text-red"/>').text(file.error));
                  node.next().html(removeButton.clone(true));
                }
              }).on('fileuploadprogressall', function (e, data) {
                var progress = parseInt(data.loaded / data.total * 100, 10);
                $('#progress').addClass('show').children().css('width', progress + '%');
              }).on('fileuploaddone', function (e, data) {
                $.each(data.result.files, function (index, file) {
                  if (file.url) {
                    var link = $('<a>').attr('target', '_blank').prop('href', file.url);
                    data.context.find('.media-body').wrapInner(link);
                    data.context.find('.media-actions').html(doneButton.clone(true));
                    tata.success("Done", "Data imported successfully", {
                        closeBtn: false,
                        duration: 5000
                    });
                    $('#dataImport').modal('hide'); 
                      
                    setTimeout(function() {
                        location.reload(); 
                    }, 2000);
                  } else if (file.error) {
                    var error = $('<p class="list-group-item-text text-red"/>').text(file.error);
                    data.context.find('.media-body').append(error);
                    data.context.find('.media-actions').html(removeButton.clone(true));
                  }
                });
              }).on('fileuploadfail', function (e, data) {
                $.each(data.files, function (index) {
                  var error = $('<p class="list-group-item-text text-red"/>').text('File upload failed.');
                  $(data.context).find('.media-body').append(error);
                  data.context.find('.media-actions').html(removeButton.clone(true));
                });
              }).prop('disabled', !$.support.fileInput).parent().addClass($.support.fileInput ? undefined : 'disabled'); // upload dropzone
              // =============================================================
    
              var dropZone = $('#dropzone');
              $('#fileupload-dropzone').fileupload('option', 'dropZone', dropZone);
              dropZone.on('dragover', function () {
                dropZone.addClass('hover');
              }).on('drop dragleave', function () {
                dropZone.removeClass('hover');
              });
            });
                
                
                        
                   // Get the dropzone and the file input
                const dropzone = document.getElementById('dropzone');
                const fileInput = document.getElementById('fileupload-dropzone');
    
                // When the dropzone is clicked, trigger the file input click
                dropzone.addEventListener('click', () => {
                    fileInput.click();
                });
    
                // Optional: Handle file selection
                fileInput.addEventListener('change', (event) => {
                    const files = event.target.files;
                    console.log(files); // Do something with the selected files
                });
                
                
                document.addEventListener('DOMContentLoaded', function() {
                    // Loop through each label and set the default filename
                    <?php foreach ($products as $row): ?>
                        var defaultFileName = '<?php echo $row['product_image']; ?>'; // Get the filename from PHP
                        var fileLabel = document.getElementById('fileLabel-<?php echo $row['product_id']; ?>');
    
                        if (defaultFileName) {
                            fileLabel.textContent = defaultFileName; // Set the label to the filename
                        }
                    <?php endforeach; ?>
                });
                
                document.addEventListener('DOMContentLoaded', function() {
                function updateLabel(input) {
                    var fileLabel = document.querySelector('label[for="' + input.id + '"]'); // Get the corresponding label
                    var files = input.files;
                    if (files.length > 0) {
                        fileLabel.textContent = files[0].name; // Update label with the selected file name
                    } else {
                        fileLabel.textContent = 'Choose files'; // Reset to default if no file is selected
                    }
                } 
                });
                
                        
                    $(document).ready(function() {
                      $(document).on('click', '.removeProduct', function() {
                        var self = this; 
                        var del_id = $(self).attr("id");
                        var brand_name = $(self).closest('tr').find('td:nth-child(2)').text();
                        var generic_name = $(self).closest('tr').find('td:nth-child(3)').text();
                        var info = 'id=' + del_id;
    
                        // Show modal confirmation
                        $("#confirmToRemove").modal("show");
                        $("#confirmToRemove .modal-body").html("Are you sure you want to remove the product <b>" + brand_name + "-" + generic_name +"</b>?");
                        $("#confirmToRemove #confirmRemovebtn").click(function() {
    
                          $.ajax({
                            type: "POST",
                            url: "<?php echo base_url('InventoryController/removeProduct'); ?>",
                            dataType: "json",
                            data: info,
                            success: function(response) {
                              if (response.qty_sold < 10) {
                                $("#lowQty").text(parseInt($("#lowQty").text()) - 1);
                                $("#totalProductsQty").text(parseInt($("#totalProductsQty").text()) - 1);
                              } else {
                                $("#totalProductsQty").text(parseInt($("#totalProductsQty").text()) - 1);
                              }
    
                            }
                          });
                                
                            tata.success("Done", "Successfully deleted " + generic_name, {
                            closeBtn: !1,
                            duration: 5000
                            });
                            setTimeout(function() {
                            location.reload();
                          }, 2000); 
            
                          // Hide modal
                          $("#confirmToRemove").modal("hide");
                        });
    
                        $("#confirmToRemove #cancelRemovebtn").click(function() {
                          $("#confirmToRemove").modal("hide");
                        });
                      });
                    });
                        
                        
    
            $(document).ready(function() {
                $(document).on('click', '#updateProductbtn', function(event) {
                    event.preventDefault(); // Prevent the default form submission
                    var formData = new FormData($("#updateProductForm")[0]); // Use FormData to include file uploads
                    var formFields = $("#updateProductForm").find("input, select, textarea"); // Get all form fields
                    var $tr = $(this).closest('tr.lowquantity');
                    var productId = $tr.attr('id').replace('pi', '');
    
                    // Check if any form fields are empty
                    var isEmpty = false;
                    formFields.each(function() {
                        if ($(this).val() === "") {
                            isEmpty = true;
                            return false; 
                        }
                    });
    
                    if (isEmpty) {
                        tata.error("Warning", "Please fill in all fields.", {
                            closeBtn: false,
                            duration: 5000
                        });
                        return; // Stop the execution if any field is empty
                    }
    
                    $.ajax({
                        type: "POST",
                        url: "<?php echo base_url('InventoryController/updateProduct'); ?>",
                        data: formData,
                        contentType: false, 
                        processData: false, 
                        dataType: "json",
                        success: function(response) {
                            if (response.success) {
                                $("#addProduct").modal("hide");
                                tata.success("Done", "Successfully edited the product", {
                                    closeBtn: false,
                                    duration: 5000
                                });
                                // Reload the table with the new product information
                                setTimeout(function() {
                                    location.reload();
                                }, 2000);
    
                                // Clear the form after submission of the product details
                                $('#updateProductForm').get(0).reset(); // Make sure to reset the correct form
    
                            } else {
                                tata.error("Warning", response.message, {
                                    closeBtn: false,
                                    duration: 5000
                                });
                            }
    
                            // If the product quantity is lesser than 10, then increment to the low quantity counter.
                            if (response.data.qty_sold < 10) {
                                $("#lowQty").text(parseInt($("#lowQty").text()) + 1);
                            }
    
                            // Increment the newly added product to the counter
                            $("#totalProductsQty").text(parseInt($("#totalProductsQty").text()) + 1);        
                        },
                        error: function(xhr, status, error) {
                            alert("An error occurred: " + error);
                        }
                    });
                });
            });
    
                
                document.addEventListener('DOMContentLoaded', function() {
                      function toSum() {
                        var sell_price = document.getElementById('updSellPrice').value;
                        var org_price = document.getElementById('updOrgPrice').value;
                        var result = parseFloat(sell_price) - parseFloat(org_price);
                        if (!isNaN(result)) {
                          document.getElementById('updProfit').value = result;
                        }
                      }
                });
        </script>

        <script>
            $(function() {
            $("#toAddProduct").click(function(event) {
                event.preventDefault(); // Prevent the default form submission
        
                // Create a FormData object
                var formData = new FormData($("#addProductForm")[0]);
        
                // Check if any form fields are empty (optional)
                var formFields = $("#addProductForm").find("input, select, textarea"); // Get all form fields
                var isEmpty = false;
                formFields.each(function() {
                    if ($(this).val() === "") {
                        isEmpty = true;
                        return false; // Break the loop
                    }
                });
        
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url('InventoryController/addProduct'); ?>",
                    data: formData,
                    processData: false, // Important: Prevent jQuery from processing the data
                    contentType: false, // Important: Prevent jQuery from setting contentType
                    dataType: "json", // Specify the response data type as JSON
                    success: function(response) {
                        if (response.success) {
                            $("#addProduct").modal("hide");
                            tata.success("Success", "A new product has been added.", {
                                closeBtn: !1,
                                duration: 5e3
                            });
                            // Update the table with the new product information
                            var newRow = `<tr class="${response.data.qty_sold < 10 ? 'bg-secondary' : ''} productrecord">
                                <td class="align-middle col-checker">
                                    <div class="custom-control custom-control-nolabel custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="cid">
                                        <label class="custom-control-label" for="cid"></label>
                                    </div>
                                </td>
                                <td class="align-middle">
                                    ${response.data.brand_name}
                                </td>
                                <td class="align-middle">
                                    ${response.data.generic_name}
                                </td>
                                <td class="align-middle">
                                    ${response.data.category}
                                </td>
                                <td class="align-middle">
                                    ${response.data.arrival_date}
                                </td>
                                <td class="align-middle">
                                    ${response.data.expiry_date}
                                </td>
                                <td class="align-middle">
                                    ₱${response.data.selling_price}
                                </td>
                                <td class="align-middle">
                                    ₱${response.data.original_price}
                                </td>
                                <td class="align-middle">
                                    ${response.data.quantity}
                                </td>
                                <td class="align-middle">
                                    <span class="badge badge-subtle ${response.data.qty_sold < 10 ? 'badge-danger' : 'badge-success'}">
                                        ${response.data.qty_sold} pieces
                                    </span>
                                </td>
                                <td class="align-middle text-right">
                                    <button class="btn btn-sm btn-icon btn-secondary" data-toggle="collapse" data-target="#pi${response.data.product_id}">
                                        <i class="fa fa-pencil-alt"></i>
                                        <span class="sr-only">Edit</span>
                                    </button>
                                    <button class="btn btn-sm btn-icon btn-secondary removeProduct" id="pi${response.data.product_id}">
                                        <i class="far fa-trash-alt"></i>
                                        <span class="sr-only">Remove</span>
                                    </button>
                                </td>
                            </tr>
                            <tr class="row-details bg-light collapse lowquantity" id="pi${response.data.product_id}">
                                <td colspan="12">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <table class="table table-bordered">
                                                <tbody>
                                                    <tr>
                                                        <td> Brand Name: </td>
                                                        <td>
                                                            <input class="form-control" placeholder="Enter the Brand Name">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td> Generic Name: </td>
                                                        <td>
                                                            <input class="form-control" placeholder="Enter the Generic Name">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td> Category: </td>
                                                        <td>
                                                            <input class="form-control " placeholder="Enter the product category">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td> Arrival Date: </td>
                                                        <td>
                                                            <input class="form-control" placeholder="Enter when is the product arrived">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td> Expiration Date: </td>
                                                        <td>
                                                            <input class="form-control" placeholder="Enter when will the product expires">
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="col">
                                            <table class="table table-bordered">
                                                <tbody>
                                                    <tr>
                                                        <td> Selling Price: </td>
                                                        <td>
                                                            <input class="form-control" placeholder="Enter the selling price">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td> Original Price: </td>
                                                        <td>
                                                            <input class="form-control" placeholder="Enter the original price">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td> Product Quantity: </td>
                                                        <td>
                                                            <input class="form-control" placeholder="Enter the product quantity">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td> Remaining Stocks: </td>
                                                        <td>
                                                            <input class="form-control" placeholder="Enter remaining stocks">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Prescription:</td>
                                                        <td>
                                                            <select name="prescription_required" class="form-control">
                                                                <option value="Not Required">Not Required</option>
                                                                <option value="Required">Required</option>
                                                            </select>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <button class="btn btn-primary" type="button" style="float: right;">Save Changes</button>
                                        </div>
                                    </div>
                                </td>
                            </tr>`;
        
                            // Prepend the newly added product to the table
                            $("#productTable").prepend(newRow);
        
                            // Clear the form after submission of the product details
                            $('#addProductForm').get(0).reset();
        
                        } else {
                            tata.error("Warning", response.message, {
                                closeBtn: !1,
                                duration: 5e3
                            });
                        }
                        // Reload the table with the new product information
                        setTimeout(function() {
                            location.reload();
                        }, 2000);
                        // If the product quantity is lesser than 10, then increment to the low quantity counter.
                        if (response.data.qty_sold < 10) {
                            $("#lowQty").text(parseInt($("#lowQty").text()) + 1);
                        }
        
                        // Increment the newly added product to the counter
                        $("#totalProductsQty").text(parseInt($("#totalProductsQty").text()) + 1);
                    },
                    error: function(xhr, status, error) {
                        alert("An error occurred: " + error);
                    }
                });
            });
        });
        
                      function sum() {
                        var sellPrice = document.getElementById('sellingPrice').value;
                        var orgPrice = document.getElementById('originalPrice').value;
                        var result = parseFloat(sellPrice) - parseFloat(orgPrice);
                        if (!isNaN(result)) {
                          document.getElementById('profit').value = result;
                        }
                        var txtFirstNumberValue = document.getElementById('qty').value;
                        var result = parseInt(txtFirstNumberValue);
                        if (!isNaN(result)) {
                          document.getElementById('qty_sold').value = result;
                        }
                      }
                        
                    function selectAll() {
                        const checkboxes = document.querySelectorAll('#productTable .custom-control-input[type="checkbox"]');
                        checkboxes.forEach(checkbox => {
                            checkbox.checked = true; // Check each checkbox
                        });
                        document.getElementById('check-handle2').checked = true; // Update the main "Select All" checkbox state
                    }
        
                    function unselectAll() {
                        const checkboxes = document.querySelectorAll('#productTable .custom-control-input[type="checkbox"]');
                        checkboxes.forEach(checkbox => {
                            checkbox.checked = false; // Uncheck each checkbox
                        });
                        document.getElementById('check-handle2').checked = false; // Update the main "Select All" checkbox state
                    }
        
                    function toggleSelectAll(selectAllCheckbox) {
                        const checkboxes = document.querySelectorAll('#productTable .custom-control-input[type="checkbox"]');
                        checkboxes.forEach(checkbox => {
                            checkbox.checked = selectAllCheckbox.checked; // Set each checkbox to the state of the "Select All" checkbox
                        });
                    }
                        
                document.addEventListener('DOMContentLoaded', function() {
                    document.getElementById('searchInput').addEventListener('keyup', function() {
                        const query = this.value.toLowerCase();
                        console.log('Search Query:', query); // Debugging line
                        const rows = document.querySelectorAll('#productBody tr');
        
                        rows.forEach(row => {
                            const brandName = row.cells[1]?.textContent.toLowerCase() || '';
                            const genericName = row.cells[2]?.textContent.toLowerCase() || '';
                            const category = row.cells[3]?.textContent.toLowerCase() || '';
        
                            console.log('Row Data:', { brandName, genericName, category }); // Debugging line
        
                            if (brandName.includes(query) || genericName.includes(query) || category.includes(query)) {
                                row.classList.remove('hidden');
                                console.log('Showing Row:', row); // Debugging line
                            } else {
                                row.classList.add('hidden');
                                console.log('Hiding Row:', row); // Debugging line
                            }
                        });
                    });
                });
                            
                                        
                // Set the min attribute to today's date
                const today = new Date().toISOString().split('T')[0];
                document.getElementById('arrivalDate').setAttribute('min', today);
                document.getElementById('arrivalDate').value = today; // Set today's date as default      
                document.getElementById('expiryDate').setAttribute('min', today);
                document.getElementById('expiryDate').value = today;
        </script>
        <!-- BEGIN BASE JS -->

        <script src="<?php echo base_url();?>assets/vendor/popper.js/umd/popper.min.js"></script>
        <script src="<?php echo base_url();?>assets/vendor/bootstrap/js/bootstrap.min.js"></script>
        <!-- END BASE JS -->
        <!-- BEGIN PLUGINS JS -->
        <script src="<?php echo base_url();?>assets/vendor/blueimp-file-upload/js/vendor/jquery.ui.widget.js"></script>
        <script src="<?php echo base_url();?>assets/vendor/blueimp-load-image/js/load-image.all.min.js"></script>
        <script src="<?php echo base_url();?>assets/vendor/blueimp-canvas-to-blob/js/canvas-to-blob.min.js"></script>
        <script src="<?php echo base_url();?>assets/vendor/blueimp-file-upload/js/jquery.iframe-transport.js"></script>
        <script src="<?php echo base_url();?>assets/vendor/blueimp-file-upload/js/jquery.fileupload.js"></script>
        <script src="<?php echo base_url();?>assets/vendor/blueimp-file-upload/js/jquery.fileupload-process.js"></script>
        <script src="<?php echo base_url();?>assets/vendor/blueimp-file-upload/js/jquery.fileupload-image.js"></script>
        <script src="<?php echo base_url();?>assets/vendor/blueimp-file-upload/js/jquery.fileupload-audio.js"></script>
        <script src="<?php echo base_url();?>assets/vendor/blueimp-file-upload/js/jquery.fileupload-video.js"></script>
        <script src="<?php echo base_url();?>assets/vendor/blueimp-file-upload/js/jquery.fileupload-validate.js"></script>
        <!-- END PLUGINS JS -->
        <!-- BEGIN PLUGINS JS -->
        <script src="<?php echo base_url();?>assets/vendor/pace-progress/pace.min.js"></script>
        <script src="<?php echo base_url();?>assets/vendor/stacked-menu/js/stacked-menu.min.js"></script>
        <script src="<?php echo base_url();?>assets/vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
        <!-- END PLUGINS JS -->
        <!-- BEGIN THEME JS -->
        <script src="<?php echo base_url();?>assets/javascript/theme.min.js"></script>
        <!-- END THEME JS -->
    </body>

    </html>