<?php
    // configuration
    require("../includes/config.php"); 
    
   $rows = CS50::query("SELECT * FROM portfolios WHERE user_id = ?", $_SESSION["id"]);
   $cash = CS50::query("SELECT cash FROM users WHERE id = ?", $_SESSION["id"]);
   $user_name = CS50::query("SELECT username FROM users WHERE id = ?", $_SESSION["id"]);
    $positions = [];
    foreach ($rows as $row)
   {
       $stock = lookup($row["symbol"]);
       if ($stock !== false)
       {
           $positions[] = [
               "name" => $stock["name"],
               "price" => $stock["price"],
               "shares" => $row["shares"],
                "symbol" => $row["symbol"],
                "total" => sprintf("%.2f", $row["shares"]*$stock["price"])
        ];
       }
   }
   
    // render portfolio
    render("portfolio.php", ["positions" => $positions, "cash" => $cash, "title" => "Portfolio", "username" => $user_name]);
?>