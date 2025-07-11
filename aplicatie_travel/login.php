<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Login</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <!-- <div class="col-lg-6 d-none d-lg-block bg-login-image"></div> -->
                            <div class="col-lg-8 w-100 mx-auto">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                                    </div>
                                    <form id="formLoginId" class="user" action="/backend_travel/users/login.php" method="POST">
                                        <div class=" form-group">
                                            <input type="email" class="form-control form-control-user"
                                                name="InputEmail" id="InputEmail" aria-describedby="emailHelp"
                                                placeholder="Enter Email Address...">
                                            <p id="errors_email" class="small"></p>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user"
                                                name="InputPassword"
                                                id="InputPassword" placeholder="Password">
                                            <p id="errors_password" class="small"></p>
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input" id="customCheck">
                                                <label class="custom-control-label" for="customCheck">Remember
                                                    Me</label>
                                            </div>
                                        </div>
                                        <button id="registerButton" type="submit" class=" btn btn-primary btn-user btn-block">
                                            Login
                                        </button>

                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="forgot-password.html">Forgot Password?</a>
                                    </div>
                                    <div class="text-center">
                                        <a class="small" href="register.php">Create an Account!</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>
<script>
    document.addEventListener("DOMContentLoaded", () => {
        var form = document.getElementById("formId");
        var errorMessages = {
            email: document.getElementById("errors_email"),
            password: document.getElementById("errors_password"),
        };

        document.getElementById("registerButton").addEventListener("click", (event) => {
            event.preventDefault(); // Previne redirecționarea automată

            // Resetează mesajele de eroare
            Object.values(errorMessages).forEach(errorMessage => {
                errorMessage.innerHTML = "";
            });

            // Obține valorile câmpurilor din formular
            const formData = {
                email: $('#InputEmail').val(),
                password: $('#InputPassword').val()
            };

            // Reguli de validare pentru fiecare câmp
            const validationRules = {
                email: value => !/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(value) ? "Email invalid" : "",
                password: value => value.length < 8 ? "Parola trebuie să aibă cel puțin 8 caractere" : "",
            };

            let isValid = true;

            // Verifică fiecare câmp în funcție de regula sa
            Object.keys(formData).forEach(key => {
                const errorMessage = validationRules[key](formData[key]);
                if (errorMessage) {
                    errorMessages[key].innerHTML = errorMessage;
                    isValid = false;
                }
            });

            if (isValid) {
                alert("Succes!");
                // Manual, trimite formularul sau redirecționează la login.html
                window.location.href = "forum.php";
                // Sau poți trimite formularul cu form.submit();
            }
        });

    });
    $('#registerButton').on('click', function() {
        console.log("OK");
        var formData = {
            InputEmail: $('#InputEmail').val(),
            InputPassword: $('#InputPassword').val(),
        };
        console.log($('#InputEmail').val());
        $.ajax({
            type: "POST",
            url: 'http://localhost/backend_travel/users/login.php',
            data: formData,
            success: function(response) {
                console.log("A mers");
                window.location.href = 'forum.php';
            },
            error: function(response) {
                console.log("NU A mers");
                // window.location.href = 'login.php?invalid';
            }
        })
    });
</script>

</html>