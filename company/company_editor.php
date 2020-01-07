<a href="index.php?cmd=list" >List</a>
<br>
<br>


<form name="frm_company" method="post" enctype="multipart/form-data"
	onSubmit="return checkRequired();">

	<table class="table">
		<tr>
			<td>Company Name</td>
			<td><input type="text" name="company_name" id="company_name"
				value="<?=$company_name?>" class="form-control-static"></td>
		</tr>
		<tr>
			<td valign="top">Address</td>
			<td><textarea name="address" id="address" class="form-control-static"
					style="width: 200px; height: 100px;"><?=$address?></textarea></td>
		</tr>
		<tr>
			<td>Country</td>
			<td><input type="text" name="country" id="country"
				value="<?=$country?>" class="form-control-static"></td>
		</tr>
		<tr>
			<td>City</td>
			<td><input type="text" name="city" id="city" value="<?=$city?>"
				class="form-control-static"></td>
		</tr>
		<tr>
			<td>State</td>
			<td><input type="text" name="state" id="state" value="<?=$state?>"
				class="form-control-static"></td>
		</tr>
		<tr>
			<td>Zip</td>
			<td><input type="text" name="zip" id="zip" value="<?=$zip?>"
				class="form-control-static"></td>
		</tr>
		<tr>
			<td align="right"></td>
			<td><input type="hidden" name="cmd" value="add"> 
            <input type="hidden" name="id" value="<?=$Id?>">
             <input type="submit" name="btn_submit"
				id="btn_submit" value="submit" class="btn red"></td>
		</tr>
	</table>

</form>