<?php
include 'phpqrcode/qrlib.php';  
include('db.php');
 
$searchid="";
if(isset($_GET['sid']))
{
	$searchid=$_GET['sid'];
}
$select_table = "select * from allstudent where sid='".$searchid."'";
$fetch= mysql_query($select_table);

if(mysql_num_rows($fetch)>=1)
{		
while($row = mysql_fetch_array($fetch))
{
?>

<!DOCTYPE html>
<html>
<head>
  <title>Softron Employee Card</title>
  <style>
    body {
      margin: 0;
      padding: 0;
      font-family: Arial, sans-serif;
    }
    
    .card-container {
      width: 320px;
      margin: 10px;
      text-align: center;
	  border: 1px solid #ccc;
	  border-radius: 10px;
    }
    
    .top-bar {
      background-color: #B32056;
      color: #fff;
      padding: 10px;
	  border-top-right-radius: 10px;
	  border-top-left-radius: 10px;
    }

    .top-button {
      background-color: #333;
      color: #fff;
      padding: 2px;
	  width: 320px;
      margin: 10px;
      text-align: center;
	  border-radius: 10px;
    }
	
    .top-bar-img {
      background-color: #fff;
      color: #fff;
      padding: 2px;
    }
    
    .company-logo {
      max-width: 170px;
      height: auto;
    }
    
    .card {
      border: 1px solid #ccc;
      padding: 10px;
      text-align: center;
    }
    
    .avatar {
      width: 150px;
      height: 180px;
      border-radius: 7%;
      margin: 0 auto;
      background-color: #ccc;
      background-size: cover;
      background-position: center;
      background-repeat: no-repeat;
    }
    
    .employee-info {
      margin-top: 10px;
    }
    
    .employee-info h2 {
      margin: 0;
    }
    
    .employee-info p {
      margin: 5px 0;
    }
    
    .bottom-bar {
      background-color: #333;
      color: #fff;
      padding: 5px;
	  border-bottom-right-radius: 10px;
	  border-bottom-left-radius: 10px;
    }
    
    .company-website {
      color: #fff;
      text-decoration: none;

    }
  </style>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.js"></script>

</head>
<body>
  <div class="card-container" id="employee-card">
      <div class="top-bar">
	  <b>
	  <font color="#fff" face="Times New Roman" style="font-size:32px"><u>DYP</u></font>
	  <font color="#fff" face="Times New Roman" style="font-size:32px"><u>Polytechnic</u></font>
	  </b>
      </div>



	
    <div class="card">
      <div class="avatar" style="background-image: url('employee_photo.jpg');">
<?php
$string=$row['sid'];
$Qfile = $row['sid'].".png";
$file = 'Qimages/'.$Qfile; 
QRcode::png($string, $file);
?>
<img src="Qimages/<?php echo $Qfile; ?>" style="width: 150px;height: 180px;">
	  </div>
      <div class="employee-info">
        <h2><?php echo $row['sname']; ?></h2>
		<p>ID: <?php echo $row['sid']; ?></p>
        <p>Email: <?php echo $row['semail']; ?></p>
		<p>Mobile No: <?php echo $row['smobno']; ?> Developer</p>
        <p>Department : <?php echo $row['Department']; ?></p>
        <p>Year: <?php echo $row['Year']; ?></p>
      </div>
    </div>

 
  </div>
  
 
</body>
</html>

<?php
}
}
else
{
	echo "<b>Student Record Not Found.!</b>"; 
}
?>