<div class="row">
    <div class="col-md-12">
        
        <input type="hidden" name="objective_id" value="<?php echo $objective->id; ?>">
        <input type="hidden" name="id" value="<?php echo @$outcome->id; ?>">
    </div>
    <div class="col-md-12">
        <div class="form-group">
            <label>Outcome Description</label>
            <textarea class="form-control summernote" rows="10" name="outcome_name" style="width: 100%;"><?=@$outcome->outcome_name?></textarea>
        </div>
    </div>
</div>