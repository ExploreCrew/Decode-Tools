<?php

/**
 * @author BlueBoyz
 * @copyright www.explorecrew.org 2012
 */
 
error_reporting(0);
session_start();
if(isset($_POST['str'])){
    
$input = $_POST['str'];
preg_match_all("/['|\"](?<string>.*)['|\"]/",$input,$data);
if(empty($data['string'][0])){
    $explode = explode("'",$input);
    $data['string'][0] = $explode[1];
}


if(empty($_SESSION['COUNT'])){
    $_SESSION['COUNT'] = 0;
}
$_SESSION['COUNT'] = $_SESSION['COUNT'] + 1;
$output = htmlentities(gzinflate(base64_decode($data['string'][0]))) ;
if(preg_match("/echo/",$output)){
   $disable = 'disabled="true"';
}else{
   $disable = '' ;
}
}else{
    $_SESSION['COUNT'] = 0;
}
echo $_SESSION['COUNT']." x";
echo '<form method="post" action="">';
echo '<textarea name="str" style="width: 90%;height: 75%;">'. @$output.'</textarea><br/>';
echo '<input type="submit" value="Decode" '.@$disable.' />';
echo '</form>';

?>

