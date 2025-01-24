<?php
    $tablename = "users"; // Replace with your table name
    include('connect.php');
    include('cookies.php');

$action = $_POST["op"];

$uname = $_POST["username"];
$mypass = $_POST["password"];

if ($action === "login") {

    // Prepare and execute the SQL query
    $stmt = $conn->prepare("SELECT * FROM $tablename WHERE username = ?");
    $stmt->bind_param("s", $uname);
    $stmt->execute();

    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $storedPass = $row["password"];
        
        if ($mypass === $storedPass) {

            echo "Login successful.";
            handlelogin($uname);
            showerror('login successful');
        } else {
            showerror("Wrong password.");
        }
    } else {
        showerror("Username not found. try signing up");
    }
} elseif ($action === "signup") {
    // Check if the username already exists
    $stmt = $conn->prepare("SELECT * FROM $tablename WHERE username = ?");
    $stmt->bind_param("s", $uname);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        showerror("Username already exists. Log in instead or create another account");
    } else {
        // Insert the new user into the "users" table
        $stmt = $conn->prepare("INSERT INTO $tablename (username, password,user_role) VALUES (?, ?,'customer')");
        $stmt->bind_param("ss", $uname, $mypass);
        if ($stmt->execute()) {
            handlelogin($uname);
            showerror("Signup successful.");
        } else {
            showerror("Error during signup.");
        }
    }
} else {
    echo "Invalid action specified.";
}
?>

<?php
// functions
function showerror($err){
    echo "
        <script>
            window.location.assign(`login.php?error=".$err."`);
        </script>
    ";
}

// Close the connection
$conn->close();
?>
