<!DOCTYPE html>
<html>
<head>
    <title>Objektum orientált JavaScript</title>
</head>
<body>
    <h2>Forgalomkorlátozási képek megmutatása/elrejtése</h2>
    <script type="text/javascript">
        var kep = new ForgalomkorlatozosKep('images/image_01.jpg', 220, 210);
        var kep2 = new ForgalomkorlatozosKep('images/image_02.jpg', 370, 210);
        var kep3 = new ForgalomkorlatozosKep('images/image_03.jpg', 520, 210);
        var kep4 = new ForgalomkorlatozosKep('images/image_04.jpg', 670, 210);
        var kep5 = new ForgalomkorlatozosKep('images/image_05.jpg', 820, 210);
    </script>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <table>
    <tr>
        <td style="padding-left:20;"><button onclick="kep.mutat()">Mutatás</button></td>
        <td style="padding-left:40;"><button onclick="kep2.mutat()">Mutatás</button></td>
        <td style="padding-left:40;"><button onclick="kep3.mutat()">Mutatás</button></td>
        <td style="padding-left:40;"><button onclick="kep4.mutat()">Mutatás</button></td>
        <td style="padding-left:40;"><button onclick="kep5.mutat()">Mutatás</button></td>
    </tr>
    <tr>
        <td style="padding-left:20;"><button onclick="kep.elrejt()">Elrejtés</button></td>
        <td style="padding-left:40;"><button onclick="kep2.elrejt()">Elrejtés</button></td>
        <td style="padding-left:40;"><button onclick="kep3.elrejt()">Elrejtés</button></td>
        <td style="padding-left:40;"><button onclick="kep4.elrejt()">Elrejtés</button></td>
        <td style="padding-left:40;"><button onclick="kep5.elrejt()">Elrejtés</button></td>
    </tr>
    </table>
</body>
</html>