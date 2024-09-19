<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        img{
            max-width: 100px;
            max-height: 100px;
        }

    </style>
</head>
<body>
    <h1>test</h1>
    
    <table border="1">
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
        <img src="img/League_of_legends_logo_transparent.png" alt="">
        </td>
        <td>
            <a href={{$games -> Game_dowload_link}}>ลิงค์โหลดเกมหมาๆ</a>
        </td>
    </tr>
    @endforeach

    <form action="/Devmanage/create" method="post">
    @csrf
    <p>ชื่อเกม: <input type="text" name="g_name"></p>
    <p>รายละเอียด: <input type="text" name="g_details"></p>
    <p>เวอร์ชั่น: <input type="text" name="g_version"></p>
    <p>รูป: <input type="file" name="g_img"></p>
    <p>ลิงค์โหลดเกม: <input type="text" name="g_link"></p>
    
    <input type="submit"  class="button"></div>
</form>


    </table>
</body>
</html>