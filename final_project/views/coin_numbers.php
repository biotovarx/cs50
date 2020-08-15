<style>
    body{
        background-color: #FAEBD7;
    }
    table
    {
        border: 1px solid black;
        table-layout: fixed;
        width: 200px;
        }
</style>
<div align=left>
        <p>
            This is a list of the total coins in your collection:
            
            
            
        </p>
</div>
<table border="2" style="width:20% padding: 10px; color: Black;"class="table table-hover">
    

    <thead>
        
        <tr>
            <th style="color:Black;">Denomination</th>
            <th style="color:Black;">Count</th></th>
        </tr>
    </thead>

    <tbody>
    <?php
        {   
            print("<tr>");
            print("<tr>");
            print("<td><a href=add_dollar.php>Dollar:</a></li></td>");
			print_r("<td>".implode("",$dollar_counted[0])."</td>");
			print("</tr>");
			print("<tr>");
            print("<tr>");
            print("<td><a href=add_half.php>Half-Dollar:</a></li></td>");
			print_r("<td>".implode("",$halfd_counted[0])."</td>");
			print("</tr>");
            print("<tr>");
            print("<tr>");
            print("<td><a href=add_quarters.php>Quarters:</a></li></td>");
			print_r("<td>".implode("",$quarter_counted[0])."</td>");
			print("</tr>");
			print("<tr>");
            print("<tr>");
            print("<td><a href=add_dimes.php>Dimes:</a></li></td>");
			print("<td>".implode("",$dime_counted[0])."</td>");
			print("</tr>");
			print("<tr>");
            print("<tr>");
            print("<td><a href=add_nickels.php>Nickels:</a></li></td>");
			print("<td>".implode("",$nickel_counted[0])."</td>");
			print("</tr>");
			print("<tr>");
            print("<tr>");
            print("<td><a href=add_pennies.php>Pennies:</a></li></td>");
			print("<td>".implode("",$penny_counted[0])."</td>");
			print("</tr>");
        }
    ?>
       
        
    </tbody>
    
</table>
