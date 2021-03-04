<html>
<head>
<title>ThaiCreate.Com PHP & MySQL To CSV</title>
</head>
<body>
<?php
$search=$_POST["search"];
$objConnect = mysql_connect("localhost","root","44@44") or die("Error Connect to Database");
$objDB = mysql_select_db("mydatabase");
$strSQL = "SELECT * FROM customer WHERE CustomerID ='$search' ";
$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
?>
<form action="#" method="post" enctype="multipart/form-data">
<input type="search" name="search"> <input type="submit" name="ok" placeholder="search for Export to Excel">
</form>
<table width="600" border="1">
  <tr>
    <th width="91"> <div align="center">CustomerID </div></th>
    <th width="98"> <div align="center">Name </div></th>
    <th width="198"> <div align="center">Email </div></th>
    <th width="97"> <div align="center">CountryCode </div></th>
    <th width="59"> <div align="center">Budget </div></th>
    <th width="71"> <div align="center">Used </div></th>
  </tr>
<?php
while($objResult = mysql_fetch_array($objQuery))
{
?>
  <tr>
    <td><div align="center"><?php echo $objResult["CustomerID"];?></div></td>
    <td><?php echo $objResult["Name"];?></td>
    <td><?php echo $objResult["Email"];?></td>
    <td><div align="center"><?php echo $objResult["CountryCode"];?></div></td>
    <td align="right"><?php echo $objResult["Budget"];?></td>
    <td align="right"><?php echo $objResult["Used"];?></td>
  </tr>
<?php
}
?>
</table>
<?php
mysql_close($objConnect);
?>
<div align="center"><br>
<input name="btnExport" type="button" value="Export" onClick="JavaScript:window.location='phpCSVMySQLExport.php?CustomerID=<?php echo $search; ?>';">
</div>
</body>
</html>