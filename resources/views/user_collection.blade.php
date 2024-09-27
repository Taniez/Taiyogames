<x-app-layout>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        @import url({{asset('css/user.css')}});
        body {
            margin:0px auto;
            padding:0px 15%;
            height: auto;
            background-image: linear-gradient(rgba(0, 0, 255, 0), rgba(0, 0, 0, 0.8)),url("/img/BG_genshin.jpg");
            background-repeat: no-repeat;
            background-position: center;
            background-size: cover;
        }
        .profileNstat {
            display: flex;
            justify-content: space-between;
            margin-bottom: 40px;
            border-bottom: 2px solid black;
        }
        .group1 {
            display: flex;
        }
        .group2 {
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            height: 216px;
        }
        .pfpInfo {
            margin-left: 25px;
            width: 270px;
        }
        #name {
            font-size: 35px;
            font-weight: bold;
            margin-top: 20px;
            margin-bottom: -7px;
        }
        #tier {
            margin-top: 10px;
            font-size: 25px;
            font-weight: bold;
        }
        #firstDaylogin {
            margin-bottom: 25px;
        }
        .makeCenter {
            display: flex;
            align-items: center;
        }
        .stat {
            display: flex;
            text-align: center;
            margin-right: 100px;
            width: 300px;
            height: 100px;
            justify-content: space-between;
        }
        .stat p {
            font-size: 25px;
            font-weight: bold;
        }
        #BG_img {
            height: 150px;
            width: auto;
            background-image: url("/img/BG_pixel.png");
            background-color: olive;
            border-bottom: 2px solid black;
        }
        #pfp {
            background-image: url("/img/Teriri7.png");
            background-color: grey;
            width: 217px;
            height: 217px;
            transition: .5s ease;
            backface-visibility: hidden;
            border-radius: 5px;
        }
        .middle {
            transition: .5s ease;
            opacity: 0;
            position: absolute;
            bottom: 5%;
            left: 50%;
            transform: translate(-50%, -50%);
            -ms-transform: translate(-50%, -50%)
        }
        .toSetting {
            position: relative;
            margin-left: 25px;
            bottom: 30px;
        }
        .toSetting:hover .middle {
            opacity: 1;
        }
        .toSetting:hover #pfp {
            background-image: linear-gradient(rgba(0, 0, 255, 0), rgba(0, 0, 0, 0.6)),url("/img/Teriri7.png");
        }
        .setting {
            color: white;
            font-size: 16px;
        }
        .collectionZone {
            background-color: white;
        }
        .navButton {
            margin-left: 25px;
        }
        .navButton #button {
            background-color: green;
            padding: 10px 16px;
            margin-bottom: 20px;
            font-weight: bold;
            color: white;
        }
        .navButton #button:hover {
            background-color: blue;
            padding: 10px 16px;
            margin-bottom: 20px;
            font-weight: bold;
            color: white;
        }
        .showBox {
            display: flex;
            margin: 0 50px 50px 50px;
            justify-content: space-between;
        }
        .showBox .game{
            width: 220px;
            height: 200px;
            background-color: grey;
            border-radius: 5px;
        }
        .showBox .game:hover{
            width: 220px;
            height: 200px;
            background-color: green;
            border-radius: 5px;
            cursor: pointer
        }
        .game img {
            width: 220px;
            height: 200px;
            border-radius: 5px;
        }
        .fix_seeAll{
            position: absolute;
            right: 275px; top: 494px;
            font-weight: bold;
            color: grey;
        }
        .fix_seeAll:hover{
            position: absolute;
            right: 275px; top: 494px;
            font-weight: bold;
            color: black;
        }
        .AllUrPost {
            width: auto;
            height: 70px;
            background-color: white;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .AllUrPost:hover {
            width: auto;
            height: 70px;
            background-color: grey;
            display: flex;
            align-items: center;
            justify-content: center;
        }
    </style>
</head>
<body>
    <div id='BG_img'></div>
    <div class="profileNstat">
        <div class="group1">
            <div class="toSetting">
                <a href="{{ url('settings') }}">
                    <div id='pfp'></div>
                </a>
                <div class="middle">
                    <div class="setting">Edit</div>
                </div>
            </div>
                <div class="pfpInfo">
                    <div class="group2">
                        <div class="group3">
                            <p id='name'>Sei_2772</p>
                            <p id='mail'>theresa2703@mail.com</p>
                        </div>
                        <div id='tier'>Tier - ทาส</div>
                        <div id='firstDaylogin'>Joined - Mar 2, 2021</div>
                    </div>
                </div>
        </div>
        <div class="makeCenter">
            <div class="stat">
                <div id='totalComment'><p>comment</p> 0 </div>
                <div id='totalVote'><p>vote</p> 0 </div>
                <div id='totalDonate'><p>donate</p> 0 <p>Baht</p></div>
            </div>
        </div>
    </div>

    <div class="collectionZone">
        <div class="navButton">
            <a href=""> <button id='button'> COLLECTION </button> </a>
            <a href=""> <button id='button'> POSTING </button> </a>
            <a href=""> <button id='button'> DONATE </button> </a>
        </div>
        <div class="AllUrCollection">
            <div class="showBox">
                <div class="game"><a href="#"> <img src="/img/Teriri7.png" alt=""> </a> </div>
                <div class="game"><a href="#"> <img src="/img/Teriri7.png" alt=""> </a> </div>
                <div class="game"><a href="#"> <img src="/img/Teriri7.png" alt=""> </a> </div>
                <div class="game"><a href="#"> <img src="/img/Teriri7.png" alt=""> </a> </div>
            </div>
            <div class="fix_seeAll">
                <a href="" id='seeAll'>See All</a>
            </div>
        <div class="AllUrPost">
            <div>Homu (waiting for code)</div>
        </div>
        <div class="AllUrPost">
            <div>Homu (waiting for code)</div>
        </div>
    </div>
</body>
</html>
</x-app-layout>