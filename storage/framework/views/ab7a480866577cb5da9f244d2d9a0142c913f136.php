<?php $__env->startSection('header'); ?>
    <h1>新規投稿</h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <form action="<?php echo e(route('article.store')); ?>" method="post">
        <?php echo csrf_field(); ?>
        <ul>
            <li><input type="text" name="title" id="title" placeholder="記事タイトル" required autofocus></li>
            <li><textarea name="content" placeholder="ここに内容を入力してください。" rows="5" required></textarea></li>
            <li>
                <div>
                    <button type="submit">投稿</button><br>
                    <button type="button" onclick="location.href='<?php echo e(route('article.index')); ?>'">戻る</button>
                </div>
            </li>
        </ul>
    </form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\myblog\resources\views/create.blade.php ENDPATH**/ ?>