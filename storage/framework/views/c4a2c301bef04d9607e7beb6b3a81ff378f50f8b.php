 <!-- Extende o layout base 'app.blade.php' -->


<?php $__env->startSection('content'); ?> <!-- Define a seção 'content' que será inserida no layout base -->
<h1>Editar Usuário</h1>
<form action="<?php echo e(route('usuarios.update', $usuario->id)); ?>" method="POST"> <!-- Formulário para editar um usuário existente -->
    <?php echo csrf_field(); ?> <!-- Token de proteção contra CSRF -->
    <?php echo method_field('PUT'); ?> <!-- Método para atualizar o usuário -->
    <div class="mb-3">
        <label for="usuario" class="form-label">Usuário</label>
        <input type="text" name="usuario" id="usuario" class="form-control" value="<?php echo e($usuario->usuario); ?>" required> <!-- Campo para nome do usuário com valor atual -->
    </div>
    <div class="mb-3">
        <label for="senha" class="form-label">Senha</label>
        <input type="password" name="senha" id="senha" class="form-control" required> <!-- Campo para nova senha -->
    </div>
    <button type="submit" class="btn btn-warning">Atualizar</button> <!-- Botão para enviar o formulário -->
</form>
<?php $__env->stopSection(); ?> <!-- Fim da seção 'content' -->
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\app-mvc-crud\resources\views/usuarios/edit.blade.php ENDPATH**/ ?>