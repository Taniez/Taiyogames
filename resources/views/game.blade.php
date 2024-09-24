<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        @import url({{asset('css/game.css')}});
        img {
            scale: 30%;
        }
        body {
            margin:0px auto;
            padding:0px 15%;
            height: auto;
            border: 1px solid green;
            }
        
        .logoGame {
            border:1px solid black;
            display: flex;
            justify-content: center;
            margin-bottom: 70px;
            margin-top: 20px;
        }
        .logoGame img{
            scale: 130%;
        }
        p {
            font-size: large;
        }

        .about {
            text-indent: 2em;
        }

        .gameInformation{
            border: 1px solid black;
            padding-left: 50px;
        }
        .gameLogs{
            border: 1px solid black;
            padding-left: 50px;
        }
    </style>
</head>
<body>
<x-app-layout>
    <div class="logoGame">
        <img src="https://static.wikia.nocookie.net/logopedia/images/d/da/Honkai_Impact_3rd_logo.png" alt="logo">
    </div>
    <p><b>Lastest Demo : v7.7.0 (22/9/2567)</b></p>
    <p class="about">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quisquam nam officiis delectus error rerum natus!</p>

    <div class='Info'>
        <div id='infoZone'>
            <div class='gameInformation'>
                <p><b>More information V</b></p>
                <p><b>Update</b> xxx</p>
                <p><b>Status</b> inprogress</p>
                <p><b>Platforms</b> xxx, xxx</p>
                <p><b>Rating</b> xxx</p>
                <p><b>Genre</b> xxx</p>
                <p><b>Tags</b> xxx, xxx, xxx, xxx, xxx, xxx</p>
                <p><b>Language</b> xxx, xxx</p>
            </div>
        </div>

        <div class='Play_demo'>
            <button href=''>Play Now!</button>
        </div>

        <div class='downloadGame'>
            <button href=''>Download</button>
            <p>Teriri_My_love-pc.zip</p>
        </div>

        <div class='gameLogs'>
            <p>Development Log</p>
            <p><a href="">swedrfghjkldfghjkldrfgthyju</a></p>
            <p><a href="">swedrfghjkldfghjkldrfgthyju</a></p>
            <p><a href="">swedrfghjkldfghjkldrfgthyju</a></p>
        </div>
            

        <div class='pictureZone'>
            <img src="img/Teriri1.jpg" alt="">
            <img src="img/Teriri2.jpg" alt="">
            <img src="img/Teriri3.jpg" alt="">
            <img src="img/Teriri4.jpg" alt="">
            <img src="img/Teriri5.jpg" alt="">
        </div>
    </div>

    <h3>Community</h3>
</x-app-layout>
</body>
</html>