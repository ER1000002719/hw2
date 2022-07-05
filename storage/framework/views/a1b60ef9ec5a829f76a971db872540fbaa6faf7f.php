<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>GAME2GOHOME</title>
        <link rel="stylesheet" href="<?php echo e(asset('css/Home.css')); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="<?php echo e(asset('js/Home.js')); ?>" defer="true"></script>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Koulen&family=Roboto:wght@300&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    <body>
        <div class="navbar">
            <h1>GAME2GO</h1>
            <div class='links'>
                <a href="/createPost">Nuovo Post</a>
                <a href="/Profile"><?php echo e($username); ?></a>
                <a href="/Logout">logout</a>
            </div>
        </div>

        <main>
            <div id='Welcome'>
            <h2>Benvenuto in GAME2GO</h2>
            <h3>Recensisci i tuoi giochi preferiti</h3>
            </div>
        </main>
    </body>
</html>
<?php /**PATH C:\xampp\htdocs\hw2\resources\views/home.blade.php ENDPATH**/ ?>