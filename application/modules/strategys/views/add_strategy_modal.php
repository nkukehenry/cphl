<div class="modal fade" id="create-strategy">
    <div class="modal-dialog modal-lg ">
       <form method="post" action="<?= site_url('save-strategy') ?>">
          
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
                    <textarea placeholder="Describe the strategy" class="form-control summernote"  name="strategy_name" style="width: 100%;"> </textarea>
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
       