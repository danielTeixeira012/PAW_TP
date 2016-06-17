
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="../Application/styles/addOfertaCSS.css"/>
        <title></title>
    </head>
    <body>
        <form id="formEmpregador" action="../Application/Validator/EmpregadorEdita.php" method="post">     
            <label for="emailE">Email</label><input id="emailE" type="email" name="emailE">
            <label for="nomeE">Nome</label><input id="nomeE" type="text" name="nomeE">
            <label for="fotografiaE">Fotografia</label><input id="fotografiaE" type="file" name="fotografiaE">
            <label for="passE">Password</label><input id="passE" type="password" name="passE">
            <label for="contactoE">Contacto</label><input id="contactoE" type="tel" name="contactoE">
            <label for="moradaE">Morada</label><input id="moradaE" type="text" name="moradaE">
            <label for="codigopostalE">Codigo-Postal</label><input id="codigopostalE" type="text" name="codigopostalE">
            <label for="distritoE">Distrito</label><input id="distritoE" type="text" name="distritoE">
            <label for="concelhoE">Concelho</label><input id="concelhoE" type="text" name="concelhoE">
            <input id="confirmE" type="submit" value="Edit User">
            </form>
            
        </form>
        
        
        
    </body>
</html>
