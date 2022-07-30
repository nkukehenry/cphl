<div class="row">
    <div class="col-md-12">
        
        <input type="hidden" name="objective_id" value="<?php echo $objective->id; ?>">
        <input type="hidden" name="id" value="<?php echo @$outcome->id; ?>">
    </div>
    <div class="col-md-12">
        <div class="form-group">
            <label>Reult Description</label>
            <textarea class="form-control summernote" rows="10" name="outcome_name" style="width: 100%;"><?=@$outcome->outcome_name?></textarea>
        </div>
        <div class="form-group">
            <label>Numerator</label>
            <input type="text" name="numerator" class="form-control" value="<?=@$outcome->numerator?>">
        </div>
        <div class="form-group">
            <label>Denominator</label>
            <input type="text" name="denominator"  class="form-control" value="<?=@$outcome->denominator?>">
        </div>
    </div>
</div>