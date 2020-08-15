<?php
 
    // configuration
    require("../includes/config.php"); 
 
    // if user reached page via GET (as by clicking a link or via redirect)
    if ($_SERVER["REQUEST_METHOD"] != "POST")
    {
        // else render form
        render("deposit_form.php", ["title" => "Top Secret: Deposit"]);
    }
 
    // else if user reached page via POST (as by submitting a form via POST)
    else if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        
        CS50::query("UPDATE users SET cash = cash + ? WHERE id = ?", (1*$_POST["deposit"]), $_SESSION["id"]);
        
        redirect("/");
    }
 
?>