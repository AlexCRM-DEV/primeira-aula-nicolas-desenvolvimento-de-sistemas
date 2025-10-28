function somar() {
    let valor_1 = Number(document.getElementById('valor_1').value);
    let valor_2 = Number(document.getElementById('valor_2').value);
  
    let soma = valor_1 + valor_2;
  
    document.getElementById('resultado').textContent = `Resultado da soma: ${soma}`;
  }