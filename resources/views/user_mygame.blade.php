<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <p>My game</p>
    <p>Under testing comment below</p>
    <form action="mygame/addComment" method="post">
        @csrf
        <input type="hidden" value="{{ Auth::user()->id }}" name="huser_id">
        <p>Ur user ID: <input type="number" name="user_id" value="{{ Auth::user()->id }}" disabled></p>
        <p>Game ID: <input type="number" name="game_id" required></p>
        <p>comment: <input type="text" name="detail" required></p>
        <p><input type="submit" value="post"></p>
    </form>

    <div>
        @if($_Comments->isEmpty())
            <div class="collection_empty">
                <p>You haven't no Comment. :(</p>
            </div>
        @else
            @foreach ($_Comments as $comment)
                <p>User ID - {{ $comment->user_id }} | Game ID - {{ $comment->idgames }}</p>
                <p>Comment detail: {{ $comment->comment_detail }}</p>
            @endforeach
        @endif
    </div>
</body>
</html>