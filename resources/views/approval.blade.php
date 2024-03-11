<!DOCTYPE html>
<html>

<head>
    <title>Access Denied</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

    <style>
        body {
            background-color: black;
            color: white;
        }

        h1 {
            color: red;
        }

        h6 {
            color: red;
            text-decoration: underline;
        }

        a {
            padding: 8px;
            margin: 0 5px;
            text-decoration: none;
            border-radius: 5px;
            background: #333;
            color: #fff;
        }
    </style>
</head>

<body>
    <div class="w3-display-middle">
        <h1 class="w3-jumbo w3-animate-top w3-center"><code>Access Denied</code></h1>
        <hr class="w3-border-white w3-animate-left" style="margin:auto;width:50%">
        <h3 class="w3-center w3-animate-right">Please wait for admin approval</h3>
        <h3 class="w3-center w3-animate-zoom">🚫🚫🚫🚫</h3>
        <h6 class="w3-center w3-animate-zoom">error code:403 forbidden</h6>

        <div style="display: flex; align-items:center; justify-content:center">
            <a href="{{ route('home') }}">
                Go to Webpage
            </a>

            <form method="POST" action="{{ route('company.logout') }}">
                @csrf
                <a href="{{ route('company.logout') }}"
                    onclick="event.preventDefault();
                    this.closest('form').submit();">
                    Logout
                </a>
            </form>
        </div>
    </div>
</body>

</html>
