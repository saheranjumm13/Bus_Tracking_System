<?php
include('db.php');
?>
<div id="flash" class="flash"></div>
<script type="text/javascript" src="js/jquery.min.js" ></script>

<script type="text/javascript">
// Paging Record Into Table++++++++++++++++++++++++++++++++++++++++++++++++++++++
$(function() {
$(".pages").click(function() {
var element = $(this);
var del_id = element.attr("id");
var info = 'page=' + del_id;

if(info=='')
{
alert("Select For delete..");
}
else
{
document.getElementById("show").innerHTML="";
$("#flash").fadeIn(400).html('<span class="load"><img src="load.gif"></span>');
$.ajax({
type: "POST",
url: "pickupaction.php",
data: info,
cache: true,
success: function(html){
$("#flash").fadeIn(400).html('');
$("#show").append(html);
}  
});
}
return false;
});
});
</script>


<script type="text/javascript">
// Delete selection Record Into Table++++++++++++++++++++++++++++++++++++++++++++++++++++++
$(function() {
$(".ABCD").click(function() {
var element = $(this);
var del_id = element.attr("id");
var textcontent2 = $("#pagva").val();
var info = 'id=' + del_id+'&page='+ textcontent2;
if(info=='')
{
alert("Select For delete..");
}
else
{
document.getElementById("show").innerHTML="";
$("#flash").fadeIn(400).html('<span class="load"><img src="load.gif"></span>');
$.ajax({
type: "POST",
url: "pickupaction.php",
data: info,
cache: true,
success: function(html){
$("#flash").fadeIn(400).html('');
$("#show").append(html);
}  
});
}
return false;
});
});
</script>


<?php
if(isset($_POST['id']))
{
$id=$_POST['id'];
$delete = "DELETE FROM bus_pickup WHERE Pid='$id'";
mysql_query( $delete);
}
?>


<?php
if(isset($_POST['content']))
{

$content=mysql_real_escape_string($_POST['content']);
$content1=mysql_real_escape_string($_POST['content1']);
$content2=mysql_real_escape_string($_POST['content2']);
$content3=mysql_real_escape_string($_POST['content3']);
$content4=mysql_real_escape_string($_POST['content4']);

$RD=date('Y-m-d');


mysql_query("insert into bus_pickup(RID,Name,PickupTime,latitude,longitude) values ('$content','$content1','$content4','$content2','$content3')");
echo "<font style='color:#0000FF;'>Record Saved</font><br><br><br>";
}

?>

<div class="table-responsive">
<h4 class="margin-bottom-15">All Pickup Point</h4>
<table class="table table-striped table-hover table-bordered">
<thead><tr>
<td><b>Pickup ID</b></td>
<td><b>Route</b></td>
<td><b>Pickup Name</b></td>
<td><b>Time</b></td>
<td><b>Latitude</b></td>
<td><b>Longitude</b></td>

<td></td>
</tr></thead>
<tbody>
<?PHP
					$per_page = 10; 
					$select_table = "select * from bus_pickup";
					$fetch= mysql_query($select_table);
					$count = mysql_num_rows($fetch);
					$pages = ceil($count/$per_page);


if(isset($_POST['page']))
{
$page=$_POST['page'];
$start = ($page-1)*$per_page;
$select_table =$select_table." order by Pid limit $start,$per_page";
$fetch= mysql_query($select_table);
}

while($row = mysql_fetch_array($fetch))
{
?>
<TR>
<TD><?php echo $row['Pid']; ?></TD>
<TD><?php echo $row['RID']; ?></TD>
<TD><?php echo $row['Name']; ?></TD>
<TD><?php echo $row['PickupTime']; ?></TD>
<TD><?php echo $row['latitude']; ?></TD>
<TD><?php echo $row['longitude']; ?></TD>
<TD><a href="#" class="ABCD" id="<?php echo $row['Pid']; ?>">[ Delete ]</a>
</TD>
</TR>
<?php
}
?>
</tbody></TABLE> 
              <ul class="pagination pull-right">
				<?php
				echo "<li><a href='#'class='pages' id='1'>|<</a></li>";
				for($i=1; $i<=$pages; $i++)
				{
					echo "<li><a href='#' class='pages' id=".$i.">".$i."</a></li>";
				}
				echo "<li><a href='#' class='pages' id=".--$i.">>|</a></li>";
				echo "<input type='hidden' id='pagva' class='pagva' name='pagva' style='width:30px;' value='".$page."'>";
				?>
</ul> 				
</div>