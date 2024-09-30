
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

img{
    width: 60px;
}
    </style>
</head>
<body>
    <div class="ground ">
        <div class="logoGame ">
        <img src="{{ asset($_Games->Game_preview)}}" alt="logo">
        </div>
    <p id='version' ><b>Lastest Version : {{ $_Games->version }} | {{ \Carbon\Carbon::parse($_Games->updated_at)->format('Y-m-d') }}</b></p>
    <p id="about" >about {{ $_Games->Game_info }}</about>
    <div class='Info '>
        <div class='infoZone '>
            <div class='gameInformation'>
                <p id='header'><b>More information</b></p>
                <p><b>Name</b> {{ $_Games->Game_name }} </p>
                <p><b>Developer</b> {{ $_Games->User->name }} </p>
                <p><b>Status</b> {{ $_Games->status }} </p>
                <p><b>Rating</b> xxx</p>
                <p><b>Tags</b>:
                @foreach($_Games->gametypes as $gametype)
                {{preg_replace('/{value:(.*?)}/', '$1', $gametype ->gametype_name)}},
                @endforeach
            </p>
            </div>

            <!-- <div class='Play_demo' onclick="window.location.href='https://youtu.be/dQw4w9WgXcQ?si=MVb1-A0gu3qBBpFS'">
                <button id="play_btn">Play Now!</button>
            </div> -->
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

            <div class="commuzone">
                <div id='header'><p>Community</p></div>
                <div class="comment">
                @if($_Comments->isEmpty())
                    <div class="collection_empty">
                        <p>Let's be the first Comment!</p>
                    </div>
                @else
                    @foreach ($_Comments as $comment)
                        <div class="commentContainer">
                            <div class="commenterDetail">
                                <p id='name'>{{ $comment->user->name }}</p>
                                <p id='postedDay'>{{ \Carbon\Carbon::parse($comment->updated_at)->format('Y-m-d') }}</p>
                            </div>
                            <p id='detail'>{{ $comment->comment_detail }}</p>
                        </div>
                    @endforeach
                @endif
                <form action="/addComment" method="post">
                    @csrf
                    <input type="hidden" value="{{ Auth::user()->id }}" name="huser_id">
                    <input type="hidden" name="game_id" value="{{ $_Games->idgames }}">
                    <p>comment: <input type="text" name="detail" required></p>
                    <p><input type="submit" value="post"></p>
                </form>
                </div>
            </div>
        </div>
        <div class='pictureZone'>
        @foreach($_Games->screenshots as $screenshot)
            <img src="{{ asset($screenshot->image_path) }}" width="100" alt="#">
        @endforeach
        </div>
        
    </div>
    </div>
@else
        <p>No game found.</p>

@endif
</body>
</html>
</x-app-layout>