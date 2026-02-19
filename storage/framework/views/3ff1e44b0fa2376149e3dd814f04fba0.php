<?php if (isset($component)) { $__componentOriginal7c7ebaa7094cfd95debdca4c54744e3c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal7c7ebaa7094cfd95debdca4c54744e3c = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.layouts.auth.adminlte','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('layouts.auth.adminlte'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

    <div class="login-box">
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">Recuperar senha</p>

                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(session('status')): ?>
                    <div class="alert alert-success"><?php echo e(session('status')); ?></div>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                <form method="POST" action="<?php echo e(route('password.email')); ?>">
                    <?php echo csrf_field(); ?>

                    <div class="input-group mb-3">
                        <input type="email" name="email" class="form-control" placeholder="Seu email" required>
                        <div class="input-group-append">
                            <div class="input-group-text"><span class="fas fa-envelope"></span></div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary btn-block">
                        Enviar link de recuperação
                    </button>
                </form>

                <p class="mt-3 text-center">
                    <a href="<?php echo e(route('login')); ?>">Voltar para login</a>
                </p>
            </div>
        </div>
    </div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal7c7ebaa7094cfd95debdca4c54744e3c)): ?>
<?php $attributes = $__attributesOriginal7c7ebaa7094cfd95debdca4c54744e3c; ?>
<?php unset($__attributesOriginal7c7ebaa7094cfd95debdca4c54744e3c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal7c7ebaa7094cfd95debdca4c54744e3c)): ?>
<?php $component = $__componentOriginal7c7ebaa7094cfd95debdca4c54744e3c; ?>
<?php unset($__componentOriginal7c7ebaa7094cfd95debdca4c54744e3c); ?>
<?php endif; ?><?php /**PATH C:\Users\vboxuser\reservas-online\app-reservas-on\resources\views/pages/auth/forgot-password.blade.php ENDPATH**/ ?>