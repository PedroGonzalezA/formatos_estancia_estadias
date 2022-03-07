<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <link href="/dist/output.css" rel="stylesheet">

    <style>
        .border-red-500 { border-color: #f56565; }
        .text-red-600 { color: #e53e3e; }
        .bg-red-200 { background-color: #fed7d7; }
    </style>
</head>
<body>
    <section class="vh-100" style="background-color: #9A616D;">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col col-xl-10">
                <div class="card" style="border-radius: 1rem;">
                <div class="row g-0">
                    <div class="col-md-6 col-lg-5 d-none d-md-block">
                    <img
                        src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/img1.webp"
                        alt="login form"
                        class="img-fluid" style="border-radius: 1rem 0 0 1rem;"
                    />
                    </div>
                    <div class="col-md-6 col-lg-7 d-flex align-items-center">
                    <div class="card-body p-4 p-lg-5 text-black">

                    <form method="POST" action="">
                        @csrf

                        <div class="d-flex align-items-center mb-3 pb-1">
                            <i class="fas fa-cubes fa-2x me-3" style="color: #ff6219;"></i>
                            <img src="data:image/png;base64,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" alt="">
                        </div>

                        <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Ingrese a su cuenta</h5>

                        <div class="form-outline mb-4">
                            <input type="text" id="form2Example17" class="form-control form-control-lg"
                            name="name" />
                            <label class="form-label" for="form2Example17">Matricula</label>
                        </div>

                        <div class="form-outline mb-4">
                            <input type="password" id="form2Example27" class="form-control form-control-lg" name="password"/>
                            <label class="form-label" for="form2Example27">Contraseña</label>
                        </div>

                        @error('message')
                            <p class="border border-red-500 rounded-md bg-red-200 w-full text-red-600 p-2 my-2">{{ $message }}</p>
                        @enderror

                        <div class="pt-1 mb-4">
                            <button class="btn btn-dark btn-lg btn-block" type="submit">Login</button>
                        </div>
                        <p class="mb-5 pb-lg-2" style="color: #393f81;">¿Tienes una cuenta? <a href="{{ route('register.index') }} " style="color: #393f81;">Registrate aquí</a></p>
                    </form>

                    </div>
                    </div>
                </div>
                </div>
            </div>
            </div>
        </div>
    </section>
</body>
</html>