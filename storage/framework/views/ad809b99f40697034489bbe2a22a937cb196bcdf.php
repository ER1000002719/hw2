

<?php $__env->startSection('title', '| Signup'); ?>

<?php $__env->startSection('script'); ?>
        <link rel="stylesheet" href="<?php echo e(asset('css/signup.css')); ?>">
        <script src="<?php echo e(asset('js/signup.js')); ?>" defer="true"></script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('Content'); ?>
<span>Signup</span>

                <form name="Form" action="<?php echo e(url('/insertUser')); ?>" method="POST">
                <?php echo csrf_field(); ?>
                Nome <input type='text' name='Nome' class='textinput'> <span id='name-error'></span>
                Cognome  <input type='text' name='Cognome' class='textinput'> <span id='surname-error'></span>
                Username <input type='text' name='user' class='textinput'> <span id='username-error'></span>
                E-mail  <input type='text' name='mail' class='textinput'> <span id='mail-error'></span>
                <div class="tooltip"> Password <img src='CSS/question.png'> 
  <span class="tooltiptext">Deve contenere almeno una maiuscola, una minuscola, un numero ed essere almeno otto caratteri</span>
</div> <input type='password' name='pass' class='textinput'> <span id='password-error'></span> 
                Conferma Password <input type='password' name='pass-confirm' class='textinput'> <span id='confirm-error'></span>
                <input type='submit' id='submit' value='SIGNUP'>
                </form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.sign', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\hw2\resources\views/signup.blade.php ENDPATH**/ ?>