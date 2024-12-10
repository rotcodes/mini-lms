<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Success</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .container {
            margin-top: 50px;
        }
        .icon-success {
            font-size: 3rem;
            color: #28a745;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="text-center">
            <div class="icon-success">
                <i class="fas fa-check-circle"></i>
            </div>
            <h1 class="mt-4">Payment Successful</h1>
            <p class="lead">Thank you for your purchase!</p>
            <div class="card mb-4">
                <div class="card-body">
                    <h5 class="card-title">Course Details</h5>
                    <p><strong>Course Name:</strong> {{ $order->course->courseTitle }}</p>
                    <hr>
                    <p><strong>Description:</strong> {!! $order->course->desc !!}</p>
                    <hr>
                    <p><strong>Price:</strong> ${{ $order->course->price }}</p>
                    <hr>
                    <p><strong>User Email:</strong> {{ $order->user->email }}</p>
                    <hr>
                    <p><strong>Purchase Date:</strong> {{ $order->payment_completed_at }}</p>
                    <br>
                    <a href="{{ route('admin.dashboard') }}" class="btn-sm btn-primary">Return to My Subscriptions</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- Font Awesome Icons -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js"></script>
</body>
</html>
