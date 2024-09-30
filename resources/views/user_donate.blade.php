<x-app-layout>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Document</title>

    @guest
    <script>
        window.location.href = "{{ route('register') }}";
    </script>
    @endguest


    <style>
        @import url({{asset('/css/user.css')}});
        body {
            margin: 0px auto;
            padding: 0px 15%;
            height: auto;
            background-image: linear-gradient(rgba(0, 0, 255, 0), rgba(0, 0, 0, 0.8)), url("/img/BG_genshin.jpg");
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

        #pfp {
            background-image: url("/img/Teriri7.png");
            background-color: grey;
            width: 217px;
            height: 217px;
            transition: .5s ease;
            backface-visibility: hidden;
            border-radius: 5px;
        }

        .toSetting:hover #pfp {
            background-image: linear-gradient(rgba(0, 0, 255, 0), rgba(0, 0, 0, 0.6)), url("/img/Teriri7.png");
        }
        .form-group input[type='text'],input[type='email']{
            width: 100%;
            border: 1px solid gray;
            border-radius: 5px;
        }
        .form-group {
            margin: 10px 0;
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
                                
                                <<p id='name'>{{ Auth::user()->name }}</p>
                                <p id='mail'>{{ Auth::user()->email }}</p>
                                @foreach ($user_tier as $a)
                                    @if (Auth::user()->id_user_tier == $a->id_user_tier)
                            </div>
                            <div id='tier'>Tier - {{ $a->user_tier_name }}</>
                                    @endif
                                @endforeach
                            </div>
                            <div id='firstDaylogin'>Joined - {{ Auth::user()->updated_at }}</div>
                        </div>
                    </div>
            </div>
            <div class="makeCenter">
                <div class="stat">
                    <div id='totalComment'><p>comment</p> 0 </div>
                    <div id='totalVote'><p>vote</p> 0 </div>
                    <div id='totalDonate'><p>donate</p>0<p>Baht</p></div>
                </div>
            </div>
        </div>
        <div class="collectionZone">
            <div class="navButton">
                <a href="/user/collection"> <button id='button'> COLLECTION </button> </a>
                <a href="/user/posting"> <button id='button'> POSTING </button> </a>
                <a href="/user/donate"> <button id='button'> DONATE </button> </a>
            </div>
            <div class="AllUrCollection">
                <div class="showBox">
                <div class="w-4/4 p-6">
            <div class="grid grid-cols-4 gap-6">
                            @foreach($_Wish_list as $wishlist)
                            <div class="bg-white shadow-md p-4 w-100 h-100 overflow-auto">
                                <!-- Link ไปที่รายละเอียดเกม -->
                                <a href="/game/{{ $wishlist->game->Game_name }}">
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
                </div>
                <div class="fix_seeAll">
                    <a href="" id='seeAll'>See All</a>
                </div>

                
    <div class="container d-flex justify-content-center" style="min-height: 100vh">
        <div class="card p-5" style="width: 60%; border-radius: 10px;">
            <h1 class="text-center">Donate to a Game</h1>
            <h2 style="flex-wrap: wrap; text-align: center;">Welcome to Our Donation Page!</h2>
            <p style="flex-wrap: wrap; text-align: center;">Thank you for considering a donation to support our cause. Every contribution helps us continue our mission and make a difference. Your generosity is greatly appreciated!</p>
            <!-- Donation Form -->
            <form action="{{ route('user.donate') }}" method="POST">
                @csrf
                <!-- Select User -->
                <div class="form-group">
                <label for="user_name">User name</label>
                <input type="text" name="user_name" value="" placeholder="name">
                </div>

                <!-- Select Game -->
                <div class="form-group">
                    <div class="form-group">
                    <label for="user_email">User email</label>
                    <input type="email" name="user_email" value="" placeholder="email">
                </div>
                <!-- Select Bank -->
                <div class="form-group">
                    <label for="bank_id">Select Bank</label>
                    <select class="form-control" name="bank_name" id="bank_name" >
                        <option value="" disabled selected >Select Bank</option>
                        <option value="Kasikornbank">Kasikornbank</option>
                        <option value="Government Savings Bank">Government Savings Bank</option>
                        <option value="SCB bank">SCB Bank</option>
                        <option value="Krungthai Bank">Krungthai Bank</option>
                        <option value="Bongkok Bank">Bongkok Bank</option>
                    </select>
                </div>
                <div class="form-group">
                    <div class="form-group">
                    <label for="bank_account">Bank Account</label>
                    <input type="text" name="bank_account" value="" placeholder="Number Account">
                </div>
                <!-- Donation Amount -->
                <div class="form-group">
                    <label for="amount">Donation Amount</label>
                    <input type="number" name="amount" id="amount" class="form-control" placeholder="Enter donation amount" required min="1">
                </div>
                <!-- Submit Button -->
                <div class="form-group text-center">
                    <button type="submit" class="btn btn-primary">Donate</button>
                    
                </div>
            </form>
        </div>
    </div>
</div>

</body>

</html>
</x-app-layout>