<?php $__env->startSection('title'); ?>
    <title>記事一覧 | <?php echo e(config('app.name')); ?></title>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('header'); ?>
    <h1>記事一覧</h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <ul id="blog-menu">
        <li><a href="<?php echo e(route('article.create')); ?>" class="btn">新規登録</a></li>
    </ul>

    <?php $__currentLoopData = $articles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $article): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <article class="article">
            <a href="<?php echo e(route('article.show', ['article' => $article->id])); ?>">
                <p>
                    <?php if($article->createdAt == $article->updatedAt): ?>
                        <time datetime="<?php echo e(Str::limit($article->createdAt, 20)); ?>">登録日時：<?php echo e(Str::limit($article->createdAt, 20, "")); ?></time>
                    <?php else: ?>
                        <time datetime="<?php echo e(Str::limit($article->createdAt, 20)); ?>">登録日時：<?php echo e(Str::limit($article->createdAt, 20, "")); ?></time>　<time datetime="<?php echo e(Str::limit($article->updatedAt, 20)); ?>">更新日時：<?php echo e(Str::limit($article->updatedAt, 20, "")); ?></time>
                    <?php endif; ?>
                </p>
                <h3><?php echo e($article->title); ?></h3>
                <p><?php echo $article->content; ?></p>
            </a>
        </article>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\myblog\resources\views/dashboard.blade.php ENDPATH**/ ?>