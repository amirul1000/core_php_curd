<table class="table" width="100%">
         <?php
        $sql = "SELECT * from company WHERE id='" . $_REQUEST['id'] . "'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            // output data of each row
            $arr = array();
            $i = 0;
            while ($data = mysqli_fetch_assoc($result)) {
                while (list ($key, $value) = each($data))
                    $arr[$i][$key] = $value;
                $i ++;
            }
        }

        for ($i = 0; $i < count($arr); $i ++) {
            ?>
                 <tr>
		<td>Company Name</td>
		<td><?=$arr[$i]['company_name']?></td>
	</tr>
	<tr>
		<td>Address</td>
		<td><?=$arr[$i]['address']?></td>
	</tr>
	<tr>
		<td>Country</td>
		<td><?=$arr[$i]['country']?></td>
	</tr>
	<tr>
		<td>City</td>
		<td><?=$arr[$i]['city']?></td>
	</tr>
	<tr>
		<td>State</td>
		<td><?=$arr[$i]['state']?></td>
	</tr>
	<tr>
		<td>Zip</td>
		<td><?=$arr[$i]['zip']?></td>
	</tr>
			  
        <?php
        }
        ?>
</table>
