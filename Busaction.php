<?php
include('db.php');
?>
<div id="flash" class="flash"></div>


<script type="text/javascript" src="js/jquery.min.js" ></script>
<script type="text/javascript" src="js/jquery.form.js"></script>

<script type="text/javascript">
// Insert Record Into Table++++++++++++++++++++++++++++++++++++++++++++++++++++++


$(function() {
$(".submit_button").click(function() {
var dataString = $('#form').serialize()+'&page='+ $("#pagva").val();

$.ajax({
type: "POST",
url: "Busvalid.php",
data: dataString,
cache: true,
success: function(html){
if(html=="Yes")
{

				$("#form").ajaxForm({
						target: '#show'
					}).submit();

}
else
	{
	alert(html);
	}
}  
});



return false;
});
});
</script>

<script type="text/javascript">
// Update Record Into Table++++++++++++++++++++++++++++++++++++++++++++++++++++++
$(function() {
$(".Updatesubmit_button").click(function() {
var dataString = $('#form').serialize()+'&page='+ $("#pagva").val();;

$.ajax({
type: "POST",
url: "Busvalid.php",
data: dataString,
cache: true,
success: function(html){
if(html=="Yes")
{
				$("#form").ajaxForm({
						target: '#show'
					}).submit();
}
else
	{
	alert(html);
	}
	}  
});

return false;
});
});
</script>

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
url: "Busaction.php",
data: info,
cache: true,
success: function(html){
$("#flash").fadeIn(400).html('');
$("#show").append(html);
$("#content").focus();
}  
});
}
return false;
});
});
</script>


<script type="text/javascript">
// Update selection Record Into Table++++++++++++++++++++++++++++++++++++++++++++++++++++++
$(function() {
$(".Edit").click(function() {
var element = $(this);
var del_id = element.attr("id");
var textcontent2 = $("#pagva").val();
var info = 'ide=' + del_id+'&page='+ textcontent2;

if(info=='')
{
alert("Select For Edit..");
//$("#content").focus();
}
else
{
document.getElementById("show").innerHTML="";
$("#flash").fadeIn(400).html('<span class="load"><img src="load.gif"></span>');
$.ajax({
type: "POST",
url: "Busaction.php",
data: info,
cache: true,
success: function(html){
$("#flash").fadeIn(400).html('');
$("#show").append(html);
$("#content").focus();
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
//$("#content").focus();
}
else
{
document.getElementById("show").innerHTML="";
$("#flash").fadeIn(400).html('<span class="load"><img src="load.gif"></span>');
$.ajax({
type: "POST",
url: "Busaction.php",
data: info,
cache: true,
success: function(html){
$("#flash").fadeIn(400).html('');
$("#show").append(html);
$("#content").focus();
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
$delete = "DELETE FROM bus_data WHERE BID='$id'";
mysql_query( $delete);
}
?>

<?php
if(isset($_POST['ide']))
{
$id=$_POST['ide'];
$select_table = "select * from bus_data where BID=".$id;
$fetch= mysql_query($select_table);
while($row = mysql_fetch_array($fetch))
{
?>
<div id="cp_contact_form">
<div id="cp_contact_form">
<form  action="Busaction.php" method="post" name="form" id="form" enctype="multipart/form-data" >


				<div class="row">
                  <div class="col-md-6 margin-bottom-15">
                    <label for="firstName" class="control-label">Driver ID</label>
                    <input type="text" name="ucontent" size="0" maxlength="0" value="<?php echo $row['BID']; ?>" class="form-control" id="lastName" Placeholder="Driver ID">           
                  </div>
                  <div class="col-md-6 margin-bottom-15">
                    <label for="lastName" class="control-label">Driver Name</label>
                    <input type="text" name="ucontent1"  value="<?php echo $row['DriverNam']; ?>" class="form-control" id="firstName" Placeholder="Driver Name">        
                  </div>
                </div>

				<div class="row">
                  <div class="col-md-6 margin-bottom-15">
                    <label for="firstName" class="control-label">Driver Contact No</label>
                    <input type="text" name="ucontent2" value="<?php echo $row['DriverCno']; ?>" class="form-control" id="firstName" Placeholder="Driver Contact No">           
                  </div>
                  <div class="col-md-6 margin-bottom-15">
                    <label for="lastName" class="control-label">Bus No</label>
                    <input type="text" name="ucontent3"  value="<?php echo $row['Bussno']; ?>" class="form-control" id="lastName" Placeholder="Bus No">        
                  </div>
                </div>
				<div class="row">
                  <div class="col-md-6 margin-bottom-15">
                    <label for="firstName" class="control-label">Age</label>
                    <input type="text" name="ucontent4" value="<?php echo $row['Age']; ?>" class="form-control" id="firstName" Placeholder="Age">           
                  </div>
                </div>

				<div class="row">
                  <div class="col-md-6 margin-bottom-15">
                    <label for="firstName" class="control-label">Route</label>
                    <select name="ucontent5" class="form-control" id="firstName">
					<option  value="<?php echo $row['Route']; ?>"><?php echo $row['Route']; ?></option>

<?php
$select_table1 = "select RID from bus_pickup group by RID";
$fetch1= mysql_query($select_table1);
while($row1 = mysql_fetch_array($fetch1))
{
?>
<option value="<?php echo $row1['RID']; ?>"><?php echo $row1['RID']; ?></option>
<?php
}
?>	
					</select>    
                  </div>
				  <div class="col-md-6 margin-bottom-15">
                    <label for="firstName" class="control-label">Password</label>
                    <input type="Password" name="ucontent6" value="<?php echo $row['pass']; ?>" class="form-control" id="firstName" Placeholder="Password">           
                  </div>
                </div>


              <div class="row templatemo-form-buttons">
                <div class="col-md-12">
                  <button type="button" name="submit" class="Updatesubmit_button">Update</button>   
                </div>
              </div>
</form>
</form>
</div>
</div>
<?php
}
}
else
{
?>
<div id="cp_contact_form">
<div id="cp_contact_form">
<form action="Busaction.php" method="post" name="form" id="form" enctype="multipart/form-data">

                <div class="row">
                  <div class="col-md-6 margin-bottom-15">
                    <label for="firstName" class="control-label">Driver Name</label>
                    <input type="text" name="content" class="form-control" id="firstName" Placeholder="Driver Name">           
                  </div>
                  <div class="col-md-6 margin-bottom-15">
                    <label for="lastName" class="control-label">Driver Contact No</label>
                    <input type="text" name="content1"  class="form-control" id="lastName" Placeholder="Driver Contact No">        
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-6 margin-bottom-15">
                    <label for="firstName" class="control-label">Bus No</label>
                    <input type="text" name="content2" class="form-control" id="firstName" Placeholder="Bus No"> 
                  </div>
                  <div class="col-md-6 margin-bottom-15">
                    <label for="lastName" class="control-label">Age</label>
                    <input type="text" name="content3"  class="form-control" id="lastName" Placeholder="Age">
                  </div>
                </div>

				<div class="row">
                  <div class="col-md-6 margin-bottom-15">
                    <label for="firstName" class="control-label">Route</label>
                    <select name="content4" class="form-control" id="firstName">
<?php
$select_table1 = "select RID from bus_pickup group by RID";
$fetch1= mysql_query($select_table1);
while($row1 = mysql_fetch_array($fetch1))
{
?>
<option value="<?php echo $row1['RID']; ?>"><?php echo $row1['RID']; ?></option>
<?php
}
?>	
					</select>    
                  </div>
				  
				  <div class="col-md-6 margin-bottom-15">
                    <label for="lastName" class="control-label">Password</label>
                    <input type="Password" name="content5"  class="form-control" id="lastName" Placeholder="Password">
                  </div>
                </div>


              <div class="row templatemo-form-buttons">
                <div class="col-md-12">
                  <button type="button" name="submit" class="submit_button">Save</button>   
                </div>
              </div>

</form>
</div>
</div>
<?php
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
$content5=mysql_real_escape_string($_POST['content5']);

mysql_query("insert into bus_data(DriverNam,DriverCno,Bussno,Age,Route,buslat,buslog,pass) values ('$content','$content1','$content2','$content3','$content4','','','$content5')");
echo "<font style='color:#0000FF;'>Record Saved</font><br><br><br>";
}
if(isset($_POST['ucontent']))
{

$ucontent=mysql_real_escape_string($_POST['ucontent']);
$ucontent1=mysql_real_escape_string($_POST['ucontent1']);
$ucontent2=mysql_real_escape_string($_POST['ucontent2']);
$ucontent3=mysql_real_escape_string($_POST['ucontent3']);
$ucontent4=mysql_real_escape_string($_POST['ucontent4']);
$ucontent5=mysql_real_escape_string($_POST['ucontent5']);
$ucontent6=mysql_real_escape_string($_POST['ucontent6']);

mysql_query("update bus_data set DriverNam='$ucontent1', DriverCno='$ucontent2', Age='$ucontent4', Bussno ='$ucontent3',Route='$ucontent5',pass='$ucontent6' where BID=$ucontent");
}
?>

<div class="table-responsive">
<h4 class="margin-bottom-15">Bus Details Table</h4>
<table class="table table-striped table-hover table-bordered">
<thead><tr>
<td><b>Bus ID</b></td>
<td><b>Driver Name</b></td>
<td><b>Driver Contact</b></td>
<td><b>Bus No</b></td>
<td><b>Age</b></td>
<td><b>Bus Route</b></td>
<td></td>
</tr></thead>
<tbody>
<?PHP
					$per_page = 10; 
					$select_table = "select * from bus_data";
					$fetch= mysql_query($select_table);
					$count = mysql_num_rows($fetch);
					$pages = ceil($count/$per_page);

$page=1;
if(isset($_POST['page']))
{
$page=$_POST['page'];
$start = ($page-1)*$per_page;
$select_table =$select_table." order by BID limit $start,$per_page";
$fetch= mysql_query($select_table);
}

while($row = mysql_fetch_array($fetch))
{
?>
<TR>
<TD><?php echo $row['BID']; ?></TD>
<TD><?php echo $row['DriverNam']; ?></TD>
<TD><?php echo $row['DriverCno']; ?></TD>
<TD><?php echo $row['Bussno']; ?></TD>
<TD><?php echo $row['Age']; ?></TD>
<TD><?php echo $row['Route']; ?></TD>
<TD><a href="#" class="ABCD" id="<?php echo $row['BID']; ?>">[ X ]</a>
<a href="#" class="Edit" id="<?php echo $row['BID']; ?>">[ Edit ]</a>
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