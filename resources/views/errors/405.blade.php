<!DOCTYPE html>
<html>
<head>
    <title>Not Found</title>
    @include('templates.cdn-link')
    <style>
        body {
            background: #fff;
            color: #333;
        }
        #logo-box {
            text-align: center;
            padding: 30px;
        }
        h1 {
            font-size: 30px;
            margin: 0 auto;
        }
        .btn {
            display: block;
            margin: 30px auto;
            padding: 10px;
            border: 2px solid #333;
            text-transform: uppercase;
            font-weight: bold;
            background: #333;
            color: #fff;
            width: 60%;
        }

        .btn:hover {
            background: transparent;
            color: #333;
        }

        #timer {
            font-size: 16px;
        }

        .copyright {
            font-size: 14px;
            text-align: center;
        }
    </style>
</head>
<body>
<div id="logo-box" class="container">
    <div class="animated fadeInUp">
        <div class="icon">
            <svg class="bi" width="90" height="128" fill="currentColor">
                <use xlink:href="bootstrap-icons.svg#house-fill"/>
            </svg>
        </div>
        <h1>Thank you</h1>
    </div>

    <div class="notice animated fadeInUp">
        <p class="lead">Kamu tak seharusnya berada disini!</p>
        <a class="btn animation" href="/">&larr; Back</a>
    </div>

    <div class="footer animated fadeInUp">
        <p id="timer">
            <script type="text/javascript">
                var count = 11; // Timer
                var redirect = "/"; // Target URL

                function countDown() {
                    var timer = document.getElementById("timer"); // Timer ID
                    if (count > 0) {
                        count--;
                        timer.innerHTML = "Halaman ini akan dialihkan dalam " + count + " seconds."; // Timer Message
                        setTimeout("countDown()", 1000);
                    } else {
                        window.location.href = redirect;
                    }
                }

                countDown();
            </script>
        </p>
        <p class="copyright">&copy; General Student Council of Kivotos City</p>
    </div>
</div>
</body>
</html>
