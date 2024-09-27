
<x-app-layout>
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @if ($_Games)
    <style>
        @import url({{asset('css/game.css')}});
        body{
    margin:0px auto;
    padding:0px 15%;
    height: auto;
    /* background-image: url("img/Teriri7.png"); */
    background-image: linear-gradient(rgba(0, 0, 255, 0), rgba(0, 0, 0, 0.8)),url("{{ asset($_Games->Game_preview)}}");
    background-size: fix;
    background-repeat: no-repeat;
    background-position-x: -25rem;
    background-position-y: -5rem;
    background-color: black;
}
    </style>
</head>
<body>
    <div class="bg-black bg-opacity-60">

    
        <div class="logoGame ">
        <img src="{{ asset($_Games->Game_preview)}}" alt="logo">
    </div>
    <p id='version' ><b>Lastest Version : {{ $_Games->version }} {{ $_Games->updated_at }}</b></p>
    <p id="about" ><p>{{ $_Games->Game_info }}</p></p>
    <div class='Info ' >
        <div class='infoZone '>
            <div class='gameInformation'>
            <p>{{ $_Games->Game_name }}</p>
            <p>{{ $_Games->Game_info }}</p>
                <p id='header'><b>More information V</b></p>
                <p><b>Update</b></p>
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
@else
                <p>No game found.</p>

@endif
</body>
</html>
</x-app-layout>