<?php

    require("../includes/config.php");  
    
    $cash =	CS50::query("SELECT cash FROM users WHERE id = ?", $_SESSION["id"]);	
	
	$table = CS50::query("SELECT * FROM history WHERE id = ?", $_SESSION["id"]);
    
    render("history_form.php", ["title" => "History", "cash" => $cash, "table" => $table]);

?>