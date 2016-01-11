<?php
//======================================================
// utility
define("EOL" , "<br>");
define("LINE", "<hr>");

echo LINE;

define("PAY_BIWEEK_GROSS_IGOR", 2083.33);
define("PAY_BIWEEK_GROSS_JENICA", 988.80);
define("PAY_MONTH_GROSS_IGOR", PAY_BIWEEK_GROSS_IGOR * 2);
define("PAY_MONTH_GROSS_JENICA", PAY_BIWEEK_GROSS_JENICA * 2);
define("PAY_MONTH_GROSS_BOTH", PAY_MONTH_GROSS_JENICA + PAY_MONTH_GROSS_IGOR);
echo PAY_MONTH_GROSS_BOTH . "$ gross monthly income together" . EOL;
define("PAY_YEAR_GROSS_BOTH", (PAY_BIWEEK_GROSS_JENICA * 26) + (PAY_BIWEEK_GROSS_IGOR * 26));
echo PAY_YEAR_GROSS_BOTH . "$ gross we both make a year";
echo LINE;

define("HST", 0.13);

define("ESTIMATED_RESIDUAL_AMOUNT",  11898.60); // estimated residual amount
define("AMOUNT_TO_BE_AMORTIZED", 19860.26);
define("NET_LEASED_VEHICLE_AMOUNT", AMOUNT_TO_BE_AMORTIZED + ESTIMATED_RESIDUAL_AMOUNT);
echo NET_LEASED_VEHICLE_AMOUNT . "$ net leased vehicle amount" . EOL;


echo LINE;
echo LINE;


define("PRICE", 28330.00);
define("DISCOUNT", 584.66);
define("LEASED_VEHICLE_AMOUNT", PRICE - DISCOUNT);
echo LEASED_VEHICLE_AMOUNT . " leased vehicle amount" . EOL;

echo LINE;
echo LINE;


define("BASE_MONTHLY_PAYMENT", 337.36);
define("LEASE_TERM_IN_MONTHS", 64);
define("MONTHLY_LEASE_PAYMENT", round(BASE_MONTHLY_PAYMENT + (BASE_MONTHLY_PAYMENT * HST) , 2));
echo MONTHLY_LEASE_PAYMENT . " monthly lease payment" . EOL;
echo MONTHLY_LEASE_PAYMENT * LEASE_TERM_IN_MONTHS . " total monthly lease payment" .EOL;

echo LINE;
echo LINE;

define("DOWNPAYMENT", 2500.00);
define("DEPOSIT", 500);
define("HST_2", 371.67);
define("ADMINISTRATION_FEES", 349);
define("OMVIC", 10.00);
define("AMOUNT_DUE_ON_DELIVERY", 
  DOWNPAYMENT 
  + HST_2 
  + ADMINISTRATION_FEES
  + MONTHLY_LEASE_PAYMENT
  + OMVIC
  - DEPOSIT
  );
echo AMOUNT_DUE_ON_DELIVERY . "$ amount due on delivery" . EOL;

echo LINE;
echo LINE;


//define("ESTIMATED_RESIDUAL_AMOUNT", 11898.60);
//define("AMOUNT_TO_BE_AMORTIZED", 19860.26);
//define("NET_LEASED_VEHICLE_AMOUNT", ESTIMATED_RESIDUAL_AMOUNT + AMOUNT_TO_BE_AMORTIZED);
echo NET_LEASED_VEHICLE_AMOUNT . " NET_LEASED_VEHICLE_AMOUNT" . EOL;

echo LINE;
echo LINE;




$total_lease_cost =  NET_LEASED_VEHICLE_AMOUNT - (ESTIMATED_RESIDUAL_AMOUNT + AMOUNT_TO_BE_AMORTIZED);
echo $total_lease_cost . "$ total lease cost" . EOL;

define("PRE_DELIVERY_EXPENSES", 860.00);
define("OEWSP", 2799.00); // optional Extended Warranty / Service Plan
define("OAHI", 1174.42); // optional accident and health insurance
define("OTHER_CHARGES", 1680.10);
define("LVAR", 2500.00); //leased vehicle amount reduction
define("CASH_DOWNPAYMENT", LVAR);

// define("TOTAL_COST", 28330.00);
define("TOTAL_COST", 27745.34);

define("DISCOUNTED_PRICE", TOTAL_COST - DISCOUNT);
echo DISCOUNTED_PRICE . "$ total discounted price" . EOL;

define("BASE_MONTHLY_LEASE_PAYMENT", 
  (round(DISCOUNTED_PRICE / LEASE_TERM_IN_MONTHS, 2) - 43.86) + 1.49);
echo BASE_MONTHLY_LEASE_PAYMENT . "$ base monthly lease payment" . EOL;

define("X", 24398.08);
define("TOTAL_MONTHLY_LEASE_PAYMENT", X / LEASE_TERM_IN_MONTHS);
echo TOTAL_MONTHLY_LEASE_PAYMENT . " - TOTAL_MONTHLY_LEASE_PAYMENT" . EOL;




//define("DEPOSIT", 500.00);


//define("AMOUNT_TO_BE_AMORTIZED", 19860.00);

define("OPTION_PRICE", 12297.60);


//define("DOWNPAYMENT", 2500.00);

//define("HST", 0.13);



//define("ADMINISTRATION_FEES", 349.00);

define("NET_TRADE_IN_ALLOWANCE", 500.00);



// echo TOTAL_COST - DISCOUNT . " - we pay over time with discount" . EOL;
// $monthly = (TOTAL_COST - DISCOUNT) / LEASE_TERM_MONTHS;
// echo $monthly . " to pay each month" . EOL;

// echo LINE;
// $total = ((DOWNPAYMENT + BASE_MONTHLY_LEASE_PAYMENT + OMVIC) * HST) 
// //- NET_TRADE_IN_ALLOWANCE
// ;
// echo $total . "$ total to pay" . EOL;

echo LINE . "Due on Delivery:" . EOL;

$gross = DOWNPAYMENT + TOTAL_MONTHLY_LEASE_PAYMENT;
$ondelivery = $gross + ($gross * HST);
echo $ondelivery;
//===============================


// approximate kilometrage
define("KM_ONE_WAY_HOME_TPM", 18);
define("KM_ONE_WAY_HOME_YUMMY", 13);
define("KM_ONE_WAY_YUMMY_TPM", 23);
define("KM_ROUND_WAY_HOME_TPM", 36);
define("KM_ROUND_WAY_HOME_YMCA", 10);
define("KM_ROUND_WAY_HOME_YUMMY", 26);
define("KM_ROUND_WAY_HOME_HIPARK", 60);
define("KM_ROUND_WAY_HOME_COSTCO", 30);
define("KM_ROUND_WAY_HOME_RECREA", 300); // e.g. to Niagara Falls

// time consumption for waiting for transit
define("HR_TRANSIT_WAIT_MONTH_JENICA", 13.5); // 18 working days * 0.75 h
define("HR_TRANSIT_WAIT_MONTH_IGOR" , 11); // 22 working days * 0.5 h
define("HR_TRANSIT_WAIT_MONTH_FAMILY", 4.8); // 12 YMCA visits * 0.4 h

// cost without a car
// TRANSIT cost
define("COST_METROPASS_A", 141);
define("COST_METROPASS_S", 110);
define("COST_TICKETS", 70);
define("COST_CAR_RENT_DAY", 90);

// Car rentals
// 1.33333 recreational car rentals a month (16 car rentals in warm months to go out of town)
// 2 utility car rentals a month (to costco)
// 3.333 car rentals a month
define("COST_CAR_RENT_MONTH", (COST_CAR_RENT_DAY * 3.333) + 100); // $100 to go to Niagara Falls

// car cost
define("COST_CAR_MONTH", 380); // monthly payment LEASE
define("COST_CAR_INSURANCE", 400);
define("COST_GAS_PER_LITRE", 1);

// gas consumption
// 7L per 100
define("GAS_L_PER_KM", 7 / 100);

// average speeds
define("AVE_SPEED_CAR", (50 + 80)/2); // 50 in city, 80 out of city
define("AVE_SPEED_BUS", 20);
define("AVE_SPEED_CARLESS", (AVE_SPEED_CAR + AVE_SPEED_BUS) / 2);
// ===================================
// kilometrage every day
$km_monday = KM_ROUND_WAY_HOME_TPM
           + KM_ROUND_WAY_HOME_YMCA
           ;
$km_tuesday = KM_ONE_WAY_HOME_YUMMY 
            + KM_ONE_WAY_YUMMY_TPM 
            + KM_ONE_WAY_HOME_TPM 
            + KM_ROUND_WAY_HOME_YUMMY
            ;
$km_wednesday = KM_ONE_WAY_HOME_YUMMY 
              + KM_ONE_WAY_YUMMY_TPM 
              + KM_ONE_WAY_HOME_TPM 
              + KM_ROUND_WAY_HOME_YMCA
              ;
$km_thursday = KM_ONE_WAY_HOME_YUMMY 
             + KM_ONE_WAY_YUMMY_TPM 
             + KM_ONE_WAY_HOME_TPM 
             + KM_ROUND_WAY_HOME_YMCA 
             + KM_ROUND_WAY_HOME_YUMMY
             ;
$km_friday = KM_ROUND_WAY_HOME_TPM;
$km_saturday = KM_ROUND_WAY_HOME_HIPARK;
$km_sunday = KM_ROUND_WAY_HOME_YUMMY;

// kilometrage every week
echo LINE . "KILOMETRAGE" . EOL;
$km_week = $km_monday 
         + $km_tuesday 
         + $km_wednesday 
         + $km_thursday 
         + $km_friday 
         + $km_saturday 
         + $km_sunday;
// kilometrage every month
$km_month = $km_week * 4;
$km_month += KM_ROUND_WAY_HOME_COSTCO * 2;
$km_month += KM_ROUND_WAY_HOME_RECREA * 1.333;

echo $km_month . " km covered a month" . EOL;
echo $km_month * 12 . " km covered in a year" . EOL;

// time consumption 
echo LINE . "TIME CONSUMPTION" . EOL;
$hrs_month_carless = round($km_month / AVE_SPEED_CARLESS, 1) 
  + HR_TRANSIT_WAIT_MONTH_FAMILY
  + HR_TRANSIT_WAIT_MONTH_IGOR
  + HR_TRANSIT_WAIT_MONTH_JENICA;
$hrs_month_car = round($km_month / AVE_SPEED_CAR, 1); 

echo $hrs_month_carless . " hours a month without a car" . EOL;
echo $hrs_month_car . " hours a month with a car" . EOL;


// total cost a month without a car (without license)
echo LINE . "COST OF LIFE WITHOUT A DRIVING LICENSE" . EOL;
$carless_cost_full_month = 
   (COST_METROPASS_A * 2) 
  + COST_METROPASS_S 
  + COST_TICKETS 
  + COST_CAR_RENT_MONTH;
echo $carless_cost_full_month . "$ without a car each month" . EOL;


// total cost a month with car
echo LINE . "COST OF LIFE WITH CAR" . EOL;
$month_gas_l = round($km_month * GAS_L_PER_KM);
$month_gas_cost = round($month_gas_l * COST_GAS_PER_LITRE);
$car_cost_full_month = COST_CAR_MONTH + COST_CAR_INSURANCE + $month_gas_cost;
echo $month_gas_l . " litres of gas each month" . EOL;
echo $month_gas_cost . "$ for gas each month" . EOL;
echo $car_cost_full_month . "$ total a month for car" . EOL;

// advantage / economy with car
echo LINE; 
echo "ADVANTAGE OF HAVING A CAR (A MONTH)" . EOL;
$transit_car_cost_diff = $car_cost_full_month - $carless_cost_full_month; 
$hrs_month_saved = $hrs_month_carless - $hrs_month_car;
$cost_of_gained_hour = round($transit_car_cost_diff / $hrs_month_saved, 2);

echo "Money-wise (the less the better)" . EOL;
echo $transit_car_cost_diff . "$ a month more for car" . EOL;
echo "Time-wise (the more the better)" . EOL;
// echo round($hrs_month_saved / 30 , 1) . " hours a day saved by car" . EOL;
// echo $hrs_month_saved / 4 . " hours a week saved by car" . EOL;
echo $hrs_month_saved . " hours a month saved by car" . EOL;

echo $cost_of_gained_hour . "$ per hour we pay" . EOL;
echo "time during travel:" . EOL;
echo "car - quiet, warm, sit, light, comfortable" . EOL;
echo "no car - noisy, cold, standing, heavy" . EOL;


?>
