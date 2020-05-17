<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

<?php

$mysqli = new mysqli("localhost:8111", "root", "", "klienti");
if($mysqli->connect_error) {
  exit('Could not connect');
}

$sql = "SELECT cid, cname, namee, adr, city, pcode, country
FROM klienti WHERE cid = ?";

$stmt = $mysqli->prepare($sql);
$stmt->bind_param("s", $_GET['q']);
$stmt->execute();
$stmt->store_result();
$stmt->bind_result($cid, $cname, $name, $adr, $city, $pcode, $country);
$stmt->fetch();
$stmt->close();

echo "<table>";
echo "<tr>";
echo "<th>ID</th>";
echo "<td>" . $cid . "</td>";
echo "<th>Position</th>";
echo "<td>" . $cname . "</td>";
echo "<th>Name</th>";
echo "<td>" . $name . "</td>";
echo "<th>Address</th>";
echo "<td>" . $adr . "</td>";
echo "<th>City</th>";
echo "<td>" . $city . "</td>";
echo "<th>PostalCode</th>";
echo "<td>" . $pcode . "</td>";
echo "<th>Country</th>";
echo "<td>" . $country . "</td>";
echo "</tr>";
echo "</table>";
?>
</body>
</html>