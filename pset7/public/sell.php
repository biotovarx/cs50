<?php
// conf
    require("../includes/config.php"); 
    
    $cash =	CS50::query("SELECT cash FROM users WHERE id = ?", $_SESSION["id"]);
    $symbols = CS50::query("SELECT * FROM portfolios WHERE user_id = ?", $_SESSION["id"]);
    
        $totals = [];
        foreach ($symbols as $symbol)
        {
            $totals[] = [
            "sellsymbol" => $symbol["symbol"], "sellshares" => $symbol["shares"]]; 
        }
    
    if ($_SERVER["REQUEST_METHOD"] !== "POST")
    {
        render("sell_form.php", ["title" => "Sell", "totals" => $totals, "cash" => $cash]);
    }
    
    else if ($_SERVER["REQUEST_METHOD"] == "POST")
    {   
        $s2 = lookup($_POST['symbols']);
        $price = ["price" => $s2["price"]];
        $s1 = CS50::query("SELECT * FROM portfolios WHERE user_id = ? AND symbol = ?", $_SESSION["id"], strtoupper($_POST["symbols"]));
        if(($_POST["shares"])>$s1)
        {
            apologize("You don't have that many shares.");
        }
        
       

        
        if ($_POST["symbols"]=='Symbols')
        {
            apologize("Please enter the stock symbol.");
        }
        else if ($_POST["shares"]== NULL) 
        {
            apologize("Empty share field, retry.");
        }
        
        
        if ($s2 == 0)
        {
            apologize("Invalid stock symbol.");
        }
        
        if ($_POST["shares"]<=0)
        {
            apologize("You must enter a positive integer.");
        }
        
        
        $earn = $_POST["shares"] * $price["price"];
        $type = 'Sell';
        CS50::query("INSERT INTO history (id, type, symbol, shares, price) VALUES (?, ?, ?, ?, ?)", $_SESSION["id"], $type, strtoupper($_POST["symbols"]), $_POST["shares"], $price["price"]);
        CS50::query("UPDATE users SET cash = cash + ? WHERE id = ?", $earn, $_SESSION["id"]);
        CS50::query("UPDATE portfolios SET shares = shares - ? WHERE user_id = ?", $_POST["shares"], $_SESSION["id"]);
        $share_test = CS50::query("SELECT * FROM portfolios WHERE user_id = ? AND symbol = ?", $_SESSION["id"], strtoupper($_POST["symbols"]));
        if ($share_test["shares"] === 0.0)
        {
            CS50::query("DELETE FROM portfolios WHERE user_id = ? AND symbol = ?", $_SESSION["id"], strtoupper($_POST["symbols"]));
        }
        redirect("/");    
    }
    
?>