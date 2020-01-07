<?php
	include("../connection.php");
	
	$cmd = $_REQUEST['cmd'];
	switch ($cmd) {
		case 'add':
			$company_name = $_REQUEST['company_name'];
			$address = $_REQUEST['address'];
			$country = $_REQUEST['country'];
			$city = $_REQUEST['city'];
			$state = $_REQUEST['state'];
			$zip = $_REQUEST['zip'];
	
			if (empty($_REQUEST['id'])) {
				// /Insertion
			   $sql = "INSERT into company(company_name,address,country,city,state,zip)
			           VALUES('".$company_name."','".$address."','".$country."','".$city."','".$state."','".$zip."')";
			
			    $result = $conn->query($sql);
				if($result ==TRUE)
				{
					$msg = "Insertion has been completed successfully";
				}
				else
				{
					$msg = "Insertion fail";
				}
			
			} else {
			   //update
			   $sql = "UPDATE company
			           SET company_name='".$company_name."',
					   address='".$address."',
					   country='".$country."',
					   city='".$city."',
					   state='".$state."',
					   zip='".$zip."' WHERE id='" . $_REQUEST['id'] . "'";
					   
					   
			    $result = $conn->query($sql);
				if($result ==TRUE)
				{
					$msg = "Update has completed successfully";
				}
				else
				{
					$msg = "Update fail";
				}		   

			}
			
			
			include ("company_list.php");
			break;
		case "edit":
			$Id = $_REQUEST['id'];
			if (! empty($Id)) {
				$sql = "SELECT * FROM company where id='" . $_REQUEST['id'] . "'";
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
	
				$Id = $arr[0]['id'];
				$company_name = $arr[0]['company_name'];
				$address = $arr[0]['address'];
				$country = $arr[0]['country'];
				$city = $arr[0]['city'];
				$state = $arr[0]['state'];
				$zip = $arr[0]['zip'];
			}
	
			include ("company_editor.php");
			break;
	
		case 'delete':
			$sql = "DELETE FROM `company` WHERE id='".$_REQUEST['id']."'";
			$result = $conn->query($sql);
			// /////////////////////////////
			include ("company_list.php");
			break;
		case 'company_details':
			include ("company_details.php");
			break;
		case "list":
			include ("company_list.php");
			break;
	
		default:
			include ("company_list.php");
	}

?>
