<style>
    body{
        background-color: #808080;
    }
    table
    {
        border: 1px solid black;
        table-layout: fixed;
        width: 200px;
        }
</style>
<form action="add_nickels.php" method="POST">
    <fieldset>
         
            <div class="control-group">
                <input style ="background-color: white;" class="input-big" name="year" placeholder="Year" type="text"/>
                <select name="mint" style="width: 90px; padding: 3px;">
                    <option value="mint">Mint</value>
                    <?php foreach ($mints as $mint): ?>  
                        <option name="mint"><?= $mint ?></option>
                    <?php endforeach ?>
                </select>
                <select name="quality" style="width: 90px; padding: 3px;">
                    <option value="quality">Quality</value>
                    <?php foreach ($qualities as $quality): ?>  
                        <option name="quality"><?= $quality ?></option>
                    <?php endforeach ?>
                </select>
                
            </div>
            <div class="form-group">
            <button style ="color: black; background-color: green; font-family: cursive;" class="btn btn_default" type="submit"> 
            Add Nickel </button>
            </div>
        
            <div>    
            
                <table border="2" style="width:20% padding: 10px; color: blue;"class="table table-hover">
                <thead>
                
                    <tr>
                        <th style="color:black;">Count</th>
                        <th style="color:black;">Year</th>
                        <th style="color:black;">Mint</th>
                        <th style="color:black;">Quality</th></th>
                    </tr>
                </thead>
        
                <tbody>
                    <?php
                        
                        foreach($q_coins as $q_coin)
                        {
                            print("<tr>");
                            print("<tr>");
                            print("<td>".$q_coin["count"]."</td>");
                			print("<td>".$q_coin["year"]."</td>");
                			print("<td>".$q_coin["mint"]."</td>");
                			print("<td>".$q_coin["quality"]."</td>");
                			print("</tr>");
                        }
                    ?>
               
             
                </tbody>
            </div>
            
        </body>
    </fieldset>
</form>