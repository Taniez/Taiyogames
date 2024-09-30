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
            background-image: linear-gradient(rgba(0, 0, 255, 0), rgba(0, 0, 0, 0.6)),url("/img/Teriri7.png");
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
                        <div id='pfp'></div>
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
                    <div id='totalComment'><p>comment</p> 0 </div>
                    <div id='totalVote'><p>vote</p> 0 </div>
                    <div id='totalDonate'><p>donate</p> 0 <p>Baht</p></div>
                </div>
            </div>
        </div>

        <div class="collectionZone">
            <div class="navButton">
                <a href="/user/collection"> <button id='button'> COLLECTION </button> </a>
                <a href="/user/posting"> <button id='button'> POSTING </button> </a>
                <a href="/user/donate"> <button id='button'> DONATE </button> </a>
                <a href="/user/mygame"> <button id='button'> MY GAME </button> </a>
            </div>
            <div class="AllUrCollection">
                <div class="showBox">
                    @if($_Wish_list->isEmpty())
                        <div class="collection_empty">
                            <p>You haven't Like any game yet. :(</p>
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
                <div class="fix_seeAll">
                    <a href="/wishlist" id='seeAll'>See All</a>
                </div>
                <div class="AllUrPost">
                    <div>Homu (waiting for code)</div>
                </div>
                <div class="AllUrPost">
                    <div>Homu (waiting for code)</div>
                </div>
            </div>
    </div>


</body>
</html>
</x-app-layout>