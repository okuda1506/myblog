<?php $__env->startSection('title'); ?>
    <title>トップページ | <?php echo e(config('app.name')); ?></title>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('main'); ?>
    <h1>記事</h1>
    <ul>
        <li>カテゴリ1</li>
        <li>カテゴリ2</li>
        <li>カテゴリ3</li>
        <li>カテゴリ4</li>
        <li>カテゴリ5</li>
    </ul>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\myblog\resources\views/articles/list.blade.php ENDPATH**/ ?>
