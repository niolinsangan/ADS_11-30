<?php
include "db_conn_30.php";

if (isset($_POST['submit'])) {
    $s_num = $_POST['s_number'];
    $s_fn = $_POST['s_fn'];
    $s_mn = $_POST['s_mn'];
    $s_ln = $_POST['s_ln'];
    $s_gender = $_POST['s_gender'];
    $s_bday = $_POST['s_birthday'];

   
    $s_contact = $_POST['s_contact'];
    $s_street = $_POST['s_street'];

    $conn -> begin_transaction();
    try{
    $sql = "insert into students(student_number, first_name, middle_name, last_name, gender, birthday) 
            values('$s_num', '$s_fn','$s_mn', '$s_ln', $s_gender, '$s_bday')";

    $result = mysqli_query($conn, $sql);
            
    $sql = "insert into student_details(contact_number, street)
     values('$s_contact', '$s_street')";
    
    $result = mysqli_query($conn, $sql);

    $conn -> commit();

    echo "New transaction added.";
    }
    catch(Exception $e){
      $conn -> rollback();
      echo $e->getMessage();
    }
  
  }
$conn->close();
?>






<!DOCTYPE html>
<html>
  
<head>
<link rel="stylesheet" href="style.css">
<h1>Add Student Record</h1>
</head>
<body>
    <form action="" method="post">
        <label>Student Number:</label> <input type="text" name="s_number" placeholder="ex. 2020-10-0511CN"><br><br>
        <label>First Name:</label><input type="text" name="s_fn" placeholder="ex. Antonio"><br><br>
        <label>Middle Name:</label><input type="text" name="s_mn" placeholder="ex. Adriano"><br><br>                
        <label>Last Name:</label><input type="text" name="s_ln" placeholder="ex. Linsangan"><br><br>       
        <label>Gender:</label><input type="text" name="s_gender" placeholder="ex.1 for  M, 0 for F"><br><br>          
        <label>Birthday:</label><input type="date" name="s_birthday"><br><br>      

        <label>Contact Number:</label><input type="text" name="s_contact" placeholder="09*********"><br><br>    
        <label>Street Name:</label><input type="text" name="s_street" placeholder="ex. Gen Luna St."><br><br>   
        <label>Town Name:</label><input type="text" name="s_town" placeholder="Town ID #"><br><br>               
        <label>Province Name:</label><input type="text" name="s_province" placeholder="Province ID # EX. 153"><br><br>
        <label>Zip Code:</label><input type="text" name="s_zipcode" placeholder="ex. 53XX"><br><br>                                
      
        <button type="submit" name="submit"> Submit </button>
</body> </html>