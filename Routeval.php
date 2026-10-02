<?php
include('db.php');

if(isset($_POST['Route']))
{
$id=$_POST['Route'];
$select_table = "select * from bus_pickup where RID='".$id."'";
$fetch= mysql_query($select_table);
while($row = mysql_fetch_array($fetch))
{
?>
<option value="<?php echo $row['Name']; ?>"><?php echo $row['Name']; ?></option>

<?php
}
}
?>
