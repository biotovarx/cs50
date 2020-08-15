
<table border="1" style="width:100%" class="table table-striped table-hover">
    
    
    
    <thead>
        <tr>
            <th style ="color: red; font-family: cursive">Type</th>
            <th style ="color: red; font-family: cursive">Symbol</th>
            <th style ="color: red; font-family: cursive">Date and Time</th>
            <th style ="color: red; font-family: cursive">Shares</th>
            <th style ="color: red; font-family: cursive">Price</th>
            <th style="color:green;">TOTAL</th>
        </tr> 
    </thead>

    <h3>
        <?php
            printf("Cash: %.2f", $cash[0]["cash"]);
         ?>
    
    </h3>
    <tbody>
    <?php
	    foreach ($table as $row)	
        {   
            echo("<tr>");
            echo("<td>" . $row["type"] . "</td>");
            echo("<td>" . $row["symbol"] . "</td>");
            echo("<td>" . date('d/m/y, g:i A',strtotime($row["date-time"])) . "</td>");
            echo("<td>" . $row["shares"] . "</td>");
            echo("<td>$" . number_format($row["price"], 2) . "</td>");
            printf("<td>$%.2f", $row["shares"]*$row["price"]. "</td>");
            echo("</tr>");
        }
    ?>
    </tbody>
</table>
</body>