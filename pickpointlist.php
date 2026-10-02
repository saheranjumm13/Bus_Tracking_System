<?php
include('db.php');

$contentroute=$_POST["contentroute"];

$select_table = "select * from bus_pickup where RID='$contentroute'";
$fetch= mysql_query($select_table);

while($row = mysql_fetch_array($fetch))
{
echo '<option value="'.$row['Pid'].'">'.$row['Name'].'('.$row['PickupTime'].')</option>';
}
?>