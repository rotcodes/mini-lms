<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Failed</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .container {
            margin-top: 50px;
        }
        .icon-fail {
            font-size: 3rem;
            color: #dc3545;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="text-center">
            <div class="icon-fail">
                <i class="fas fa-times-circle"></i>
            </div>
            <h1 class="mt-4">Payment Failed</h1>
            <p class="lead">We encountered an issue with your payment.</p>
            <div class="card mb-4">
                <div class="card-body">
                    <h5 class="card-title">Error Details</h5>
                    <!-- Check if there is an error message in the session and display it -->
                    @if (session('error'))
                        <p><strong>Error Message:</strong> {{ session('error') }}</p>
                    @else
                        <p><strong>Error Message:</strong> Unknown error occurred.</p>
                    @endif
                    {{-- <p><strong>Plan Attempted:</strong> {{ $planName }}</p> --}}
                    <p>Please try again later or contact support if the issue persists.</p>
                </div>
            </div>
            <a href="{{ route('courses') }}" class="btn btn-danger">Try Again</a>
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
