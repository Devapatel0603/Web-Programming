<?php
$conn = mysqli_connect("localhost", "root", "", "wp");
if (!$conn) {
  die("Sorry, We failed to connect: " . mysqli_connect_error());
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>users</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
    label {
        font-weight: bold;
    }
    </style>
</head>

<body>
    <?php
      if (isset($_POST['isEdit']) && $_POST['isEdit'] == "Edit" && $_SERVER['REQUEST_METHOD'] == "POST") {
        $name = $_POST['name'];
        $dob = date("Y-m-d", strtotime($_POST['dob']));
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $country = isset($_POST['country']) ? $_POST['country'] : '';
        $photo = 'NULL';
        if ($_FILES['photo']['tmp_name'] !== '') {
          $photo = isset($_FILES['photo']) ? addslashes(file_get_contents($_FILES['photo']['tmp_name'])) : 'NULL';
        }
        if($photo === "NULL"){
          $query = "UPDATE users SET name = '$name', birthdate = '$dob', phone = '$phone', country = '$country' WHERE email = '$email';";
        }
        else{
          $query = "UPDATE users SET name = '$name', birthdate = '$dob', phone = '$phone', country = '$country', photo = '$photo' WHERE email = '$email';";
        }
    
        try {
          mysqli_query($conn, $query);
          echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
          <strong>Success! </strong> Your details updated Successfully.
          <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
          </div>";
        } catch (Exception $e) {}
      } else if (isset($_POST['delete']) && $_POST['delete'] == "deleteData" && $_SERVER['REQUEST_METHOD'] == "POST") {
          $email = $_POST['email'];
          $query = "DELETE FROM users WHERE email = '$email';";
          try {
              mysqli_query($conn, $query);
              echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
              <strong>Delete! </strong> Your details deleted Successfully.
              <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
          </div>";
          } catch (Exception $e) {}
      } else if ($_SERVER['REQUEST_METHOD'] == "POST") {
          $name = $_POST['name'];
          $dob = date("Y-m-d", strtotime($_POST['dob']));
          $gender = isset($_POST['gender']) ? $_POST['gender'] : '';
          $email = $_POST['email'];
          $phone = $_POST['phone'];
          $country = isset($_POST['country']) ? $_POST['country'] : '';;
          $photo = isset($_FILES['file']) ? addslashes(file_get_contents($_FILES['file']['tmp_name'])) : 'NULL';
          $query = "INSERT INTO USERS VALUES ('$name', '$dob', '$gender', '$email', '$phone', '$photo', '$country');";
          try {
              mysqli_query($conn, $query);
          } catch (Exception $e) {
              echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
              <strong>Sorry! </strong> Your details could not submitted.
              <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
          </div>";
          }
      }
      $query = "SELECT * FROM users;";
    ?>
    <table class="table table-hover">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone No.</th>
                <th>Birthdate</th>
                <th>Gender</th>
                <th>Country</th>
                <th>Photo</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            <?php
          try {
            $result = mysqli_query($conn, $query);
            $i = 1;
            while ($row = mysqli_fetch_assoc($result)) {
              echo "<tr>
                <th>$i</th>
                <td>" . $row['name'] . "</td>
                <td>" . $row['email'] . "</td>
                <td>" . $row['phone'] . "</td>
                <td>" . $row['birthdate'] . "</td>
                <td>" . $row['gender'] . "</td>
                <td>" . $row['country'] . "</td>
                <td><img src='data:image/jpeg;base64," . base64_encode($row['photo']) . "' alt=\"" . $row['name'] . "'s photo\" height='150px' style='border-radius: 7px'/></td>
                <td><button type='button' class='btn btn-primary edit' data-bs-toggle='modal' data-bs-target='#staticBackdrop'>Edit</button></td>
                <td><button type='button' class='btn btn-danger delete'>Delete</button></td>
              </tr>";
              $i += 1;
            }
          } catch (Exception $e) {echo $e;}
        ?>
        </tbody>
    </table>

    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Edit details</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="modalForm" action="<?php $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">
                    <div class="modal-body row g-3">
                        <input type="hidden" value="Edit" name="isEdit">
                        <div>
                            <label for="name">Name</label>
                            <input type="text" name="name" id="name" class="form-control" placeholder="Enter your name"
                                value="">
                        </div>
                        <div>
                            <label for="date">Birthdate</label>
                            <input type="date" name="dob" id="date" class="form-control" max="2024-1-31"
                                min="1990-01-01" />
                        </div>
                        <div>
                            <label for="email">Email</label>
                            <input type="email" name="email" id="email" class="form-control" placeholder="Email">
                        </div>
                        <div>
                            <label for="email">Phone</label>
                            <input type="tel" placeholder="Phone" class="form-control" name="phone">
                        </div>
                        <div>
                            <label for="country">Country</label>
                            <select name="country" id="country" class="form-select">
                                <option value="" disabled selected>Country</option>
                                <option value="India">India</option>
                                <option value="Russia">Russia</option>
                                <option value="USA">USA</option>
                                <option value="UK">United Kingdom</option>
                            </select>
                        </div>
                        <div>
                            <label for="photo">Upload your photo(&lt;50kb)</label>
                            <input class="form-control" type="file" id="photo" name="photo">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>

    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" name="deleteFrom" style="display: none;">
        <input type="hidden" value="deleteData" name="delete">
        <input type="hidden" value=" " name="email">
        <button type="submit">Submit</button>
    </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script>
    edits = document.getElementsByClassName("edit");
    form = document.getElementById("modalForm");
    Array.from(edits).forEach(element => {
        element.addEventListener("click", (e) => {
            tr = e.target.parentNode.parentNode;
            oldName = tr.getElementsByTagName("td")[0].innerText;
            oldEmail = tr.getElementsByTagName("td")[1].innerText;
            oldPhone = tr.getElementsByTagName("td")[2].innerText;
            oldDate = tr.getElementsByTagName("td")[3].innerText;
            oldCountry = tr.getElementsByTagName("td")[5].innerText;
            form.name.value = oldName;
            form.date.value = oldDate;
            form.email.value = oldEmail;
            form.phone.value = oldPhone;
            form.country.value = oldCountry;
        })
    });

    deletes = document.getElementsByClassName("delete");
    Array.from(deletes).forEach(element => {
        element.addEventListener("click", (e) => {
            tr = e.target.parentNode.parentNode;
            name = tr.getElementsByTagName("td")[0].innerText;
            email = tr.getElementsByTagName("td")[1].innerText;

            const form = document.forms["deleteFrom"];
            form.email.value = email;

            if (confirm(`Do you want to delete the data of ${name}?`)) {
                form.submit();
            }
        })
    });
    </script>
</body>

</html>
