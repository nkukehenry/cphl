
<a href="<?php echo base_url(); ?>strategy-list" class="btn btn-primary">
    <i class="fa fa-arrow-left"></i> Back to Strategys
</a>

<hr>

<div class="card list-card" style="border-left: 10px solid green;">
    <div class="card-body">
        <div class="row " >
            <div class="col-md-12">
                <label>Strategy:</label>
              <h6><?php echo $strategy->strategy_name; ?></h6>
                <div class="grid">
                <div><strong><i class="fa fa-check-circle text-muted"></i> Last Updated:</strong> <?php echo time_ago($strategy->updated_at); ?></div>
                </div>
            </div>
        </div>
    </div>
</div>

<br>
<h5 class="text-muted">Select Objective & Activity</h5>

<?php if(!empty($selectedObjective)): ?>
    <label class="text-info">Selected Objective: </label>
    <h5><?php echo $selectedObjective->objective_name; ?></h5>
<?php endif; ?>

<hr>

<?php if(count($objectives)>0){ ?>

    <form class="row" method="post" id="entryForm">
        <div class="form-group col-lg-5 col-md-12 col-sm-12">
            <label>Objective</label>
            <select class="form-control select2" name="objective_id" onchange="$('#entryForm').submit()">
                <option>Choose Objective</option>
                <?php foreach($objectives as $obj): 
                    $selected = (!empty($selectedObjective))?$selectedObjective->id:null;
                ?>
                    <option <?php echo ($selected == $obj->id)?'selected':''; ?> value="<?php echo $obj->id; ?>"><?php echo $obj->objective_name; ?></option>
                <?php endforeach; ?>
            </select>
        </div>


        <div class="form-group col-lg-6 col-md-6 col-sm-12">
            <label>Facility</label>
            <select class="form-control select2 required" name="facility" onchange="$('#entryForm').submit()">
                <option value=""> Choose Facility</option>
                <?php 
                     if($facilities):
                     foreach($facilities as $facility):
                ?>
                    <option  <?php echo ($selectedFacility==$facility['id'])?'selected':''; ?> value="<?php echo $facility['id']; ?>"><?php echo $facility['facility_name']; ?></option>
                <?php 
                    endforeach;
                    endif; 
                ?>
            </select>
        </div>
    </form>
    
    <br>

    <?php } else{//No Objectives  ?>

        <div class="text-center">
            <h1 class="text-muted"><i class="fa fa-info-circle"></i></h1>
            <p class="text-danger">No Objectives were set up under strategy</p>
        </div> 
        <br>

    <?php } //ends check for Objectives ?>

    <?php 
    $outcomeCount = 0;
    foreach($outcomes as $outcome): ?>
    <br>
    <h6><?php echo ($outcomeCount+1).". ".$outcome->outcome_name; ?></h6>

    <?php  if(count($outcome->indicators)>0): ?>
     
    <!-- <label class="text-info">PARAMETERS / MEASURES: </label> -->
    <form method="post" action="<?php echo base_url()?>submit-data">
        <table width='100%' >
              <input type="hidden" value="<?=$outcome->id?>" name="outcome[]">
              <input type="hidden" value="<?=$selectedFacility?>" name="facility">
            <thead>
                <tr>
                    <th></th>
                    <th>Target</th>
                    <th>Score</th>
                </tr>
            </thead> 
            <?php
                $count =0; 
                foreach($outcome->indicators as $indicator):
                $count++;
            ?>
            <tr> 
            <td width="50%">
                <label><?php echo $indicator->indicator_name; ?></label>
                <p> <?php echo truncate($indicator->indicator_description,150); ?> </p>
            </td>
            <td width="10%">
                 <label><?php echo ($indicator->target_value)?$indicator->target_value:'N/A'; ?></label>
            </td>
            <td width="40%">
                <input type="text" name="values[<?=$outcomeCount?>][]" value="<?=indicator_score($indicator->id,$selectedFacility)?>"  required>
                <input type="hidden"  class="input" value="<?=$indicator->id?>" name="indicators[<?=$outcomeCount?>][]">
            </td>
            </tr>

            <?php endforeach; ?>
        </table>

    <?php 

    endif;
    if(count($outcome->indicators) == 0): 
    
    ?>

       <div class="text-center">
            <h1 class="text-muted"><i class="fa fa-info-circle"></i></h1>
            <h5 class="text-danger">No Indicators set up under <?=$outcome->outcome_name?></h5>
        </div> 
        <br>

    <?php  
       endif;
       $outcomeCount++;
       endforeach;
    ?>

    <input type="hidden" name="strategy_id" value="<?=$strategy->id?>" />

     <div class="row">
            <div class="col-sm-12 col-lg-4 col-lg-offset-8 col-sm-offset-0 col-md-6 col-md-offset-6">
                <button type="submit" value="Submit Data" class="btn btn-success">
                    <i class="fa fa-save"></i> Submit Data
                </button>
            </div>
        </div>
    </form>


