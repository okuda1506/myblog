<?php $__env->startSection('title'); ?>
    <title>記事閲覧 | <?php echo e(config('app.name')); ?></title>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('header'); ?>
    <h1><?php echo e($article->title); ?></h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <ul id="blog-menu">
        <li><a href="<?php echo e(route('article.edit', ['article' => $article->id])); ?>" class="btn">編集</a></li>
        <li>
            <form action="<?php echo e(route('article.destroy', ['article' => $article->id])); ?>" method="post" onsubmit="return confirm('本当に削除しますか？')">
                <?php echo csrf_field(); ?>
                <?php echo method_field('delete'); ?>
                <button type="submit" class="btn">削除</button>
            </form>
        </li>
        <li><a href="<?php echo e(route('article.index')); ?>" class="btn">戻る</a></li>
    </ul>

    <div id="show">
        <?php echo Str::markdown($article->content); ?>

    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\myblog\resources\views/detail.blade.php ENDPATH**/ ?>
