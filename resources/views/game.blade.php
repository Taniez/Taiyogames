<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        @import url({{asset('css/game.css')}});
        p{
            color: white;
        }
        img{
            width: 350px;
        }
        body{
            margin:0px auto;
            padding:0px 15%;
            height: auto;
            /* background-image: url("/img/Teriri6.png"); */
            background-image: linear-gradient(rgba(0, 0, 255, 0), rgba(0, 0, 0, 0.8)),url("/img/Teriri6.png");
            background-size: fix;
            background-repeat: no-repeat;
            background-position-x: -25rem;
            background-position-y: -5rem;
            background-color: black;
        }
        .logoGame{
            display: flex;
            justify-content: center;
            margin-bottom: 70px;
            margin-top: 30px;
        }
        .logoGame img{
            width: 250px;
            scale: 130%;
        }
        p{
            font-size: large;
        }

        #version{
            padding: 0 15px;
        }
        #about{
            text-indent: 2em;
            padding: 0 360px 0 15px;
            margin-bottom: 35px;
        }

        .gameInformation{
            width: 600px;
            border: 1px solid black;
            background: rgba(0, 0, 0, 0.5);
            padding-left: 50px;
            margin-bottom: 35px;
        }

        #header{
            text-indent: -1em;
        }

        .gameLogs{
            width: 400px;
            border: 1px solid black;
            background: rgba(0, 0, 0, 0.25);
            padding-left: 50px;
            margin-bottom: 35px;
        }

        .Info{
            padding: 0 15px;
            display: flex;
            justify-content: space-between;
        }
        .infoZone{
            justify-content: center;
        }
        .infoZone .Play_demo{
            display: flex;
            justify-content: center;
        }
        .pictureZone{
            justify-content: end;
        }
        .pictureZone img{
            margin-bottom: 15px;
        }
        .downloadZone{
            padding-left: 50px;
            margin-bottom: 35px;
        }
        .downloadGame{
            display: flex;
            margin-top: 10px;
            align-items: center;
        }
        .downloadGame button{
            margin-right: 10px;
        }
        .Play_demo #play_btn{
            margin-bottom: 35px;
        }
        #play_btn{
            padding: 10px 12px;
            background-color: green;
            border-radius: 6px;
            text-align: center;
        }
        #play_btn:hover{
            padding: 10px 12px;
            background-color: blue;
            border-radius: 6px;
            cursor: pointer;
        }
        #Commu_header{
            margin-bottom: 35px;
            padding-left: 50px;
            text-indent: -1em;
        }
    </style>
</head>
<body>
<x-app-layout>
    <div class="logoGame">
        <img src="https://static.wikia.nocookie.net/logopedia/images/d/da/Honkai_Impact_3rd_logo.png" alt="logo">
    </div>
    <p id='version'><b>Lastest Version : v7.7.0 (22/9/2567)</b></p>
    <p id="about">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quisquam nam officiis delectus error rerum natus!</p>

    <div class='Info'>
        <div class='infoZone'>
            <div class='gameInformation'>
                <p id='header'><b>More information V</b></p>
                <p><b>Update</b> xxx</p>
                <p><b>Status</b> inprogress</p>
                <p><b>Platforms</b> xxx, xxx</p>
                <p><b>Rating</b> xxx</p>
                <p><b>Genre</b> xxx</p>
                <p><b>Tags</b> xxx, xxx, xxx, xxx, xxx, xxx</p>
                <p><b>Language</b> xxx, xxx</p>
            </div>

            <div class='Play_demo' onclick="window.location.href='https://youtu.be/dQw4w9WgXcQ?si=MVb1-A0gu3qBBpFS'">
                <button id="play_btn">Play Now!</button>
            </div>

            
            <div class="downloadZone">
                <p id='header'><b>Download</b></p>
                <div class='downloadGame'>
                    <div onclick="window.location.href='https://youtu.be/dQw4w9WgXcQ?si=MVb1-A0gu3qBBpFS'">
                        <button id="play_btn">Download</button>
                    </div>
                    <p id="file_name">Teriri_My_love-pc.zip</p>
                </div>
            </div>

            <div class='gameLogs'>
                <p id='header'><b>Development Log</b></p>
                <p><a href="">swedrfghjkldfghjkldrfgthyju</a></p>
                <p><a href="">swedrfghjkldfghjkldrfgthyju</a></p>
                <p><a href="">swedrfghjkldfghjkldrfgthyju</a></p>
            </div>

            <p id='Commu_header'><b>Community</b></p>
        </div>

        <div class='pictureZone'>
            <img src="img/Teriri1.jpg" alt="">
            <img src="img/Teriri2.jpg" alt="">
            <img src="img/Teriri3.jpg" alt="">
            <img src="img/Teriri4.jpg" alt="">
            <img src="img/Teriri5.jpg" alt="">
        </div>
    </div>
</x-app-layout>
</body>
</html>