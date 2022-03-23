
<form method="post" action="<?= site_url('save-strategy') ?>">
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label>Strategy Description</label>
                    <textarea placeholder="Describe the strategy" class="form-control summernote"  name="strategy_name" style="width: 100%;"> </textarea>
                </div>
            </div>
        </div>
    </div>
    <div class="card-footer">
        <button type="submit" class="btn btn-success pull-right">   
        <i class="fas fa-plus"></i> Save Strategy
        </button>
    </div>
</form>
