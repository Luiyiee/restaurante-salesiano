<div class="col-lg-3 col-md-4">
            <div class="card mt-3 shadow-none">
              <div class="list-group shadow-none">
                <p style="text-align:center;" class="list-group-item">Usuarios conectados</p>
                <?php
                $sql_conectados = "select * from usuarios where conexion = 'Conectado' ";
                $result_conectados = mysqli_query($conexion, $sql_conectados);
                while ($conectados = mysqli_fetch_array($result_conectados)) {

                ?>


                  <!--         <a href="javascript:void();" class="list-group-item"><span class="fa fa-circle text-info float-right"></span>Work</a>-->
                  <a href="javascript:void();" class="list-group-item"><span class="fa fa-circle text-success float-right"></span> <?php echo $conectados['usuario']; ?> </a>
                  <!--      <a href="javascript:void();" class="list-group-item"><span class="fa fa-circle text-warning float-right"></span>Family</a>-->
                  <!-- <a href="javascript:void();" class="list-group-item"><span class="fa fa-circle text-white float-right"></span>Friends</a>-->
                  <!--  <a href="javascript:void();" class="list-group-item"><span class="fa fa-circle text-danger float-right"></span>Office</a>-->
                <?php } ?>
              </div>

            </div>


          </div>
          <!-- desconectados -->
