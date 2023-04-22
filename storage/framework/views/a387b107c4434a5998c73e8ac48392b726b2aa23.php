<?php $__env->startSection('title'); ?>
    <title>記事編集 | <?php echo e(config('app.name')); ?></title>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('header'); ?>
    <h1>記事編集</h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <form action="<?php echo e(route('article.update', ['article' => $article->id])); ?>" method="post">
        <?php echo csrf_field(); ?>
        <?php echo method_field('put'); ?>
        <ul>
            <li><input type="text" name="title" id="title" placeholder="記事タイトル" value="<?php echo e($article->title); ?>" required autofocus></li>
            <li><textarea name="content" placeholder="ここに内容を入力してください。" rows="5" required><?php echo e($article->content); ?></textarea></li>
            <li>
                <div>
                    <button type="submit">更新</button><br>
                    <button type="button" onclick="location.href='<?php echo e(url()->previous()); ?>'">戻る</button>
                </div>
            </li>
        </ul>
    </form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\myblog\resources\views/edit.blade.php ENDPATH**/ ?>