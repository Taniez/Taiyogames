<x-app-layout>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        body {
    background-image: linear-gradient(rgba(255, 255, 255, 0.4), rgba(255, 255, 255, 0.4)),url("/img/BG_genshin.jpg");
    background-repeat: no-repeat;
    background-position: center;
    background-size: cover;
    padding: 0 10%;
    }
    h1 {
    font-size: 40px;
    font-weight: bold;
    margin: 25px;
    }
    .reportDetail {
        background-color: white;
        border: 2px solid black;
        border-radius: 5px;
        width: 300px;
        height: 300px;;
    }
    .gameImg {
        width: 400px;
        height: auto;
        border: 1px solid black;
        margin-bottom: 5px;
    }
    p {
        font-weight: bold;
        padding-left: 10px;
    }
    a:hover {
        color: cornflowerblue;
    }
    .btn {
        border: 2px solid red;
        padding: 5px;
        margin: 15px
    }
    .btn:hover {
        background-color: red;
        font-weight: bold;
        color: white;
        padding: 5px;
        margin: 15px
    }
    .allReport {
        display: flex;
    }
    .noReport {
        width: 350px;
        border-radius: 5px;
        padding: 10px;
        font-size: 30px;
        border: 2px solid black;
    }.makeCenter {
        margin: 20% 0;
        text-align: center;
        display: flex;
        justify-content: center;
    }
    </style>
</head>
<body>
    <h1>Report</h1>
    @if ($admin_report->isEmpty())
        <div class="makeCenter">
            <p class="noReport">There's no any Report :)</p>
        </div>
    @else
        <div class="allReport">
            @foreach($admin_report as $report)
            @isset($report->game->Game_preview)
                
                <div class="reportDetail">
                    <img class="gameImg" src="{{ asset($report->game->Game_preview) }}" alt="">
                    <p class="fromGame">From game: <a href="/game/{{$report->idgames}}">{{$report->game->Game_name}}</a></p>
                    <p class="detail">Detail: {{$report->reason}}</p>
                    <button class="btn" onclick="alert_delete({{$report->game->idgames}}, {{$report->id}})">Delete</button>  
                </div>
                @endisset
            @endforeach
        </div>
    @endif


</body>
</html>
</x-app-layout>

<script>
    function alert_delete(id_, id_report) {
        var txt;
        var r = confirm("Are you sure you want to delete this subject?");
        if (r == true) {
            window.location.href = "/admin/delete/" + id_ + "/" + id_report;
            alert("Subject has been deleted.");
        }
    }
</script>