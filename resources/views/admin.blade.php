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


</body>
</html>
