
<form action="<?=base_url()?>strategy_report">

    <select id="selector" name="strategy" class="select2">
    
       <?php foreach($strategys as $row): ?>

        <option value="<?=$row->id?>"  <?=($strategy && ($row->id == $strategy->id))?'selected':''?>
            
            data-description="">
            <?=$row->strategy_name?>
        </option>

        <?php endforeach; ?>
    </select>
</form>

