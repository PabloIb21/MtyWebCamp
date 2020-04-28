<section class="seccion contenedor">
        <h2>Invitados</h2>

        <?php
            try{
                require_once('includes/funciones/bd_conexion.php');
                $sql = " SELECT * FROM `invitados` ";
                $resultado = $conn -> query($sql);
            }catch(\Exception $e){
                echo $e->getMessage();
            }
        ?> 

            <section class="invitados contenedor seccion">
                <ul class="lista-invitados clearfix">
                    <?php
                        while($invitados = $resultado -> fetch_assoc()){ ?>
                            <li>
                                <div class="invitado">
                                    <a class="invitado-info" href="#invitado<?php echo $invitados['id_invitado'] ?>">
                                        <img src="img/invitados/<?php echo $invitados['url_imagen'] ?>" alt="Imagen invitado">
                                    </a>
                                 <p><?php echo $invitados['nombre_invitado']." ".$invitados['apellido_invitado'] ?></p>
                                </div>
                            </li>
                            <div style="display: none;">
                                <div class="invitado-info" id="invitado<?php echo $invitados['id_invitado'] ?>">
                                    <h2><?php echo $invitados['nombre_invitado']." ".$invitados['apellido_invitado'] ?></h2>
                                    <img src="img/<?php echo $invitados['url_imagen'] ?>" alt="Imagen invitado">
                                    <p><?php echo $invitados['descripcion'] ?></p>  
                                </div>
                            </div>                   
                    <?php } ?>
                </ul>
            </section>

        <?php
            $conn -> close();           
        ?>

    </section>      