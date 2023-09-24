<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Just Du It - Shoes Store</title>
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>

<body style="margin: 0; padding: 0;">
    <div class="sidebar bar-block card animate-left" style="display:none" id="sidebar">
        <button class="bar-item button large" onclick="closeSidebar()">&times;</button>
            <a href="/" class="bar-item button large">View All Shoe</a>
        @if(Auth::User())
            @if(Auth::User()->role->name == 'Member')
            <a href="/cart" class="bar-item button large">View Cart</a>
            <a href="/viewtransaction" class="bar-item button large">My Transactions</a>
            @elseif(Auth::User()->role->name == 'Admin')
            <a href="/addproduct" class="bar-item button large">Add Shoe</a>
            <a href="/alltransaction" class="bar-item button large">View All Transactions</a>
            @endif
        @endif

    </div>

    <div id="main">
        @include('layout.navbar')
        <div class="body_container">
            <div class="maincontent">
                @yield('content')
            </div>
        </div>
    </div>

    <script>
    function openSidebar() {
        document.getElementById("main").style.marginLeft = "30vh";
        document.getElementById("sidebar").style.width = "30vh";
        document.getElementById("sidebar").style.display = "block";
        document.getElementById("openNav").style.display = 'none';
    }
    function closeSidebar() {
        document.getElementById("main").style.marginLeft = "0%";
        document.getElementById("sidebar").style.display = "none";
        document.getElementById("openNav").style.display = "inline-block";
    }
    </script>


</body>
</html>
