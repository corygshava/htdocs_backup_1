<?php
    // login system template code
    $tablename = "users"; // Replace with your table name
    include('connect.php');
    include('cookies.php');

    $action = $_POST["operation"];
    $uname = $_POST["username"];
    $mypass = $_POST["password"];

    if ($action === "login") {

        // Prepare and execute the SQL query
        $stmt = $conn->prepare("SELECT * FROM $tablename WHERE user_name = ?");
        $stmt->bind_param("s", $uname);
        $stmt->execute();

        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $storedPass = $row["user_password"];
            
            if ($mypass === $storedPass) {
                handlelogin($uname);
                redirect_user('login successful');
            } else {
                redirect_user("Wrong password.");
            }
        } else {
            redirect_user("Username not found. try signing up");
        }
} elseif ($action === "signup") {
    // Check if the username already exists
    $stmt = $conn->prepare("SELECT * FROM $tablename WHERE user_name = ?");
    $stmt->bind_param("s", $uname);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        redirect_user("Username already exists. Log in instead or create another account");
    } else {
        // Insert the new user into the "users" table
        $stmt = $conn->prepare("INSERT INTO $tablename (user_name, user_password,user_type) VALUES (?, ?,'teacher')");
        $stmt->bind_param("ss", $uname, $mypass);
        if ($stmt->execute()) {
            handlelogin($uname);
            redirect_user("Signup successful.");
        } else {
            redirect_user("Error during signup.");
        }
    }
} else {
    echo "Invalid action specified.";
}
?>

<?php
// functions
function redirect_user($err){
    echo "
        <script>
            window.location.assign(`login.php?response=".$err."`);
        </script>
    ";
}

// Close the connection
$conn->close();
?>
