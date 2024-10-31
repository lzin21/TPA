 <!-- Extende o layout base 'app.blade.php' -->




<?php $__env->startSection('content'); ?> <!-- Define a seção 'content' que será inserida no layout base -->
<h1>Adicionar Usuário</h1>
<form action="<?php echo e(route('usuarios.store')); ?>" method="POST"> <!-- Formulário para adicionar um novo usuário -->
    <?php echo csrf_field(); ?> <!-- Token de proteção contra CSRF -->
    <div class="mb-3">
        <label for="usuario" class="form-label">Usuário</label>
        <input type="text" name="usuario" id="usuario" class="form-control" required> <!-- Campo para nome do usuário -->
    </div>
    <div class="mb-3">
        <label for="senha" class="form-label">Senha</label>
        <input type="password" name="senha" id="senha" class="form-control" required> <!-- Campo para senha -->
    </div>
    <button type="submit" class="btn btn-success">Adicionar</button> <!-- Botão para enviar o formulário -->
</form>
<?php $__env->stopSection(); ?> <!-- Fim da seção 'content' -->
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\app-mvc-crud\resources\views/usuarios/create.blade.php ENDPATH**/ ?>