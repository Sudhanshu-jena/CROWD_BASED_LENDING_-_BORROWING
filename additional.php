<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "root", "", "crowd_based");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Attempt select query execution
$sql = "SELECT * FROM `project` where `User_ID` = project.User_ID";
if($result = mysqli_query($link, $sql)){
    if(mysqli_num_rows($result) >= 0){
        foreach($result as $row){
        echo "<table class='table'>";
		while($row = mysqli_fetch_array($result)){
			echo "<tr class='table-dark'>";
			
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
    }
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
<?php
  
  
  if(isset($_POST['Confirm']))
        {
          $conn = config::conectphp();
                  $User_ID=$_POST['User_ID'];
                  
                  
          
                  try{
                  $sql = "SELECT  * FROM `account` WHERE `User_ID` = :User_ID";
                  // use exec() because no results are returned
                  $stmt = $conn->prepare($sql);
                  $stmt->execute(array(":User_ID"=>$User_ID));
                  
              
                  foreach($stmt as $row){
                      echo '<table class="table" width="70%" border="2" cellpadding="5" cellspacing="5">
                      <thead class="thead-dark">
                      <tr class="table-dark">
                      
                          <th >User ID:</th>

                          <th>'.$row ["User_ID"].'</th>
                      </tr>
                      </thead>';
                          
                          
                      
                          
                      
                      
                          
                      echo '</table>';
                      echo '<table class="table" width="70%" border="2" cellpadding="5" cellspacing="5">
                      <thead>
                      <tr>
                      
                          <th >Name:</th>

                          <th>'.$row ["Name"].'</th>
                      </tr>
                      </thead>';
                      echo '</table>';
                      echo '<table class="table" width="70%" border="2" cellpadding="5" cellspacing="5">
                      <thead >
                      <tr>
                      
                          <th >Account No.:</th>

                          <th>'.$row ["Account_No"].'</th>
                      </tr>
                      </thead>';
                          
                          
                      
                          
                      
                      
                          
                      echo '</table>';
                      
                      echo '<table class="table" width="70%" border="2" cellpadding="5" cellspacing="5">
                      <thead >
                      <tr>
                      
                          <th >IFSC_Code:</th>

                          <th>'.$row ["IFSC_Code"].'</th>
                      </tr>
                      </thead>';
                          
                          
                      
                          
                      
                      
                          
                      echo '</table>';
                      echo '<table class="table" width="70%" border="2" cellpadding="5" cellspacing="5">
                      <thead >
                      <tr >
                      
                          <th >Bank_Name:</th>

                          <th>'.$row ["Bank_Name"].'</th>
                      </tr>
                      </thead>';
                          
                          
                      
                          
                      
                      
                          
                      echo '</table>';
                      echo '<table class="table" width="70%" border="2" cellpadding="5" cellspacing="5">
                      <thead >
                      <tr >
                      
                          <th >Bank_Branch:</th>

                          <th>'.$row ["Bank_Branch"].'</th>
                      </tr>
                      </thead>';
                          
                          
                      
                          
                      
                      
                          
                      echo '</table>';
                      echo '<table class="table" width="70%" border="2" cellpadding="5" cellspacing="5">
                      <thead >
                      <tr >
                      
                          <th >Email:</th>

                          <th>'.$row ["Email"].'</th>
                      </tr>
                      </thead>';
                          
                          
                      
                          
                      
                      
                          
                      echo '</table>';
                      echo '<table class="table" width="70%" border="2" cellpadding="5" cellspacing="5">
                      <thead >
                      <tr >
                      
                          <th >Contact_No:</th>

                          <th>'.$row ["Contact_No"].'</th>
                      </tr>
                      </thead>';
                          
                          
                      
                          
                      
                      
                          
                      echo '</table>';
                      echo '<table class="table" width="70%" border="2" cellpadding="5" cellspacing="5">
                      <thead >
                      <tr>
                      
                          <th >Address:</th>

                          <th>'.$row ["Address"].'</th>
                      </tr>
                      </thead>';
                          
                          
                      
                          
                      
                      
                          
                      echo '</table>';
                          
                          
                      
                          
                      
                      
                          
                      

  
  
                      }
                      
                  
          
                  
                  
                  }
                  catch(PDOException $e){
  
                  }
                }
              
          
          
          
          
      ?>