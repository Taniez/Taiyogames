<x-app-layout>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    @guest
    <script>window.location.href = "{{ route('register') }}";</script>
    @endguest


    <style>
        @import url({{asset('/css/user_posting.css')}});
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
                                
                                <p id='name'>{{ Auth::user()->name }}</p>
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
                    <div id='totalComment'><p>comment</p> {{$_Num_comment}} </div>
                    <div id='totalVote'><p>vote</p> 0 </div>
                    <div id='totalDonate'><p>donate</p>{{$_sum_user_recipts}}<p>Baht</p></div>
                </div>
            </div>
        </div>

        <div class="collectionZone">
            <div class="navButton">
                <a href="/user/collection/{{ Auth::user()->id }}"> <button id='button'> COLLECTION </button> </a>
                <a href="/user/posting/{{ Auth::user()->id }}"> <button id='button'> POSTING </button> </a>
                <a href="/user/donate/{{ Auth::user()->id }}"> <button id='button'> DONATE </button> </a>
                <a href="/user/mygame"> <button id='button'> MY GAME </button> </a>
            </div>
            <div class="AllUrCollection">
                <h1>Donate</h1>
                @if($_user_recipts->isEmpty())
                    <div class="user_recipts_empty">
                        <p>You haven't Comment any post yet! :(</p>
                    </div>
                @else
                    @foreach ($_user_recipts as $user_recipt)
                        <div class="AllUrdonate">
                            <div class="donate_users">
                                <p id="user_donate"></p>
                                <p id='donate_posted'>{{ \Carbon\Carbon::parse($user_recipt->updated_at)->format('Y-m-d') }}</p>
                                <p id='donate_int'>{{ $user_recipt->Donate}}</p>
                            </div>
                        </div>
                    @endforeach
                @endif
</body>
</html>
</x-app-layout>