
<h3>
    <?php
        printf("Cash: %.2f", $cash[0]["cash"]);
     ?>
    
</h3>
    
<form action="sell.php" method="POST">
    <fieldset>
        <div class="form-group">
        <select name="symbols" style="width: 90px; padding: 3px;">
            <option value="symbols">Symbols</value>
        <?php foreach ($totals as $total): ?>  
            <option name="symbols"><?= $total["sellsymbol"] ?></option>
        <?php endforeach ?>   
        </select>
        </div>
        <div class="control-group">
                <input style ="background-color: white;" class="input-big" name="shares" placeholder="shares" type="text"/>
        </div>
        <div class="form-group">
            <button style ="color: black; background-color: green; font-family: cursive;" class="btn btn_default" type="submit"> 
            Sell </button>
        </div>
        </body>
    </fieldset>
</form>