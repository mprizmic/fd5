<?php
$fecha = "13-01-2000";
echo preg_match("/([0-9]{2})\-([0-9]{2})-([0-9]{4})/i", $fecha);
//echo checkdate(1,1,1880);
echo substr($fecha, 0, 2);
echo substr($fecha, 3, 2);
echo substr($fecha, 6, 4);
echo '    ';
echo '*******************';

echo 'concatenado:' . substr($fecha,3,2). substr($fecha,0,2). substr($fecha,5,4);

if ( checkdate(substr($fecha,3,2), substr($fecha,0,2), substr($fecha,5,4) ) ) {
echo 'si';}
else
{echo 'no';};


if ( checkdate($fecha) ) {
echo 'si';}
else
{echo 'no';};

echo 'xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx';

$vector = array();
$vector[] = array('value'=>'b', 'text'=>4);
$vector[] = array('value'=>'c', 'text'=>2);
$vector[] = array('value'=>'a', 'text'=>6);

print_r($vector);

usort($vector, function($a, $b) {
    return $a['text'] > $b['text'];
});

//function ordename ($a, $b) {
//    return $a['value'] - $b['value'];
//}


//usort($vector, 'ordename');

print_r($vector);
return;
?>

