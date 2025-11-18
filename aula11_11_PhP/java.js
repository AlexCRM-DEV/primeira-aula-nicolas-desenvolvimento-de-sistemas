// Redirecionamentos
const btnLogin = document.getElementById("btnLogin");
const btnCadastro = document.getElementById("btnCadastro");

if (btnLogin) {
  btnLogin.addEventListener("click", () => {
    window.location.href = "login.html";
  });
}

if (btnCadastro) {
  btnCadastro.addEventListener("click", () => {
    window.location.href = "index.html";
  });
}

// Cadastro
const formCadastro = document.getElementById("formCadastro");
if (formCadastro) {
  formCadastro.addEventListener("submit", function (e) {
    e.preventDefault();

    const nome = document.getElementById("nome").value.trim();
    const email = document.getElementById("email").value.trim();
    const senha = document.getElementById("senha").value;
    const confirmarSenha = document.getElementById("confirmarSenha").value;

    if (!nome || !email || !senha || !confirmarSenha) {
      alert("Por favor, preencha todos os campos!");
      return;
    }

    if (senha !== confirmarSenha) {
      alert("As senhas não coincidem!");
      return;
    }

    // Salva os dados no localStorage (simples)
    localStorage.setItem("usuarioEmail", email);
    localStorage.setItem("usuarioSenha", senha);

  
    window.location.href = "login.html";
  });
}

// Login
const formLogin = document.getElementById("formLogin");
if (formLogin) {
  formLogin.addEventListener("submit", function (e) {
    e.preventDefault();

    const emailLogin = document.getElementById("emailLogin").value.trim();
    const senhaLogin = document.getElementById("senhaLogin").value;

    const emailSalvo = localStorage.getItem("usuarioEmail");
    const senhaSalva = localStorage.getItem("usuarioSenha");

    const erroMsg = document.getElementById("erroLogin");

    if (emailLogin === emailSalvo && senhaLogin === senhaSalva) {
      alert("Login realizado com sucesso!");
      erroMsg.style.display = "none";
      // Aqui você poderia redirecionar para outra página (dashboard, por exemplo)
    } else {
      erroMsg.style.display = "block";
    }
  });
}