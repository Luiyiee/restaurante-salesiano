<div class="col-12 col-lg-9">
            <div class="card">
              <div class="card-header">Recent Order Tables
                <div class="card-action">
                  <div class="dropdown">
                    <a href="javascript:void();" class="dropdown-toggle dropdown-toggle-nocaret" data-toggle="dropdown">
                      <i class="icon-options"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">
                      <a class="dropdown-item" href="javascript:void();">Action</a>
                      <a class="dropdown-item" href="javascript:void();">Another action</a>
                      <a class="dropdown-item" href="javascript:void();">Something else here</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="javascript:void();">Separated link</a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="table-responsive">
                <table class="table align-items-center table-flush table-borderless">
                  <thead>
                    <tr>
                      <th>Tribu</th>
                      <th>Foto</th>
                      <th>Lider de tribu</th>
                      <th>Puntos</th>
                      <th>Porcentaje</th>
                      <th>Total</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $meta_puntos = 1000;
                    $porcentaje_puntos = 100;
                    $subtotal_puntos =  $porcentaje_puntos / $meta_puntos;
                   
                    
                    $sql_tribus = "select * from tribus";
                    $resul_tribus = mysqli_query($conexion, $sql_tribus);
                    while ($tribus = mysqli_fetch_array($resul_tribus)) {
                      $total_puntos = $tribus['puntos'] * $subtotal_puntos;  

                      $porcentaje = $tribus['puntos'] * 100 / $meta_puntos;
                    ?>
                      <tr>
                        <td> <?php echo $tribus['nombre']; ?> </td>
                        <td><img src="images/tribus/<?php echo $tribus['imagen']; ?>" class="product-img" alt="product img"></td>
                        <td> <?php echo $tribus['lider_tribu']; ?> </td>
                        <td> <?php echo $tribus['puntos']; ?> </td>

                        <td>
                        <h6 style="width:2px"><?php echo $porcentaje ?>%</h6>

                          <div class="progress shadow" style="height: 3px;">
                            <div class="progress-bar" role="progressbar" style="width: <?php echo $total_puntos ?>%"></div>
                          </div>

                        </td>
                        <td> 100%</td>
                      </tr>
                    <?php } ?>


                  </tbody>
                </table>
              </div>
            </div>

          </div>
