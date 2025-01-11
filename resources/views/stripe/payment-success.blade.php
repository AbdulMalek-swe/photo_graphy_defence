<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Success</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <div class="alert alert-success text-center">
            <h1>Payment Successful!</h1>
            <p>Your payment has been processed successfully.</p>
            <a href="{{ url('/') }}" class="btn btn-primary">Return to Home</a>
        </div>
    </div>
</body>
</html>
