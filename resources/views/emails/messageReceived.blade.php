<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <title>Usuario registrado</title>
</head>
<body>
    <nav class="navbar navbar-dark bg-dark">
        <a class="navbar-brand" href="127.0.0.1:8000/home">CODEWAY</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav mr-auto">nada en especial</ul>
            <span class="navbar-text">
                usuario registrado
            </span>
        </div>
    </nav>
    <main>
        <div class="container">
            <div class="card">
                <div class="card-header">
                    <h1 class="card-title">Registro de nuevo usuario en el sistema CODEWAY</h1>
                </div>
                <div class="card body">
                    <p><strong>Un nuevo usuario ha sido registrado en el sistema, estos son los datos :</strong></p>
                    <br>
                    <p><strong>Nombre :</strong></p>
                    <h5 class="text-muted">{{ $msg->nameUser }} {{ $msg->firstLastname }} {{ $msg->secondLastname }}</h5>
                    <br>
                    <p><strong>Nombre de usuario :</strong></p>
                    <h5 class="text-muted">{{ $msg->name }}</h5>
                    <br>
                    <p><strong>Email :</strong></p>
                    <h5 class="text-muted">{{ $msg->email }}</h5>
                    <br>
                    <p><strong>Email corporativo :</strong></p>
                    <h5 class="text-muted">{{ $msg->corporative }}</h5>
                    <br>
                    <p><strong>Telefono :</strong></p>
                    <h5 class="text-muted">{{ $msg->phone }}</h5>
                    <br>
                </div>
                <div class="card-footer text-muted">
                    <h6 class="text-monospace">este es un email de confirmación</h6>
                </div>
            </div>
        </div>
    </main>
    {{-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script> --}}
</body>
</html>
