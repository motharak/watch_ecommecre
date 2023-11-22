<?php
header("refresh: 5; http://demofirstecommerce.great-site.net/public/");
?>
<!-- index.html -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loading page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            background-color: #f2f2f2;
        }

        #loading-spinner {
            border: 8px solid #3498db;
            border-top: 8px solid #f3f3f3;
            border-radius: 50%;
            width: 50px;
            height: 50px;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        #content {
            display: none;
        }
    </style>
</head>
<body>
    <div id="loading-spinner"></div>
    <div id="content">
        <!-- Your page content goes here -->
        <h1>Success👌</h1>
    </div>
    <script>
        // Simulate page loading with a delay
        setTimeout(function() {
            document.getElementById('loading-spinner').style.display = 'none';
            document.getElementById('content').style.display = 'block';
        }, 4000); // Adjust the delay as needed
    </script>
</body>
</html>
