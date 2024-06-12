<?php
    require_once('./conexion.php');
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $sql = "SELECT * FROM usuarios WHERE correo = '$email'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    if($result->num_rows > 0){
        if(password_verify($pass, $row['contraseña'])){
            session_start();
            $_SESSION['id'] = $row['id'];
            $_SESSION['nombre'] = $row['nombre'];
            $_SESSION['apellido'] = $row['apellido'];
            $_SESSION['pass'] = $pass;
            $_SESSION['email'] = $row['correo'];
            $_SESSION['fechaNacimiento'] = $row['fechadenacimiento'];
            $_SESSION['rol'] = $row['idRol'];
            $_SESSION['start_time'] = time();
            header("Location: ../index.php");
        }else{
            echo "
                <script>
                    alert('Contraseña incorrecta');
                    window.location = '../login.php';
                </script>
            ";
        }
    }else{
        echo "
            <script>
                alert('Usuario no encontrado');
                window.location = '../login.php';
            </script>
        ";
    }
?>
<section class="vh-100 gradient-custom">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card bg-dark text-white" style="border-radius: 1rem;">
          <div class="card-body p-5 text-center">

            <div class="mb-md-5 mt-md-4 pb-5">

              <h2 class="fw-bold mb-2 text-uppercase">Inicio de Sesión</h2>
              <p class="text-white-50 mb-5">Por favor ingrese su correo electrónico y contraseña.</p>

              <form action="./db/login.php" method="post">
                <div class="form-outline form-white mb-4">
                  <input type="email" id="typeEmailX" name="email" class="form-control form-control-lg" />
                  <label class="form-label" for="typeEmailX">Correo Electrónico</label>
                </div>

                <div class="form-outline form-white mb-4">
                  <input type="password" id="typePasswordX" name="pass" class="form-control form-control-lg" />
                  <label class="form-label" for="typePasswordX">Contraseña</label>
                </div>

                <p class="small mb-5 pb-lg-2"><a class="text-white-50" href="./recuperar-contrasena.php">¿Olvidó su contraseña?</a></p>

                <button class="btn btn-outline-light btn-lg px-5" type="submit">Iniciar Sesión</button>
              </form>

              <div class="d-flex justify-content-center text-center mt-4 pt-1">
                <a href="#!" class="text-white"><i class="fab fa-facebook-f fa-lg"></i></a>
                <a href="#!" class="text-white"><i class="fab fa-twitter fa-lg mx-4 px-2"></i></a>
                <a href="#!" class="text-white"><i class="fab fa-google fa-lg"></i></a>
              </div>

            </div>

            <div>
              <p class="mb-0">¿No tienes una cuenta? <a href="./registro.php" class="text-white-50 fw-bold">Registrarse</a>
              </p>
              
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
</section>


<?php
require_once('./layout/footer.php');
?>