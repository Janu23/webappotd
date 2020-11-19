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
  