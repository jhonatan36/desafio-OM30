<?= view('includes/header') ?>

    <div class="container mt-5">
        <div class="alert alert-success">
            <?= $message ?>
            <?= anchor(base_url(), 'Voltar', ['class'=>'btn btn-sm btn-info']) ?>
        </div>
    </div>
    
</body>
</html>