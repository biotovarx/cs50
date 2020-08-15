<h3>
        <?php
            printf("%s",$username[0]["username"]);
         ?>
</h3>

<h3>
        <?php
            printf("Cash: %.2f", $cash[0]["cash"]);
         ?>
</h3>

<table border="2" style="width:50% padding: 10px; color: blue;"class="table table-hover">
    <thead>
        
        <tr>
            <th style="color:green;">Symbol</th>
            <th style="color:green;">Name</th>
            <th style="color:green;">Shares</th>
            <th style="color:green;">Price</th>
            <th style="color:green;">TOTAL</th>
        </tr>
    </thead>

    <tbody>
        <?php
        foreach ($positions as $position)
        {
            print("<tr>");
			print("<td>" .$position["symbol"]. "</td>");
		    print("</tr>");
		    print("<tr>");
			print("<td>" . $position["name"] . "</td>");
			print("<td>" . $position["shares"] . "</td>");
			print("<td>$" . $position["price"] . "</td>");
			print("<td>$" . $position["total"] . "</td>");
			print("</tr>");

        }
        ?>
       
        
    </tbody>
    
</table>
