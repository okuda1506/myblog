<?php $__env->startSection('scripts'); ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/9.18.1/highlight.min.js"></script>
    <script>
        // microCMSリッチエディタのスタイル修正（現状リスト・インデントの修正は効かない）
        hljs.initHighlightingOnLoad();
    </script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('title'); ?>
    <title>記事閲覧 | <?php echo e(config('app.name')); ?></title>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('main'); ?>
    <article>
        <h1><?php echo e($article->title); ?></h1>
        <p class="updatedAt"><?php echo e($update_date); ?></p>
        <div id="content">
            <?php echo $article->content; ?>

        </div>
    </article>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\myblog\resources\views/articles/detail.blade.php ENDPATH**/ ?>
