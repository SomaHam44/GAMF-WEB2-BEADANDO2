<?php 
$tomb=$viewData['lista'];

?>
<head>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script type="text/javascript">    
    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawChart); 
 
    function drawChart(){        
        var dataSet = 
        [['munka','darab'],
        <?php for ($i=0;$i<count($tomb)-1;$i++){?>
        ['<?php echo $tomb[$i]['munka']?>',Number('<?php echo $tomb[$i]['darab']?>')],
        <?php }?>
        ['<?php echo $tomb[count($tomb)-1]['munka']?>',Number('<?php echo $tomb[count($tomb)-1]['darab']?>')]];       
        var data = new google.visualization.arrayToDataTable(dataSet);
        var options = {
            title: 'Munkatípusok volumenének összehasonlítása',
            hAxis: {
                title: 'Munka'                 
            },
            vAxis: {
                title: 'Darab'
            }
        };
        var chart = new google.visualization.ColumnChart(document.getElementById('column_chart'));
        chart.draw(data, options);
    };
</script>
<style>
.page-wrapper
{
 width:1000px;
 margin:0 auto;
}
</style>
</head>


<h2> Munkatípusok volumenének összehasonlítása: </h2>

<body>
    <table>
        <tr>
            <th>Munka</th>
            <th>Darab</th>    																		
        </tr>
		
        <?php 
        for($i=0;$i<count($tomb);$i++){   ?>     
        <tr>
            <td><?php echo($tomb[$i]['munka'])?></td>
            <td><?php echo($tomb[$i]['darab'])?></td>    							
        </tr>               
        <?php } ?>
    </table>
    

    <div class="page-wrapper">
        <br />    
    <div id="column_chart" style="width: 100%; height: 500px"></div>
</div>   
</body> 