    <?php
    define('BASE_URL', '/myproject'); 
    ?>
    <!-- .app-aside -->
      <aside class="app-aside app-aside-expand-md app-aside-light">
        <!-- .aside-content -->
        <div class="aside-content">
          <!-- .aside-header -->
          <header class="aside-header d-block d-md-none">
            <!-- .btn-account -->
            <button class="btn-account" type="button" data-toggle="collapse" data-target="#dropdown-aside">
              <span class="user-avatar user-avatar-lg">
               <img src="<?php echo BASE_URL.'/assets/images/avatars/me.jpg';?>">
              </span>
              <span class="account-icon">
                <span class="fa fa-caret-down fa-lg"></span>
              </span>
              <span class="account-summary">
                <span class="account-name" id="aside-username">Admin</span>
                <span class="account-description" id="aside-role">Admin</span>
              </span>
            </button>
            <!-- /.btn-account -->
            <!-- .dropdown-aside -->
            <div id="dropdown-aside" class="dropdown-aside collapse">
              <!-- dropdown-items -->
              <div class="pb-3">
                <a class="dropdown-item" href="/dashboard/account-settings">
                  <span class="dropdown-icon oi oi-person"></span> Account Settings </a>
                <a class="dropdown-item" href="<?php echo BASE_URL.'/functions/doLogout.php';?>">
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
                  <a href="dashboard" class="menu-link">
                    <span class="menu-icon fas fa-home"></span>
                    <span class="menu-text">Home</span>
                  </a>
                </li>
                <!-- /.menu-item -->
                <!-- .menu-item -->
                <li class="menu-item">
                  <a href="pos" class="menu-link">
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
                  <a href="products" class="menu-link">
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
                <li class="menu-header">USERS </li>
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
        </div>
        <!-- /.aside-content -->
      </aside>
      <!-- /.app-aside -->