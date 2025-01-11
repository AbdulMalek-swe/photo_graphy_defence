<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Successful</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
        }
        .success-container {
            margin-top: 100px;
            text-align: center;
        }
        .success-icon {
            font-size: 80px;
            color: #28a745;
        }
        .btn-home {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container success-container">
        <div class="success-icon">✔️</div>
        <h1>Payment Successful!</h1>
        <p>Thank you for your payment. Your transaction has been completed successfully.</p>
        <a href="{{ url('/') }}" class="btn btn-primary btn-home">Return to Home</a>
    </div>
</body>
</html>
