<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link rel="stylesheet" href="style.css">

<!--  <style>
    body {
      background-image: url('https://wallpapers.com/images/hd/1920x1080-red-wallpapers-f6nvhm4pj4jzq8dx.jpg');
      background-size: cover;
      background-position: center;
      background-attachment: fixed;
      margin: 0;
      height: 100vh;
    }
  </style> -->
</head>
<body>
  <div class="container">

    <!-- Lado esquerdo - Cadastro -->
    <div class="login-side">
      <h2>Novo por aqui?</h2>
      <p>Crie sua conta agora</p>
      <button id="btnCadastro">Cadastrar</button>
    </div>

    <!-- Lado direito - Login -->
    <div class="register-side">
      <h2>Faça seu login</h2>
      <form id="formLogin">
        <div class="input-group">
          <label for="emailLogin">E-mail</label>
          <div class="input-box">
            <img src="./envelope def def.png" alt="">
            <input type="email" id="emailLogin" placeholder="Digite seu e-mail" required>
          </div>
        </div>

        <div class="input-group">
          <label for="senhaLogin">Senha</label>
          <div class="input-box">
            <img src="./lock def def.png" alt="">
            <input type="password" id="senhaLogin" placeholder="Digite sua senha" required>
          </div>
        </div>

        <p id="erroLogin" style="color: rgba(255, 0, 0, 0.815); font-size: 13px; text-align: center; display: none;">
          Usuário ou senha incorretos!
        </p>

        <button type="submit">Entrar</button>
      </form>
    </div>
  </div>

<body class="fundo"></body>

  <script src="java.js"></script>
</body>
</html>