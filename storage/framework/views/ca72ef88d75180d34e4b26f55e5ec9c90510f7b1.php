

<?php $__env->startSection('title', '| Login'); ?>

<?php $__env->startSection('script'); ?>
        <link rel="stylesheet" href="<?php echo e(asset('css/login.css')); ?>">
        <script src="<?php echo e(asset('js/login.js')); ?>" defer="true"></script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('Content'); ?>
<span>Login</span>

<form name="Form" action="<?php echo e(url('/checkLogin')); ?>" method="POST">
<?php echo csrf_field(); ?>
Username </br> <input type='text' name='user' class='textinput'> <span id='username-error'></span>
Password </br> <input type='password' name='pass' class='textinput'>  <span id='password-error'></span>
<span class='posterror'></span>
<input type='submit' id='submit' value='LOGIN'>
</form>

<a id='signup' href='/signup'>Non hai ancora un Account? Registrati adesso!</a>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.sign', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\hw2\resources\views/login.blade.php ENDPATH**/ ?>