function changeExtensaoReparo(valor) {
    var status = document.getElementById('extensaoReparo').disabled;
  
    if (valor == 'sim' && !status) {
      document.getElementById('extensaoReparo').disabled = true;
    } else {
      document.getElementById('extensaoReparo').disabled = false;
    }
}

function changeExtensaoLimpeza(valor) {
    var status = document.getElementById('extensaoLimpeza').disabled;
  
    if (valor == 'sim' && !status) {
      document.getElementById('extensaoLimpeza').disabled = true;
    } else {
      document.getElementById('extensaoLimpeza').disabled = false;
    }
}

function changeExtensaoImplantar(valor) {
    var status = document.getElementById('extensaoImplantar').disabled;
  
    if (valor == 'sim' && !status) {
      document.getElementById('extensaoImplantar').disabled = true;
    } else {
      document.getElementById('extensaoImplantar').disabled = false;
    }
}

/*função para garantir mútua exclusividade entre o Ok e ou outros atributos - Ok marcado -> desmarca os outros */
function okClicado(valor){
  var statusOk = document.getElementById('ok').checked;

  if (valor == 'sim' && statusOk) {
    if (document.getElementById('reparar').checked){
      document.getElementById('reparar').checked = false;
      changeExtensaoReparo(valor);
    }
    if (document.getElementById('limpeza').checked){
      document.getElementById('limpeza').checked = false;
      changeExtensaoLimpeza(valor);
    }
    if (document.getElementById('implantar').checked){
      document.getElementById('implantar').checked = false;
      changeExtensaoImplantar(valor);
    }    
  }
}

/*Se qualquer opção for marcada -> desmarca o ok */
function clicado(valor,id){
  var status = document.getElementById(id).checked;    

  if (valor == 'sim' && status) {
    document.getElementById('ok').checked = false;  
  }
}