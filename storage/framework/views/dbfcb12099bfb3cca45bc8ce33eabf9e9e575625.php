 <!-- Extende o layout base 'app.blade.php' -->


<?php $__env->startSection('content'); ?> <!-- Define a seção 'content' que será inserida no layout base -->
<h1>Usuários</h1>
<a href="<?php echo e(route('usuarios.create')); ?>" class="btn btn-primary">Adicionar Usuário</a>


<?php if(session('success')): ?> <!-- Verifica se existe uma mensagem de sucesso na sessão -->
    <div class="alert alert-success mt-3">
        <?php echo e(session('success')); ?> <!-- Exibe a mensagem de sucesso -->
    </div>
<?php endif; ?>


<table class="table mt-3">
    <thead>
        <tr>
            <th>ID</th>
            <th>Usuário</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        <?php $__currentLoopData = $usuarios; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $usuario): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <!-- Itera sobre a lista de usuários -->
        <tr>
            <td><?php echo e($usuario->id); ?></td> <!-- Exibe o ID do usuário -->
            <td><?php echo e($usuario->usuario); ?></td> <!-- Exibe o nome do usuário -->
            <td>
                <a href="<?php echo e(route('usuarios.edit', $usuario->id)); ?>" class="btn btn-warning">Editar</a> <!-- Link para editar o usuário -->
                <form action="<?php echo e(route('usuarios.destroy', $usuario->id)); ?>" method="POST" style="display:inline;"> <!-- Formulário para excluir o usuário -->
                    <?php echo csrf_field(); ?> <!-- Token de proteção contra CSRF -->
                    <?php echo method_field('DELETE'); ?> <!-- Método para excluir o usuário -->
                    <button type="submit" class="btn btn-danger">Excluir</button> <!-- Botão para excluir o usuário -->
                </form>
            </td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> <!-- Fim da iteração sobre usuários -->
    </tbody>
</table>
<?php $__env->stopSection(); ?> <!-- Fim da seção 'content' -->
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\app-mvc-crud\resources\views/usuarios/index.blade.php ENDPATH**/ ?>