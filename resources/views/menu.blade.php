<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous"> -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="{{ asset('js/jquery.js') }}"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js" integrity="sha384-LtrjvnR4Twt/qOuYxE721u19sVFLVSA4hf/rRt6PrZTmiPltdZcI7q7PXQBYTKyf" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cafe Myanmar</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <div class="collapse navbar-collapse">
            <a href="/" class="navbar-brand">
                <img src="../images/logo.png" alt="">
            </a>
        </div>
        <div class="navbar-nav">
            <a href="/" class="nav-item nav-link">Home</a>
            <a href="{{ route('shop.index') }}" class="nav-item nav-link">Shop</a>
            <a href="{{ route('cart.index') }}" class="nav-item nav-link">Cart
                @if( Cart::instance('default')->count() > 0 )    
                <span style="border: 1px solid; padding: 0px 6px; border-radius: 150%; background: yellow; color: black;">    
                    {{ Cart::instance('default')->count()}}
                </span>
                @endif
            </a>
        </div>
    </div>
</nav>
</body>
</html>