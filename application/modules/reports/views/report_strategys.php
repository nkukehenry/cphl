
<?php 
        if(!@$hide_menu)
            include('includes/strategys_context_menu.php');
 ?>

<table border="1" width="100%">
    <thead>
        <tr>
            <th class="cell-header">Overall Outcome</th>
            <th class="cell-header">Indicator(s)</th>
            <th class="cell-header">Target</th>
            <th class="cell-header">Achieved</th>
        </tr>
    </thead>
       <?php 
         $rows = 0;
         foreach($objectives as $objective):
          $outcomes = outcomes($objective->id);

          if(count($outcomes)>0):
        ?>
             <tr>
                 <td class="text-bold bg-dark" colspan="4">OBJECTIVE: <?=$objective->objective_name?></td>
             </tr>
            
            <?php 
                  
                  foreach($outcomes as $outcome):
                    $indicatorData = indicators($outcome->id);

                    if($indicatorData):
                 ?>
                 
                    <tr style="background-color:<?=(($rows%2)>0)?'#eee':''?>">

                    <td  rowspan="<?=($indicatorData)?count($indicatorData)+1:1;?>"> 
                        <?=$outcome->outcome_name?>
                    </td>
                    
                    </tr>

                    <?php foreach($indicatorData as $indicator):

                        $value = indicator_data($indicator->id);
                        $meetsTarget = ($value &&  (!empty($value->target_value)) && is_numeric($value->target_value) && $value->indicator_value>=$indicator->target_value)?true:false;
                     ?>
                        <tr style="background-color:<?=(($rows%2)>0)?'#eee':''?>"> 
                            <td> <?=$indicator->indicator_name?></td>
                            <td> <?=$indicator->target_value?></td>
                            <td  style="background-color:<?=($meetsTarget)?'#3bc92e':'#f79797'?>"> <?=($value)?$value->indicator_value:'N/A'?></td>
                        </tr>
                    <?php endforeach; ?>

            <?php 
                $rows++; 
                 endif;
                 endforeach; 
                 endif; 
                 endforeach; ?>

</table>

<?php if(!@$hide_menu): ?>

<script src="<?php echo base_url()?>assets/plugins/context-menu/context-menu.js"></script>

<?php endif; ?>

