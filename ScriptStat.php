<script>
    'use strict'; $(document).ready(function () {
    function generateData(baseval, count, yrange) {
        var i = 0; var series = []; while (i < count) { var x = Math.floor(Math.random() * (750 - 1 + 1)) + 1;; var y = Math.floor(Math.random() * (yrange.max - yrange.min + 1)) + yrange.min; var z = Math.floor(Math.random() * (75 - 15 + 1)) + 15; series.push([x, y, z]); baseval += 86400000; i++; }
        return series;
    }
    if ($('#s-line-area').length > 0) {
        var sLineArea = { chart: { height: 350, type: 'area', toolbar: { show: false, } }, dataLabels: { enabled: false }, stroke: { curve: 'smooth' }, series: [
            { name: 'Reçus', data: [<?=$h10['nombre']?>, <?=$h14['nombre']?>, <?=$h18['nombre']?>, <?=$h22['nombre']?>] }, 
            { name: 'Livrés', data: [<?=floatval($h10['livre'])?>, <?=floatval($h14['livre'])?>, <?=floatval($h18['livre'])?>, <?=floatval($h22['livre'])?>] },
            { name: 'Bénéfices en DH', data: [<?=$h10['benefice']?>, <?=$h14['benefice']?>, <?=$h18['benefice']?>, <?=$h22['benefice']?>] }], 
        xaxis: { type: 'time', categories: ["10:00", "14:00", "18:00", "22:00"], }, tooltip: { x: { format: 'HH:mm' }, } }
        var chart = new ApexCharts(document.querySelector("#s-line-area"), sLineArea); chart.render();
    }
    if ($('#s-col-stacked').length > 0) {
        var sColStacked = { chart: { height: 350, type: 'bar', stacked: true, toolbar: { show: false, } }, responsive: [{ breakpoint: 480, options: { legend: { position: 'bottom', offsetX: -10, offsetY: 0 } } }], plotOptions: { bar: { horizontal: false, }, }, 
        series: [
            { name: 'Reçus', 
                data: [
                    <?php 
                       for($i=0;$i<11;$i++){
                         echo $Stotal[$i].",";
                       }
                       echo $Stotal[$i];
                    ?>
                      ] }, 
            { name: 'Livrés', data: [
                <?php 
                       for($i=0;$i<11;$i++){
                         echo $Livre[$i].",";
                       }
                       echo $Livre[$i];
                    ?>
            ] }, 
            { name: 'Annulés', data: [
                <?php 
                       for($i=0;$i<11;$i++){
                         echo $Annule[$i].",";
                       }
                       echo $Annule[$i];
                    ?>
            ] }, 
            { name: 'Refusés', data: [
                <?php 
                       for($i=0;$i<11;$i++){
                         echo $Refuse[$i].",";
                       }
                       echo $Refuse[$i];
                    ?>
            ] },
            { name: 'Pas de réponse', data: [
                <?php 
                       for($i=0;$i<11;$i++){
                         echo $Pas_de_reponse[$i].",";
                       }
                       echo $Pas_de_reponse[$i];
                    ?>
            ] },
            { name: 'Injoignable', data: [
                <?php 
                       for($i=0;$i<11;$i++){
                         echo $Injoignable[$i].",";
                       }
                       echo $Injoignable[$i];
                    ?>
            ] },
            { name: 'Reportés', data: [
                <?php 
                       for($i=0;$i<11;$i++){
                         echo $Reporte[$i].",";
                       }
                       echo $Reporte[$i];
                    ?>
            ] },
            { name: 'Retournés', data: [
                <?php 
                       for($i=0;$i<11;$i++){
                         echo $Retour[$i].",";
                       }
                       echo $Retour[$i];
                    ?>
            ] }
        ], colors: ['#0098db', '#c7c9b1', '#ef2d4d','#54706e','#ff9f1c','#41ead4','#0098db','#011627'],
        xaxis: { type: 'Month', 
            categories: ['Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre','Octobre','Novembre','Décembre'], }, legend: { position: 'right', offsetY: 40 }, fill: { opacity: 1 }, }
        var chart = new ApexCharts(document.querySelector("#s-col-stacked"), sColStacked); chart.render();
    }
    if ($('#s-bar').length > 0) {
        var sBar = { chart: { height: 350, type: 'bar', toolbar: { show: false, } }, plotOptions: { bar: { horizontal: true, } }, dataLabels: { enabled: false }, series: [{ name: "Bénéfices en DH",
        data: [
            <?php foreach($clients as $client){
    $req18=$bd->prepare("SELECT SUM(`commission`) as `total` from `colis` where `id_client`=? and `etat`='Livre' ");
    $req18->execute(array($client['id_client']));
    $res=$req18->fetch();
    if($client!= end($res)){
     echo floatval($res['total']).",";
    }else{
        echo floatval($res['total']);
     }
 }
    ?>
        ]}],colors:['#0000f9'] , xaxis: { 
        categories: [
            <?php foreach($clients as $client){
                if($client!=end($clients)){
                    echo "'".$client['nom_client']."',";
                }else{
                    echo "'".$client['nom_client']."'";
                }
            }
            ?>
            ], } }
        var chart = new ApexCharts(document.querySelector("#s-bar"), sBar); chart.render();
    }
    if ($('#donut-chart').length > 0) {
        var donutChart = { chart: { height: 350, type: 'donut', toolbar: { show: false, } }, 
        series: [<?= NombreColisParEtas("Livre") ?>, <?= NombreColisParEtas("Annule") ?>,<?= NombreColisParEtas("Refuse") ?>,
        <?= NombreColisParEtas("Pas de reponse") ?>,<?= NombreColisParEtas("Injoignable") ?>,<?= NombreColisParEtas("Reporte") ?>,
        <?= NombreColisParEtas("Retourne") ?>], 
        labels: ['Livrés', 'Annulés', 'Refusés', 'Pas de réponse','Injoignable','Reportés','Retournés'],
        responsive: [{ breakpoint: 480, options: { chart: { width: 200 }, legend: { position: 'bottom' } } }] }
        var donut = new ApexCharts(document.querySelector("#donut-chart"), donutChart); donut.render();
    }


});
</script>

    <script>
    $(function () { 'use strict'; var ctx1 = document.getElementById('chartBar1').getContext('2d'); 
    new Chart(ctx1, { type: 'bar', data: { labels: ['Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre','Octobre','Novembre','Décembre'], 
        datasets: [{ label: 'Bénéfices en DH', 
        data: [<?=intval($jan['total']) ?>, <?=intval($fev['total']) ?>, <?=intval($mar['total']) ?>, 
        <?=intval($avr['total']) ?>, <?=intval($mai['total']) ?>, <?=intval($juin['total']) ?>, 
        <?=intval($juil['total']) ?>, <?=intval($aou['total']) ?>, <?=intval($sep['total']) ?>,
        <?=intval($oct['total']) ?>,<?=intval($nov['total']) ?>,<?=intval($dec['total']) ?>], 
        backgroundColor: '#664dc9' }] }, 
    options: { maintainAspectRatio: false, responsive: true, legend: { display: false, labels: { display: false } }, 
    scales: { yAxes: [{ ticks: { beginAtZero: true, fontSize: 10, max: 80 } }], 
    xAxes: [{ barPercentage: 0.6, ticks: { beginAtZero: true, fontSize: 11 } }] } } }); 
   });
</script>
