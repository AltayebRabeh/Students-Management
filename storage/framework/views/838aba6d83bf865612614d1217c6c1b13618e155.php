<?php if (isset($component)) { $__componentOriginal7b6721487b7b8dd63e67398e09f7d70f121b9aa3 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\AuthLayout::class, []); ?>
<?php $component->withName('auth-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
    <div class="row align-items-center h-100">
        <form method="POST" action="<?php echo e(route('login')); ?>" class="col-lg-3 col-md-4 col-10 mx-auto text-center">
          <?php echo csrf_field(); ?>
          <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'jetstream::components.validation-errors','data' => ['class' => 'm-4 text-danger']]); ?>
<?php $component->withName('jet-validation-errors'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['class' => 'm-4 text-danger']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>

          <?php if(session('status')): ?>
              <div class="">
                  <?php echo e(session('status')); ?>

              </div>
          <?php endif; ?>
            <a class="navbar-brand mx-auto mt-2 flex-fill text-center" href="./index.html">
            <svg version="1.1" id="logo" class="navbar-brand-img brand-md" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 120 120" xml:space="preserve">
              <g>
                <polygon class="st0" points="78,105 15,105 24,87 87,87 	" />
                <polygon class="st0" points="96,69 33,69 42,51 105,51 	" />
                <polygon class="st0" points="78,33 15,33 24,15 87,15 	" />
              </g>
            </svg>
          </a>
          <h1 class="h6 mb-3">تسجيل الدخول</h1>
          <div class="form-group">
            <label for="inputEmail" class="sr-only">إسم المستخدم او البريد الالكتروني</label>
            <input name="email" type="text" id="inputEmail" class="form-control form-control-lg" placeholder="إسم المستخدم او البريد الالكتروني" required="" autofocus="">
          </div>
          <div class="form-group">
            <label for="inputPassword" class="sr-only">كلمة المرور</label>
            <input name="password" type="password" id="inputPassword" class="form-control form-control-lg" placeholder="كلمة المرور" required="">
          </div>
          <div class="checkbox mb-3">
            <label>
              <input name="remember" type="checkbox" value="remember-me"> البقاء متصلاً </label>
          </div>
          <button class="btn btn-lg btn-primary btn-block" type="submit">دخول</button>
          <?php if(Route::has('password.request')): ?>
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="<?php echo e(route('password.request')); ?>">
                    <?php echo e(__('استرجاع كلمة المرور')); ?>

                </a>
            <?php endif; ?>
          <p class="mt-5 mb-3 text-muted">© 2022</p>
        </form>
      </div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal7b6721487b7b8dd63e67398e09f7d70f121b9aa3)): ?>
<?php $component = $__componentOriginal7b6721487b7b8dd63e67398e09f7d70f121b9aa3; ?>
<?php unset($__componentOriginal7b6721487b7b8dd63e67398e09f7d70f121b9aa3); ?>
<?php endif; ?>
<?php /**PATH /home/altayeb/Desktop/university/resources/views/auth/login.blade.php ENDPATH**/ ?>