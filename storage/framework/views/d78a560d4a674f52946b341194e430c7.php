<?php $__env->startSection('title', 'Masuk Ke SEAPEDIA'); ?>

<?php $__env->startSection('content'); ?>
<div class="space-y-6">
    <!-- Header -->
    <div class="space-y-2 text-center">
        <h2 class="text-3xl font-extrabold text-white tracking-tighter leading-none">Masuk</h2>
     
    </div>

    <!-- Login Form -->
    <form action="<?php echo e(route('login')); ?>" method="POST" class="space-y-6">
        <?php echo csrf_field(); ?>

        <div>
            <label for="login" class="label text-sand-300 text-xs font-bold uppercase tracking-wider">Username atau Email</label>
            <input type="text" id="login" name="login" value="<?php echo e(old('login')); ?>" 
                   class="input-underlined <?php $__errorArgs = ['login'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-coral-500 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                   placeholder="juhooneo" required autofocus>
            <?php $__errorArgs = ['login'];
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

        <div class="flex items-center justify-between text-xs font-semibold">
            <label class="group inline-flex items-center text-sand-300 cursor-pointer hover:text-white transition-colors">
                <div class="relative flex items-center justify-center w-4.5 h-4.5 mr-2">
                    <input type="checkbox" name="remember" class="peer appearance-none w-4.5 h-4.5 border border-white/20 rounded-[4px] bg-white/5 checked:bg-teal-500 checked:border-teal-500 focus:outline-none focus:ring-2 focus:ring-teal-500/20 transition-all">
                    <svg class="absolute w-2.5 h-2.5 text-white pointer-events-none opacity-0 peer-checked:opacity-100 transition-opacity" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="4.5"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" /></svg>
                </div>
                Ingat Saya
            </label>
        </div>

        <button type="submit" class="btn btn-primary btn-lg w-full mt-4 font-black tracking-widest text-white rounded-[8px] shadow-md">
            MASUK APLIKASI
        </button>
    </form>

    <!-- Footer Redirect -->
    <div class="text-center pt-4 border-t border-white/10">
        <p class="text-xs text-sand-400 font-medium">
            Belum memiliki akun? 
            <a href="<?php echo e(route('register')); ?>" class="font-bold text-teal-400 hover:text-teal-300 transition-colors underline decoration-teal-400/30 underline-offset-4">DAFTAR AKUN BARU</a>
        </p>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.guest', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/dini/Sites/seapedia/resources/views/auth/login.blade.php ENDPATH**/ ?>