<?php


//client
$req1=$bd->query("SELECT COUNT(*) as `total` FROM `clients`");
$totalClient=$req1->fetch();

//colis
$req2=$bd->query("SELECT COUNT(*) as `total` from `colis` ");
$totalColis=$req2->fetch();

//commission
$req3=$bd->query("SELECT SUM(`commission`) as `total` from `colis` where `etat`='Livre' ");
$totalCommission=$req3->fetch();

if($totalCommission['total']==null){
    $totalCommission['total']=0;
}

//total colis
$req4=$bd->query("SELECT COUNT(*) as `total` from `colis` where `etat`='Livre' ");
$totalColisLivre=$req4->fetch();

//commission par mois de l'annee en cours
$req5=$bd->query("SELECT SUM(`commission`) as `total` FROM `colis` WHERE YEAR(`date_reception`)='".date('Y')."'
and MONTH(`date_reception`)='1' and `etat`='Livre'");
$jan=$req5->fetch();

$req6=$bd->query("SELECT SUM(`commission`) as `total` FROM `colis` WHERE YEAR(`date_reception`)='".date('Y')."'
and MONTH(`date_reception`)='2' and `etat`='Livre'");
$fev=$req6->fetch();

$req7=$bd->query("SELECT SUM(`commission`) as `total` FROM `colis` WHERE YEAR(`date_reception`)='".date('Y')."'
and MONTH(`date_reception`)='3' and `etat`='Livre'");
$mar=$req7->fetch();

$req8=$bd->query("SELECT SUM(`commission`) as `total` FROM `colis` WHERE YEAR(`date_reception`)='".date('Y')."'
and MONTH(`date_reception`)='4' and `etat`='Livre'");
$avr=$req8->fetch();

$req9=$bd->query("SELECT SUM(`commission`) as `total` FROM `colis` WHERE YEAR(`date_reception`)='".date('Y')."'
and MONTH(`date_reception`)='5' and `etat`='Livre'");
$mai=$req9->fetch();

$req10=$bd->query("SELECT SUM(`commission`) as `total` FROM `colis` WHERE YEAR(`date_reception`)='".date('Y')."'
and MONTH(`date_reception`)='6' and `etat`='Livre'");
$juin=$req10->fetch();

$req11=$bd->query("SELECT SUM(`commission`) as `total` FROM `colis` WHERE YEAR(`date_reception`)='".date('Y')."'
and MONTH(`date_reception`)='7' and `etat`='Livre'");
$juil=$req11->fetch();

$req12=$bd->query("SELECT SUM(`commission`) as `total` FROM `colis` WHERE YEAR(`date_reception`)='".date('Y')."'
and MONTH(`date_reception`)='8' and `etat`='Livre'");
$aou=$req12->fetch();

$req13=$bd->query("SELECT SUM(`commission`) as `total` FROM `colis` WHERE YEAR(`date_reception`)='".date('Y')."'
and MONTH(`date_reception`)='9' and `etat`='Livre'");
$sep=$req13->fetch();

$req14=$bd->query("SELECT SUM(`commission`) as `total` FROM `colis` WHERE YEAR(`date_reception`)='".date('Y')."'
and MONTH(`date_reception`)='10' and `etat`='Livre'");
$oct=$req14->fetch();

$req15=$bd->query("SELECT SUM(`commission`) as `total` FROM `colis` WHERE YEAR(`date_reception`)='".date('Y')."'
and MONTH(`date_reception`)='11' and `etat`='Livre'");
$nov=$req15->fetch();

$req16=$bd->query("SELECT SUM(`commission`) as `total` FROM `colis` WHERE YEAR(`date_reception`)='".date('Y')."'
and MONTH(`date_reception`)='12' and `etat`='Livre'");
$dec=$req16->fetch();

//les entreprises
$req17=$bd->query("SELECT * FROM `clients` ");
$clients=$req17->fetchAll();

//colis par jour

function totalColisParJour($heure)
{
    $reqf=$GLOBALS['bd']->query("SELECT COUNT(*) as `total` from `colis` where 
    datediff('".date("Y-m-d H:i:s")."',`date_reception`) <= 0 and Hour(`date_reception`) <='".$heure."'");

    $resf=$reqf->fetch();

    return $resf;
}

function totalColisParJourHeureEtat($heure,$etat)
{
    $reqf=$GLOBALS['bd']->query("SELECT COUNT(*) as `total` from `colis` where 
    datediff('".date("Y-m-d H:i:s")."',`date_modif`) <= 0 and Hour(`date_modif`) <='".$heure."' and `etat`='".$etat."'");

    $resf=$reqf->fetch();

    return $resf;
}

function totalBenefParJourHeureEtat($heure,$etat)
{
    $reqf=$GLOBALS['bd']->query("SELECT SUM(`commission`) as `total` from `colis` where 
    datediff('".date("Y-m-d H:i:s")."',`date_modif`) <= 0 and Hour(`date_modif`) <='".$heure."' and `etat`='".$etat."'");

    $resf=$reqf->fetch();

    return $resf;
}

//10h
$res2=totalColisParJour("10");
$res3=totalColisParJourHeureEtat("10","Livre");
$res4=totalBenefParJourHeureEtat("10","Livre");

$h10['nombre']=$res2['total'];
$h10['livre']=$res3['total'];
$h10['benefice']=$res4['total'];

//14h
$res5=totalColisParJour("14");
$res6=totalColisParJourHeureEtat("14","Livre");
$res7=totalBenefParJourHeureEtat("14","Livre");

$h14['nombre']=$res5['total'];
$h14['livre']=$res6['total'];
$h14['benefice']=$res7['total'];

//18h
$res8=totalColisParJour("18");
$res9=totalColisParJourHeureEtat("18","Livre");
$res10=totalBenefParJourHeureEtat("18","Livre");

$h18['nombre']=$res8['total'];
$h18['livre']=$res9['total'];
$h18['benefice']=$res10['total'];

//22h
$res11=totalColisParJour("22");;
$res12=totalColisParJourHeureEtat("22","Livre");
$res13=totalBenefParJourHeureEtat("22","Livre");;

$h22['nombre']=$res11['total'];
$h22['livre']=$res12['total'];
$h22['benefice']=$res13['total'];


//Statistique des colis par mois de l'année en cours

//total
$req31=$bd->query("SELECT MONTH(`date_reception`) as `mois`, count(*) as `total` FROM `colis` WHERE YEAR(`date_reception`)='".date("Y")."'
group by MONTH(`date_reception`) order by MONTH(`date_reception`) asc")->fetchAll();

$Stotal=array(0,0,0,0,0,0,0,0,0,0,0,0);
foreach($req31 as $i){

    switch($i['mois']){
        case 1 :$Stotal['0']=$i['total'] ;break;
        case 2 :$Stotal['1']=$i['total'] ;break;
        case 3 :$Stotal['2']=$i['total'] ;break;
        case 4 :$Stotal['3']=$i['total'] ;break;
        case 5 :$Stotal['4']=$i['total'] ;break;
        case 6 :$Stotal['5']=$i['total'] ;break;
        case 7 :$Stotal['6']=$i['total'] ;break;
        case 8 :$Stotal['7']=$i['total'] ;break;
        case 9 :$Stotal['8']=$i['total'] ;break;
        case 10 :$Stotal['9']=$i['total'] ;break;
        case 11 :$Stotal['10']=$i['total'] ;break;
        case 12 :$Stotal['11']=$i['total'] ;break;
    }

}


//total par etats
function statsAnnee($etat){

$req31s=$GLOBALS['bd']->query("SELECT MONTH(`date_reception`) as `mois`, count(*) as `total` FROM `colis` WHERE YEAR(`date_modif`)='".date("Y")."'
and `etat`='".$etat."' group by MONTH(`date_modif`) order by MONTH(`date_modif`) asc")->fetchAll();

$Stotals=array(0,0,0,0,0,0,0,0,0,0,0,0);
foreach($req31s as $i){

    switch($i['mois']){
        case 1 :$Stotals['0']=$i['total'] ;break;
        case 2 :$Stotals['1']=$i['total'] ;break;
        case 3 :$Stotals['2']=$i['total'] ;break;
        case 4 :$Stotals['3']=$i['total'] ;break;
        case 5 :$Stotals['4']=$i['total'] ;break;
        case 6 :$Stotals['5']=$i['total'] ;break;
        case 7 :$Stotals['6']=$i['total'] ;break;
        case 8 :$Stotals['7']=$i['total'] ;break;
        case 9 :$Stotals['8']=$i['total'] ;break;
        case 10 :$Stotals['9']=$i['total'] ;break;
        case 11 :$Stotals['10']=$i['total'] ;break;
        case 12 :$Stotals['11']=$i['total'] ;break;
    }

}
return $Stotals;

}

$Livre=statsAnnee("Livre");
$Annule=statsAnnee("Annule");
$Refuse=statsAnnee("Refuse");
$Pas_de_reponse=statsAnnee("Pas de reponse");
$Injoignable=statsAnnee("Injoignable");
$Reporte=statsAnnee("Reporte");
$Retour=statsAnnee("Retour");


//nombre de colis par etats
function NombreColisParEtas($etat){

    $req32=$GLOBALS['bd']->query("SELECT count(*) as `total` FROM `colis` WHERE `etat`='".$etat."'")->fetch();
    
    return intval($req32['total']);
    
    }


?>