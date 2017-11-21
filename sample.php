for database connection

<?php
$conn=mysqli_connect("localhost","veeru","Veeru@0007","designprob");
?>

to show the table and details in web page (means fetch data)
<?php	
		 
       $sql="SELECT * FROM users";
       $run=mysqli_query($conn,$sql);
       		  echo "
		   <table class='table'>
		      <thead>
			   <tr>
			       <th>S.No</th>
				   <th>Name</th>
				   <th>Email</th>
				   <th>Password</th>
				   <th>Contact</th>
				   <th>Date</th>
				  <!-- <th>Edit</th> -->
				   <th>Delete</th>
			   </tr>
			  </thead>
             <tbody>
		";
		$c=1;
		while($rows=mysqli_fetch_assoc($run))
	     {
		echo "
		       <tr>
			       <td>$c</td>
			       <td>$rows[name]</td>
				   <td>$rows[email]</td>
				   <td>$rows[password]</td>
				   <td>$rows[contact_number]</td>
				   <td>$rows[date]</td>
				 <!--  <td><a href='admin.php?edit_id=$rows[u_id]'' class='btn btn-success'>Edit</a</td>   -->
				   <td><a href='admin.php?del_id=$rows[u_id]' class='btn btn-danger'>Delete</a></td>
			   </tr>
			   
		";
		   $c++;
		}
	    echo "</tbody>
		  </table>";
        ?>
		
		
		for inserting data into database
<?php
    
   if( isset($_POST['submit_user'])  ){
	   $user=mysqli_real_escape_string($conn,strip_tags($_POST['user']));
	   $email=mysqli_real_escape_string($conn,strip_tags($_POST['email']));
	   $password=mysqli_real_escape_string($conn,strip_tags($_POST['password']));
	   if( isset($_POST['contactnumber']) )
	   {
	        $contactnumber=mysqli_real_escape_string($conn,strip_tags($_POST['contactnumber']));  
	      }
	   $date=date('Y-m-d');
	   $ins_sql="INSERT INTO users (name,email,password,contact_number,date) VALUES('$user','$email','$password','$contactnumber','$date')";
	   if(mysqli_query($conn,$ins_sql)){  ?>
		     <script>window.location="admin.php"</script>   
	   <?php }
   }
   ?>