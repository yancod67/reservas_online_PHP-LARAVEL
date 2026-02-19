<div class="container-fluid">

    
    <div class="row mb-3">
        <div class="col-12">
            <h1 class="m-0">Usuários Cadastrados</h1>
        </div>
    </div>

    
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Lista de Usuários</h3>
        </div>

        <div class="card-body table-responsive">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Email</th>
                        <th>Perfil</th>
                        <th width="120">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $usuarios; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $usuario): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoop($loop->index); ?><?php endif; ?>
                        <tr>
                            <td><?php echo e($usuario->id); ?></td>
                            <td><?php echo e($usuario->name); ?></td>
                            <td><?php echo e($usuario->email); ?></td>
                            <td>
                                <span class="badge 
                                    <?php echo e($usuario->perfil === 'admin' ? 'badge-success' : 'badge-secondary'); ?>">
                                    <?php echo e(ucfirst($usuario->perfil)); ?>

                                </span>
                            </td>
                            <td>
                                
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(auth()->id() !== $usuario->id): ?>
                                    <button wire:click="excluir(<?php echo e($usuario->id); ?>)"
                                            class="btn btn-sm btn-danger">
                                        Excluir
                                    </button>
                                <?php else: ?>
                                    <span class="text-muted">—</span>
                                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            </td>
                        </tr>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>

</div>
<?php /**PATH C:\Users\vboxuser\reservas-online\app-reservas-on\resources\views/livewire/usuarios.blade.php ENDPATH**/ ?>