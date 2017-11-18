<?php
require 'connect.php';

if (isset($_POST['s'])&&isset($_POST['slot']))
{
	$sid= $_POST['s'];
  $slot = $_POST['slot'];

  if(!empty($sid)&&!empty($slot))
  {
  
  	$query3 = "DELETE FROM Student WHERE ID = '$sid'; ";
   
  	if(mysql_query($query3))
    {


$check = "SELECT $slot FROM Seat";

if($output=mysql_query($check))
    {
      while ($row= mysql_fetch_assoc($output)){
        $prevseat=$row[$slot];
        //echo $prevseat;
      }
      $seat= $prevseat + 1;
     $query1="UPDATE Seat SET $slot= '$seat' WHERE $slot= '$prevseat'; ";
if(mysql_query($query1))
    {
              echo"<script>alert('Your Registration Is Canceled');</script>";
    }else{
      echo mysql_error();
    }

      }
      else{
      echo mysql_error();
    }
    }
    else{
      echo mysql_error();
    }
  }
  else{
      echo mysql_error();
    }
}
?>

<!DOCTYPE html>
      <html>
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <head>
      <title>Cancel Booking</title>

      <link rel="stylesheet" type="text/css" title="substyle" href="style3.css">
      </head>

<body>
<p style="font-size: 20px; color: black">

      To cancel your booking insert "User ID" & "Room No.":
      </p>

<br><br>
<form class = "form-signin" role = "form" method="POST" action="cancel.php">
      <input type = "username" class = "form-control" 
	               name = "s" placeholder = "ID" 
	               required >
	           
<br><br>
	               
      <select name = "slot" id = "select" type = "username" class = "form-control" style="border-top-left-radius: 20px;
	            border-top-right-radius: 20px;
	            border-color:#017572;">
  <option  style="display:none">Select Room Type</option>
  <option value="Sec1">ROOM-01 [Single Bed (AC)]</option>
  <option value="Sec2">ROOM-02 [Double Bed (AC)]</option>
  <option value="Sec3">ROOM-03 [Double Bed (NON AC)]</option>
  <option value="Sec4">ROOM-04 [Single Bed (NON AC)]</option>
  </select> 
<br><br>
	                <input type="submit"  value= "Submit">
	               </form>

                 <form   action = "register.php">
<button id = "form1" class = "form-control"  style="border-top-left-radius: 10px;
              border-top-right-radius: 10px;
              border-color:#017572;"   >Back</button>

              

</form>
</body>


      </html>
