<?php
    class actorVisto{
        function htmlActores($resultado){
             $html = ""; //Este va a contener un bloque de código html para mandar a la vista

            while($fila = $resultado->fetch_assoc()){ //como un cursor, va bajando solo de indices y devuelve el valor de una fila, cuando se acaba da FALSO
  
            $nombre_actor = $fila["nombres_actores"];
            $id_actor = $fila["actor_id"];
            $tipo = array("comedia","horror","fantasía","acción","romance");
            $profesion = $tipo[rand(0,4)];
            $llamada = file_get_contents('https://randomuser.me/api/'); //El file_get_contents solo coge el JSON de la api
            $datos = json_decode($llamada, true); //Se transforma en un array
            if(isset($datos['results'][0]['picture']['medium'])){ //Preguntando si la imagen llegó
              $foto = $datos['results'][0]['picture']['medium']; //El JSON tiene JSONs dentro de sí, por eso se llama como array con arrays
            }
            else{
              $foto = "../../recursos-e-imágenes/defaultpfp.png";
            } // La API no parece ser de alta disponibilidad y a veces se cae, por eso el default foto pfp
            $concatenar = '
            
                  <div class="col-md-6 actor-card">
                    <div class="card text-center">
                    <div class="card-body">
                        <form action="" method="post">
                        <div class="d-grid gap-2 d-md-flex justify-content-md-between">
                        <!-- Código prestado de los otros compañeros para activar un modal -->
                            <button class="btn btn-primary slide-btn" data-actorid=" ' . $id_actor . ' " data-bs-toggle="modal" data-bs-target="#Actualizar" style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;" type="button">Actualizar</button>
                            <input type="hidden" name="delete_id" value=" '. $id_actor .' ">
                            <button class="btn btn-danger slide-btn" style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;" type="submit">Eliminar</button>
                        </div>
                        </form>
                        <img src=" ' . $foto . ' " alt="Actor 2" class="mb-3">
                        <h5 class="card-title">' . $nombre_actor . '</h5>
                        <p class="card-text">Especialista en ' . $profesion . '</p>
                        <a href="#" class="btn btn-warning">Contactar</a>
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