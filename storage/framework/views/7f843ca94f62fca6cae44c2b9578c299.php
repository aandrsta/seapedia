<?php $__env->startSection('title', 'Daftar Akun SEAPEDIA'); ?>

<?php $__env->startSection('content'); ?>
<div class="space-y-6">

    <!-- Header -->
    <div class="space-y-2 text-center">
        <h2 class="text-3xl font-extrabold text-white tracking-tighter leading-none">BUAT AKUN BARU</h2>
        <p class="text-sand-400 text-xs font-semibold uppercase tracking-wider">
            Daftar untuk mulai menjelajah produk kelautan
        </p>
    </div>

    <!-- Registration Form -->
    <form action="<?php echo e(route('register')); ?>" method="POST" class="space-y-5">
        <?php echo csrf_field(); ?>

        <!-- Name & Username Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
            <div>
                <label for="name" class="label text-sand-300 text-xs font-bold uppercase tracking-wider">Nama Lengkap</label>
                <input type="text" id="name" name="name" value="<?php echo e(old('name')); ?>" 
                       class="input-underlined <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-coral-500 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                       placeholder="JUHOON KIM" required autofocus>
                <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <p class="form-error text-coral-400 font-bold text-xs mt-1.5"><?php echo e($message); ?></p>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>

            <div>
                <label for="username" class="label text-sand-300 text-xs font-bold uppercase tracking-wider">Username</label>
                <input type="text" id="username" name="username" value="<?php echo e(old('username')); ?>" 
                       class="input-underlined <?php $__errorArgs = ['username'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-coral-500 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                       placeholder="juhooneo" required>
                <?php $__errorArgs = ['username'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <p class="form-error text-coral-400 font-bold text-xs mt-1.5"><?php echo e($message); ?></p>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
        </div>

        <!-- Email -->
        <div>
            <label for="email" class="label text-sand-300 text-xs font-bold uppercase tracking-wider">Alamat Email</label>
            <input type="email" id="email" name="email" value="<?php echo e(old('email')); ?>" 
                   class="input-underlined <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-coral-500 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                   placeholder="juhoonkim@example.com" required>
            <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <p class="form-error text-coral-400 font-bold text-xs mt-1.5"><?php echo e($message); ?></p>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>

        <!-- Passwords Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
            <div>
                <label for="password" class="label text-sand-300 text-xs font-bold uppercase tracking-wider">Kata Sandi</label>
                <input type="password" id="password" name="password" 
                       class="input-underlined <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-coral-500 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                       placeholder="••••••••" required>
                <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <p class="form-error text-coral-400 font-bold text-xs mt-1.5"><?php echo e($message); ?></p>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>

            <div>
                <label for="password_confirmation" class="label text-sand-300 text-xs font-bold uppercase tracking-wider">Konfirmasi Sandi</label>
                <input type="password" id="password_confirmation" name="password_confirmation" 
                       class="input-underlined" placeholder="••••••••" required>
            </div>
        </div>

        <button type="submit" class="btn btn-light btn-lg w-full mt-4 font-black tracking-widest text-white rounded-[8px] shadow-md">
            BUAT AKUN SEKARANG
        </button>
    </form>

    <!-- Footer Redirect -->
    <div class="text-center pt-2">
        <p class="text-xs text-sand-400 font-medium">
            Sudah memiliki akun? 
            <a href="<?php echo e(route('login')); ?>" class="font-bold text-teal-400 hover:text-teal-300 transition-colors underline decoration-teal-400/30 underline-offset-4">MASUK DISINI</a>
        </p>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.guest', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/dini/Sites/seapedia/resources/views/auth/register.blade.php ENDPATH**/ ?>