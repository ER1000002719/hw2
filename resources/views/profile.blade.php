<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>GAME2GOHOME</title>
        <link rel="stylesheet" href="{{ asset('css/Profile.css') }}">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="{{ asset('js/Profile.js') }}" defer="true"></script>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Koulen&family=Roboto:wght@300&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    <body>
        <div class="navbar">
            <h1>GAME2GO</h1>
            <div class='links'>
                <a href="/home">home</a>
                <a href="/createPost">Nuovo Post</a>
                <a href="/Logout">logout</a>
            </div>
        </div>
        <main>
            <div id='profilebox'>
                <h1>{{ $username }}</h1>
                <div><h1>POST</h1><span>{{ $numPosts }}</span></div>
                <div><h1>LIKE</h1><span>{{ $numLikes }}</span></div>
                <div><h1>COMMENTI</h1><span>{{ $numComments }}</span></div>
            </div>

            <div id='postsbox'>
            </div>
        </main>
</html>