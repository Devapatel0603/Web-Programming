<?php
    header("Content-Type:application/json");
    header("Acess-Control-Allow-Origin:*");
    $con = mysqli_connect('localhost', 'root', '', 'wp');
    $json_result = array();
    if(!$con){  
        die('Could not connect: '.mysqli_connect_error());  
    }
    if (isset($_GET['emp_id']) && $_GET['emp_id']!="") {
        $emp_id = $_GET['emp_id'];
        $query = "SELECT * FROM employee WHERE imp_id='$emp_id'";
        $result = mysqli_query($con,$query);
        if(mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
                $json_result[] = $row;
            }
        } else {
            $json_result['error'] = 'Employee not found';
        }
    } else {
        $json_result['error'] = 'Employee ID not provided';
    }
    echo json_encode($json_result);
?>