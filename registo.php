<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <script src="Application/JS/registoJS.js"></script>
        <link rel="stylesheet"  href="Application/styles/registoCSS.css">
    </head>
    <body>
        <?php
        require_once __DIR__ . '/Application/Validator/registoPrestadorServicoValidator.php';
        require_once __DIR__ . '/Application/Validator/registoEmpregadorValidator.php';
        ?>

        <section>
            <p id="tipoUtilizador">Tipo Utilizador:</p>
            <label id="empregador">Empregador</label><input id="tipoEmpregador" type="radio" value="empregador" name="tipoUtilizador">
            <label id="prestador">Prestador de serviços</label><input id="tipoPrestador" type="radio" value="prestador" name="tipoUtilizador">
        </section>  
        <form id="formEmpregador" action="utilizadorEmpregador.php" method="post">
            <label for="emailE">Email</label><input id="emailE" type="email" name="emailE"><?= isset($errorsE) && array_key_exists('emailE', $errorsE) ? $errorsE['emailE'] : '' ?>
            <label for="passE">Password</label><input id="passE" type="password" name="passE"><?= isset($errorsE) && array_key_exists('passE', $errorsE) ? $errorsE['passE'] : '' ?>
            <label for="nomeE">Nome</label><input id="nomeE" type="text" name="nomeE"><?= isset($errorsE) && array_key_exists('nomeE', $errorsE) ? $errorsE['nomeE'] : '' ?>
            <label for="contactoE">Contacto</label><input id="contactoE" type="tel" name="contactoE">
            <label for="moradaE">Morada</label><input id="moradaE" type="text" name="moradaE">
            <label for="codigopostalE">Codigo-Postal</label><input id="codigopostalE" type="text" name="codigopostalE">
            <label for="distritoE">Distrito</label><input id="distritoE" type="text" name="distritoE">
            <label for="concelhoE">Concelho</label><input id="concelhoE" type="text" name="concelhoE">
            <input id="confirmE" type="submit" value="CONFIRM">
        </form>
        <form id="formPrestador" action="utilizadorPrestadorServico.php" method="post" enctype="multipart/form-data">
            <label for="emailP">Email</label><input id="emailP" type="email" name="emailP" required><?= isset($errors) && array_key_exists('emailP', $errors) ? $errors['emailP'] : '' ?>
            <label for="passP">Password</label><input id="passP" type="password" name="passP" required><?= isset($errors) && array_key_exists('passP', $errors) ? $errors['passP'] : '' ?>
            <label for="nomeP">Nome</label><input id="nomeP" type="text" name="nomeP" required><?= isset($errors) && array_key_exists('nomeP', $errors) ? $errors['nomeP'] : '' ?>
            <label for="contactoP">Contacto</label><input id="contactoP" type="tel" name="contactoP" required>
            <label for="fotografiaP">Fotografia</label><input id="fotografiaP" type="file" name="fotografiaP" required>
            <label for="moradaP">Morada</label><input id="moradaP" type="text" name="moradaP" required>
            <label for="codigopostalP">Codigo-Postal</label><input id="codigopostalP" type="text" name="codigopostalP" required>
            <label for="distritoP">Distrito</label><input id="distritoP" type="text" name="distritoP" required>
            <label for="concelhoP">Concelho</label><input id="concelhoP" type="text" name="concelhoP" required>
            <input id="confirmP" type="submit" value="CONFIRM" name="confirmP">
        </form>

    </body>
</html>
