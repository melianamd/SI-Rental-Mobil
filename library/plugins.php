<?php FUNCTION buatKode($tabName, $kode) {
$queTabSelect = mysql_query("SELECT * FROM ".$tabName);
$tabNum = mysql_num_rows($queTabSelect) + 1;
IF($tabNum <= 9){ $codeResulted = "00".$tabNum; }
ELSE IF($tabNum <= 99){ $codeResulted = "0".$tabNum; }
ELSE { $codeResulted = $tabNum; }
RETURN $kode.$codeResulted; }

//plus VALUE MUST BE UNDER = 28
FUNCTION plusbyDate($year1, $mont1, $date1, $plusD) {

$dayCount = date("t", $mont1);
$dateSum = $date1 + $plusD;
IF($dateSum > $dayCount){ $dateH = $dateSum-$dayCount; 
$montH = $mont1+1;
IF($montH > 12){ $yearH = $year1+1; $montH = $montH-12; } ELSE{ $yearH = $year1; } } ELSE {
$montH = $mont1; $dateH = $dateSum; $yearH = $year1; }

IF($montH < 10){ $montR = "0".$montH; } ELSE { $montR = $montH; }
IF($dateH < 10){ $dateR = "0".$dateH; } ELSE { $dateR = $dateH; }

$dateResulted = $yearH."-".$montR."-".$dateR;
RETURN $dateResulted; } ?>