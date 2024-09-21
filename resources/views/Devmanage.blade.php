<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- Tagify CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@yaireo/tagify/dist/tagify.css">

    <style>
        img{
            width: 10rem;
            height: 8rem;
        }
        .bootstrap-tags {
            padding: 10px; /* Custom padding for Bootstrap form */
        }
    </style>
</head>
<body>
    <h1>insert</h1>
    
    <table  class="table table-bordered">
    <tr>
        <th>ชื่อเกม</th>
        <th>ข้อมูลเกมกากๆ</th>
        <th>เวอร์ชั่น</th>
        <th>รูปเกมหมา</th>
        <th>ลิงค์โหลดเกมหมาๆ</th>
    </tr>
    @foreach ($games as $games)
    <tr>
        <td>
            {{$games -> Game_name}}
        </td>
        <td>
            {{$games -> Game_info}}
        </td>
        <td>
            {{$games -> version}}
        </td>
        <td>
        <a href="{{ asset($games->Game_preview) }}" download>    
        <img src="{{ asset($games->Game_preview) }}" alt="#" >
    </a>
        </td>
        <td>
            <a href={{$games -> Game_dowload_link}}>ลิงค์โหลดเกมหมาๆ</a>
        </td>
        <td>
        <button onclick="alert_delete({{$games -> idgames }})" class ="btn btn-danger">
          delete
        </button>
        </td>
    <td>
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#updateModal{{$games->idgames}}">
        Update
    </button>
    </td>
    </tr>

    <div class="modal fade" id="updateModal{{$games->idgames}}" tabindex="-1" aria-labelledby="updateModalLabel{{$games->idgames}}"aria-hidden="true" >
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="updateModalLabel{{$games->idgames}}">Update Game</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="/Devmanage/update/{{$games->idgames}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="g_name" class="form-label">Game Name</label>
                <input type="text" class="form-control" name="g_name" value="{{$games->Game_name}}" required>
            </div>
            <div class="mb-3">
                <label for="g_details" class="form-label">Game Details</label>
                <input type="text" class="form-control" name="g_details" value="{{$games->Game_info}}" required>
            </div>
            <div class="mb-3">
                <label for="g_version" class="form-label">Game Version</label>
                <input type="text" class="form-control" name="g_version" value="{{$games->version}}" required>
            </div>
            <div class="mb-3">
                <label for="g_img" class="form-label">Game Image</label>
                <input type="file" class="form-control" name="g_img">
                <img src="{{ asset($games->Game_preview) }}" alt="#" class="mt-2" width="100">
            </div>
            <div class="mb-3">
                <label for="g_link" class="form-label">Download Link</label>
                <input type="text" class="form-control" name="g_link" value="{{$games->Game_dowload_link}}" required>
            </div>
            <div class="mb-3">
                <label for="g_tags" class="form-label">Game Tags</label>
                <input id="tags" name="g_tags" class="form-control" value="{{ implode(',', $games->gametypes->pluck('gametype_name')->toArray()) }}">
            </div>
            <button type="submit" class="btn btn-success">Save changes</button>
        </form>
      </div>
    </div>
  </div>
</div>

    @endforeach



    <div class="contianer mt-3">
    <form action="/Devmanage/create" method="POST" enctype="multipart/form-data">
    @csrf
    <div class ="mb-3 mt-3"> <input type="text" name="g_name" placeholder="Game Name"required></div>
    <div class ="mb-3"><input type="text" name="g_details" placeholder="Game Details"required></div>
    <div class ="mb-3"><input type="text" name="g_version" placeholder="Game Version"required></div>
    <!-- <div class ="mb-3"><input type="text" name="g_version" placeholder="Game Version"></div> -->
    <div class ="mb-3"><input type="file" name="g_img" required ></div>
    <div class ="mb-3"><input type="text" name="g_link" placeholder="Download Link" required></div>
    <button type="submit" type="button" class="btn btn-warning mb-3" >Submit</button>

    <div class="form-group bootstrap-tags">
            <label for="tags">Add keywords (max 10):</label>
            <input id="tags" name="g_tags" class="form-control" placeholder="Click to view options, type to filter or enter custom tag">
        </div>
    </form>
</div>
    </form>
    </div>
    </table>
    
</body>
</html>
<script>
    function alert_delete(id_) {
        var txt;
        var r = confirm("Are you sure you want to delete this subject?");
        if (r == true) {
            txt = "You pressed OK!";
        }   
        else {
            txt = "You pressed Cancel!";
        }
        if (txt=="You pressed OK!"){
            window.location.href = "/Devmanage/delete/"+id_; 
            alert("Subject has been deleted.");

        }
    }
</script>




<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

<!-- Tagify JS -->
<script src="https://cdn.jsdelivr.net/npm/@yaireo/tagify"></script>

<script>
    // Initialize Tagify on the input field
    var input = document.querySelector('#tags');
    var tagify = new Tagify(input, {
        whitelist: [
            "adult", "erotic", "2d", "horror", "pixel-art", "singleplayer", "adventure", "3d", "short", "retro", "visual-novel"
        ],
        maxTags: 10, // Maximum number of tags
        dropdown: {
            maxItems: 20,           // Show 20 suggestions
            classname: "tags-look", // Optional class to style dropdown
            enabled: 0,             // Always show suggestions dropdown
            closeOnSelect: false    // Don't close dropdown after selecting
        }
    });
</script>

<script>
$(document).on('shown.bs.modal', function () {
    $('.modal').each(function () {
        var input = document.querySelector('#tags');
        new Tagify(input);
    });
});
</script>