<?php
require_once (realpath(dirname(__FILE__)) . '/../Config.php');

use Config as Conf;
require_once (Conf::getApplicationDatabasePath() . 'MyDataAccessPDO.php');
require_once (Conf::getApplicationManagerPath() . 'SessionManager.php');
require_once (Conf::getApplicationManagerPath() . 'TipoOfertaManager.php');
require_once (Conf::getApplicationManagerPath() . 'CategoriasManager.php');
require_once (Conf::getApplicationManagerPath() . 'EmpregadorManager.php');
$empregadorMan = new EmpregadorManager();
$idEmpregador = $empregadorMan->verifyEmail(SessionManager::getSessionValue('email'))[0]['idEmpregador'];
                
?>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <script src="../Application/JS/OfertaLS_JS.js"></script> 
        <link rel="stylesheet" type="text/css" href="../Application/Styles/FormsCSS.css"/>
    </head>
    <body>
       <?php require_once '../Application/imports/empregadorHeader.php';?>
        <section id="form">
        <form id="formOferta" action="../Application/Validator/OfertaValida.php" method="post" >
            <input type="hidden" id="idEmpregador" name="idEmpregador" value="<?= $idEmpregador ?>">
            <label for="categoria">Categoria</label><select id="categoria" name="categoriaO">
                  <?php
                $categoriaBD = new CategoriasManager();
                $categorias = $categoriaBD->getCategorias();
                foreach ($categorias as $key => $value) {?>
                    <option value="<?=$value['idCategoria'] ?>"><?=$value['nomeCategoria']?></option>    
                    <?php
                }
                ?>
            </select>
            <label for="tituloOferta">Titulo</label><input id="tituloOferta" name="tituloO">
            <label for="tipoOferta">Tipo de oferta</label>
            <select id="tipoOferta" name="tipoO">
                <option value="fullTime">Full-Time</option>
                <option value="partTime">Part-Time</option>
            </select>
            <label for="informacaoOferta">Informações</label><textarea id="informacaoOferta" name="infoO"></textarea>
            <label for="funcaoOferta">Funções</label><textarea id="funcaoOferta" name="funcO"></textarea>
            <label for="regiao">Região</label><input id="regiao" name="regi">
            <label for="salario">Salario</label><input id="salario" name="sal" onkeyup="floatInput(this)">
            <label for="requisitos">Requisitos</label><textarea id="requisitos" name="req"></textarea>
            <label for="dataLimite">Data Limite Candidatura</label><input id="dataLimite" type="date" name="dataLim">
            <label for="statusOferta">Estado da oferta</label>
            <select id="statusOferta" name="statusO"> 
                <option value="pendente">Submeter sem publicar(Pendente)</option>
                <option value="publicada">Publicar(Publicada)</option>
            </select>
            
            
            <input class="button2" id="submeter" type="submit" value="Submeter">
  
            
<!--            <script>
            
            function floatInput(input){
                
                input.value=input.value.replace(',','.');
            }
                    
            </script>-->
        </form>
        <h3>Dados Locais</h3>
        <p>Guardar dados localmente</p><button class="button2" id="guardarTemp">Guardar</button>
        
        <div id="lsDIV">
            
        </div>
        </section>
        
        
       
        

    </body>
</html>
