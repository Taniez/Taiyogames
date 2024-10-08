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
                        <button class="btn" onclick="window.location.href='#'">Add coin</button>
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
                <div class="showBox">
                    @if($_Wish_list->isEmpty())
                        <div class="collection_empty">
                            <p class="wishlist_empty">You haven't Like any game yet. :(</p>
                        </div>
                    @else
                        <div class="w-4/4 p-6">
                            <div class="grid grid-cols-4 gap-6">
                                @foreach($_Wish_list as $wishlist)
                                <div class="bg-white shadow-md p-4 w-100 h-100 overflow-auto">
                                    <!-- Link ไปที่รายละเอียดเกม -->
                                    <a href="/game/{{ $wishlist->game->idgames }}">
                                        <img src="{{ asset($wishlist->game->Game_preview) }}" alt="Preview" class="mt-2 h-75 w-100">
                                        <h3 class="font-bold text-lg mt-2">{{ $wishlist->game->Game_name }}</h3>
                                        <p class="text-gray-600">{{ $wishlist->game->Game_info }}</p>
                                    </a>
                                    <form action="{{ route('wishlist.destroy',$wishlist->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <input type="hidden" name="idgames" value="{{ $wishlist->game->idgames }}">
                                        <button type="submit" class="mt-2 bg-blue-500 text-white p-2 rounded">
                                            Remove
                                        </button>
                                    </form> 
                                </div>
                        @endforeach
                        </div>
                    </div>
                    @endif
                </div>
                @if($_Wish_list->isEmpty())

                @else
                    <div class="fix_seeAll">
                        <a href="/wishlist" id='seeAll'>See All</a>
                    </div>
                @endif
            </div>
    </div>


</body>
</html>
</x-app-layout>