const alunos = ["lorenzo , Gabriel , amanda"]

console.log(alunos)

function somar(n1, n2){
    return n1 + n2
}

function BomDia(nome){
    return "bom dia meu querido " + nome
}

console.log(somar(10, 5))
console.log(somar(12, 7))
console.log(BomDia("Alex"))

let titulo = document.getElementById("titulo")//.innerHTML; sem ponto a tag inteira, com ponto só o texto

titulo.innerText = "alterando o texto pelo JavaScript"

console.log(titulo)


function sendText(){
    let texto = document.getElementById("texto").value
    console.log(texto) // ou alert(texto)
}

function somarNumeros(){
    let n1 = Number (document.getElementById("n1").value)
    let n2 = Number (document.getElementById("n2").value)
    alert(n1 + n2)
} 

function subtrairNumeros(){
    let n1 = Number (document.getElementById("n1").value)
    let n2 = Number (document.getElementById("n2").value)
    alert(n1 - n2)
} 

function dividirNumeros(){
    let n1 = Number (document.getElementById("n1").value)
    let n2 = Number (document.getElementById("n2").value)
    alert(n1 / n2)
} 

function multiplicarNumeros(){
    let n1 = Number (document.getElementById("n1").value)
    let n2 = Number (document.getElementById("n2").value)
    alert(n1 * n2)
} 