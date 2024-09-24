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
            margin:0px 15%;
            padding:0px auto;
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

        .Info {
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
            <div id='gameInformation' style=" border:1px solid black;">More information V</div>
                <div><b>Update</b> xxx</div>
                <div><b>Status</b> inprogress</div>
                <div><b>Platforms</b> xxx, xxx</div>
                <div><b>Rating</b> xxx</div>
                <div><b>Genre</b> xxx</div>
                <div><b>Tags</b> xxx, xxx, xxx, xxx, xxx, xxx</div>
                <div><b>Language</b> xxx, xxx</div>
            </div>

            <div id='Play_demo'>
                <button href=''>Play Now!</button>
            </div>

            <h3 id='gameLogs'>Development Log</h3>
                <div><a href="">swedrfghjkldfghjkldrfgthyju</a></div>
                <div><a href="">swedrfghjkldfghjkldrfgthyju</a></div>
                <div><a href="">swedrfghjkldfghjkldrfgthyju</a></div>
            </div>
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