<div class="btn-group">
<a href="<?php echo base_url('objective-list/'.$objective->strategy_id);?>" 
class="btn btn-primary btn-sm pull-right"><i class="fas fa-arrow-left"></i> Back to  Strategy Objective</a>
<a href="#add_outcome" data-toggle="modal" class="btn btn-success btn-sm pull-right"><i class="fas fa-plus"></i> Create New outcome</a>
</div>


<?php require_once('add_outcome_modal.php'); ?>
<hr>

<div class="card list-card" style="border-left: 10px solid green;">
    <div class="card-body">
        <div class="col-md-12">
            <label>Objective:</label>
             <h5><?php echo $objective->objective_name; ?></h5>
            <div class="grid"> 
                <div><strong><i class="fa fa-check-circle text-muted"></i> Last Updated:</strong> <?php echo time_ago($objective->updated_at); ?></div>
            </div>
        </div>
    </div>
</div>
<br>

<h4 class="text-muted">Overall Outcomes</h4>

<table class="table table-bordered">
    <thead>
        <tr>
            <th style="width: 10px">#</th>
            <th>Outcome</th>
            <th>Indicators</th>
            <th style="width: 150px">Action</th>
        </tr>
    </thead>
    <tbody>
        <?php  
               if($outcomes): $i=0;  
               foreach($outcomes as $outcome): 
               $i++;

               require('update_outcome_modal.php')
        ?>
            <tr>
                <td><?php echo $i; ?></td>
                <td><?php echo $outcome->outcome_name; ?></td>
                <td>
                    <a href="<?php echo base_url('indicator-list/'.$outcome->id);?>" 
                    class="btn btn-success btn-sm">Indicators</a>
                </td>
                <td>
                    <a href="#edit_outcome<?=$outcome->id?>"  data-toggle="modal"
                    class="btn btn-primary btn-sm">Edit</a> <a href="<?php echo base_url('delete-outcome/'.$outcome->id);?>" 
                    class="btn btn-danger btn-sm">Delete</a>
                </td>
            </tr>
        <?php endforeach; endif; ?>

    </tbody>
</table>

