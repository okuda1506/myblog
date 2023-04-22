<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>

    <!-- Site Info -->
    <?php echo $__env->yieldContent('title'); ?>

    <!-- CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/9.18.1/styles/dracula.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/destyle.css@3.0.2/destyle.min.css">
    <link rel="stylesheet" href="<?php echo e(asset('css/style.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/style.css')); ?>">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Klee+One:wght@400;600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=M+PLUS+Rounded+1c" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Serif+JP:wght@600&display=swap" rel="stylesheet">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <header id="header">
        
        
        <div class="header_logo">LOGO</div>
        <ul class="slide-in">
            <li class="header_list"><a href="#">TOP</a></li>
            <li class="header_list"><a href="<?php echo e(route('articles.list')); ?>">Blog</a></li>
            <li class="header_list"><a href="#">Pixel</a></li>
            <li class="header_list"><a href="#">Product</a></li>
            <li class="header_list"><a href="https://www.instagram.com/nnnt0k/?hl=ja" target="_blank"><img src="<?php echo e(asset('storage/img/instagram-logo.png')); ?>" alt="instagram"></a></li>
            <li class="header_list"><a href="https://twitter.com/nnnt0k" target="_blank"><img src="<?php echo e(asset('storage/img/twitter-logo.png')); ?>" alt="twitter"></a></li>
        </ul>
        <div class="hamburger_btn"><span></span><span></span><span></span></div>
    </header>
    <div class="container">
        <main id="main">
            <?php echo $__env->yieldContent('main'); ?>
        </main>
    </div>
    <footer id="footer">
        <small>&copy; takuyaokuda, 2023 All Rights Reserved.</small>
    </footer>
    <?php echo $__env->yieldContent('scripts'); ?>
    <script>
        $(function() {
            $('.hamburger_btn').on('click', function() {
                $('.slide-in').toggleClass('active');
                $(this).toggleClass('active');
                $('body').toggleClass('no_scroll');
            });
        });

    </script>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\myblog\resources\views/layouts/app.blade.php ENDPATH**/ ?>