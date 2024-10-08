
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
    @guest
        <script>window.location.href = "{{ route('register') }}";</script>
    @endguest
    <div class="ground ">
        <div class="logoGame ">
        <img src="{{ asset($_Games->Game_preview)}}" alt="logo">
        </div>
    <p id='version' ><b>Lastest Version : {{ $_Games->version }} | {{ \Carbon\Carbon::parse($_Games->updated_at)->format('Y-m-d') }}</b></p>
    <p id="about" > {{ $_Games->Game_info }} </about>
    <div class='Info '>
        <div class='infoZone '>
            <div class='gameInformation'>
                <p id='header'><b>More information</b></p>
                <p><b>Name</b> {{ $_Games->Game_name }} </p>
                <p><b>Developer</b> {{ $_Games->User->name }} </p>
                <p><b>Status</b> {{ $_Games->status }} </p>
                <p><b>Tags</b>:
                @foreach($_Games->gametags as $gametag)
                {{preg_replace('/{value:(.*?)}/', '$1', $gametag ->gametag_name)}},
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
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">report</button>
            <div class='gameLogs'>
                @if($_Dev_logs->isEmpty())
                    
                @else
                    <p id='header'><b>Development Log</b></p>
                    @foreach ($_Dev_logs as $log)
                        <div class="dropdown">
                            <span>{{$log->games->Game_name}} {{$log->version}}</span>
                            <div class="dropdown-content">
                                <p>topic: {{$log->topic}}</p>
                                <p>detail: {{$log->detail}}</p>
                            </div>
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
                    <p>comment: <input id='comment_text' type="text" name="detail" required></p>
                    <p><input type="submit" value="post"></p>
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
    </div>
@else
        <p>No game found.</p>

@endif

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">report</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="/admin/report/{{$_Games->idgames}}" method="POST">
        @csrf
          <div class="mb-3">
            <label for="report-topic" class="col-form-label">report topic:</label>
            <input type="text" class="form-control" id="report_topic" name="report_topics" required>
          </div>
          <div class="mb-3">
            <label for="message-text" class="col-form-label">details:</label>
            <input type="text" class="form-control" id="message-text" name="report_text" required>
          </div>
          <input type="hidden" value="{{ Auth::user()->id }}" name="huser_id">
          <button type="submit" class="btn btn-success">Save changes</button>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        
      </div>
    </div>
  </div>
</div>
</body>
</html>
</x-app-layout>
