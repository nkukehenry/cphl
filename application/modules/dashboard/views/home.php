 <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <!-- Small boxes (Stat box) -->
          <div class="row">
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-info">
            <div class="inner">
              <h5><?php echo $activeStrategys; ?></h5>

              <p>Active Strategys</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="<?=site_url('strategy-list')?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-success">
            <div class="inner">
              <h5><?php echo $completedStrategys; ?><sup style="font-size: 20px"></sup></h5>

              <p>Completed Strategys</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="<?=site_url('strategy-list')?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-warning">
            <div class="inner">
              <h5><?php echo $activeBranches; ?></h5>
              <p>Districts</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="<?=site_url('district-list')?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-danger">
            <div class="inner">
              <h5><?php echo $contacts; ?></h5>
              <p>Contacts</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="<?=site_url('contacts')?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>

      <!-- /.row -->
      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
        <section class="col-lg-6 connectedSortable">
          <!-- Custom tabs (Charts with tabs)-->
          <div class="card">
            <div class="card-header">
              <h5 class="card-title">
                <i class="fas fa-chart-pie mr-1"></i>
                Latest Strategys
              </h5>
              <div class="card-tools"></div>
              
            </div><!-- /.card-header -->
            <div class="card-body">
              <div class="tab-content p-0">
                <!-- Morris chart - Sales -->
                <div class="chart tab-pane active" style="position: relative; height: 430px; color:black!important">
                  <ul>
                    <?php foreach($topFiveStrategys as $row){ ?>
                      <li>
                          <a style="color:black!important" href="<?=site_url('objective-list')?>/<?php echo $row->id; ?>">
                          <?php echo $row->strategy_name; ?></a>
                          <hr>
                      </li> 
                    <?php } ?>
                </div>
              </div>
            </div><!-- /.card-body -->
          </div>
          <!-- /.card -->
          <!-- /.card -->
        </section>
        <!-- /.Left col -->

        <section class="col-lg-6 connectedSortable">

                  <!-- Calendar -->
            <div class="card bg-gradient-white">
            <div class="card-header border-0">

              <h5 class="card-title">
                <i class="far fa-calendar-alt"></i>
                 Calendar
              </h5>
            </div>
            <!-- /.card-header -->
            <div class="card-body pt-0">
              <!--The Meetings calendar -->
              <?php echo Modules::run('meetings/meetingCalendar',true); ?>

            </div>
            <!-- /.card-body -->
          </div>

          <!-- /.card -->
        </section>
        <!-- right col -->
      </div>
      <!-- /.row (main row) -->
    </div><!-- /.container-fluid -->
  </section>



         