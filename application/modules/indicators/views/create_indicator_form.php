
<div class="row">
    <div class="col-md-12">

        <input type="hidden" name="outcome_id" value="<?php echo $outcome->id; ?>">

    </div>
    <div class="col-md-12">
        <div class="form-group">
            <label>Outputs Description</label>
            <textarea class="form-control summernote" rows="1" 
            name="indicator_name" 
            style="width: 100%;"><?=(@$indicator)?$indicator->indicator_name:''?></textarea>
        </div>
    </div>
</div>

