<div class="modal fade" id="update-strategy<?=$strat->id?>">
    <div class="modal-dialog modal-lg ">
       <form method="post" action="<?= site_url('update-strategy') ?>">
          
        <div class="modal-content">
                     
            <div class="modal-header"> 
                <h4>Add New Strategy</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <h3 aria-hidden="true">&times;</h3>
                </button>
            </div>
            <div class="modal-body">
            <div class="col-md-12">
                <div class="form-group">
                    <label>Strategy Description</label>
                    <textarea placeholder="Strategy" class="form-control summernote"  name="strategy_name" style="width: 100%;"><?php echo $strat->strategy_name; ?></textarea>
                    <input type="hidden" name="id" value="<?=$strat->id?>" />
                </div>
            </div>
            </div>
            <div class="modal-footer">
                    <button type="submit" class="btn btn-success pull-right">   
                    <i class="fas fa-save"></i> Save Strategy
                    </button>
            </div>
        </div>
        
        </form>
    </div>
</div>
       