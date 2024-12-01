    <?php
    define('BASE_URL2', '/myproject'); 
    ?>

    <!-- .app-header -->
      <header class="app-header app-header-dark">
        <!-- .top-bar -->
        <div class="top-bar">
          <!-- .top-bar-brand -->
          <div class="top-bar-brand">
            <!-- toggle aside menu -->
            <button class="hamburger hamburger-squeeze mr-2" type="button" data-toggle="aside-menu" aria-label="toggle aside menu">
              <span class="hamburger-box">
                <span class="hamburger-inner"></span>
              </span>
            </button>
            <!-- /toggle aside menu -->
            <a>
              <img src="<?php echo BASE_URL2.'/assets/images/pharmxpress_main.png';?>" width="140" height="40" alt="PharmXpress logo">
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
              <img src="<?php echo BASE_URL2.'/assets/images/pharmxpress_main.png';?>" width="140" height="40" alt="PharmXpress logo">
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
                  <a class="nav-link" href="pos" type="button">
                    <span class="fas fa-cart-shopping" value=5></span>
                  </a>
                  </li>
              </ul>
              <!-- /.nav -->
              <!-- .btn-account -->
              <div class="dropdown d-none d-md-flex">
                <button class="btn-account" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <span class="user-avatar user-avatar-md">
                    <img src="<?php echo BASE_URL2.'/assets/images/avatars/me.jpg';?>" alt="">
                  </span>
                  <span class="account-summary pr-lg-4 d-none d-lg-block">
                    <span class="account-name">Admin</span>
                    <span class="account-description">Admin</span>
                  </span>
                </button>
                <!-- .dropdown-menu -->
                <div class="dropdown-menu">
                  <div class="dropdown-arrow d-lg-none"></div>
                  <div class="dropdown-arrow ml-3 d-none d-lg-block"></div>
                  <h6 class="dropdown-header d-none d-md-block d-lg-none">Admin</h6>
                  <a class="dropdown-item" href="dashboard/account-settings">
                    <span class="dropdown-icon oi oi-person"></span> Account Settings </a>
                  <a class="dropdown-item" href="logout">
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