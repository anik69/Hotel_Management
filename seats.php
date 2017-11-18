
<meta name="viewport" content="width=device-width, initial-scale=1">
      <head>
      <title>Seats</title>

      <link rel="stylesheet" type="text/css" title="substyle" href="style3.css">
      </head>


<body>
<h1>Current Rooms Status</h1>

</body>


<?php
require 'connect.php';

//if (isset($_POST['sec']))
//{ 
  


$check="SELECT Sec1, Sec2, Sec3, Sec4 FROM Seat;";

    if($output=mysql_query($check))
    {
      //$output1="<table><tr><th>Section</th><th>Seats Available</th></tr></table>";
     //echo "<table><tr><th>Name</th><th>ID</th><th>Email_Address</th></tr>";
      while ($row= mysql_fetch_assoc($output)){
        $sec1=$row['Sec1'];
        $sec2=$row['Sec2'];
        $sec3=$row['Sec3'];
        $sec4=$row['Sec4'];
        //$output1=$output1."<tr><td>" .$sec1. "</td><td>" .$sec2. "</td></tr>"; 
      //echo "<tr><td>" .$name. "</td><td>" .$id. "</td><td>" . $email. "</td></tr>";
        $output1 = "Available seat for Room Type 01: $sec1"  ;
        $output2 = "Available seat for Room Type 02: $sec2"  ;
        $output3 = "Available seat for Room Type 03: $sec3"  ;
        $output4 = "Available seat for Room Type 04: $sec4"  ;
    }
     
            echo "<center>
             <br><b>$output1<b><br>
            </div></center>";  


            echo "<center>
             <br>$output2<br>
            </div></center>";    
            
            echo "<center>
             <br>$output3<br>
            </div></center>";  

              echo "<center>
             <br>$output4<br>
            </div></center>";         
    }else{
      echo mysql_error();
    }

//}
?>
<br><br><br><br>

<body>
<form action = "register.php">
<button id = "form1" class = "form-control"  style="border-top-left-radius: 10px;
	            border-top-right-radius: 10px;
	            border-color:black;"   href="logout.php">Back</button>

</form>
</body>