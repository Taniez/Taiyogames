<x-app-layout>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AdminSaDed</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@yaireo/tagify/dist/tagify.css">
</head>
</head>
<body>
<h1>Report  เดกเวร</h1>
@foreach($admin_report as $report)
    หัวเรื่องรายงาน {{$report->report_topic}}<br>
    รายละเอียดรายงาน {{$report->report_detail}}<br>
    ไอดีเกม {{$report->idgames}}<br>
    ผู้รายงาน {{ $report->game->Game_name }}<br>
    รายงานเมื่อ {{$report->created_at}}<br>
    <br>
@endforeach

@foreach($admin_report as $report)
    หัวเรื่องรายงาน {{$report->report_topic}}<br>
    รายละเอียดรายงาน {{$report->report_detail}}<br>
    ไอดีเกม {{$report->user->name}}<br>
    ผู้รายงาน {{ $report->game->Game_name }}<br>
    รายงานเมื่อ {{$report->created_at}}<br>
   
    <br>
@endforeach

@foreach($games as $game)
                <div class="bg-white shadow-md p-4 w-100 h-100 overflow-auto">
                    <a href="/game/{{ $game->idgames }}">
                        <img src="{{ asset($game->Game_preview) }}" alt="Preview" class="mt-2 h-75 w-100">
                        <h3 class="font-bold text-lg mt-2">{{ $game->Game_name }}</h3>
                        <p class="text-gray-600">{{ $game->Game_info }}</p>
                    </a>
             <button onclick="alert_delete({{$game->idgames}})" class ="btn btn-danger">delete</button>
                    <!-- ปุ่ม Wishlist -->
                    <livewire:wishlist-button :gameId="$game->idgames" />
                </div>
                @endforeach
<div class="container">
    <h1>Admin Dashboard</h1>
    <p>Welcome to the admin panel.</p>
</div>


</body>
</html>
<script>
    function alert_delete(id_) {
        var txt;
        var r = confirm("Are you sure you want to delete this subject?");
        if (r == true) {
            window.location.href = "/admin/delete/" + id_;
            alert("Subject has been deleted.");
        }
    }
</script>
</x-app-layout>