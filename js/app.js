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

/*Função para permitir que apenas umas das opções de trinca/fissura e tampa sejam marcadas(função generica)*/
function check(id,id_desmarcar){
  var status = document.getElementById(id).checked;    
      if (status){
        document.getElementById(id_desmarcar).checked = false; 
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
      document.getElementById('fissuraTrincaCDM').checked = false;   
      document.getElementById('fissuraTrincaM').checked = false;  
      document.getElementById('tampaDanificadaM').checked = false;
      document.getElementById('tampaInexM').checked = false; 
    }
    if(tipoOK == 'okJ'){
      document.getElementById('assoreadoJ').checked = false;  
      document.getElementById('afogadoJ').checked = false;   
      document.getElementById('limpezaJ').checked = false;   
      document.getElementById('testaAlaDanificadaJ').checked = false;   
      document.getElementById('caixaDanificadaJ').checked = false;   
      document.getElementById('erosaoJ').checked = false;   
      document.getElementById('tubulacaoDanificadaJ').checked = false;   
      document.getElementById('fissuraTrincaCDJ').checked = false;   
      document.getElementById('fissuraTrincaJ').checked = false;  
      document.getElementById('tampaDanificadaJ').checked = false;
      document.getElementById('tampaInexJ').checked = false;   
    }
  }
}  
  

function verificaCheckboxMontante(){
  var cm1 = document.getElementById('assoreadoM').checked = false;  
  var cm2 = document.getElementById('afogadoM').checked = false;   
  var cm3 = document.getElementById('limpezaM').checked = false;   
  var cm4 = document.getElementById('testaAlaDanificadaM').checked = false;   
  var cm5 = document.getElementById('caixaDanificadaM').checked = false;   
  var cm6 = document.getElementById('erosaoM').checked = false;   
  var cm7 = document.getElementById('tubulacaoDanificadaM').checked = false;  
  var cm8 = document.getElementById('fissuraTrincaCDM').checked = false;   
  var cm9 = document.getElementById('fissuraTrincaM').checked = false;  
  var cm10 = document.getElementById('tampaDanificadaM').checked = false;
  var cm11 = document.getElementById('tampaInexM').checked = false; 

  if (cm1 || cm2 || cm3 || cm4 || cm5 || cm6 || cm7 || cm8 || cm9 || cm10 || cm11){
    return true;
  }else {
    alert("É necessário que ao menos um dos checkboxes seja marcado!");
    return false;
  }
}

function verificaCheckboxJusante(){
  var cm1 = document.getElementById('assoreadoJ').checked = false;  
  var cm2 = document.getElementById('afogadoJ').checked = false;   
  var cm3 = document.getElementById('limpezaJ').checked = false;   
  var cm4 = document.getElementById('testaAlaDanificadaJ').checked = false;   
  var cm5 = document.getElementById('caixaDanificadaJ').checked = false;   
  var cm6 = document.getElementById('erosaoJ').checked = false;   
  var cm7 = document.getElementById('tubulacaoDanificadaJ').checked = false;  
  var cm8 = document.getElementById('fissuraTrincaCDJ').checked = false;   
  var cm9 = document.getElementById('fissuraTrincaJ').checked = false;  
  var cm10 = document.getElementById('tampaDanificadaJ').checked = false;
  var cm11 = document.getElementById('tampaInexM').checked = false; 

  if (cm1 || cm2 || cm3 || cm4 || cm5 || cm6 || cm7 || cm8 || cm9 || cm10 || cm11){
    return true;
  }else {
    alert("É necessário que ao menos um dos checkboxes seja marcado!");
    return false;
  }
}

function verificaCheckbox(){
  verificaCheckboxMontante();
  verificaCheckboxJusante();
}
