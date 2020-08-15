<h3>
        <?php
            printf("Cash: %.2f", $cash[0]["cash"]);
         ?>
</h3>

<form action="buy.php" method="post">
    <fieldset>
        <body>
   
        <br></br>
        <br></br>
        <div class="control-group">
            <input style ="background-color: green; text-transform:uppercase; color: black;"class="input-big" name="symbol" placeholder="Symbol" type="text"/>
        </div>
        <div class="control-group">
            <input style ="background-color: green; color: black;" class="input-big" name="shares" placeholder="Shares" type="text"/>
        </div>
        <div class="control-group">
            <button type="submit" class="btn">
            Buy</button>
        </div>
        </body>
    </fieldset>
</form>