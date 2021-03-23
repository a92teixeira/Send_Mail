<!DOCTYPE html>
<html lang="pt-br">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>App Send Mail</title>

   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
   
<div class="container">
   <div class="py-3 text-center">
      <img src="img/logo.png" alt="">
      <h2>Send Mail</h2>
      <p class="lead">Seu app de envio de emails particular</p>
   </div>

   <div class="row">  
      <div class="col-md-12">
         <div class="card-body font-weight-bold">
            <form action="processa_email.php" method="post">
               <div class="form-group">
                  <label for="para">Para:</label>
                  <input type="text" class="form-control" placeholder="Ex: a92teixeira@gmail.com" name="para">
               </div>
               
               <div class="form-group">
                  <label for="assusnto">Assunto:</label>
                  <input type="text" class="form-control" placeholder="Assunto do email" name="assunto">
               </div>
               
               <div class="form-group">
                  <label for="mensagem">Mensagem:</label>
                  <textarea name="mensagem" id="" cols="" rows="" class="form-control"></textarea>
               </div>

               <button type="submit" class="btn btn-primary form-control">Enviar</button>
            
            </form>
         </div>
      </div>

   </div>

</div><!--FIM CONTAINER-->


</body>
</html>