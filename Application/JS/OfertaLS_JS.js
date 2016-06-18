var ofertas = [];


function loadAllFromLocalSorage() {
    if (typeof (Storage) !== "undefined") {
        try {
            var temp = localStorage.getItem('ofertas');
            if (temp !== null) {
                ofertasTemp = JSON.parse(temp);
                var i = 0;

                for (i = 0; i < ofertasTemp.length; i++) {
                    ofertas.push(ofertasTemp[i]);
                }
            }
        } catch (err) {
            if (err === QUOTA_EXCEEDED_ERR) {
                console.error('Limite da localStorage excedido');
            } else {
                console.error('Erro ao guardar para a localStorage');
            }
        }
    } else {
        console.error("Sorry! No Web Storage support..");
    }
}

function loadOfertasUserFromLocalSorage() {
    if (typeof (Storage) !== "undefined") {
        try {
            var temp = localStorage.getItem('ofertas');
            if (temp !== null) {
                ofertasTemp = JSON.parse(temp);
                var i = 0;
                var idEmpregador = document.getElementById('idEmpregador').value;
                for (i = 0; i < ofertasTemp.length; i++) {
                    if (ofertasTemp[i]['idEmpregador'] === idEmpregador) {
                        ofertas.push(ofertasTemp[i]);
                    }
                }

            }
        } catch (err) {
            if (err === QUOTA_EXCEEDED_ERR) {
                console.error('Limite da localStorage excedido');
            } else {
                console.error('Erro ao guardar para a localStorage');
            }
        }
    } else {
        console.error("Sorry! No Web Storage support..");
    }
}

function guardarOfertasStorage() {
    if (typeof (Storage) !== "undefined") {
        try {
            localStorage.setItem('ofertas', JSON.stringify(ofertas));
        } catch (err) {
            if (err === QUOTA_EXCEEDED_ERR) {
                console.error("Limite da local storage excedido!!");
            } else {
                console.error("Erro!");
            }
        }
    } else {
        console.error('Não guardado');
    }
}

function preencherOferta() {
    alert('ola');
    var i = 0;
    for (i = 0; i < ofertas.length; i++) {
        if (ofertas[i]['tituloOferta'] === document.getElementById('selectLoad').value){   
        document.getElementById("categoria").value = ofertas[i]['categoria'];
        document.getElementById('tituloOferta').setAttribute('value', ofertas[i]['tituloOferta']);
        document.getElementById('informacaoOferta').innerHTML = ofertas[i]['informacaoOferta'];
        document.getElementById('funcaoOferta').innerHTML = ofertas[i]['funcaoOferta'];
        document.getElementById('salario').setAttribute('value', ofertas[i]['salario']);
        document.getElementById('requisitos').innerHTML = ofertas[i]['requisitos'];
        document.getElementById("tipoOferta").value = ofertas[i]['tipoOferta'];
        document.getElementById('regiao').setAttribute('value', ofertas[i]['regiao']);
        document.getElementById('dataLimite').setAttribute('value', ofertas[i]['dataLimite']);
        }
    }

  

}

function appenSelect() {
    loadOfertasUserFromLocalSorage();
    var i = 0;
    var count=0;
    var select = document.createElement("select");
    select.setAttribute('id','selectLoad');
    for (i = 0; i < ofertas.length; ++i) {
        var optionTemp = document.createElement("option");
        optionTemp.value = ofertas[i]['tituloOferta'];
        optionTemp.innerHTML = ofertas[i]['tituloOferta'];
        select.appendChild(optionTemp);
        count++;
    }
    if(count!=0){
    document.getElementById('teste').appendChild(select);
    document.getElementById("selectLoad").selectedIndex = -1;
    document.getElementById('selectLoad').addEventListener('change', preencherOferta);
    }

}

function saveOferta() {
    var categoria = document.getElementById('categoria').value;
    var tituloOferta = document.getElementById('tituloOferta').value;
    var informacaoOferta = document.getElementById('informacaoOferta').value;
    var funcaoOferta = document.getElementById('funcaoOferta').value;
    var salario = document.getElementById('salario').value;
    var requisitos = document.getElementById('requisitos').value;
    var regiao = document.getElementById('regiao').value;
    var idEmpregador = document.getElementById('idEmpregador').value;
    var tipoOferta = document.getElementById('tipoOferta').value;
    var dataLimite = document.getElementById('dataLimite').value;
    if (categoria === null || categoria === "" ||
            tituloOferta === null || tituloOferta === "" ||
            informacaoOferta === null || informacaoOferta === "" ||
            funcaoOferta === null || funcaoOferta === "" ||
            salario === null || salario === "" ||
            idEmpregador === null || idEmpregador === "" ||
            tipoOferta === null || tipoOferta === "" ||
            dataLimite === null || dataLimite === "") {
        alert("Um ou mais dos campos estão vazios!!!");
    } else {
        var oferta = {categoria: categoria, tituloOferta: tituloOferta,
            informacaoOferta: informacaoOferta, funcaoOferta: funcaoOferta, salario: salario,
            requisitos: requisitos, regiao: regiao, idEmpregador: idEmpregador,
            tipoOferta: tipoOferta, dataLimite: dataLimite};

        ofertas.push(oferta);
        guardarOfertasStorage();
        location.reload();
    }

}


function initEvents() {

    document.getElementById('guardarTemp').addEventListener('click', saveOferta);
    
    



}

document.addEventListener('DOMContentLoaded', initEvents);
document.addEventListener('DOMContentLoaded', appenSelect);
