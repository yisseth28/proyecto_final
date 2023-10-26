<?php if(isset($_SESSION['success'])):?>
<div class="alert alert-success mt-3" role="alert">
    <?= $_SESSION['success'];?> 
</div>
<?php unset($_SESSION['success']);?>
<?php endif; ?>

<?php if(isset($_SESSION['error'])):?>
<div class="alert alert-danger" role="alert">
    <?= $_SESSION['error'];?> 
</div>
<?php unset($_SESSION['error']);?>
<?php endif; ?>



  