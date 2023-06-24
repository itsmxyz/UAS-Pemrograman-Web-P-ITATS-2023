<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        body {
            background-image: url('https://cdn.discordapp.com/attachments/1104037318521798746/1119795948202250261/Kaya-Lont.jpg');
            background-size: cover;
            background-repeat: no-repeat;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            transition: background-image 0.5s ease;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col">
            <button id="button1" class="btn btn-primary button px-4 m-5">Button 1</button>
            <button id="button2" class="btn btn-primary button px-4 m-5">Button 2</button>
        </div>
    </div>
</div>

<script>
    var defaultBackground = 'https://cdn.discordapp.com/attachments/1104037318521798746/1119795948202250261/Kaya-Lont.jpg';
    var button1Background = 'https://cdn.discordapp.com/attachments/1104037318521798746/1109440287060787291/Millennium_Location.png';
    var button2Background = 'https://cdn.discordapp.com/attachments/1104037318521798746/1119793855995330641/knapa_tuh.jpg';

    var body = document.body;
    var currentBackground = defaultBackground;

    function changeBackground(imageUrl) {
        body.style.backgroundImage = 'url(' + imageUrl + ')';
        currentBackground = imageUrl;
    }

    function resetBackground() {
        changeBackground(defaultBackground);
    }

    document.getElementById('button1').addEventListener('mouseover', function() {
        if (currentBackground !== button1Background) {
            changeBackground(button1Background);
        }
    });

    document.getElementById('button2').addEventListener('mouseover', function() {
        if (currentBackground !== button2Background) {
            changeBackground(button2Background);
        }
    });

    document.getElementById('button1').addEventListener('mouseout', resetBackground);
    document.getElementById('button2').addEventListener('mouseout', resetBackground);
</script>
</body>
</html>
