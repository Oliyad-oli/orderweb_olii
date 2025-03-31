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

// Handle form submission
$message = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $service = $_POST['service'];

    // Insert data into database
    $sql = "INSERT INTO freelance (name, email, service) VALUES ('$name', '$email', '$service')";

    if ($conn->query($sql) === TRUE) {
        $message = "<p style='color: green;'>Thank you for registering! We will contact you soon.</p>";
    } else {
        $message = "<p style='color: red;'>Error: " . $sql . "<br>" . $conn->error . "</p>";
    }
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Portfolio</title>
    <style>
        
        .images img {
            width: 200px;
            margin: 10px;
            border-radius: 10px;
            transition: transform 0.3s;
        }
        .images img:hover {
            transform: scale(1.1);
        }
       
        .ports{
            color: green;
            font-family: cursive;
            font-size: medium;
        }
        body { font-family: Arial, sans-serif; margin: 0; padding: 0; background: #f4f4f4; color: #333; }
        header { background: #333; color: white; padding: 20px; text-align: center; }
        nav ul { list-style: none; padding: 0; text-align: center; }
        nav ul li { display: inline; margin: 0 15px; }
        nav ul li a { color: white; text-decoration: none; font-size: 18px; }
        main { text-align: center; padding: 50px; }
        .btn { display: inline-block; padding: 10px 20px; margin-top: 20px; background: #007BFF; color: white; text-decoration: none; border-radius: 5px; transition: background 0.3s; }
        .btn:hover { background: #0056b3; }
        .form-container { background: #fff; padding: 20px; border-radius: 10px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); display: inline-block; text-align: left; }
        label, input, select, button { display: block; width: 100%; margin-bottom: 10px; }
    </style>
</head>
<body>
    <header>
        <h1>Welcome to My Portfolio</h1>
        <nav>
            <ul>
                <li><a href="?page=home">Home</a></li>
                <li><a href="?page=about">About me</a></li>
                <li><a href="?page=contact">Contact Me</a></li>
                <li><a href="?page=get_started">Get Started</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <?php if (!isset($_GET['page']) || $_GET['page'] == 'home') { ?>
            <div class="images">
            <img src="webdev.jpg" alt="Web Development">
            <img src="mobappdev.jpg" alt="Mobile Development">
            <img src="portimag3.jpg" alt="Software Development">
            <br>
            <img src="srsphoto.jpg" alt="Software Development">
            <img src="graphdes.jpg" alt="Software Development">



        </div>
           <a href="?page=get_started" class="btn">Get Started</a>
        <?php } elseif ($_GET['page'] == 'about') { ?>
            <h2>About me</h2>
            <p class="ports">Hi, I'm Oliyad Dandena, a passionate Software Developer 
                and Web Developer.I specialize in creating functional, <br>
                user-friendly applications and websites that make a difference. <br>
                I am also a student,  constantly learning and exploring new technologies to <br>
                stay updated in this fast-paced industry.   <br>
     <div style= text-align:center>
                      <img src="odport.jpg" alt="me" width="200" height="200">
  
     </div>
     <p style="color:gold; font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;" >I enjoy solving complex problems and bringing creative solutions to life through code. <br>
         Whether it's developing dynamic websites or building robust software systems, I strive to deliver high-quality, efficient solutions that meet my clients' needs</p>
     </p>





                    <?php } elseif ($_GET['page'] == 'contact') { ?>
            <h2>Contact Me</h2>
            <p>Email: <a href="mailto:oliyaddandana@gmail.com<">oliyaddandana@gmail.com</a></p>
            <p>Phone: +251 962950893</p>
        <?php } elseif ($_GET['page'] == 'get_started') { ?>
            <h2>Get Started</h2>
            <form action="" method="POST" class="form-container">
                <label for="name">Full Name:</label>
                <input type="text" id="name" name="name" required>

                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>

                <label for="service">What do you need?</label>
                <select id="service" name="service" required>
                    <option value="web">Website Development</option>
                    <option value="mobile">Mobile App Development</option>
                    <option value="software">Software Development</option>
                    <option value="software">Software specification</option>
                    <option value="software">Graphic design</option>


                    <option value="other">Other</option>
                </select>
                
                <button type="submit" class="btn">Submit</button>
            </form>
            <?php echo $message; ?>
        <?php } ?>
    </main>
</body>
</html>