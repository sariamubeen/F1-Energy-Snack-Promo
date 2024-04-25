<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>F1 Energy Snack Promo</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background: linear-gradient(120deg, #2980b9, #3498db);
            color: #ffffff;
        }
        .container {
            background-color: rgba(255, 255, 255, 0.9);
            border-radius: 10px;
            padding: 0px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
            text-align: center;
            animation: fadeIn 1s ease;

        }
        .welcome-message {
            font-size: 36px;
            font-weight: bold;
            margin-bottom: 20px;
            color: black;
        }
        .features {
            font-size: 20px;
            line-height: 1.6;
            margin-top: 20px;
        }
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        .glowing-note {
            color: #fff;
            background-color: #f1c40f;
            border-radius: 5px;
            padding: 10px;
            margin-top: 20px;
            box-shadow: 0 0 10px #f1c40f, 0 0 20px #f1c40f, 0 0 30px #f1c40f;
            animation: glow 1s ease-in-out infinite alternate;
        }
        
        @keyframes glow {
            from {
                box-shadow: 0 0 10px #f1c40f, 0 0 20px #f1c40f, 0 0 30px #f1c40f;
            }
            to {
                box-shadow: 0 0 20px #f1c40f, 0 0 30px #f1c40f, 0 0 40px #f1c40f;
            }
        }

        form {
            max-width: 600px;
            margin: 0px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }


        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            color: black;
        }
        input[type="text"],
        input[type="email"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }
        button[type="submit"] {
            background-color: #4CAF50;
            color: black;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
            margin-top: 10px;
        }
        button[type="submit"]:hover {
            background-color: #45a049;
        }
        #result {
            margin-top: 20px;
            font-weight: bold;
        }
        p {
            color: black;
        }
    </style>
</head>
<body>
    <div class="container">
       <div class="welcome-message">Welcome to GlynH's Crisps App</div>
        <div class="features">
            <p>Simply enter your 10-digit hex code, along with your Name, Email, and Address, to tap into incredible discounts.</p>
            <p class="warning-note">⚠️ Remember! Each hex code is a golden key, and golden keys are one-of-a-kind. ⚠️</p>
            <p>Each code can be unlocked only once, so be sure to use a fresh code every time to keep the savings rolling in.</p>
            <p class="glowing-note">With every 100 participants, someone will strike it lucky and bag a sleek F1 umbrella for free. <br>
                Keep your eyes on the prize; that lucky someone could be you!</p>
        </div>
    </div>
        <form id="promoForm" style="width: 30%;">
        <label for="hexCode">Hex Code:</label>
        <input type="text" id="hexCode" name="hexCode" required><br><br>
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required><br><br>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br><br>
        <label for="address">Address:</label>
        <input type="text" id="address" name="address" required><br><br>
        <button type="submit">Submit</button>
    </form>

    <div id="result"></div>

    <script>
document.getElementById("promoForm").addEventListener("submit", function(event) {
    event.preventDefault(); // Prevent form submission

    // Get form data
    var formData = new FormData(this);

    // Send form data using fetch API
    fetch('redeem_code.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.text())
    .then(data => {
        // Display result as an alert box
        alert(data);
    })
    .catch(error => {
        console.error('Error:', error);
        alert('An error occurred. Please try again.');
    });
});
</script>
</body>
</html>
