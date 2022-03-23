
 <!-- Main Sidebar Container -->
 
 
 <aside class="main-sidebar sidebar-primary-dark bg-white  elevation-4" >
    <!-- Brand Logo -->
    <a href="<?php echo base_url();?>" class="brand-link bg-primary" style="color: #FFFFFF; text-align:center;">
      <!-- <img src="../../dist/img/AdminLTELogo.png"
           alt="AdminLTE Logo"
           class="brand-image img-circle elevation-3"
           style="opacity: .8"> -->
      <span class="brand-text text-white  font-weight-bold" style="text-align:center; font-size: 10pt!important;">
      <small><?php echo $setting->title; ?></small>
     </span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar  sido" style="width:100% !important;">
      <!-- Sidebar user (optional) -->
      
      <div class="user-panel mt-3 pb-3 mb-3" style="text-align:center; line-height:0.2cm;">
        <?php if(isset($userdata['names'])): ?>
        <div class="image">
          <img src="<?php echo base_url(); ?>assets/img/user.jpg" class="img-circle elevation-2" alt="User Image" style="width:40px; height:40px;">
           <span class="text-muted ml-1"><?php   echo strtoupper(truncate($userdata['names'],1230));  ?></span>
        </div>
        <?php endif; ?>
      
    </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2" style="overflow:hidden; font-size:14px;">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview">
            <a href="<?php echo base_url(); ?>" class="nav-link">
              <i class="fa fa-tachometer-alt"></i>
              <p>
               Main Dashboard
              </i>
              </p>
            </a>
          </li>


        <?php if(in_array('35', $permissions)): ?>
          <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-copy"></i>
                <p>
                    KPI Setup
                    <i class="fas fa-angle-left right"></i>
                    <span class="badge badge-info right"></span>
                </p>
            </a>
            <ul class="nav nav-treeview">
            <li class="nav-item">
                    <a href="<?=site_url('create-strategy')?>" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Create Strategy</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?=site_url('strategy-list')?>" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>View Strategies</p>
                    </a>
                </li>
            </ul>
            </li>
        <?php endif; ?>
     
         <!--
        
        <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-edit"></i>
                <p>
                    Meetings
                    <i class="fas fa-angle-left right"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="<?=base_url()?>meetings" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Manage Meetings</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?=base_url()?>meetings-calendar" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Meeting Calendar</p>
                    </a>
                </li>
            </ul>
        </li>

        <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="nav-icon fa fa-map"></i>
                <p>
                    Places
                    <i class="fas fa-angle-left right"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="<?=site_url('district-list')?>" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Districts</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?=site_url('facility-list')?>" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Facilities</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?=site_url('contacts-list')?>" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Contacts</p>
                    </a>
                </li>
            </ul>
        </li>

        <li class="nav-item">
            <a href="<?=base_url()?>contacts" class="nav-link">
                <i class="nav-icon far fa-calendar-alt"></i>
                <p>
                    Contacts
                    <span class="badge badge-info right">People</span>
                </p>
            </a>
        </li>-->
       <!--  <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="nav-icon fa fa-archive"></i>
                <p>
                    Extras
                    <i class="fas fa-angle-left right"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Clinic Types</p>
                    </a>
                </li>
            </ul>
        </li> -->

        <li class="nav-item has-treeview">
            <a href="<?=base_url()?>strategy_report" class="nav-link">
                <i class="nav-icon fas fa-list"></i>
                <p>Tabular Metrics Report</p>
            </a>
          </li>

          <li class="nav-item has-treeview">
           <a href="<?=base_url()?>visualize" class="nav-link">
                <i class="fas  fa-chart-pie nav-icon"></i>
                <p>Visualization Report</p>
            </a>
          </li>
          
        <!--<li class="nav-item">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-list"></i>
                <p>
                    Reports
                    <i class="fas fa-angle-left right"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="<?=base_url()?>strategy_report" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Strategy Tabular Report</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?=base_url()?>visualize" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Visualization Report</p>
                    </a>
                </li>
            </ul>
        </li>-->
           <!--user perm 14-->
          <?php if(in_array('35', $permissions)){ ?>
          <li class="nav-item has-treeview ">
            <a href="#" class="nav-link">
              <i class="fa fa-cog"></i>
              <p>
                System Settings
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
                
                <li class="nav-item">

                <?php if(in_array('15', $permissions)){ ?>
                <a href="<?php echo base_url();?>auth/users" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Manage User</p>
                </a>
                 </li>
                 <li class="nav-item">
                <a href="<?php echo base_url();?>admin/groups" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Group Permissions</p>
                </a>
                </li>
                <li class="nav-item">
                <a href="<?php echo base_url();?>admin/showLogs" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>User Logs</p>
                </a>
                </li>
                <li class="nav-item">
                <a href="<?php echo base_url();?>forms/"  class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Constants & Variables</p>
                </a>
                  </li>
                <?php } ?>
            </ul>
          </li>
          <?php } ?>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
  