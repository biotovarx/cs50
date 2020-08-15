<?php
    // configuration
    require("../includes/config.php");
    // if user reached page via GET (as by clicking a link or via redirect)
    $cash =	CS50::query("SELECT cash FROM users WHERE id = ?", $_SESSION["id"]);	
    if ($_SERVER["REQUEST_METHOD"] == "GET")
    {
        // else render form
        render("buy_form.php", ["title" => "Buy","cash" => $cash]);
    }
    else if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        if ($_POST["symbol"]== NULL) 
        {
            apologize("Empty symbol field, retry");
        }
        else if ($_POST["shares"]== NULL) 
        {
            apologize("Empty share field, retry.");
        }
        
        $stock = lookup(strtoupper($_POST["symbol"]));
        if ($stock == 0)
        {
            apologize("Invalid stock symbol.");
        }
        
        if (preg_match("/^\d+$/", $_POST["shares"]) == NULL)
        {
            apologize("You must enter a positive integer.");
        }
        
        $cost = $stock["price"] * $_POST["shares"];
        $cash =	CS50::query("SELECT cash FROM users WHERE id = ?", $_SESSION["id"]);
        $cash= $cash[0]["cash"];
        $type='Buy';
        if ($cash < $cost)
        {
            apologize("You can't afford this purchase.");
        }         
        
        else
        {
        
            CS50::query("INSERT INTO portfolios (user_id, symbol, shares) VALUES(?, ?, ?) 
                ON DUPLICATE KEY UPDATE shares = shares + VALUES(shares)", $_SESSION["id"], strtoupper($_POST["symbol"]), $_POST["shares"]);
            CS50::query("UPDATE users SET cash = cash - ? WHERE id = ?", $cost, $_SESSION["id"]);
            CS50::query("INSERT INTO history (id, type, symbol, shares, price) VALUES (?, ?, ?, ?, ?)", $_SESSION["id"], $type, strtoupper($_POST["symbol"]), $_POST["shares"], $stock["price"]);
            redirect("/");    
        }
    }
?>