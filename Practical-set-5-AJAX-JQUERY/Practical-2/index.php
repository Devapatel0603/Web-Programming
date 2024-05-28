<!-- REST API Design, PHP Programming
for API Endpoints, Handling HTTP Methods (GET, POST, PUT, DELETE), Error
Handling and Response Codes, Output Formatting (JSON, XML, etc.), Testing and
Debugging of API Endpoints -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fetch Order</title>
</head>

<body>
    <div>
        <form action="/Practical-5-2.php" method="post">
            <h3>Fetch Employee Details By ID</h3>
            <input type="text" name="emp_id" placeholder="Employee_id">
            <button type="submit">submit</button>
        </form>
    </div>
    <?php
        if (isset($_POST['emp_id']) && $_POST['emp_id']!="") {
            $emp_id = $_POST['emp_id'];
            $client = curl_init();
            $url = "http://localhost/fetch.php?emp_id=".$emp_id;
            curl_setopt($client, CURLOPT_URL, $url);
            curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
            $response = curl_exec($client);
            if($e = curl_error($client)){
                echo $e;
            }else{
                if ($response === false) {
                    echo "Error: " . curl_error($client);
                } else {
                    $result = json_decode($response, true);
                    if ($result === null) {
                        echo "Error decoding JSON: " . json_last_error_msg();
                    } else {
                        if(isset($result['error'])){
                            echo "<p>".$result['error']."</p>";
                        }else{
                            echo "<table>";
                            echo "<tr><th>Employee ID</th><th>Customer ID</th><th>Name</th>";
                            foreach ($result as $item) {
                                echo "<tr>";
                                echo "<td>" . $item['emp_id'] . "</td>";
                                echo "<td>" . $item['name'] . "</td>";
                                echo "</tr>";
                            }
                            echo "</table>";
                        }
                    }
                }    
            }
            curl_close($client);
        }        
    ?>
</body>

</html>
