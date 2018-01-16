<!DOCTYPE html>
<html>
<head>
	<title>Purchase Form</title>
</head>
<body>
<h2>Reyes Apparel</h2>
<form method="GET" action="../controller/purchase.php">
<table border="5">
<tr>
	<td>Item name:</td>
	<?php
		if(isset($_GET['item'])){
			$item = $_GET['item'];
			echo "<td> <input type='text' name='item' value=$item /></td>";
		}else {
			echo "<td> <input type='text' name='item' /></td>";
		}
	?>
</tr>
<tr>
	<td>Price:</td>
	<?php
		if(isset($_GET['price'])){
			$price = $_GET['price'];
			echo "<td> <input type='text' name='price' value=$price /></td>";
		}else {
			echo "<td> <input type='text' name='price' /></td>";
		}
	?>
</tr>
<tr>
	<td>
		Discount:
	</td>
	<td>
		<select name="discount" style="width:100%;">
			<option value="0.20">20%</option>
			<option value="0.40">40%</option>
			<option value="0.60">60%</option>
			<option value="0.80">80%</option>
		</select>
	</td>
</tr>
<?php
	if(isset($_GET['Total'])){
		$Total = $_GET['Total'];
		echo "<tr>
				<td>Total Bill</td>
				<td>$Total</td>
			 </tr>";
	}
?>
<tr>
	<td></td>

	<td colspan="2" align="right"><button type="submit">Compute</button></td>
</tr>

</table>
</form>
</body>
</html>
