<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
    <link href="/css/login.css" rel="stylesheet"> 
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>

<body>
    <div class="wrapper fadeInDown">
        <div id="formContent">
            <!-- Tabs Titles -->

            <!-- Icon -->
            <div class="fadeIn first">
                <ion-icon name="person-outline" id="icon"></ion-icon>
                
            </div>

            <!-- Login Form -->
            <form action="{{ route('register') }}" enctype="multipart/form-data" method="POST">
            @csrf
                <input type="file" id="thumb" class="fadeIn second" name="thumb">

                <input type="text" id="firs-name" class="fadeIn second" name="firstName" placeholder="Digite o seu primeiro nome">
                <input type="text" id="last-name" class="fadeIn second" name="lastName" placeholder="Digite o seu ultimo nome">

                <input type="email" id="email" class="fadeIn second" name="email" placeholder="Digite o seu email">
                
                <input type="password" id="password" class="fadeIn third" name="password" placeholder="digite a sua senha">
                <input type="submit" class="fadeIn fourth" value="Cadastrar">
            </form>

            <!-- Remind Passowrd -->
            <div id="formFooter">
                <a class="underlineHover" href="#">Forgot Password?</a>
            </div>

        </div>
    </div>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>

</html>