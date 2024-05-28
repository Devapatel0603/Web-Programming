<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <nav class="navbar bg-body-tertiary">
            <div class="container-fluid">
                <span><b>User Details</b></span>
                <form class="d-flex" role="search" name="searchForm">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search"
                        name="search" onkeyup="loadData()">
                    <button class="btn btn-outline-primary" type="submit" onsubmit="loaddata()">Search</button>
                </form>
            </div>
        </nav>
        <h1 class="my-2 text-center">User Details</h1>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone No.</th>
                </tr>
            </thead>
            <tbody id="output">
                <?php
        try {
          include 'connection.php';
          $query = "SELECT * FROM user;";
          $result = mysqli_query($conn, $query);
          $i = 1;
          while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>
              <th>$i</th>
              <td>" . $row['uname'] . "</td>
              <td>" . $row['email'] . "</td>
              <td>" . $row['phone'] . "</td>
            </tr>";
            $i += 1;
          }
        } catch (Exception $e) {
        }
        ?>
            </tbody>
        </table>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
        </script>
        <script>
        const form = document.forms['searchForm'];

        function loadData() {
            if (form.search.value.length == 0) {
                return;
            } else {
                var xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        document.getElementById("output").innerHTML = this.responseText;
                    }
                };
                xhttp.open("GET", "get.php?search=" + form.search.value, true);
                xhttp.send();
            }
        }
        </script>
</body>

</html>
