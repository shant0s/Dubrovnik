<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?= base_url('assets/admin') ?>/dist/img/boxed-bg.jpg" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>Hello! <?php echo ucfirst($username); ?></p>  
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>      
        <ul class="sidebar-menu"> 
            <li class="header" style="color: white;">MAIN NAVIGATION</li>             
            <li class="<?php echo segment(2) == 'dash' ? "active" : "" ?>"><a href="<?php echo site_url('admin/dash') ?>"><i class="fa fa-dashboard"></i><span>DASHBOARD</span></a></li>
            <li class="<?php echo segment(2) == 'booking' ? "active" : "" ?>"><a href="<?php echo site_url('admin/booking') ?>"><i class="fa fa-book"></i> <span>Booking Manager</span></a></li>
            <li class="treeview <?php echo segment(2) == 'content' ? "active" : "" ?>">
                <a href="#">
                    <i class="fa fa-files-o"></i> <span>Content Manager</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="<?php echo segment(3) == 'pages' ? "active" : "" ?>"><a href="<?php echo site_url('admin/content/pages') ?>"><i class="fa fa-circle-o"></i>Page Manager</a></li>
                    <li class="<?php echo segment(3) == 'banners' ? "active" : "" ?>"><a href="<?php echo site_url('admin/content/banners') ?>"><i class="fa fa-circle-o"></i> Banner Manager</a></li>
                    <li class="<?php echo segment(3) == 'testimonials' ? "active" : "" ?>"><a href="<?php echo site_url('admin/content/testimonials') ?>"><i class="fa fa-circle-o"></i> Testimonial Manager</a></li>
                </ul>
            </li>                        
            <li class="<?php echo segment(2) == 'fleet_manager' ? "active" : "" ?>"><a href="<?php echo site_url('admin/fleet_manager') ?>"><i class="fa fa-cab"></i> <span>Fleet Manager</span></a></li>
            <li class="<?php echo segment(2) == 'zone_manager' ? "active" : "" ?>"><a href="<?php echo site_url('admin/zone_manager') ?>"><i class="fa fa-globe"></i><span>Zone Manager</span></a></li>
            <li class="treeview <?php echo segment(2) == 'rate_manager' ? "active" : "" ?>">
                <a href="#">
                    <i class="fa fa-eur"></i> <span>Rate Manager</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
<!--                    <li class="--><?php //echo segment(2) == 'zone_manager' ? "active" : "" ?><!--"><a href="--><?php //echo site_url('admin/zone_manager/zone_rate') ?><!--"><i class="fa fa-circle-o"></i><span>Zone Rate</span></a></li>                                        -->
                    <li class="<?php echo segment(3) == 'base_fare' ? "active" : "" ?>"><a href="<?php echo site_url('admin/rate_manager/base_fare') ?>"><i class="fa fa-circle-o"></i>Base Fare</a></li>                   
                    <li class="<?php echo segment(3) == 'fare_breakdown' ? "active" : "" ?>"><a href="<?php echo site_url('admin/rate_manager/fare_breakdown') ?>"><i class="fa fa-circle-o"></i>Fare Breakdown</a></li>                   
                    <li class="<?php echo segment(3) == 'additional_rate_manager' ? "active" : "" ?>"><a href="<?php echo site_url('admin/rate_manager/additional_rate/1') ?>"><i class="fa fa-circle-o"></i>Additional Rate Manager</a></li>                   
                </ul>
            </li>           
            <!--<li class="<?php echo segment(2) == 'menu_manager' ? "active" : "" ?>"><a href="<?php echo site_url('admin/menu_manager') ?>"><i class="fa fa-navicon"></i><span>Menu Manager</span></a></li>-->
            <li class="<?php echo segment(2) == 'config' ? "active" : "" ?>"><a href="<?php echo site_url('admin/config') ?>"><i class="fa fa-cogs"></i> <span>Admin User Manager</span></a></li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>

