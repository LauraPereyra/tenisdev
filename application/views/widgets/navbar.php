<header id="header" class="" >
    <div class="headerbar">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="headerbar-left">
            <ul class="header-nav header-nav-options">
                <li>
                    <a class="btn btn-icon-toggle menubar-toggle" data-toggle="menubar" href="javascript:void(0);">
                        <i class="fa fa-bars"></i>
                    </a>
                </li>
                <li class="header-nav-brand" >
                  
                </li>
            </ul>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="headerbar-right">
            <ul class="header-nav header-nav-profile">
                <li class="dropdown">
                    <a href="javascript:void(0);" class="dropdown-toggle ink-reaction" data-toggle="dropdown">
                        <span class="profile-info">ADMIN
                            <!-?php echo $_SESSION['usr_first_name'] . ' ' .$_SESSION['usr_last_name'] ?-->
                        </span>
                    </a>
                    <ul class="dropdown-menu animation-dock">
                        <li class="dropdown-header">Config</li>
                        <li><a href="<?php echo site_url('users/logout') ?>"><i class="fa fa-fw fa-power-off text-danger"></i>Salir</a></li>
                    </ul><!--end .dropdown-menu -->
                </li><!--end .dropdown -->
            </ul><!--end .header-nav-profile -->
        </div><!--end #header-navbar-collapse -->
    </div>
</header>
