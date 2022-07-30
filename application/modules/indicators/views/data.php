

<div class="btn-group">
    <a href="<?php echo base_url('outcome-list/'.$outcome->objective_id);?>" 
        class="btn btn-primary btn-sm ">
        <i class="fas fa-arrow-left"></i>
        Back to Overall Outcomes 
    </a>
    <a href="#add_indicator"  data-toggle="modal" class="btn btn-success btn-sm pull-right"> 
        <i class="fas fa-plus"></i> Create New Indicator
    </a>
</div>

<?php require_once('add_indicator_modal.php'); ?>
<hr>

<div class="card list-card" style="border-left: 10px solid green;">
    <div class="card-body">
        <div class="col-md-12">
            <label>Indicators:</label>
             <h5><?php echo $outcome->outcome_name; ?></h5>
        </div>
    </div>
</div>
<br>

<h4 class="text-muted">Outputs</h4>

<table class="table table-bordered">
<thead>
    <tr>
        <th style="width: 10px">#</th>
        <th>Indicator Definition</th>
        <th>Outcome/Output</th>
        <td>Frequency</td>
        <th>Details</th>
        <th style="width: 150px">Action</th>
    </tr>
</thead>
<tbody>
    <?php  
           if($indicators): $i=0;  
           foreach($indicators as $indicator): 
           $i++; 

           require('update_indicator_modal.php');
    ?>
        <tr>
            <td><?php echo $i; ?></td>
            <td><?php echo $indicator->indicator_name; ?></td>
            <td></td>
            <td></td>
            <td><?php echo $indicator->indicator_description; ?></td>
            <td>
                <a href="#edit_indicator<?=$indicator->id?>" data-toggle="modal" class="btn btn-primary btn-sm">Edit Indicator</a> 
                <!-- <a href="<?php echo base_url('delete-outcome/'.$indicator->id);?>"  class="btn btn-danger btn-sm">Delete</a>-->
            </td> 
        </tr>
    <?php endforeach; endif; ?>

</tbody>
</table>