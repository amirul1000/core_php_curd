
<?php
  if($msg)
  {
	  echo  $msg;
  }
?>
<br>

<a href="index.php?cmd=edit">Add a Company</a>
<br>



<table class="table">
	<tr bgcolor="#ABCAE0">
		<td>Company Name</td>
		<td>Address</td>
		<td>Country</td>
		<td>City</td>
		<td>State</td>
		<td>Zip</td>
		<td>Action</td>
	</tr>
	<?php
		$rowsPerPage = 2;
		$pageNum = 1;
		if (isset($_REQUEST['page'])) {
			$pageNum = $_REQUEST['page'];
		}
		$offset = ($pageNum - 1) * $rowsPerPage;
	
		$sql = "SELECT * from company ORDER BY id DESC  LIMIT $offset, $rowsPerPage";
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
		<td><?=$arr[$i]['company_name']?></td>
		<td><?=$arr[$i]['address']?></td>
		<td><?=$arr[$i]['country']?></td>
		<td><?=$arr[$i]['city']?></td>
		<td><?=$arr[$i]['state']?></td>
		<td><?=$arr[$i]['zip']?></td>

		<td nowrap>
        <a href="index.php?cmd=edit&id=<?=$arr[$i]['id']?>">Edit</a>
        <a href="index.php?cmd=company_details&id=<?=$arr[$i]['id']?>">Details</a>
        <a href="index.php?cmd=delete&id=<?=$arr[$i]['id']?>" onClick=" return confirm('Are you sure to delete this item ?');">Delete</a></td>

	</tr>
	<?php
    }
    ?>
						
		<tr>
		<td colspan="10" align="center">
		<?php
        $sql = "SELECT count(*) as total_rows from company";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            // output data of each row
            $res = array();
            $i = 0;
            while ($data = mysqli_fetch_assoc($result)) {
                while (list ($key, $value) = each($data))
                    $res[$i][$key] = $value;
                $i ++;
            }
        }

        $numrows = $res[0]['total_rows'];
        $maxPage = ceil($numrows / $rowsPerPage);
        $self = 'index.php?cmd=list';
        $nav = '';

        $start = ceil($pageNum / 5) * 5 - 5 + 1;
        $end = ceil($pageNum / 5) * 5;

        if ($maxPage < $end) {
            $end = $maxPage;
        }

        for ($page = $start; $page <= $end; $page ++) 
        // for($page = 1; $page <= $maxPage; $page++)
        {
            if ($page == $pageNum) {
                $nav .= "<li>$page</li>";
            } else {
                $nav .= "<li><a href=\"$self&&page=$page\" class=\"nav\">$page</a></li>";
            }
        }
        if ($pageNum > 1) {
            $page = $pageNum - 1;
            $prev = "<li><a href=\"$self&&page=$page\" class=\"nav\">[Prev]</a></li>";

            $first = "<li><a href=\"$self&&page=1\" class=\"nav\">[First Page]</a></li>";
        } else {
            $prev = '<li>&nbsp;</li>';
            $first = '<li>&nbsp;</li>';
        }

        if ($pageNum < $maxPage) {
            $page = $pageNum + 1;
            $next = "<li><a href=\"$self&&page=$page\" class=\"nav\">[Next]</a></li>";

            $last = "<li><a href=\"$self&&page=$maxPage\" class=\"nav\">[Last Page]</a></li>";
        } else {
            $next = '<li>&nbsp;</li>';
            $last = '<li>&nbsp;</li>';
        }

        if ($numrows > 1) {
            echo '<ul id="navlist">';
            echo $first . $prev . $nav . $next . $last;
            echo '</ul>';
        }
        ?>     
		</td>
	</tr>
</table>







