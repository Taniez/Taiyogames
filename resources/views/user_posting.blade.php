<x-app-layout>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- Tagify CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@yaireo/tagify/dist/tagify.css">
    @guest
    <script>window.location.href = "{{ route('register') }}";</script>
    @endguest
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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
    code.jquery.com

    <style>
        @import url({{asset('/css/user_posting.css')}});
        @import url({{asset('/css/user_mygame.css')}});
        @import url({{asset('/css/user.css')}});
        body {
            margin:0px auto;
            padding:0px 15%;
            height: auto;
            background-image: linear-gradient(rgba(0, 0, 255, 0), rgba(0, 0, 0, 0.8)),url("/img/BG_genshin.jpg");
            background-repeat: no-repeat;
            background-position: center;
            background-size: cover;
        }
        #BG_img {
            height: 150px;
            width: auto;
            background-image: url("/img/BG_pixel.png");
            background-color: olive;
            border-bottom: 2px solid black;
        }
        #pfp img{
            background-image: url("/img/Teriri7.png");
            background-color: grey;
            width: 217px;
            height: 217px;
            transition: .5s ease;
            backface-visibility: hidden;
            border-radius: 5px;
        }
        .toSetting:hover #pfp {
            background-image: linear-gradient(rgba(0, 0, 255, 0), rgba(0, 0, 0, 0.6)),url("{{ Auth::user()->profile_photo_url }}");
            z-index: 5;
        }
    </style>
</head>
<body>
    <div class="baseBG">
        <div id='BG_img'></div>
        <div class="profileNstat">
            <div class="group1">
                <div class="toSetting">
                    <a href="{{ url('settings') }}">
                    <div id='pfp'>
                        <img class="h-8 w-8 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                    </div>
                    </a>
                    <div class="middle">
                        <div class="setting">Edit</div>
                    </div>
                </div>
                    <div class="pfpInfo">
                        <div class="group2">
                            <div class="group3">
                                
                            <div class='nameDetail'>
                                    <p id='name'>{{ Auth::user()->name }}</p>
                                    @if (Auth::user()->id_user_tier == 2)
                                        <img class="tierIcon" src="/img/cotton.png" alt="tier แรงงาน">
                                    @else
                                        <img class="tierIcon" src="/img/pickaxe.png" alt="tier ทาส">
                                    @endif
                                </div>
                                <p id='mail'>{{ Auth::user()->email }}</p>
                                @foreach ($user_tier as $a)
                                    @if (Auth::user()->id_user_tier == $a->id_user_tier)
                            </div>
                            <div id='tier'>Tier - {{ $a->user_tier_name }}</>
                                    @endif
                                @endforeach
                            </div>
                            <div id='firstDaylogin'>Joined at {{ \Carbon\Carbon::parse(Auth::user()->updated_at)->format('Y-m-d') }}</div>
                        </div>
                    </div>
            </div>
            <div class="makeCenter">
                <div class="stat">
                    <div id='totalComment'><p>comment</p> <p>{{$_Num_comment}}</p> </div>
                    <div id='totalCoint'>
                        <p>Coin</p>
                        <p>0</p>
                        <button class="btn" onclick="window.location.href='#'"data-bs-toggle="modal" data-bs-target="#reportGameModal">Add coin</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="collectionZone">
            <div class="navButton">
                <a href="/user/favorite/{{ Auth::user()->id }}"> <button id='button'> FAVORITE </button> </a>
                <a href="/user/allurcomment/{{ Auth::user()->id }}"> <button id='button'> COMMENT </button> </a>
                <a href="/user/mygame/{{ Auth::user()->id }}"> <button id='button'> MY GAME </button> </a>
            </div>
            <div class="AllUrCollection">
                @if($_Comments->isEmpty())
                    <div class="comment_empty">
                        <p>You haven't Comment any post yet! :(</p>
                    </div>
                @else
                    @foreach ($_Comments as $comment)
                        <a href="/game/{{ $comment->idgames }}">
                            <div class="AllUrPost">
                                <div class="commenterDetail">
                                    <div>
                                        <p>Game - <b>{{ $comment->game->Game_name }}</b></p>
                                        <p id='postedDay'>{{ \Carbon\Carbon::parse($comment->updated_at)->format('Y-m-d') }}</p>
                                    </div>
                                    <p id='detail'>{{ $comment->comment_detail }}</p>
                                </div>
                            </div>
                        </a>
                    @endforeach
                @endif
            </div>
    </div>
    <!-- Modal สำหรับการรายงานเกม -->
    <div class="modal fade" id="reportGameModal" tabindex="-1" aria-labelledby="reportGameLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Report Game</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="/reedeem/{{ Auth::user()->id }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <label >กรุณาใส่โค้ด</label><br>
                        <input type="text" placeholder="redeemedcode" class="form-control" id="redeemed" name="redeemed">
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-danger">Enter</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>
</html>
</x-app-layout>