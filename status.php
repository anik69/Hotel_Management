

<meta name="viewport" content="width=device-width, initial-scale=1">
      <head>
      <title>Status</title>

      <link rel="stylesheet" type="text/css" title="substyle" href="style3.css">
      </head>

      <style>
.form-signin .form-control {
              position: relative;
              height: auto;
              width: 80%;

              padding: 2px;
              font-size: 15px;
           }
      </style>

<body>
<h1>LIST OF BOOKING</h1>
</body>



<?php
require 'connect.php';

?>

<br><br><br>




<form  method="POST" class = "form-signin"  role = "form"  >
  <select name="slot"   type = "username" class = "form-control" style="border-top-left-radius: 20px;
              border-top-right-radius: 20px;
              border-color:black;">
  <option  style="display:none">Select Room Type</option>
  <option value="Sec1">ROOM-01 [Single Bed (AC)]</option>
  <option value="Sec2">ROOM-02 [Double Bed (AC)]</option>
  <option value="Sec3">ROOM-03 [Double Bed (NON AC)]</option>
  <option value="Sec4">ROOM-04 [Single Bed (NON AC)]</option>
</select>
<br><br>

<input class = "form-control" type ="submit" value= "Show List" style = "font-size: 12px">
</form>


<form action = "logout.php" class = "form-signin">
<button class = "form-control"  style="border-top-left-radius: 10px;
	            border-top-right-radius: 10px;
	            border-color:black; font-size: 12px"   href="logout.php">Logout</button>

</form>


<?php
if (isset($_POST['slot']))
{ 
  $sec=$_POST['slot'];
  if(!empty($sec))
  {
  $check="SELECT Fname,Lname,ID,BDate,Email FROM Student WHERE Slot='$sec';";
    if($output=mysql_query($check))
    {
      $output1="<table><tr><th>Name</th><th>User ID</th><th>Email Address</th><th>Booking Date</th></tr>";
     //echo "<table><tr><th>Name</th><th>ID</th><th>Email_Address</th></tr>";
      while ($row= mysql_fetch_assoc($output)){
        $fname=$row['Fname'];
        $lname=$row['Lname'];
        $id=$row['ID'];
        $email=$row['Email'];
        $bdate=$row['BDate'];
        $output1=$output1."<tr><td>" .$fname." ".$lname. "</td><td>" .$id. "</td><td>" . $email. "</td><td>" . $bdate. "</td></tr>"; 
      //echo "<tr><td>" .$name. "</td><td>" .$id. "</td><td>" . $email. "</td></tr>";
    }
     //echo "</table>";
      /*echo "<center><div style='width:600px;background-color:#6495ED; solid #000; padding:10px'>
             <br>$output1
            </div></center>";*/
      echo "<center>
             <br>$output1<br>
            </div></center>";       
    }else{
      echo mysql_error();
    }
  }
}

?>

