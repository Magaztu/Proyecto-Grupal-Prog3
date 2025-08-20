<?php
    class staffVisto{
        function htmlStaff($resultado, $completado){

            
            $html = ""; //Este va a contener un bloque de código html para mandar a la vista
            
            if($completado == TRUE){
                $html = $html . '
                <div class="toast-container position-fixed bottom-0 end-0 p-3">
                <div id="actorToast" class="toast align-items-center text-white bg-success border-0" role="alert" aria-live="assertive" aria-atomic="true">
                    <div class="d-flex">
                        <div class="toast-body">
                            Transacción realizada con éxito...
                        </div>
                        <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                    </div>
                </div>
            </div>

            <script>
            window.addEventListener("DOMContentLoaded", function () {
                const toastLive = document.getElementById("actorToast");
                const toast = new bootstrap.Toast(toastLive);
                toast.show();
            });
            </script>
                ';
            }

            while($fila = $resultado->fetch_assoc()){ //como un cursor, va bajando solo de indices y devuelve el valor de una fila, cuando se acaba da FALSO
  
            $nombre_staff = $fila["nombres_staff"];
            $correo = $fila["email"];
            $id_staff = $fila["staff_id"];
            $llamada = file_get_contents('https://randomuser.me/api/'); //El file_get_contents solo coge el JSON de la api
            $datos = json_decode($llamada, true); //Se transforma en un array
            if(isset($datos['results'][0]['picture']['medium'])){ //Preguntando si la imagen llegó
              $foto = $datos['results'][0]['picture']['medium']; //El JSON tiene JSONs dentro de sí, por eso se llama como array con arrays
            }
            else{
              $foto = "../../recursos-e-imágenes/defaultpfp.png";
            } // La API no parece ser de alta disponibilidad y a veces se cae, por eso el default foto pfp
            $concatenar = '
            
                  <div class="col-12 staff-card">
                    <div class="card text-center">
                        <div class="card-body">
                        <form action="" method="post">
                        <div class="d-grid gap-2 d-md-flex justify-content-md-between">
                            <button class="btn btn-primary slide-btn" data-actorid=" ' . $id_staff . ' " data-bs-toggle="modal" data-bs-target="#Actualizar" style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;" type="button">Actualizar</button>
                            <input type="hidden" name="delete_id" value=" '. $id_staff .' ">
                            <button class="btn btn-danger slide-btn" style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;" type="submit">Eliminar</button>
                        </div>
                        </form>
                        <img src=" ' . $foto . ' " alt="Staff 2" class="mb-3">
                        <h5 class="card-title">' . $nombre_staff . '</h5>
                        <p class="card-text">Miembro #' . $id_staff . ' del equipo</p>
                        <button type="button" class="btn btn-warning liveToastBtn">Contactar</button>
                    </div>
                    </div>
                </div>
            
            ';
            $html = $html . $concatenar;
        }

        return $html;
        }
    }
?>