<?php include('add_objective_modal.php'); ?>

<div class="btn-group">
<a href="<?php echo base_url('strategy-list');?>" 
    class="btn btn-primary btn-sm pull-right">Back to Strategys <i class="fas fa-arrow-left"></i></a>

<?php if(!empty($proj_id)) { ?>
<a href="#add_objective"  data-toggle="modal"
class="btn btn-success btn-sm pull-right">New Objective <i class="fas fa-plus"></i></a>
<?php } ?>
</div>

 <hr>

<div class="card list-card" style="border-left: 10px solid green;">
    <div class="card-body">
    <div class="row " >
        <div class="col-md-12">
            <label>Strategy:</label>
            <h4><?php echo truncate($strategy->strategy_name,500); ?></h4>
        </div>
    </div>
    
    </div>
</div>
<br>
<br> 
<h3>Strategy Objectives</h3>
<hr>
<table class="table table-bordered">
    <thead>
        <tr>
            <th style="width: 10px">#</th>
            <th>Objective</th>
            <th>Outcomes</th>
            <th style="width: 150px">Action</th>
        </tr>
    </thead>
    <tbody>
        <?php  
           if($objectives): 
            $i = $page;  
            foreach($objectives as $obj):
                 $i++;
                 require('edit_objective_modal.php');
         ?>
            <tr>
                <td><?php echo $i; ?></td>
                <td><?php echo truncate($obj->objective_name,200); ?></td>
                <td>
                    <a href="<?php echo base_url('outcome-list/'.$obj->id);?>" 
                    class="btn btn-success btn-sm">Outcomes</a>
                </td>
                <td>
                    <div class="btn-group">
                    <a href="#edit_objective<?=$obj->id?>" data-toggle="modal" 
                    class="btn btn-primary btn-sm">Edit</a> 
                    <a href="#delete<?php echo $obj->id;?>"  class="btn btn-danger btn-sm">Delete</a>
                    </div>
                </td>
            </tr>
        <?php endforeach; endif; ?>

    </tbody>
</table>

<?php echo $links; ?>
                