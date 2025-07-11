<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Register</title>

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

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <!-- <div class="col-lg-5 d-none d-lg-block bg-register-image"></div> -->
                    <div class=" col-lg-8 w-100 mx-auto">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                            </div>
                            <form id="formId" class="user" action="/backend_travel/users/register.php" method="POST">
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" class="form-control form-control-user" name="FirstName" id="FirstName"
                                            placeholder="First Name">
                                        <p id="errors_name" class="small"></p>
                                    </div>

                                    <div class=" col-sm-6">
                                        <input type="text" class="form-control form-control-user" name="LastName" id="LastName"
                                            placeholder="Last Name">
                                        <p id="errors_last_name" class="small"></p>
                                    </div>

                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="email" class="form-control form-control-user" name="InputEmail" id="InputEmail"
                                            placeholder="Email Address">
                                        <p id="errors_email" class="small"></p>
                                    </div>

                                    <div class="col-sm-6">
                                        <input type="text" class="form-control form-control-user" name="InputAddress" id="InputAddress"
                                            placeholder="Address">
                                        <p id="errors_address" class="small"></p>
                                    </div>


                                </div>
                                <div class=" form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="password" class="form-control form-control-user"
                                            name="InputPassword" id="InputPassword" placeholder="Password">
                                        <p id="errors_password" class="small"></p>

                                    </div>
                                    <div class=" col-sm-6">
                                        <input type="password" class="form-control form-control-user"
                                            name="RepeatPassword" id="RepeatPassword" placeholder="Repeat Password">
                                        <p id="errors_reapeat_password" class="small"></p>
                                    </div>
                                </div>
                                <div class=" form-group row">
                                    <!-- <label>Observation</label> -->
                                    <textarea class="form-control " id="exampleAreaObservation" placeholder="Observation"></textarea>
                                </div>
                                <button id="registerButton" type="button" class="btn btn-primary btn-user btn-block">
                                    Register Account
                                </button>
                            </form>
                            <hr>
                            <div class=" text-center">
                                <a class="small" href="forgot-password.html">Forgot Password?</a>
                            </div>
                            <div class="text-center">
                                <a class="small" href="login.html">Already have an account? Login!</a>
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
    // document.addEventListener("DOMContentLoaded", () => {
    //     var form = document.getElementById("formId");
    //     var errorMessages = {
    //         name: document.getElementById("errors_name"),
    //         lastName: document.getElementById("errors_last_name"),
    //         email: document.getElementById("errors_email"),
    //         password: document.getElementById("errors_password"),
    //         address: document.getElementById("errors_address"),
    //         repeatPassword: document.getElementById("errors_reapeat_password")
    //     };

    //     form.addEventListener("submit", (event) => {
    //         Object.values(errorMessages).forEach(errorMessage => {
    //             errorMessage.innerHTML = "";
    //         });
    //         const formData = {
    //             name: form.FirstName.value.trim(),
    //             lastName: form.LastName.value.trim(),
    //             email: form.InputEmail.value.trim(),
    //             password: form.InputPassword.value.trim(),
    //             address: form.InputAddress.value.trim(),
    //             repeatPassword: form.RepeatPassword.value.trim()
    //         };
    //         const validationRules = {
    //             name: value => value === "" ? "Numele este obligatoriu" : "",
    //             lastName: value => value === "" ? "Prenumele este obligatoriu" : "",
    //             email: value => !/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(value) ? "Email invalid" : "",
    //             password: value => value.length < 8 ? "Parola trebuie să aibă cel puțin 8 caractere" : "",
    //             address: value => value === "" ? "Adresa este obligatorie" : "",
    //             repeatPassword: value => value !== formData.password ? "Parolele nu se potrivesc" : ""
    //         };

    //         let isValid = true;
    //         Object.keys(formData).forEach(key => {
    //             const errorMessage = validationRules[key](formData[key]);
    //             if (errorMessage) {
    //                 errorMessages[key].innerHTML = errorMessage;
    //                 isValid = false;
    //             }
    //         });

    //         if (isValid) {
    //             alert("Succes!");
    //             form.submit();
    //         } else {
    //             event.preventDefault();
    //         }
    //     });
    // });
    $('#registerButton').on('click', function() {
        console.log("OK");
        var formData = {
            FirstName: $('#FirstName').val(),
            LastName: $('#LastName').val(),
            InputEmail: $('#InputEmail').val(),
            InputAddress: $('#InputAddress').val(),
            Password: $('#InputPassword').val(),
            RepeatPassword: $('#RepeatPassword').val(),
            Observation: $('#exampleAreaObservation').val()
        };
        $.ajax({
            type: "POST",
            url: 'http://localhost/backend_travel/users/register.php',
            data: formData,
            success: function(response) {
                console.log("A mers");
                window.location.href = 'login.php';
            },
            error: function(response) {
                console.log("NU A mers");
            }
        })
    });
</script>

</html>