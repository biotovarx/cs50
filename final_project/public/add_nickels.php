<?php

    require("../includes/config.php"); 

    $coins = CS50::query("SELECT * FROM nickels WHERE count > 0");
    
        $q_coins = [];
        $mints = ['C', 'D', 'P', 'CC', 'S', 'O', 'W'];
        $qualities =['UNCIRCULATED','EXTREMELY FINE','VERY FINE','FINE','GOOD'];
        foreach ($coins as $coin)
        {
            $q_coins[] = [
            "year" => $coin["year"], "mint" => $coin["mint_mark"], "quality" => $coin["quality"]]; 
        }
    
    if ($_SERVER["REQUEST_METHOD"] !== "POST")
    {
        render("nickel_form.php", ["title" => "Nickels", "q_coins" => $q_coins, "mints" => $mints, "qualities" => $qualities]);
    }
    
    else if ($_SERVER["REQUEST_METHOD"] == "POST")
    {   
        
        if(($_POST["year"]>2016) || ($_POST["year"]<0000))
        {
            apologize("Invalid Year.");
        }
        
       

        
        if ($_POST["mint"]=='Mint')
        {
            apologize("Please enter the mint.");
        }
        else if ($_POST["year"] == NULL || $_POST["quality"] == NULL) 
        {
            apologize("Empty field, retry.");
        }
        $counter = CS50:: query("SELECT count FROM nickels WHERE year = ? AND mint_mark = ? AND quality = ?", $_POST["year"], $_POST["mint"], $_POST["quality"]);
        if($counter==NULL)
        {
            CS50::query("INSERT INTO nickels (year, mint_mark, quality) VALUES(?, ?, ?)", $_POST["year"], $_POST["mint"], $_POST["quality"]); 
            CS50::query("UPDATE nickels SET count=1 WHERE ((year = ?) AND (mint_mark= ?) AND (quality = ?))", $_POST["year"], $_POST["mint"], $_POST["quality"]);
        }
        else
        {
            CS50::query("UPDATE nickels SET count=count +? WHERE ((year = ?)AND (mint_mark = ?) AND (quality = ?))", 1, $_POST["year"], $_POST["mint"], $_POST["quality"]);
        }
        redirect("/");    
    }