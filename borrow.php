<!DOCTYPE html>
<html>
<head>
 <title>CROWD BASED LENDING & BORROWING</title>
 <link rel="stylesheet" type="text/css" href="css/borrow.css">
<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">

<script src="https://kit.fontawesome.com/a076d05399.js" ></script>

</head>
<body>

<header class="site-header clearfix">
 <nav>
  <div class="logo">
     <h1><img src="img/LOGO.png" height="70" width="70"></h1>
   
  </div>
  <div class="menu"> 
   <ul>
     
    <li ><a href="LendBorrow.php"><button type="button">Lend/Borrow</button></a></li>
    <li ><a href="accountDetails.php"><button type="button">Update Account</button></a></li>
	<li ><a href="logout.php"><button type="button">Logout</button></a></li>
    
   </ul>
  </div>
 </nav>
 <section>
  
  <div class="rightside"> 
  <a href="newprojectform.php"><button class="button1">Create a new project</button></a></br></br>
  

   <div class="div1"><h3>Existing or previous borrows</h3></br>
   <?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "root", "", "crowd_based");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Attempt select query execution
$sql = "SELECT * FROM project";
if($result = mysqli_query($link, $sql)){
    if(mysqli_num_rows($result) > 0){
        echo "<table>";
		while($row = mysqli_fetch_array($result)){
			echo "<tr>";
			
                echo "<th>Name</th>";
				echo "<td>" . $row['Name'] . "</td>";
					
				
                
            echo "</tr>";
			echo "<tr>";
                echo "<th>User ID</th>";
				echo "<td>" . $row['User_ID'] . "</td>";
				
                
            echo "</tr>";
      echo "<tr>";
                echo "<th>Email</th>";
				echo "<td>" . $row['Email'] . "</td>";
				
                
            echo "</tr>";

			echo "<tr>";
                echo "<th>Account No</th>";
				echo "<td>" . $row['Account_No'] . "</td>";
				
                
            echo "</tr>";
			
		}
			
        
        echo "</table>";
		
        // Free result set
        mysqli_free_result($result);
    } else{
        echo "No records matching your query were found.";
    }
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
// Close connection
mysqli_close($link);
?>
   </div></br></br>
   <a href="repaymentpage.php"><button class="button1">Repay</button></a>
   
  </div>
  
 </section>

</header>
<script>
     function change(src){
          window.location=src;
          
     }
</script>


</body>
</html>



