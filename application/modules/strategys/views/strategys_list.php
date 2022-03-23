<a href="#create-strategy" data-toggle="modal" class="btn btn-primary">
    <i class="fa fa-plus"></i> Add Strategy
</a>

<?php require_once('add_strategy_modal.php'); ?>

<hr>

<?php if($strategys): 
     foreach($strategys as $strat): 

    require('edit_strategy_modal.php');

     $color = (mt_rand(1,9)%2 ==0)?'green':'orange';
?>
        <div class="card list-card" style="border-left: 10px solid <?=$color?>;">
            <div class="card-body">
            <div class="row " >
                <div class="col-md-10">
                    <label>Strategy: </label>
                    <h5><?php echo truncate($strat->strategy_name,500); ?></h5>
                </div>
                <div class="col-md-1 flexed">
                         <div class="dropdown">
                                   <a class="text-muted"  type="button"data-toggle="dropdown">
                                       <h5><i class="fa fa-ellipsis-v"></i></h5>
                                    </a>
                                    <ul class="dropdown-menu options-dropdown" style="padding: 10px;">
                                    
                                        <li>
                                          <a href="<?php echo base_url('entry/'.$strat->id);?>"><i class="fa fa-box"></i>  Field Data Entry</a>
                                        </li>
                                        <li>
                                        <a href="<?php echo base_url('objective-list/'.$strat->id);?>"><i class="fa fa-list"></i>  View Objectives</a>
                                        </li>
                                        <li>
                                        <a href="#update-strategy<?=$strat->id?>" data-toggle="modal"> <i class="fa fa-edit"></i>   Edit Strategy</a>
                                        </li>
                                    </ul>
                            </div>
                </div>
            </div>
           
         </div>
        </div>
        <?php endforeach; ?>
        <?php endif; ?>

        <?php echo $links; ?>