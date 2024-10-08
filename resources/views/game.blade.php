
<x-app-layout>
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Document</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<!-- Tagify JS -->
    <script src="https://cdn.jsdelivr.net/npm/@yaireo/tagify"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- Tagify CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@yaireo/tagify/dist/tagify.css">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
    background-image: linear-gradient(rgba(0, 0, 255, 0), rgba(0, 0, 0, 0.8)), url("{{ asset($_Games->Gamebackground)}}");
    /* background-repeat: no-repeat; */
    background-position: center;
    background-size: cover;
}

img{
    width: 60px;
}


    </style>
</head>
<body>
    @guest
        <script>window.location.href = "{{ route('register') }}";</script>
    @endguest
    <div class="ground ">
        <div class="logoGame ">
        <img src="{{ asset($_Games->Game_preview)}}" alt="logo">
        </div>
    <p><b id='version' >Lastest Version</b> {{ $_Games->version }} | {{ \Carbon\Carbon::parse($_Games->updated_at)->format('Y-m-d') }}</p>
    <p id="about" > {{ $_Games->Game_info }} </about>
    <div class='Info'>
        <div class='infoZone '>
            <div class='gameInformation'>
                <p id='header'><b>About this game</b></p>
                <p><b class="Abt" >Name</b> {{ $_Games->Game_name }} </p>
                <p><b class="Abt" >Developer</b> {{ $_Games->User->name }} </p>
                <p><b class="Abt" >Status</b> {{ $_Games->Status }} </p>
                <p><b class="Abt" >Tags</b>
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
                    <div class="box">
                        <a class="button" href="#popup1">Download</a>
                    </div>

                    <div id="popup1" class="overlay">
                        <div class="popup">
                            <h2>Download '{{ $_Games->Game_name }}'</h2>
                            <a class="close" href="#">&times;</a>
                            <div class="content">
                                This game is free but the developer accepts your support by letting you pay what you think is fair for the game.
                                <p class="toDownload" onclick="window.location.href='{{ $_Games->Game_dowload_link }}'">
                                    No thanks, just take me to the downloads.
                                </p>
                                <h4>Spending coin?</h4>
                                <div class="spendSelectContainer">
                                    <button class="btn" onclick="window.location.href='#'">1c</button>
                                    <button class="btn" onclick="window.location.href='#'">10c</button>
                                    <button class="btn" onclick="window.location.href='#'">50c</button>
                                    <button class="btn" onclick="window.location.href='#'">100c</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">report</button> -->
            
            <div class='gameLogs'>
                @if($_Dev_logs->isEmpty())
                    
                @else
                    <p id='header'><b>Development Log</b></p>
                    @foreach ($_Dev_logs as $log)
                        <div class="Logcontainer">
                            <a class="toLog" onclick="window.location.href='/game/{{ $_Games->idgames }}/gamelog/{{ $log->topic }}'">{{$log->topic}} {{$log->version}}</a>
                            <p class="LogCreateAt">{{ \Carbon\Carbon::parse($log->updated_at)->format('Y-m-d') }}</p>
                        </div>
                    @endforeach
                @endif
            </div>
            <div class="container mt-5">
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- ปุ่มสีเหลืองที่ใช้ Bootstrap -->
        <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#donateModal">
            Click to Donate
        </button>

        <!-- Popup Modal -->
        <div class="modal fade" id="donateModal" tabindex="-1" aria-labelledby="donateModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="donateModalLabel">Donate</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <!-- ฟอร์มสำหรับรับเงินบริจาค -->
                        <form action="/add_donate" method="POST">
                            @csrf
                            <div class="mb-3">
                                <input type="hidden" value="{{ Auth::user()->id }}" name="recipts_id">
                                <label for="donate_money" class="form-label">Amount to Donate:</label>
                                <input type="number" id="donate_money" name="donate_money" class="form-control" required min="1" step="0.01">
                            </div>
                            <button type="submit" class="btn btn-success">Donate</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

            <div class="commuzone">
                <div id='header'><p>Comment</p></div>
                <div class="comment">
                @if($_Comments->isEmpty())
                    <div class="collection_empty">
                        <p>Let's be the first Comment!</p>
                    </div>
                @else
                    @foreach ($_Comments as $comment)
                        <div class="commentBoxDetail">
                            <div class="commentContainer">
                                <div class="commenterDetail">
                                    @if ($comment->user_id == $_Games->user_id)
                                        <p id='name'>{{ $comment->user->name }} <b class="GameOwner">(Author)</b></p>
                                    @else
                                        <p id='name'>{{ $comment->user->name }}</p>
                                    @endif

                                    @if ($comment->user->id_user_tier == 2)
                                        <img class="tierIcon" src="/img/cotton.png" alt="tier แรงงาน">
                                    @else
                                        <img class="tierIcon" src="/img/pickaxe.png" alt="tier ทาส">
                                    @endif
                                    <p id='postedDay'>{{ \Carbon\Carbon::parse($comment->updated_at)->format('Y-m-d') }}</p>
                                </div>
                                <p id='detail'>{{ $comment->comment_detail }}</p>
                            </div>
                            <div class="commentIcon">
                                @if (Auth::user()->id == $comment->user_id)
                                    <a href="/deleteComment/{{ $comment->id_comment }}"><i class="fa fa-trash-o"></i></a>
                                @else
                                    <a href="#"><i class="fa fa-flag"></i></a>
                                @endif
                            </div>
                        </div>
                    @endforeach
                @endif
                <form action="/addComment" method="post" class="commentBox">
                    @csrf
                    <input type="hidden" value="{{ Auth::user()->id }}" name="huser_id">
                    <input type="hidden" name="game_id" value="{{ $_Games->idgames }}">
                    <p><input class="commentTextBox" id='comment_text' type="text" name="detail" required></p>
                    <p><input class="commentSendBtn" type="submit" value="post"></p>
                </form>
                </div>
            </div>
        </div>
        <div class='pictureZone'>
        @foreach($_Games->screenshots as $screenshot)
            <img id='sceenshot' src="{{ asset($screenshot->image_path) }}" alt="#">
        @endforeach
        </div>

    </div>
    <div class="fix_report">
        <a href="#"><i class="fa fa-flag reportBtn"></i> Report</a>
    </div>
@else
        <p>No game found.</p>
@endif
</body>
</html>
</x-app-layout>
