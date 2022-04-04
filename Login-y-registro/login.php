<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CLIMA INICIO SESIÓN</title>
    
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">


    <link rel="stylesheet" href="assets/css/estilos.css">
</head>
<body>

        <main>

            <div class="contenedor__todo">
                <div class="caja__trasera">
                    <div class="caja__trasera-login">
                        <h3>¿Ya tienes una cuenta?</h3>
                        <p>Inicia sesión para entrar en la página</p>
                        <button id="btn__iniciar-sesion">Iniciar Sesión</button>
                    </div>
                    <div class="caja__trasera-register">
                        <h3>¿Aún no tienes una cuenta?</h3>
                        <p>Regístrate para que puedas iniciar sesión</p>
                        <button id="btn__registrarse">Regístrarse</button>
                    </div>
                </div>

                <!--Formulario de Login y registro-->
                <div class="contenedor__login-register">
                    <!--Login-->
                    <form action="" class="formulario__login">
                        <h2>Iniciar Sesión</h2>
                        <input type="email" placeholder="Correo Electronico">
                        <input type="password" placeholder="Contraseña">
                        <button>Entrar</button>
                        <div>
                        <!DOCTYPE html>
                        <html lang="en">
                          <head>
                            <meta charset="utf-8">
                            <meta name="viewport" content="width=device-width, initial-scale=1">
                            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
                            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
                            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
                            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
                          </head>
                          <style>
                        
                        </style>
                        <body>
                        
                            <div class="fb-login-button" data-width="" data-size="large" data-button-type="continue_with" data-layout="default" data-auto-logout-link="false" data-use-continue-as="false"scope="public_profile,email" onlogin="checkLoginState();"></div>
                        <div id="status">
                        </div>
                        
                        <!-- Load the JS SDK asynchronously -->
                        <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js"></script>
                          </div>
                          <script>
                        
                          function statusChangeCallback(response) {  // Called with the results from FB.getLoginStatus().
                            console.log('statusChangeCallback');
                            console.log(response);                   // The current login status of the person.
                            if (response.status === 'connected') {   // Logged into your webpage and Facebook.
                              testAPI();  
                            } else {                                 // Not logged into your webpage or we are unable to tell.
                              document.getElementById('status').innerHTML = '' +
                                '';
                            }
                          }
                        
                        
                          function checkLoginState() {               // Called when a person is finished with the Login Button.
                            FB.getLoginStatus(function(response) { 
                              window.location.replace("../clima/index.php");  // See the onlogin handler
                              statusChangeCallback(response);
                            });
                          }
                        
                        
                          window.fbAsyncInit = function() {
                            FB.init({
                              appId      : '521345982757558',
                              cookie     : true,                     // Enable cookies to allow the server to access the session.
                              xfbml      : true,                     // Parse social plugins on this webpage.
                              version    : 'v12.0'           // Use this Graph API version for this call.
                            });
                        
                        
                            FB.getLoginStatus(function(response) {   // Called after the JS SDK has been initialized.
                              statusChangeCallback(response);        // Returns the login status.
                            });
                          };
                         
                          function testAPI() {                      // Testing Graph API after login.  See statusChangeCallback() for when this call is made.
                            console.log('Welcome!  Fetching your information.... ');
                            FB.api('/me', function(response) {
                              console.log('Successful login for: ' + response.name);
                              document.getElementById('status').innerHTML =
                                'Thanks for logging in, ' + response.name + '!';
                            });
                          }
                        
                        </script>
                        
                        
                        <!-- The JS SDK Login Button -->
                        
                        
                        
                        
                        <script>
                          $(document).ready(function(){
                            $("#submit").click(function(){
                              var email = $("#em").val();
                              var password = $("#pwd").val();
                        
                              if (email == "" || password == ""){
                                $("#error").text("Campos Vacios");
                                $("#error").css("color","red");
                        
                              }
                              else
                               {
                                $.post("../controller/login.php",
                               {
                                email: email,
                                password: password
                               },
                               function(data,status){
                        
                                var obj = JSON.parse(data);
                        
                                 if(obj.estado == true)
                                 {
                                  window.location.replace("../APICLIMA/index.php");
                                 }
                                 else if(obj.estado == false){
                                  $("#error").text("Error al iniciar sesion");
                                  $("#error").css("color","red");
                                 };
                                });
                              };
                            });
                          });        
                        </script>
                        </body>
                        </html>
                    </div>
                    <div>
                        
                    </div>
                    </form>



        </main>

        <script src="assets/js/script.js"></script>
</body>
</html>