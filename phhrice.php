<!DOCTYPE html>
<html>
<style>
body {
  font-family: Calibri, Helvetica, sans-serif;
  background-image: url('https://c4.wallpaperflare.com/wallpaper/836/1010/563/gaussian-background-gray-glow-wallpaper-preview.jpg');
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: cover;

}
.imgj{
 repeat: no-repeat;
 attachment: fixed;
 size: 30px 40px;
 width:120px;

height:120px
opacity=0.75
}
</style>
<image class="imgj" src="https://www.tnrtp.org/wp-content/uploads/2020/06/TN-LOGO-T-.png" alt="logo">
<center><br><p style="font-size:25px">
<?php
	$rice = $_POST['rice'];
	
	$dhaal = $_POST['dhaal'];
$sugar=$_POST['sugar'];
$oil=$_POST['oil'];
$wheat=$_POST['wheat'];
$kerosene=$_POST['kerosene'];
$date = $_POST['date'];
$time = $_POST['time'];

	// Database connection
	$conn = new mysqli('localhost','root','','cardtype');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {


		$stmt = $conn->prepare("insert into phhrice(rice,dhaal,sugar,oil,wheat,kerosene,date,time) values(?,?,?,?,?,?, ?,?)");
		$stmt->bind_param("iiiiiiss", $rice,$dhaal,$sugar,$oil,$wheat,$kerosene,$date,$time);
		$execval = $stmt->execute();
		echo '<script>alert("Registration successfully...")</script>';
		
$sql = "SELECT *FROM phhrice ORDER BY id DESC LIMIT 1";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {

echo  "Token No:PHHRICE" . $row["id"]."<br>" ;
    echo  "Rice: " . $row["rice"]."<br>" ;
echo "  Dhaal: " . $row["dhaal"].  "<br>";
echo "  Sugar: " . $row["sugar"].  "<br>";
echo "  Oil: " . $row["oil"].  "<br>";
echo "  Wheat: " . $row["wheat"].  "<br>";
echo "  Kerosene: " . $row["kerosene"].  "<br>";
echo "<br>";

echo "Amount";

echo "<br>";
echo " Dhaal=". $row["dhaal"]*10 . "<br>";
echo " Sugar=". $row["sugar"]*10 . "<br>";
echo " Oil=". $row["oil"]*15 . "<br>";
echo " Wheat=". $row["wheat"]*20 . "<br>";
echo " Kerosene=". $row["kerosene"]*10 . "<br>";
echo " Total Amount=" .$row["dhaal"]*10 +$row["sugar"]*10+$row["oil"]*15+$row["wheat"]*20+$row["kerosene"]*10 . "<br>";
echo " Date=". $row["date"] . "<br>";
echo " Time=". $row["time"] . "<br>";
}
		$stmt->close();
		$conn->close();
	}}
?>
<br>
<button onclick="window.print()">E-Bill</button></p>
<center>
</body>
</html>