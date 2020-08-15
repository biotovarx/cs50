<?php
    // configuration
    require("../includes/config.php"); 
    
    $denoms = ['dollar', 'halfdollar','quarter' ,'dime',"nickel","penny"];
    
    $dollar_counted = CS50::query('SELECT SUM(count) FROM dollar ');
    $halfd_counted = CS50::query('SELECT SUM(count) FROM halfdollar ');
    $quarter_counted = CS50::query('SELECT SUM(count) FROM Quarter ');
    $dime_counted = CS50::query("SELECT SUM(count) FROM dimes");
    $nickel_counted = CS50::query("SELECT SUM(count) FROM nickels");
    $penny_counted = CS50::query("SELECT SUM(count) FROM penny");
    
    
    if($dollar_counted == NULL)
    {
        $dollar_counted = 0;
    }
    if($halfd_counted == NULL)
    {
        $halfd_counted = 0;
    }
    if($dime_counted == NULL)
    {
        $dime_counted = 0;
    }
    if($nickel_counted == NULL)
    {
        $nickel_counted = 0;
    }
    if($penny_counted == NULL)
    {
        $penny_counted = 0;
    }
        
    
    
    
    
    render("coin_numbers.php",["denoms" => $denoms, "quarter_counted" => $quarter_counted,"dollar_counted" =>$dollar_counted, "halfd_counted" => $halfd_counted, "dime_counted" => $dime_counted,  "nickel_counted" => $nickel_counted, "penny_counted" => $penny_counted]);
?>