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


    <style>
        @import url({{asset('/css/user_mygame.css')}});
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
                        <button>Add coin</button>
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
                    @if($_Games->isEmpty())
                        <div class="mygame_empty">
                            <p class="wishlist_empty">You haven't add any game yet. :(</p>
                        </div>
                    @else
                        <div class="w-4/4 p-6">
                            <div class="grid grid-cols-4 gap-6">
                                @foreach($_Games as $Game)
                                <div class="bg-white shadow-md p-4 w-100 h-100 overflow-auto">
                                    <!-- Link ไปที่รายละเอียดเกม -->
                                    <a href="/game/{{  $Game->idgames }}">
                                        <img src="{{ asset( $Game->Game_preview) }}" alt="Preview" class="mt-2 h-75 w-100">
                                        <h3 class="font-bold text-lg mt-2">{{ $Game->Game_name }}</h3>
                                        <p class="text-gray-600">{{ $Game->Game_info }}</p>
                                    </a>
                                    <button onclick="alert_delete({{$Game -> idgames}})" class ="btn btn-danger">delete</button>
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#updateModal{{$Game->idgames}}">Update</button>
                                </div>
                                <div class="modal fade" id="updateModal{{$Game->idgames}}" tabindex="-1" aria-labelledby="updateModalLabel{{$Game->idgames}}" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="updateModalLabel{{$Game->idgames}}">Update Game</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="/Devmanage/update/{{$Game->idgames}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="g_name" class="form-label">Game Name</label>
                            <input type="text" class="form-control" name="g_name" value="{{$Game->Game_name}}" required>
                        </div>
                        <div class="mb-3">
                            <label for="g_details" class="form-label">Game Details</label>
                            <input type="text" class="form-control" name="g_details" value="{{$Game->Game_info}}" required>
                        </div>
                        <div class="mb-3">
                            <label for="g_version" class="form-label">Game Version</label>
                            <input type="text" class="form-control" name="g_version" value="{{$Game->version}}" required>
                        </div>
                        
                        <div class="mb-3">
                            <label for="g_status" class="form-label">status</label>
                                <select class="form-select" aria-label="Default select example"  name="g_status" value="{{$Game->Status}}">
                                    <option selected>Open this select menu</option>
                                    <option value="Released">Released</option>
                                    <option value="In development">In development</option>
                                    <option value="On hold">On hold</option>
                                    <option value="Prototype">Prototype</option>
                                </select>
                        </div>

                        <div class=" mb-3">
                            <label for="g_img" class="form-label">Game Image</label>
                            <input type="file" class="form-control" name="g_img">
                            <img src="{{ asset($Game->Game_preview) }}" alt="#" class="mt-2" width="100">
                        </div>

                        <div class=" mb-3">
                            <label for="g_bg" class="form-label">Game Background</label>
                            <input type="file" class="form-control" name="g_bg">
                            <img src="{{ asset($Game->Gamebackground) }}" alt="#" class="mt-2" width="100">
                        </div>

                        <div class="mb-3">
                            <label for="g_link" class="form-label">Download Link</label>
                            <input type="text" class="form-control" name="g_link" value="{{$Game->Game_dowload_link}}" required>
                        </div>



                        <div class="mb-3">
                            <label for="g_tags" class="form-label">Game Tags</label>

                            <input id="tags{{$Game->idgames}}" name="g_tags" class="form-control" value="{{  preg_replace('/{value:(.*?)}/', '$1', implode(',', $Game->gametags->pluck('gametag_name')->toArray())) }}">
                        </div>

                        
                        <div class="mb-3">
                             <label for="screenshots" class="form-label">Upload Multiple Screenshots</label>
                            <input type="file" name="screenshots[]" class="form-control" multiple> <!-- multiple attribute allows multiple files -->
                        </div>

                        <label for="devtopic" class="form-label">topic</label>
                             <div class="mb-3 mt-3"> 
                                <input type="text" name="devtopic" class="form-control" placeholder="topic" required>
                            </div>
                        
                        <label for="devdetail" class="form-label">devlog</label>
                             <div class="mb-3 mt-3"> 
                                <input type="text" name="devdetail" class="form-control" placeholder="devlog" required>
                            </div>
                            
                        <input type="hidden" value="{{ Auth::user()->id }}" name="huser_id">
                        <button type="submit" class="btn btn-success">Save changes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

                            @endforeach
    </div>
                    </div>
                    @endif
                </div>
                @if($_Wish_list->isEmpty())

                @else
                    <div class="fix_seeAll">
                        <a href="/Devmanage" id='seeAll'>See All</a>
                    </div>
                @endif
            </div>
    </div>

</body>

<script>
    function alert_delete(id_) {
        var txt;
        var r = confirm("Are you sure you want to delete this subject?");
        if (r == true) {
            window.location.href = "/Devmanage/delete/" + id_;
            alert("Subject has been deleted.");
        }
    }
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

<!-- Tagify JS -->
<script src="https://cdn.jsdelivr.net/npm/@yaireo/tagify"></script>

<script>
    // Initialize Tagify on the input field outside of modals (for the create new game form)
    var input = document.querySelector('#tags');
    var tagify = new Tagify(input, {
        whitelist: [
            "adult", "erotic", "2d", "horror", "pixel-art", "singleplayer", "adventure", "3d", "short", "retro", "visual-novel","English", "japanese", "chinese" 
        ],
        maxTags: 10,
        dropdown: {
            maxItems: 20,
            classname: "tags-look",
            enabled: 0,
            closeOnSelect: false
        }
    });

    // Initialize Tagify for each modal when it is shown
    document.querySelectorAll('.modal').forEach(function(modal) {
        modal.addEventListener('shown.bs.modal', function () {
            var inputInModal = modal.querySelector('input[name="g_tags"]');
            if (inputInModal && !inputInModal.classList.contains('tagify-initialized')) {
                new Tagify(inputInModal, {
                    whitelist: [
                        "adult", "erotic", "2d", "horror", "pixel-art", "singleplayer", "adventure", "3d", "short", "retro", "visual-novel","English", "japanese", "chinese" 
                    ],
                    maxTags: 12,
                    dropdown: {
                        maxItems: 20,
                        classname: "tags-look",
                        enabled: 0,
                        closeOnSelect: false
                    }
                });
                inputInModal.classList.add('tagify-initialized');
            }
        });
    });



const dropContainer = document.getElementById("dropcontainer")
const fileInput = document.getElementById("g_img")

  dropContainer.addEventListener("dragover", (e) => {
    // prevent default to allow drop
    e.preventDefault()
  }, false)

  dropContainer.addEventListener("dragenter", () => {
    dropContainer.classList.add("drag-active")
  })

  dropContainer.addEventListener("dragleave", () => {
    dropContainer.classList.remove("drag-active")
  })

  dropContainer.addEventListener("drop", (e) => {
    e.preventDefault()
    dropContainer.classList.remove("drag-active")
    fileInput.files = e.dataTransfer.files
  })
</script>
</html>
</x-app-layout>