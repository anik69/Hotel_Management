<?php
require 'connect.php';

 if (isset($_POST['f'])&&isset($_POST['l'])&&isset($_POST['s'])&&isset($_POST['e'])&&isset($_POST['d'])&&isset($_POST['slot']))
 {
  $fname= $_POST['f'];
  $lname= $_POST['l'];
  $sid= $_POST['s'];
  $email= $_POST['e'];
  $bdate= $_POST['d'];
  $slot = $_POST['slot'];

  /*if (!empty($name)) {
    if($name=="admin")
    {
      header('Location: admin.php');
    }
  }*/
   if(!empty($fname)&&!empty($lname)&&!empty($sid)&&!empty($email)&&!empty($bdate)&&!empty($slot))
   {
   $dupesql = "SELECT * FROM Student where ID = '$sid' ";

$duperaw = mysql_query($dupesql);

if (mysql_num_rows($duperaw) < 1) {


    	$check = "SELECT $slot FROM Seat";
//echo $check; 
    if($output=mysql_query($check))
    {
      while ($row= mysql_fetch_assoc($output)){
        $prevseat=$row[$slot];
        //echo $prevseat;
      }
      if($prevseat>0)
      {

        

     $query ="INSERT INTO Student (Fname, Lname, ID, Email, BDate, Slot)
              VALUES ('$fname','$lname','$sid','$email', '$bdate', '$slot');"; 
    if(mysql_query($query))
    {
   

      $seat= $prevseat - 1;
     $query1="UPDATE Seat SET $slot= '$seat' WHERE $slot= '$prevseat'; ";
    if(mysql_query($query1))
    {
              echo"<script>alert('Room booking completed successfully!');</script>";
    }else{ 
      //echo mysql_error();
   
    }
   }else{
      echo mysql_error();
    
    }
    
      }else{
        echo"<script>alert('No more room is available');</script>";
      }
    }else{
       
      echo mysql_error();
    }

} else{
  echo"<script>alert('You have already booked 1 room!');</script>";
}
   }
 else{
  echo "<script>alert('Please fill all required fields.');</script>";
 }
 } 
?>

      <!DOCTYPE html>
      <html>
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <head>
      <title>Register</title>

      <link rel="stylesheet" type="text/css" title="substyle" href="style3.css">
      </head>



      <style>

.form-signin .form-control {
	            position: relative;
	            height: auto;
	            width: 100%;
	            padding: 2px;
	            font-size: 15px;
	         }


      </style>

     

      <body>

      <h1>HOTEL PIONEER ONLINE ROOM BOOKING</h1>
      <p style="font-size: 20px; color: black">

      Instructions:

      <ul style="list-style-type: square; margin-left: 50px" position = "relative" > 
   <li> Please fillup <b>all</b> informations and select your booking day. </li>
   <li> Please check if there are available rooms before submitting. </li>
     </ul>


        </p>
  <br><br><br>
     
     <form  id = "form1" action = "seats.php">
<button class = "form-control"  style="border-top-left-radius: 10px;
	            border-top-right-radius: 10px;
	            border-color:#017572;"   >Room Status</button>



</form>

<form   action = "cancel.php">
<button class = "form-control"  style="border-top-left-radius: 10px;
	            border-top-right-radius: 10px;
	            border-color:#017572;"   >Cancel Booking</button>

	            

</form>
      <form class = "form-signin" role = "form" method="POST" action="register.php" >
        <div id = "form" >
    
    <input type = "username" class = "form-control" 
	               name = "f" placeholder = "Firstname" 
	               required >
    <br><br>
    <input type = "username" class = "form-control" 
	               name = "l" placeholder = "Lastname" 
	               required >
    <br><br>
    <input type = "username" class = "form-control" 
	               name = "s" placeholder = "UserID" 
	               required >
    <br><br>
    <input type = "username" class = "form-control" 
	               name = "e" placeholder = "Email Address" 
	               required >
    <br><br>
    <input type = "date" class = "form-control" 
                 name = "d" placeholder = "Booking Date" 
                 required >
    <br><br>

  </div>
<br><br>

   <select name = "slot" id = "select" type = "username" class = "form-control" style="border-top-left-radius: 20px;
	            border-top-right-radius: 20px;
	            border-color:#017572;">
    <option  style="display:none">Choose your room</option>
    <option value="Sec1">ROOM-01 [Single Bed (AC)]</option>
    <option value="Sec2">ROOM-02 [Double Bed (AC)]</option>
    <option value="Sec3">ROOM-03 [Double Bed (NON AC)]</option>
    <option value="Sec4">ROOM-04 [Single Bed (NON AC)]</option>
  </select> <br><br>
  <input type="submit"  value= "Register">
  </form>
   <br><br>



      <br><br>

  </body>
      </html>