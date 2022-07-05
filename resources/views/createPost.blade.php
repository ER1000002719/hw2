<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>GAME2GOHOME</title>
        <link rel="stylesheet" href="{{ asset('css/createPost.css') }}">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="{{ asset('js/createPost.js') }}" defer="true"></script>
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
                <a href="/Profile">{{ $username }}</a>
                <a href="/Logout">logout</a>
            </div>
        </div>
        <main>
            <div id="searchbox">
                <h1>Cerca un gioco da recensire</h1>
                <textarea></textarea>
                <button>CERCA</button>
            </div>

            <div id="searchresult">
            </div>

            <form name="Form" method="POST" class='hidden' action='/insertPost'>
                @csrf
                <input type='text' name='Game' class='hidden'>
                Titolo Recensione<input type='text' name='Title' class='textinput'> <span id='title-error'></span>
                Voto <select name='Grade' class='textinput'>
                        <option value='1'>1</option>
                        <option value='2'>2</option>
                        <option value='3'>3</option>
                        <option value='4'>4</option>
                        <option value='5'>5</option>
                     </select> 
                <textarea id='content' name='Content'>Scrivi qui la tua recensione</textarea> <span id='content-error'></span>
                <input type='submit' id='submit' value='Invia Post'>
            </form>
        </main>
    </body>
</html>