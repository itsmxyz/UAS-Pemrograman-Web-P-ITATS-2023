<!doctype html>
<html lang="en" class="h-100" data-bs-theme="auto">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <title>Not Found</title>
    @include('templates.cdn-link')
    <style>
        body {
            background: url("https://cdn.discordapp.com/attachments/1104037318521798746/1119795948202250261/Kaya-Lont.jpg") no-repeat center;
            background-size: cover;
            /*text-shadow: 0 .05rem .1rem rgba(0, 0, 0, .5);*/
            box-shadow: inset 0 0 20rem rgba(0, 0, 0, 0.8);
        }
        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
        .cover-container {
            max-width: 42em;
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
            text-decoration: none;
            border: 2px solid #333;
            background: transparent;
            color: #333;
        }

        #timer {
            font-size: 20px;
        }
        .font-stroke {
            -webkit-text-stroke: 2px black;
            -webkit-text-fill-color: white;
            text-stroke: 2px #f7ff00;
            text-fill-color: white;
        }
    </style>
</head>
<body class="d-flex h-100 text-center">
<div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
    <header class="mb-auto">
        <div>

        </div>
    </header>

    <main class="px-5" >
        <h1>Cock Check!!.</h1>
        <p class="lead font-monospace">
            Kamu tak seharusnya berada disini Sensei..
        </p>
        <p class="lead pb-4">
            <a class="btn animation" href="/">&larr; Back</a>
        </p>
    </main>


    <div class="footer animated fadeInUp">
        <p id="timer">
            <script type="text/javascript">
                var count = 7; // Timer
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
