<div class="modal fade" id="add_outcome">
    <div class="modal-dialog modal-lg ">
       <form method="post" action="<?= site_url('save-outcome') ?>">
          
        <div class="modal-content">
                     
            <div class="modal-header"> 
            <h4>Add Result Definition</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <h3 aria-hidden="true">&times;</h3>
                </button>
            </div>
            <div class="modal-body">
                <?php require_once('create_outcome_form.php'); ?>
            </div>
            <div class="modal-footer">
                    <button type="submit" class="btn btn-success pull-right">   
                            Submit <i class="fas fa-plus"></i>
                    </button>
            </div>
        </div>
        
        </form>
    </div>
</div>
       