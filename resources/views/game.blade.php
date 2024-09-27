
<x-app-layout>
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Document</title>
    
    @guest
    <script>window.location.href = "{{ route('register') }}";</script>
    @endguest


    @if ($_Games)
   <style>
        @import url({{asset('css/game.css')}});
body {
    margin: 0px auto;
    padding: 0px 15%;
    height: auto;
    background-image: linear-gradient(rgba(0, 0, 255, 0), rgba(0, 0, 0, 0.8)), url("{{ asset($_Games->Game_preview)}}");
    background-repeat: no-repeat;
    background-position: center;
    background-size: cover;
}
    </style>
</head>
<body>
    <div class="ground ">
        <div class="logoGame ">
        <img src="{{ asset($_Games->Game_preview)}}" alt="logo">
        </div>
    <p id='version' ><b>Lastest Version : {{ $_Games->version }} {{ $_Games->updated_at }}</b></p>
    <p id="about" ><p>about {{ $_Games->Game_info }}</p></p>
    <div class='Info '>
        <div class='infoZone '>
            <div class='gameInformation'>
            <p>{{ $_Games->Game_name }}</p>
                <p id='header'><b>More information V</b></p>
                <p><b>Status</b> inprogress</p>
                <p><b>Rating</b> xxx</p>
                <p><b>Tags</b>:
                @foreach($_Games->gametypes as $gametype)
                {{preg_replace('/{value:(.*?)}/', '$1', $gametype ->gametype_name)}},
                @endforeach          
            </p>
            </div>

            <div class='Play_demo' onclick="window.location.href='https://youtu.be/dQw4w9WgXcQ?si=MVb1-A0gu3qBBpFS'">
                <button id="play_btn">Play Now!</button>
            </div>
            <div class="downloadZone">
                <p id='header'><b>Download</b></p>
                <div class='downloadGame'>
                    <div onclick="window.location.href='{{ $_Games->Game_dowload_link }}'">
                        <button id="play_btn">Download</button>
                    </div>
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
        @foreach($_Games->screenshots as $screenshot)
            <img src="{{ asset($screenshot->image_path) }}" width="100" alt="#">
        @endforeach   
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