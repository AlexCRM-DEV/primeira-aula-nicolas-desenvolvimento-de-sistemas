function somar() {
  let valor_1 = Number(document.getElementById('valor_1').value);
  let valor_2 = Number(document.getElementById('valor_2').value);

  let soma = valor_1 + valor_2;

  document.getElementById('resultado').textContent = `Resultado da soma: ${soma}`;
}

function subtrair() {
  let valor_1 = Number(document.getElementById('valor_1').value);
  let valor_2 = Number(document.getElementById('valor_2').value);

  let subtracao = valor_1 - valor_2;

  document.getElementById('resultado').textContent = `Resultado da subtração: ${subtracao}`;
}

function dividir() {
  let valor_1 = Number(document.getElementById('valor_1').value);
  let valor_2 = Number(document.getElementById('valor_2').value);

  if (valor_2 === 0) {
    document.getElementById('resultado').textContent = 'Erro: Divisão por zero não é permitida.';
    return;
  }

  let divisao = valor_1 / valor_2;

  document.getElementById('resultado').textContent = `Resultado da divisão: ${divisao}`;
}

function multiplicar() {
  let valor_1 = Number(document.getElementById('valor_1').value);
  let valor_2 = Number(document.getElementById('valor_2').value);

  let multiplicacao = valor_1 * valor_2;

  document.getElementById('resultado').textContent = `Resultado da multiplicação: ${multiplicacao}`;
}
