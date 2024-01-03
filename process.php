<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Details</title>
</head>
<body> 
    <h2>Employee Details</h2>

    <?php
    $conn = mysqli_connect('localhost', 'root', '', 'data');
    if ($conn) {
        echo "success";
    } else {
        echo "something went wrong";
    }

    if ($_SERVER["REQUEST_METHOD"] === "POST") {  
        $firstName = isset($_POST["firstName"]) ? $_POST["firstName"] : "";
        $lastName = isset($_POST["lastName"]) ? $_POST["lastName"] : "";
        $email = isset($_POST["email"]) ? $_POST["email"] : "";
        $password = isset($_POST["password"]) ? $_POST["password"] : "";
        $gender = isset($_POST["gender"]) ? $_POST["gender"] : "";
        $hobbies = isset($_POST["hobbies"]) ? $_POST["hobbies"] : [];
        $department = isset($_POST["department"]) ? $_POST["department"] : "";

        $query = "INSERT INTO employee_data VALUES('', ?, ?, ?, ?, ?, ?, ?)";
        $stmt = mysqli_prepare($conn, $query);      
        $hobbiesString = implode(", ", $hobbies); 
        mysqli_stmt_bind_param($stmt, "sssssss", $firstName, $lastName, $email, $password, $gender, $hobbiesString, $department);

        mysqli_stmt_execute($stmt);

        echo "<script> alert('Data Inserted Successfully'); </script>";

        echo '<script>
        var newTab = window.open("", "_blank");
        newTab.document.write("<html><head><title>Employee Details</title></head><body>");
        newTab.document.write("<h2>Employee Details</h2>");
        newTab.document.write("<p><strong>First Name:</strong> ' . $firstName . '</p>");
        newTab.document.write("<p><strong>Last Name:</strong> ' . $lastName . '</p>");
        newTab.document.write("<p><strong>Email:</strong> ' . $email . '</p>");
        newTab.document.write("<p><strong>Password:</strong> ' . $password . '</p>");
        newTab.document.write("<p><strong>Gender:</strong> ' . $gender . '</p>");
        newTab.document.write("<p><strong>Hobbies:</strong> ' . implode(", ", $hobbies) . '</p>");
        newTab.document.write("<p><strong>Department:</strong> ' . $department . '</p>");
        newTab.document.write("</body></html>");
        newTab.document.close();
      </script>';
     
        mysqli_stmt_close($stmt);
    } else {
        echo "<p>No data received.</p>";
    }

    mysqli_close($conn);
    ?>
</body>
</html>
