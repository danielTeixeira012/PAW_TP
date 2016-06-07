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
        ?>

        <section>
            <p id="tipoUtilizador">Tipo Utilizador:</p>
            <label id="empregador">Empregador</label><input id="tipoEmpregador" type="radio" value="empregador" name="tipoUtilizador">
            <label id="prestador">Prestador de serviços</label><input id="tipoPrestador" type="radio" value="prestador" name="tipoUtilizador">
        </section>  
        <form id="formEmpregador">
            <label for="mailE">Email</label><input id="emailE" type="email" name="mailE">
            <label for="passE">Password</label><input id="passE" type="password" name="passE">
            <label for="nomeE">Nome</label><input id="nomeE" type="text" name="nomeE">
            <label for="contactoE">Contacto</label><input id="contactoE" type="text" name="contactoE">
            <label for="moradaE">Morada</label><input id="moradaE" type="text" name="moradaE">
            <label for="codigopostalE">Codigo-Postal</label><input id="codigopostalE" type="text" name="codigopostalE">
            <label for="distritoE">Distrito</label><input id="distritoE" type="text" name="distritoE">
            <label for="concelhoE">Concelho</label><input id="concelhoE" type="text" name="concelhoE">
            <input id="confirmE" type="submit" value="CONFIRM">
        </form>
        <form id="formPrestador" action="utilizadorPrestadorServico.php" method="post">
            <p><label for="emailP">Email</label><input id="emailP" type="email" name="emailP" required><?= isset($errors) && array_key_exists('emailP', $errors) ? $errors['emailP'] : '' ?></p>
            <p><label for="passP">Password</label><input id="passP" type="password" name="passP" required><?= isset($errors) && array_key_exists('passP', $errors) ? $errors['passP'] : '' ?></p>
            <p><label for="nomeP">Nome</label><input id="nomeP" type="text" name="nomeP" required><?= isset($errors) && array_key_exists('nomeP', $errors) ? $errors['nomeP'] : '' ?></p>
            <p><label for="contactoP">Contacto</label><input id="contactoP" type="tel" name="contactoP" required></p>
            <p><label for="fotografiaP">Fotografia</label><input id="fotografiaP" type="file" name="fotografiaP" required></p>
            <p><label for="moradaP">Morada</label><input id="moradaP" type="text" name="moradaP" required></p>
            <p><label for="codigopostalP">Codigo-Postal</label><input id="codigopostalP" type="text" name="codigopostalP" required></p>
            <p><label for="distritoP">Distrito</label><input id="distritoP" type="text" name="distritoP" required></p>
            <p><label for="concelhoP">Concelho</label><input id="concelhoP" type="text" name="concelhoP" required></p>
            <p><input id="confirmP" type="submit" value="CONFIRM"></p>
        </form>

    </body>
</html>
