<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Log In</title>
    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/login.css', 'resources/js/app.js']); ?>
</head>
<body>
    <form class="form" action="<?php echo e(route('login')); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <h1 class="login-title">Log In</h1>
        <input class="input" type="text" name="username" placeholder="Enter your username" required>
        <input class="input" type="password" name="password" placeholder="Enter your password" required>
        <?php $__errorArgs = ['username'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            <a class="error"><?php echo e($message); ?></a>
        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            <a class="error"><?php echo e($message); ?></a>
        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        <button class="button">Log In</button>
    </form>
</body>
</html>
<?php /**PATH C:\Users\ACER\Documents\Project\Employee-Management-Website\resources\views/login/index.blade.php ENDPATH**/ ?>