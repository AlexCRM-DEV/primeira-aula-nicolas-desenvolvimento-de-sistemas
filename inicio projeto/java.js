document.getElementById("formCadastro").addEventListener("submit", function(e) {
    e.preventDefault();
  
    const nome = document.getElementById("nome").value;
    const email = document.getElementById("email").value;
    const senha = document.getElementById("senha").value;
  
    if (!nome || !email || !senha) {
      alert("Por favor, preencha todos os campos!");
      return;
    }
  
    // Exemplo de validação simples
    alert(`Conta criada com sucesso!\nBem-vindo(a), ${Alex}!`);
    document.getElementById("formCadastro").reset();
  });
  
  
  