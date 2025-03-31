<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "port";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create table if not exists
$table_sql = "CREATE TABLE IF NOT EXISTS freelance (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    service VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";
$conn->query($table_sql);

$registration_success = false;

// Get form data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $service = $_POST['service'];

    // Insert data into database
    $sql = "INSERT INTO freelance (name, email, service) VALUES ('$name', '$email', '$service')";

    if ($conn->query($sql) === TRUE) {
        $registration_success = true;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portfolio</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background: #f4f4f4;
            color: #333;
            text-align: center;
        }
        header {
            background: #333;
            color: white;
            padding: 20px;
        }
        nav ul {
            list-style: none;
            padding: 0;
        }
        nav ul li {
            display: inline;
            margin: 0 15px;
        }
        nav ul li a {
            color: white;
            text-decoration: none;
            font-size: 18px;
        }
        .container {
            margin: 50px;
        }
        .btn {
            display: inline-block;
            padding: 10px 20px;
            background: #007BFF;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }
        .btn:hover {
            background: #0056b3;
        }
        .images img {
            width: 200px;
            margin: 10px;
            border-radius: 10px;
            transition: transform 0.3s;
        }
        .images img:hover {
            transform: scale(1.1);
        }
        .form-container {
            background: #fff;
            padding: 20px;
            display: inline-block;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>
    <header>
        <h1>Welcome to My Portfolio</h1>
        <nav>
            <ul>
                <li><a href="#about">About Me</a></li>
                <li><a href="mailto:your-email@example.com">Contact Me</a></li>
                <li><a href="#getstarted">Get Started</a></li>
            </ul>
        </nav>
    </header>
    <div class="container">
        <section id="about">
            <h2>About Me</h2>
            <p>I am a passionate developer specializing in web, mobile, and software development.</p>
        </section>
        <div class="images">
            <img src="portimag1.jpg" alt="Web Development">
            <img src="portimag2.jpg" alt="Mobile Development">
            <img src="portimag3.jpg" alt="Software Development">
        </div>
        <section id="getstarted">
            <h2>Get Started</h2>
            <form action="" method="POST" class="form-container">
                <label for="name">Full Name:</label>
                <input type="text" id="name" name="name" required><br>
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required><br>
                <label for="service">What do you need?</label>
                <select id="service" name="service" required>
                    <option value="web">Website Development</option>
                    <option value="mobile">Mobile App Development</option>
                    <option value="software">Software Development</option>
                    <option value="other">Other</option>
                </select><br>
                <button type="submit" class="btn">Submit</button>
            </form>
        </section>
        <?php if ($registration_success) { echo "<h3>Thank you for registering!</h3>"; } ?>
    </div>
</body>
</html>
