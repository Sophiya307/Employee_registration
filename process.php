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
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "details";

    $conn = mysqli_connect($servername, $username, $password, $database);

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    if ($_SERVER["REQUEST_METHOD"] === "POST") {  
        $firstName = isset($_POST["firstName"]) ? $_POST["firstName"] : "";
        $lastName = isset($_POST["lastName"]) ? $_POST["lastName"] : "";
        $email = isset($_POST["email"]) ? $_POST["email"] : "";
        $password = isset($_POST["password"]) ? $_POST["password"] : "";
        $gender = isset($_POST["gender"]) ? $_POST["gender"] : "";
        $hobbies = isset($_POST["hobbies"]) ? $_POST["hobbies"] : [];
        $department = isset($_POST["department"]) ? $_POST["department"] : "";

        $sql = mysqli_query($conn, "INSERT INTO details (firstname, lastName, email, password, gender, hobbies, department) VALUES ('$firstName', '$lastName', '$email', '$password', '$gender', '$hobbies', '$department')");

        if ($sql) {
            echo "Record inserted";
        } else {
            echo "Something went wrong: " . mysqli_error($conn);
        }

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
    } else {
        echo "<p>No data received.</p>";
    }

    mysqli_close($conn);
    ?>
</body>
</html>
