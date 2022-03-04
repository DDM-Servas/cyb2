<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script>
        function GetData() {
            var url = "http://yand.dyndns.org/api/tickers.aspx";
            var xhr = new XMLHttpRequest();
            xhr.open("GET",url,false);
            xhr.send();
            var text = xhr.responseText;
            //alert(text);
            //console.log(text);
            var stockData = JSON.parse(text);
            //console.log(stockData);
            var gazpomValue = stockData[0].value;
            //console.log(gazpomValue);
            var now = (new Date()).toTimeString();
            var msg = now + "Текущий курс акций Газпром" + gazpomValue;
            document.getElementById("gazprom").innerText = msg;
        }
    </script>
</head>
<body>
    <a href="index.html"> На главную</a> <br /><br />

    <h1>По настоящему серьезный биржевой портал</h1>
    Хочешь получить инфу - щелкни кнопку
    <button onclick="GetData();">Хочу получить инфу</button>
    <div id="gazprom"></div>
</body>
</html>