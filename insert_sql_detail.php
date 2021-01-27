<?php
include('connection.php');

$PlandetailtID = $_POST['PlandetailtID'];
$PlantName= $_POST['PlantName'];
$PlantScience= $_POST['PlantScience'];
$PlantDiscover= $_POST['PlantDiscover'];
$PlantCommonname= $_POST['PlantCommonname'];
$PlantType= $_POST['PlantType'];
$PlantTypeEng= $_POST['PlantTypeEng'];
$PlantDistrbution= $_POST['PlantDistrbution'];
$PlantDistrbutionEng= $_POST['PlantDistrbutionEng'];
$PlantBenefit= $_POST['PlantBenefit'];
$PlantBenefitEng= $_POST['PlantBenefitEng'];
$PlantBanefity= $_POST['PlantBanefity'];
$PlantBanefityEng= $_POST['PlantBanefityEng'];
$PlantFlower= $_POST['PlantFlower'];
$PlantFlowerEng= $_POST['PlantFlowerEng'];
$PlantRound= $_POST['PlantRound'];
$PlantRoundEng= $_POST['PlantRoundEng'];
$PlantSeed= $_POST['PlantSeed'];
$PlantSeedEng= $_POST['PlantSeedEng'];
$PlantStem= $_POST['PlantStem'];
$PlantStemEng= $_POST['PlantStemEng'];
$PlantLeaf= $_POST['PlantLeaf'];
$PlantLeafEng= $_POST['PlantLeafEng'];
$PlantSeed= $_POST['PlantSeed'];
$PlantSeedEng= $_POST['PlantSeedEng'];
$DivisionID= $_POST['DivisionID'];
$sql = "INSERT INTO  plantdetail (`PlandetailtID`,`PlantName`, `PlantScience`, `PlantDiscover`, `PlantCommonname`, `PlantType`, `PlantTypeEng`, `PlantDistrbution`, `PlantDistrbutionEng`, `PlantBenefit`, `PlantBenefitEng`, `PlantBanefity`, `PlantBanefityEng`, `PlantFlower`, `PlantFlowerEng`, `PlantRound`, `PlantRoundEng`, `PlantSeed`, `PlantSeedEng`, `PlantStem`, `PlantStemEng`, `PlantLeaf`, `PlantLeafEng`, `SeasonID`, `DivisionID`)"
."  VALUES ('$PlandetailtID','$PlantName','$PlantScience' ,'$PlantDiscover' ,'$PlantCommonname' ,'$PlantType' ,'$PlantTypeEng' ,'$PlantDistrbution' ,'$PlantDistrbutionEng' ,'$PlantBenefit' ,'$PlantBenefitEng' ,'$PlantBanefity' ,'$PlantBanefityEng' ,'$PlantFlower' ,'$PlantFlowerEng' ,'$PlantRound' ,'$PlantRoundEng' ,'$PlantSeed' ,'$PlantSeedEng' ,'$PlantStem' ,'$PlantStemEng' ,'$PlantLeaf' ,'$PlantLeafEng','','$DivisionID');  ";
if (mysqli_query($conn, $sql)) {
   echo "บันทึกข้อมูลพรรณไม้เรียบร้อย <br>";
   echo "<a href='admin.php'>กลับหน้าหลัก</a>";
} else {
   echo "Error: " . $sql . "<br>" . mysqli_error($conn)."<br>";
   echo "<a href='admin.php'>กลับหน้าหลัก</a>";
}

mysqli_close($conn);