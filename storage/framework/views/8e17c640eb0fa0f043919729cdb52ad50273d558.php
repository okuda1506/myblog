<?php $__env->startSection('scripts'); ?>
    <script>
        // カテゴリ操作
        $(function() {
            $('.CODE_li .category_name').on('click', function() {
                $('.CODE_li .category_name #caret').css("transform", "rotate(90deg)");
                if ($('.CODE_li .category_name #caret').hasClass("rotated")) {
                    $('.CODE_li .category_name #caret').removeClass("rotated").css("transform", "rotate(0deg)");
                } else {
                    $('.CODE_li .category_name #caret').addClass("rotated");
                }
                $(this).next('.CODE_li .tag_ul').slideToggle(300);
                $('.CODE_li .tag_ul').css('display', 'flex');
            });
            $('.TECH_li .category_name').on('click', function() {
                $('.TECH_li .category_name #caret').css("transform", "rotate(90deg)");
                if ($('.TECH_li .category_name #caret').hasClass("rotated")) {
                    $('.TECH_li .category_name #caret').removeClass("rotated").css("transform", "rotate(0deg)");
                } else {
                    $('.TECH_li .category_name #caret').addClass("rotated");
                }
                $(this).next('.TECH_li .tag_ul').slideToggle(300);
                $('.TECH_li .tag_ul').css('display', 'flex');
            });
            $('.LIFE_li .category_name').on('click', function() {
                $('.LIFE_li .category_name #caret').css("transform", "rotate(90deg)");
                if ($('.LIFE_li .category_name #caret').hasClass("rotated")) {
                    $('.LIFE_li .category_name #caret').removeClass("rotated").css("transform", "rotate(0deg)");
                } else {
                    $('.LIFE_li .category_name #caret').addClass("rotated");
                }
                $(this).next('.LIFE_li .tag_ul').slideToggle(300);
                $('.LIFE_li .tag_ul').css('display', 'flex');
            });
            $('.CAFE_li .category_name').on('click', function() {
                $('.CAFE_li .category_name #caret').css("transform", "rotate(90deg)");
                if ($('.CAFE_li .category_name #caret').hasClass("rotated")) {
                    $('.CAFE_li .category_name #caret').removeClass("rotated").css("transform", "rotate(0deg)");
                } else {
                    $('.CAFE_li .category_name #caret').addClass("rotated");
                }
                $(this).next('.CAFE_li .tag_ul').slideToggle(300);
                $('.CAFE_li .tag_ul').css('display', 'flex');
            });
        });
        // read more操作
        var moreNum = 11;
        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            $('#<?php echo e($category->name); ?> .article_list:nth-child(n + ' + (moreNum + 1) + ')').addClass('is_hidden');
            $('#<?php echo e($category->name); ?> .read_more').on('click', function() {
                $('#<?php echo e($category->name); ?> .article_list.is_hidden').slice(0).removeClass('is_hidden');
                if ($('#<?php echo e($category->name); ?> .article_list.is_hidden').length == 0) {
                    $('#<?php echo e($category->name); ?> .read_more').fadeOut();
                }
            });
            $(function() {
                var listCnt = $("#<?php echo e($category->name); ?> .article_list").length;
                if (listCnt < moreNum) {
                    $('#<?php echo e($category->name); ?> .read_more').addClass('is_hidden');
                }
            });
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('title'); ?>
    <title>記事一覧 | <?php echo e(config('app.name')); ?></title>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('main'); ?>
    <div class="list_container">
        <h1>Blog</h1>
        <ul class="category_ul">
            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li class="<?php echo e($category->name); ?>_li">
                    <div class="category_name">
                        <span id="caret"></span>
                        <p><?php echo e($category->name); ?></p>
                    </div>
                    <ul class="tag_ul">
                        <li><a href="<?php echo e(route('articles.list_category', ['category_name' => $category->name, 'tag' => 'all'])); ?>">ALL</a></li>
                        <?php $__currentLoopData = $category->tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><a href="<?php echo e(route('articles.list_category', ['category_name' => $category->name, 'tag' => $tag->name])); ?>"><?php echo e($tag->name); ?></a></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
        <div class="category_container">
            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="category_list" id="<?php echo e($category->name); ?>">
                    <h1><?php echo e($category->name); ?></h1>
                    <?php $__currentLoopData = $articles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $article): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if( $article->category->name == $category->name ): ?>
                            <div class="article_list">
                                <div class="date">
                                    <p class="updatedAt"><?php echo e(date('Y/m/d', strtotime($article->updatedAt))); ?></p>
                                </div>
                                <?php $__currentLoopData = $article->tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="tag">
                                        <span><?php echo e($tag->name); ?></span>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <div class="article_title">
                                    <a href="<?php echo e(route('articles.detail', ['id'=>$article->id])); ?>">
                                        <p><?php echo e($article->title); ?></p>
                                    </a>
                                </div>
                            </div>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <div class="read_more">
                        <button>» Read more</button>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\myblog\resources\views/articles/list.blade.php ENDPATH**/ ?>