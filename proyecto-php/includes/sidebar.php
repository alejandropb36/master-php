<?php require_once 'includes/helpers.php'; ?>
<!-- SIDEBAR -->
<aside id="sidebar">
    <div id="login" class="block-aside">
        <h3>Identificate</h3>
        <form action="login.php">
            <label for="email">Email: </label>
            <input type="email" name="email">

            <label for="password">Password: </label>
            <input type="password" name="password">

            <input type="submit" value="Entrar">
        </form>
    </div>
    <div id="register" class="block-aside">
        <?php 
            var_dump($_SESSION['errors']);
        ?>
        <h3>Registrate</h3>
        <form action="register.php" method="POST">
            <label for="name">Nombre: </label>
            <input type="text" name="name">
            <?php echo isset($_SESSION['errors']) ? showErrors($_SESSION['errors'], 'name') : ''; ?>
            
            <label for="surname">Apellidos: </label>
            <input type="text" name="surname">
            <?php echo isset($_SESSION['errors']) ? showErrors($_SESSION['errors'], 'surname') : ''; ?>

            <label for="email">Email: </label>
            <input type="email" name="email">
            <?php echo isset($_SESSION['errors']) ? showErrors($_SESSION['errors'], 'email') : ''; ?>

            <label for="password">Password: </label>
            <input type="password" name="password">
            <?php echo isset($_SESSION['errors']) ? showErrors($_SESSION['errors'], 'password') : ''; ?>

            <input type="submit" name="submit" value="Registrar">
        </form>
    </div>
    <?php deleteErros(); ?>
</aside>