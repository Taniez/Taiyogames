
<x-app-layout>
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        @import url({{asset('css/game.css')}});
       
    </style>
</head>
<body>

    <div class="bg-black bg-opacity-60">
    
        <div class="logoGame ">
        <img src="https://static.wikia.nocookie.net/logopedia/images/d/da/Honkai_Impact_3rd_logo.png" alt="logo">
    </div>
    <p id='version' ><b>Lastest Version : v7.7.0 (22/9/2567)</b></p>
    <p id="about" >Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quisquam nam officiis delectus error rerum natus!</p>

    <div class='Info ' >
        <div class='infoZone '>  
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
    <h3>Community</h3>
</div>

</body>
</html>
</x-app-layout>