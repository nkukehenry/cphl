<a href="<?php echo base_url('objective-list/'.$strategy->id);?>" 
    class="btn btn-primary btn-sm pull-right"> <i class="fas fa-arrow-left"></i> Back to Strategy Objectives</a>
<hr>

<form method="post" action="<?= site_url('update-objective') ?>">
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                    <input type="hidden" name="id" value="<?php echo $objective->id; ?>">
                    <input type="hidden" name="strategy_id" value="<?php echo $strategy->id; ?>">
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label>Description</label>
                    <textarea class="form-control summernote" rows="10" name="objective_name" 
                    style="width: 100%;"><?php echo $objective->objective_name; ?></textarea>
                </div>
            </div>
        </div>
    </div>
    <div class="card-footer">
        <button type="submit" class="btn btn-primary pull-right">   
        <i class="fas fa-save"></i> Save Changes
        </button>
    </div>
</form>