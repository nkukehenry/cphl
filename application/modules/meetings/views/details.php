
<div class="btn-group">

<a href="<?=base_url()?>meetings"
class="btn btn-info btn-sm pull-right"><i class="fa fa-arrow-left"></i> Back to Meetings </a>

<a href="<?=base_url()?>meeting/<?=$meeting->id?>?pdf=1"
class="btn btn-warning btn-sm pull-right"><i class="fa fa-file"></i> Export PDF</a>
</div>

<hr>

<div class="row">

    <div class="col-md-6">

        <div class="form-group">
            <label>Meeting Title</label>
            <h5><?php echo $meeting->meeting_name; ?></h5>
        </div>

        <div class="form-group">
            <label>Meeting Date</label>
            <h5><?php echo $meeting->meeting_date; ?></h5>
        </div>

        <div class="form-group">
            <label>Meeting Venue</label>
            <h5><?php echo $meeting->venue; ?></h5>
        </div>
    </div>

    <div class="col-md-6">

       <div class="form-group">
            <label>Starting Time</label>
            <h5><?php echo $meeting->start_at; ?></h5>
        </div>

        <div class="form-group">
            <label>End Time</label>
            <h5><?php echo $meeting->end_at; ?></h5>
        </div>

        <div class="form-group">
            <label>Description</label>
            <p><?php echo $meeting->meeting_description; ?></p>
        </div>
    </div>
</div>

<div id="tabs">
  <ul>
    <li><a href="#participants"><i class="fa fa-users"></i> Participants</a></li>
    <li><a href="#discussions"><i class="fa fa-comments"></i> Discussions</a></li>
    <li><a href="#action-points"><i class="fa fa-list"></i> Action points</a></li>
  </ul>
  <div class="tab-content" id="participants"><?php require_once('meeting_participants.php'); ?></div>
  <div class="tab-content" id="discussions"><?php require_once('meeting_discussions.php'); ?></div>
  <div class="tab-content" id="action-points"><?php require_once('meeting_actions.php'); ?></div>
</div>





                