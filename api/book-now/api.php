<?php
// $num   = (int)$_POST["num"];
// $total = 0;
//
// for ($i=0; $i <= $num; $i++) {
//    $total = $total + $i;
// }
//
// echo $total;



/* TOILET TYPE */
if (!empty($_POST["fToilet"])) {
  $fToilet = $_POST["fToilet"];
}

/* MEN NUMBER */
if (!empty($_POST["fMenNumber"])) {
  $fMenNumber = $_POST["fMenNumber"];
}

/* WOMEN NUMBER */
if (!empty($_POST["fWomenNumber"])) {
  $fWomenNumber = $_POST["fWomenNumber"];
}

/* HOW LONG */
if (!empty($_POST["fHowLongDays"])) {
  $fHowLongDays = $_POST["fHowLongDays"];
}


/* GET TOTAL AMOUNT OF PEOPLE */
$totalPeople = $fMenNumber + $fWomenNumber; // highest value of men plus highest value of women

/* VARIABLES */
$vat = 20;
$ToiletNo = 0; // decided on amount of people
$unitCost = 0; // amount of units times unit price
$servicePrice = 0; // set price for service, charged after one day, per day
$serviceCost = 0; // amount of units times service per day, charged after one day
$totalPrice = 0; // total servuce cost plus total unit cost

/* VARIABLED WITH DISABLED */
$disabledPrice = 0;
$unitCostWithDisabled = 0;
$serviceCostWithDisabled = 0;
$totalPriceWithDisabled = 0;


/* IF TOILET TYPE IS PLASTIC */
if ($fToilet == 'Plastic') {
  // SET PRICES
  $unitPrice = 89.0625;
  $servicePrice = 19;
  $disabledPrice = 134.9;

  // GET UNIT AMOUNT ACCORDING TO PEOPLE AMOUNT
  if ($totalPeople <= 50) {
    $ToiletNo = 1;
  } else if ($totalPeople > 50 && $totalPeople <= 100) {
    $ToiletNo = 2;
  } else if ($totalPeople > 100 && $totalPeople <= 200) {
    $ToiletNo = 4;
  } else if ($totalPeople > 200 && $totalPeople <= 300) {
    $ToiletNo = 6;
  } else if ($totalPeople > 300 && $totalPeople <= 400) {
    $ToiletNo = 8;
  } else if ($totalPeople > 400 && $totalPeople <= 600) {
    $ToiletNo = 10;
  } else if ($totalPeople > 600 && $totalPeople <= 800) {
    $ToiletNo = 12;
  } else if ($totalPeople > 800 && $totalPeople <= 1000) {
    $ToiletNo = 14;
  }

  // no disabled unit added
  $unitCost = $ToiletNo * $unitPrice;
  $serviceCost = $ToiletNo * ($fHowLongDays - 1) * $servicePrice;
  $totalPrice = $unitCost + $serviceCost;
  $totalPriceVAT = ($totalPrice / 100) * $vat;
  $totalPriceWithVAT = round(($totalPrice + $totalPriceVAT),2);
  $totalPriceDeposit = round((($totalPriceWithVAT / 100) * 20), 2);

  // disabled unit added
  $disabledCost = $disabledPrice + (($fHowLongDays - 1) * $servicePrice);
  $disabledCostVAT = ($disabledCost / 100) * $vat;
  $disabledCostWithVAT = $disabledCost + $disabledCostVAT;

  $unitCostWithDisabled = $unitCost + $disabledPrice;
  $serviceCostWithDisabled = ($ToiletNo + 1) * ($fHowLongDays - 1) * $servicePrice;
  $totalPriceWithDisabled = $unitCostWithDisabled + $serviceCostWithDisabled;
  $totalPriceWithDisabledVAT = ($totalPriceWithDisabled / 100) * $vat;
  $totalPriceWithDisabledWithVAT = round(($totalPriceWithDisabled + $totalPriceWithDisabledVAT),2);
  $totalPriceWithDisabledDeposit = round((($totalPriceWithDisabledWithVAT / 100) * 20),2);

  // SEND TO JQUERY FILE
  $plasticPrices = array(
    'totalPriceWithVAT' => $totalPriceWithVAT,
    'totalPriceDeposit' => $totalPriceDeposit,
    'totalPriceWithDisabledWithVAT' => $totalPriceWithDisabledWithVAT,
    'totalPriceWithDisabledDeposit' => $totalPriceWithDisabledDeposit,
    'disabledCost' => $disabledCostWithVAT,
  );
    header('Content-type: application/json');
    echo json_encode($plasticPrices);
  // foreach($plasticPrices as $a)
  //   echo $a.",";


// IF TOILET TYPE IS LUXURY
} else if ($fToilet == 'Luxury') {
  // SET PRICES
  $luxUnitOneNo = 0;
  $luxUnitTwoNo = 0;
  $luxUnitThreeNo = 0;
  $luxUnitFourNo = 0;

  $luxUnitOnePrice = 365.75;
  $luxUnitTwoPrice = 517.75;
  $luxUnitThreePrice = 592.1635;
  $luxUnitFourPrice = 593.75;

  $uberLuxUnitOnePrice = 427.5;
  $uberLuxUnitTwoPrice = 617.5;
  $uberLuxUnitThreePrice = 712.5;

  $servicePrice = 121.125;
  $disabledPrice = 320.625;

  // PEOPLE ROUND UP
  if ($totalPeople <= 50) {
    $luxUnitOneNo = 1;
  } else if ($totalPeople > 50 && $totalPeople <= 100) {
    $luxUnitTwoNo = 1;
  } else if ($totalPeople > 100 && $totalPeople <= 200) {
    $luxUnitTwoNo = 1;
  } else if ($totalPeople > 200 && $totalPeople <= 300) {
    $luxUnitThreeNo = 1;
  } else if ($totalPeople > 300 && $totalPeople <= 400) {
    $luxUnitFourNo = 1;
  } else if ($totalPeople > 400 && $totalPeople <= 500) {
    $luxUnitOneNo = 1;
    $luxUnitFourNo = 1;
  } else if ($totalPeople > 500 && $totalPeople <= 600) {
    $luxUnitThreeNo = 2;
  } else if ($totalPeople > 600 && $totalPeople <= 700) {
    $luxUnitOneNo = 2;
    $luxUnitThreeNo = 1;
  } else if ($totalPeople > 700 && $totalPeople <= 800) {
    $luxUnitFourNo = 2;
  } else if ($totalPeople > 800 && $totalPeople <= 1000) {
    $luxUnitTwoNo = 2;
    $luxUnitThreeNo = 2;
  }
  $ToiletNo = $luxUnitOneNo + $luxUnitTwoNo + $luxUnitThreeNo + $luxUnitFourNo;


  // lux - no disabled unit added
  $unitCost = ($luxUnitOneNo * $luxUnitOnePrice) + ($luxUnitTwoNo * $luxUnitTwoPrice) + ($luxUnitThreeNo * $luxUnitThreePrice) + ($luxUnitFourNo * $luxUnitFourPrice);
  $serviceCost = $ToiletNo * ($fHowLongDays - 1) * $servicePrice; // stays the same for uber lux
  $totalPrice = $unitCost + $serviceCost;
  $totalPriceVAT = ($totalPrice / 100) * $vat;
  $totalPriceWithVAT = round(($totalPrice + $totalPriceVAT),2);
  $totalPriceDeposit = round((($totalPriceWithVAT / 100) * 20),2);

  // lux - disabled unit added
  $disabledCost = $disabledPrice + (($fHowLongDays - 1) * $servicePrice);
  $disabledCostVAT = ($disabledCost / 100) * $vat;
  $disabledCostWithVAT = $disabledCost + $disabledCostVAT;

  $unitCostWithDisabled = $unitCost + $disabledPrice;
  $serviceCostWithDisabled = ($ToiletNo + 1) * ($fHowLongDays - 1) * $servicePrice; //stays the same for uber lux
  $totalPriceWithDisabled = $unitCostWithDisabled + $serviceCostWithDisabled;
  $totalPriceWithDisabledVAT = ($totalPriceWithDisabled / 100) * $vat;
  $totalPriceWithDisabledWithVAT = round(($totalPriceWithDisabled + $totalPriceWithDisabledVAT),2);
  $totalPriceWithDisabledDeposit = round((($totalPriceWithDisabledWithVAT / 100) * 20),2);

  // uber lux - no disabled unit added
  $unitCostUberLux = round((($luxUnitOneNo * $uberLuxUnitOnePrice) + ($luxUnitTwoNo * $uberLuxUnitTwoPrice) + ($luxUnitThreeNo * $uberLuxUnitThreePrice) + ($luxUnitFourNo * $luxUnitFourPrice)),2);
  $totalPriceUberLux = $unitCostUberLux + $serviceCost;
  $totalPriceUberLuxVAT = ($totalPriceUberLux / 100) * $vat;
  $totalPriceUberLuxWithVAT = round(($totalPriceUberLux + $totalPriceUberLuxVAT),2);
  $totalPriceUberLuxDeposit = round((($totalPriceUberLuxWithVAT / 100) * 20),2);

  // uber lux - disabled unit added
  $unitCostWithDisabledUberLux = $unitCostUberLux + $disabledPrice;
  $totalPriceWithDisabledUberLux = $unitCostWithDisabledUberLux + $serviceCostWithDisabled;
  $totalPriceWithDisabledUberLuxVAT = ($totalPriceWithDisabledUberLux / 100) * $vat;
  $totalPriceWithDisabledUberLuxWithVAT = round(($totalPriceWithDisabledUberLux + $totalPriceWithDisabledUberLuxVAT),2);
  $totalPriceWithDisabledUberLuxDeposit = round((($totalPriceWithDisabledUberLuxWithVAT / 100) * 20),2);

  // SEND TO JQUERY FILE
  $luxPrices = array(
    'totalPriceWithVAT' => $totalPriceWithVAT,
    'totalPriceDeposit' => $totalPriceDeposit,
    'totalPriceWithDisabledWithVAT' => $totalPriceWithDisabledWithVAT,
    'totalPriceWithDisabledDeposit' => $totalPriceWithDisabledDeposit,
    'totalPriceUberLuxWithVAT' => $totalPriceUberLuxWithVAT,
    'totalPriceUberLuxDeposit' => $totalPriceUberLuxDeposit,
    'totalPriceWithDisabledUberLuxWithVAT' => $totalPriceWithDisabledUberLuxWithVAT,
    'totalPriceWithDisabledUberLuxDeposit' => $totalPriceWithDisabledUberLuxDeposit,
    'disabledCost' => $disabledCostWithVAT,
  );
  header('Content-type: application/json');
  echo json_encode($luxPrices);
  // foreach($luxPrices as $a)
  //   echo $a.",";

}
