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

/* funções paraa drenagem profunda */

/*Se qualquer opção for marcada -> desmarca o ok */
function clicadoDP(id, tipo){
  var status = document.getElementById(id).checked;    
  
    if (status && tipo=="jusante") {
      document.getElementById('okJ').checked = false;  
    }

    if (status && tipo=="montante") {
      document.getElementById('okM').checked = false;  
    }
  }

/*função para garantir mútua exclusividade entre o Ok e ou outros atributos - Ok marcado -> desmarca os outros */
function okClicadoDP(tipoOK){
  var statusOk = document.getElementById(tipoOK).checked;
  
  if (statusOk) {
    if(tipoOK == 'okM'){
      document.getElementById('assoreadoM').checked = false;  
      document.getElementById('afogadoM').checked = false;   
      document.getElementById('limpezaM').checked = false;   
      document.getElementById('testaAlaDanificadaM').checked = false;   
      document.getElementById('caixaDanificadaM').checked = false;   
      document.getElementById('erosaoM').checked = false;   
      document.getElementById('tubulacaoDanificadaM').checked = false;   
      document.getElementById('fissuraTrincaM').checked = false;   
      document.getElementById('tampaDanificadaInexM').checked = false;    
    }
    if(tipoOK == 'okJ'){
      document.getElementById('assoreadoJ').checked = false;  
      document.getElementById('afogadoJ').checked = false;   
      document.getElementById('limpezaJ').checked = false;   
      document.getElementById('testaAlaDanificadaJ').checked = false;   
      document.getElementById('caixaDanificadaJ').checked = false;   
      document.getElementById('erosaoJ').checked = false;   
      document.getElementById('tubulacaoDanificadaJ').checked = false;   
      document.getElementById('fissuraTrincaJ').checked = false;   
      document.getElementById('tampaDanificadaInexJ').checked = false;    
    }
  }
}  
  