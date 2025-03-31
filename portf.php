<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portfolio - Get Started</title>
    <link rel="stylesheet" href="style.css">
    <script defer src="script.js"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background: #f4f4f4;
            color: #333;
            overflow-x: hidden;
        }

        header {
            background: #333;
            color: white;
            padding: 20px;
            text-align: center;
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

        .btn {
            display: inline-block;
            padding: 10px 20px;
            margin-top: 20px;
            background: #007BFF;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }

        .btn:hover {
            background: #0056b3;
        }

        main {
            text-align: center;
            padding: 50px;
        }

        #welcome {
            background: #fff;
            padding: 30px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            display: inline-block;
            border-radius: 10px;
            animation: bounceIn 1s;
        }

        @keyframes bounceIn {
            0% {
                transform: scale(0.3);
                opacity: 0;
            }
            50% {
                transform: scale(1.1);
                opacity: 1;
            }
            100% {
                transform: scale(1);
            }
        }

        .input-group {
            margin: 20px 0;
        }

        .input-group input, .input-group select {
            padding: 10px;
            width: 250px;
            margin: 5px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        #technology {
            display: flex;
            justify-content: space-around;
            margin-top: 30px;
        }

        .tech-item {
            width: 100px;
            height: 100px;
            background: #007BFF;
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            color: white;
            font-size: 18px;
            animation: mobileMove 2s infinite alternate;
        }

        @keyframes mobileMove {
            0% {
                transform: translateY(0);
            }
            100% {
                transform: translateY(-10px);
            }
        }

        .tech-item:nth-child(2) {
            animation: pcMove 2s infinite alternate;
        }

        @keyframes pcMove {
            0% {
                transform: translateX(0);
            }
            100% {
                transform: translateX(10px);
            }
        }

    </style>
</head>
<body>
    <header>
        <h1>Welcome to My Portfolio</h1>
        <nav>
            <ul>
                <li><a href="index.html">Home</a></li>
                <li><a href="about.html">About Us</a></li>
                <li><a href="contact.html">Contact Us</a></li>
                <li><a href="get_started.html">Get Started</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <section id="welcome">
            <h2>Get Started with Us</h2>
            <p>Provide your information and choose your service.</p>
            <form action="process.php" method="POST">
                <div class="input-group">
                    <label for="name">Name:</label>
                    <input type="text" id="name" name="name" required>
                </div>
                <div class="input-group">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" required>
                </div>
                <div class="input-group">
                    <label for="service">Choose a service:</label>
                    <select name="service" id="service" required>
                        <option value="web">Web Development</option>
                        <option value="mobile_app">Mobile App Development</option>
                        <option value="software">Software Development</option>
                        <option value="other">Other</option>
                    </select>
                </div>
                <button type="submit" class="btn">Submit</button>
            </form>
        </section>

        <div id="technology">
            <div class="tech-item">Mobile</div>
            <div class="tech-item">PC</div>
            <div class="tech-item">Software</div>
        </div>
    </main>
</body>
</html>
