<?php if($strategy): ?>


<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/highcharts-more.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>


<script type="text/javascript">
  
   function renderChart(indicatorData){

    console.log(indicatorData);

    var data = JSON.parse(indicatorData);


    var currentValue = (data.indicator_value)?parseInt(data.indicator_value):0;
    var targetValue = (data.indicator_target)?parseInt(data.indicator_target):100;


    console.log(data.id);
    console.log(currentValue);
    console.log(targetValue);

        Highcharts.chart('container'+data.id, {

        chart: {
            type: 'gauge',
            plotBackgroundColor: null,
            plotBackgroundImage: null,
            plotBorderWidth: 0,
            plotShadow: false
        },

        title: {
            text: data.indicator_name
        },

        pane: {
            startAngle: -150,
            endAngle: 150,
            background: [{
                backgroundColor: {
                    linearGradient: { x1: 0, y1: 0, x2: 0, y2: 1 },
                    stops: [
                        [0, '#FFF'],
                        [1, '#333']
                    ]
                },
                borderWidth: 0,
                outerRadius: '109%'
            }, {
                backgroundColor: {
                    linearGradient: { x1: 0, y1: 0, x2: 0, y2: 1 },
                    stops: [
                        [0, '#333'],
                        [1, '#FFF']
                    ]
                },
                borderWidth: 1,
                outerRadius: '107%'
            }, {
                // default background
            }, {
                backgroundColor: '#DDD',
                borderWidth: 0,
                outerRadius: '105%',
                innerRadius: '103%'
            }]
        },

        // the value axis
        yAxis: {
            min: 0,
            max: targetValue,

            minorTickInterval: 'auto',
            minorTickWidth: 1,
            minorTickLength: 10,
            minorTickPosition: 'inside',
            minorTickColor: '#666',

            tickPixelInterval: 30,
            tickWidth: 2,
            tickPosition: 'inside',
            tickLength: 10,
            tickColor: '#666',
            labels: {
                step: 2,
                rotation: 'auto'
            },
            title: {
                text: ''//data.indicator_name
            },
            plotBands: [{
                from: 0,
                to: (targetValue>40)?40:targetValue,
                color: '#DF5353' // green
            }, {
                from: (targetValue>40)?40:targetValue,
                to: (targetValue>70)?70:targetValue,
                color: (targetValue>70)?'#DDDF0D':'#55BF3B' // yellow
            }, {
                from: (targetValue>=70)?70:targetValue,
                to: (targetValue<=100)?100:targetValue,
                color: '#55BF3B' // red
            }]
        },

    series: [{
        name: 'Current Value',
        data: [currentValue],
        tooltip: {
            valueSuffix: ''
        }
    }]

});

}

</script>


<form method="get" action="<?=base_url()?>" id="vForm" class="row">
<div class="form-group col-md-9">
    <labe >Choose Strategy</label>

    <select id="selector" name="strategy" class="form-control select2 col-md-12" onchange="$('#vForm').submit()">
        <?php foreach($strategys as $row): ?>
        <option value="<?=$row->id?>"  <?=($strategy && ($row->id == $strategy->id))?'selected':''?>>
        <?=$row->strategy_name?>
        </option>
        <?php endforeach; ?>
    </select>
</div>
<div class="form-group  col-md-3">
<labe >Level</label>
    <select class="form-control">
        <option>OUTPUT</option>
        <option>OUTCOME</option>
     </select>
</div>
</form>

<br>

<div class="card list-card" style="border-left: 10px solid green;">
    <div class="card-body">
        <div class="col-md-12" >
        <label class="text-success">Showing: </label>
        <h5><?php echo truncate($strategy->strategy_name,500); ?></h5>
        </div>
    </div>
</div>

<hr>

<?php 

foreach($objectives as $objective):

$outcomes = outcomes($objective->id);
$rows = 0;
foreach($outcomes as $outcome):
$rows++;
$indicatorData = indicators($outcome->id);

if($indicatorData):
?>

<h5><?= $rows.". ".$outcome->outcome_name?></h5>


<div class="row">
<?php 

foreach($indicatorData as $indicator):

$value = indicator_data($indicator->id);
$meetsTarget = ($value &&  (!empty($value->target_value)) && is_numeric($value->target_value) && $value->indicator_value>=$indicator->target_value)?true:false;

$json = (Object) array(
'id'=>$indicator->id,
'indicator_name'=>trim($indicator->indicator_name),
'indicator_target'=>(!empty($indicator->target_value))?@$indicator->indicator_target:null
);

$json->indicator_value = ($value)?$value->indicator_value:0;

?>

<div class="col-md-4" style="padding:40px;">
<figure class="highcharts-figure">

<!-- <p class="highcharts-description text-">
<?=$indicator->indicator_name?>
</p> -->
<div id="container<?=$indicator->id?>"></div>
</figure>
</div>

<script type="text/javascript">

renderChart('<?=json_encode($json)?>');

</script>


<?php 

    endforeach; 

?>


</div>

<?php 

    endif; 
    endforeach; 
    endforeach;

else:

?>

<h3 class="text-center">
    <i class="fa fa-info-circle text-warning"></i> 
    <span class="text-muted ml-2">No Data to Visualize</span>
</h3>

<?php endif; ?>

