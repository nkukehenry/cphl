<div class="row">
        <div class="col-md-12">
        
            <input type="hidden" name="strategy_id" value="<?php echo @$strategy->id; ?>">
                
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <label>Objective</label>
                <textarea class="form-control summernote" rows="2" name="objective_name" style="width: 100%;"><?=(@$obj)?$obj->objective_name:''?>
                </textarea>
            </div>
        </div>
    </div>