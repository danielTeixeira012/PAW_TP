/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function escreverResultado(data){
    var dados = JSON.parse(data);
    document.getElementById('resultado').innerHTML='';  
    if(dados.length !== 0){
        var section = document.getElementById('resultado');
        var i = 0;
        for(i= 0; i < dados.length; ++i){
              var table = document.createElement('table');
              var th1 = document.createElement('th');
              var th2 = document.createElement('th');
              var tr = document.createElement('tr');
              var td1 = document.createElement('td');
              var td2 = document.createElement('td');
              var a = document.createElement('a');
              a.setAttribute('href', 'verOfertas.php?oferta=' + dados[i]['idOferta']);
              var button = document.createElement('button');
              button.innerHTML ="Ver oferta";
              a.appendChild(button);
              th1.innerHTML ="Titulo oferta";
              th2.innerHTML ="Opção";
              td1.innerHTML = dados[i]['tituloOferta'];
              td2.appendChild(a);
              tr.appendChild(th1);
              tr.appendChild(th2);
              th1.appendChild(td1);
              th2.appendChild(td2);
              table.appendChild(th1);
              table.appendChild(th2);
              table.appendChild(tr);
              section.appendChild(table);
              
//            var article = document.createElement('article');
//            var h2 = document.createElement('h2');
//            h2.innerHTML = "Titulo oferta: " + dados[i]['tituloOferta'];
//            var p1 = document.createElement('p');
//            p1.innerHTML = "Informação Oferta: " + dados[i]['informacaoOferta'];
//            var p2 = document.createElement('p');
//            p2.innerHTML = "Função Oferta: " + dados[i]['funcaoOferta'];
//            var p3 = document.createElement('p');
//            p3.innerHTML = "Salario: " + dados[i]['salario'];
//            var p4 = document.createElement('p');
//            p4.innerHTML = "Requisitos: " + dados[i]['requisitos'];
//            var p5 = document.createElement('p');
//            p5.innerHTML = "Região: " + dados[i]['regiao'];
//            var a = document.createElement('a');
//            a.setAttribute('href', 'verOfertas.php?oferta=' +dados[i]['idOferta']);
//            var pesquisa = document.createElement('button');
//            pesquisa.innerHTML = 'Ver Oferta';
//            a.appendChild(pesquisa);
//            article.appendChild(h2);
//            article.appendChild(p1);
//            article.appendChild(p2);
//            article.appendChild(p3);
//            article.appendChild(p4);
//            article.appendChild(p5);
//            article.appendChild(a);
//            section.appendChild(article);
            
            
        }
    }else{
        document.getElementById('resultado').innerHTML = 'Não existe resultados para a sua procura!';
    }
}

function pesquisarOfertasAJAX(){
    var pesquisa = document.getElementById('areaPesquisa').value;
    $.get('Application/Service/PesquisaService.php', {categoria: pesquisa}, 
        function(data){
            escreverResultado(data);
    }
    );
}

function apagarResultados(){
    document.getElementById('resultado').innerHTML = "";
}

function initEvents(){
    document.getElementById('pesquisa').addEventListener('click', pesquisarOfertasAJAX);
    document.getElementById('apagar').addEventListener('click', apagarResultados);
}

document.addEventListener('DOMContentLoaded', initEvents);