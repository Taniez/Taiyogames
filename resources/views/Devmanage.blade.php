
<x-app-layout>
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
    @guest
        <script>window.location.href = "{{ route('register') }}";</script>
    @endguest
    @auth
    <style>
        @import url({{asset('css/style.css')}});
        
    </style>


</head>
<body>
<h1 class="head">Game Upload</h1>



<!-- เเก้ตั้งแต่ตรงนี้ -->
    <div class="container mt-3 border-1">
        <div class="form-container">
        <form action="/Devmanage/create" method="POST" enctype="multipart/form-data">
            @csrf
            <label for="g_name" class="form-label">Game Name</label>
            <div class="mb-3 mt-3 "> 
                <input type="text" name="g_name" placeholder="Game Name" class="form-control" required>
            </div>
            <label for="g_details" class="form-label">Game Details</label>
            <div class="mb-3">
                
                <textarea name="g_details" cols="90" rows="10" required></textarea>
            </div>
            <label for="g_version" class="form-label">Game Version</label>
            <div class="mb-3">
                <input type="text" name="g_version" placeholder="Game Version" class="form-control" required>
            </div>
            <label for="g_link" class="form-label">Download Link</label>
            <div class="mb-3">
                <input type="text" name="g_link" class="form-control" placeholder="Download Link" >
            </div>
            <div class="mb-3">
            <label for="g_img" class="form-label">Game icon</label>
                    <input type="file" class="form-control" name="g_img" id="g_img" required>
            </div>
            <div class="mb-3">
            <label for="g_bg" class="form-label">Upload background</label>
            <input type="file" class="form-control" name="g_bg" id="g_bg"  required>
            </div>

            <div class="mb-3">
            <label for="g_status" class="form-label">status</label>
                <select class="form-select" aria-label="Default select example"  name="g_status">
                    <option selected>Open this select menu</option>
                    <option value="Released">Released</option>
                    <option value="In development">In development</option>
                    <option value="On hold">On hold</option>
                    <option value="Prototype">Prototype</option>
                </select>
            </div>
            

            <div class="form-group bootstrap-tags">
                <label for="tags">Add keywords (max 10):</label>
                <input id="tags" name="g_tags" class="form-control" placeholder="Click to view options, type to filter or enter custom tag">
            </div>

            <div class="mb-3">
                <label for="screenshots" class="form-label">Upload Multiple Screenshots</label>
                <input type="file" name="screenshots[]" class="form-control" multiple> <!-- multiple attribute allows multiple files -->
            </div>
        
            <button type="submit" class="btn btn-warning mb-3">Submit</button>
            </div>


        <!-- create by auth -->
        <input type="hidden" value="{{ Auth::user()->id }}" name="huser_id">


        </form>
    </div>
    
    </table>
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
    @endauth