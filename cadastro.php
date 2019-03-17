<!DOCTYPE html>
<html>
   <head>
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
      <link rel="stylesheet" type="text/css" href="css/navbar.css">
      <link rel="stylesheet" type="text/css" href="css/cadastro.css">
      <link rel="stylesheet" type="text/css" href="css/responsividade.css">
      <title> Gps Social</title>
      <style>
         #caixa-out{
         width: 100%;
          height: 100%;
          position: fixed;
          background: #FFF;
          overflow: hidden;
          z-index: 9999; 
          top: 0; 
          left: 0;
          right: 0;
          bottom: 0;
          display: none;
         }
         .box-animacao{
          background: #FFF;
          width: 200px;
          height: 200px;
          position: absolute;
          top: 25%;
          left: 50%;
          transform: translate(-50%, 50%);
          overflow: hidden;
         }
         .box-animacao .b{
          width: 120px;
          height: 120px;
          border-radius: 50%;
          border-left: 4px solid;
          border-right: 4px solid;
          border-top: 4px solid transparent !important;
          border-bottom: 4px solid transparent !important;
          position: absolute;
          top: 50%;
          left: 50%;
          transform: translate(-50%, -50%);
          animation: ro 2s infinite;
         }
         .box-animacao .b1{
         border-color: #4a69bd;
         width: 120px;
         height: 120px;
         }
         .box-animacao .b2{
         border-color: #f6b93b;
         width: 100px;
         height: 100px;
         animation-delay: 0.2s;
         }
         .box-animacao .b3{
         border-color: #2ecc71;
         width: 80px;
         height: 80px;
         animation-delay: 0.4s;
         }
         .box-animacao .b4{
         border-color: #34495e;
         width: 60px;
         height: 60px;
         animation-delay: 0.6s;
         }
         @keyframes ro {
         0%{
         transform: translate(-50%, -50%) rotate(0deg);
         }
         50%{
         transform: translate(-50%, -50%) rotate(-180deg);
         }
         100%{
         transform: translate(-50%, -50%) rotate(0deg);
         }
         }
      </style>
   </head>
   <body>
      <nav class="navbar navbar-dark bg-dark">
         <div class="container">
            <a class="navbar-brand" href="index.php">Gps Social</a>
            <div class="row">
               <div class="col-md-2"></div>
               <div class="col-md-2"></div>
               <div class="col-md-4"> <a href="login.php" class="fonte_branca">Fale conosco</a></div>
               <div class="col-md-4"><a href="quem-somos.php" class="fonte_branca">Quem somos</a></div>
            </div>
         </div>
      </nav>
      <form class="box" action="cadastro.php" method="post" id="cadastro">
         <h1>Cadastro</h1>
         <input type="text" name="nome" placeholder="Nome Completo" id="nome">
         <input type="text" name="email" placeholder="E-mail" id="email">
         <input type="text" name="telefone" placeholder="Telefone" id="telefone">
         <input type="password" name="senha" placeholder="Senha" id="senha">
         <input type="password" name="confirmar_senha" placeholder="Confirmar Senha" id="confirmar_senha">
         <input type="submit" name="" value="Cadastrar">
         <a href="login.html" class="texto">Voltar</a>
      </form>
      <div id="caixa-out">
         <div class="box-animacao">
            <div class="b b1"></div>
            <div class="b b2"></div>
            <div class="b b3"></div>
            <div class="b b4"></div>
         </div>
      </div>

      <script src="https://code.jquery.com/jquery-3.3.1.js"></script>

      <script>
        $(document).ready(function(){
          // Formulário submit
          $('#cadastro').on('submit', function (){
            $nome = $('#nome').val();
            $email = $('#email').val();
            $telefone = $('#telefone').val(); 
            $senha = $('#senha').val();
            $confirmar_senha = $('#confirmar_senha').val();

            if ($senha == $confirmar_senha){
              $.ajax({
              url: 'src/data/processo_cadastro.php',
              type: 'POST',
              data: {
                nome: $nome,
                email: $email,
                telefone: $telefone,
                senha: $senha
              },
              beforeSend: function(){
                $('#caixa-out').css({display: 'block'});
              },
              success: function (data){
                $('#caixa-out').css({display: 'none'});
                if(data == 'sucesso'){
                  // Redirecionar para página
                  alert('Cadastrado com sucesso');
                }else{
                  alert('Erro ao realizar o cadastro');
                }
                 
              },
              error: function (data){
                $('#caixa-out').css({display: 'none'});
                    alert(data);  
              }
            });
            }else{
              alert('Senhas diferentes');
            }
            return false;
          });
        
        });
      </script>
   </body>

</html>