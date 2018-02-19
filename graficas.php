<?php
    session_start();
    if(isset($_SESSION['miSesion'])){
      $arreglo = $_SESSION['miSesion'];

    }else {
      header("Location: ./index.php");
    }
  ?>
<title>Graficas</title>
<?php include ("./head.php"); ?>

    <link rel="stylesheet" href="./css/estilos-side.css">
    <!-- <link rel="stylesheet" href="./css/estilos-side2.css"> -->
    <link rel="stylesheet" href="./css/estilos-graficas.css">
    

  </head>

  <body>

    <?php
        include("./conexion.php"); 
        include ("./adminSide.php");
        include ("./loader-screen.php"); 
        
        $id_alumno = $_REQUEST['id'];

        $queryFullName= $mysqli->query("SELECT concat(NOMBRE,' ',APELLIDO_P,' ',APELLIDO_M)  AS Nombre FROM alumno WHERE ID_ALUMNO='$id_alumno'") or die ($mysqli->error);
        $filaName=mysqli_fetch_array($queryFullName);

        $fullName = "$filaName[Nombre]";

        $anp= $mysqli->query("SELECT * FROM alumno WHERE ID_ALUMNO='$id_alumno';") or die ($mysqli->error);
        $raw=mysqli_fetch_array($anp);
    ?>

    <?php 
        $ansSmall= $mysqli->query("SELECT puntuacion FROM smaller_score WHERE ID_ALUMNO='$id_alumno';") or die ($mysqli->error);
        $rawSmall=mysqli_fetch_array($ansSmall);
        
        $smaller = $rawSmall['puntuacion'];

        $ansCurrent= $mysqli->query("SELECT puntuacion FROM current_score WHERE id_alumno='$id_alumno' ORDER BY id_score DESC LIMIT 1;") or die ($mysqli->error);
        $rawCurrent=mysqli_fetch_array($ansCurrent);
        
        $current = $rawCurrent['puntuacion'];

        $ansHigh= $mysqli->query("SELECT puntuacion FROM high_score WHERE ID_ALUMNO='$id_alumno';") or die ($mysqli->error);
        $rawHigh=mysqli_fetch_array($ansHigh);

        $high = $rawHigh['puntuacion'];
    ?>

    <div class="row" id="tables-error">

        <table class="table" id="table-stock" border="1" cellpadding="4"> <!--table  stock -->
            <thead>
                <tr>
                    <th>Objeto</th>
                    <th>Cantidad</th>
                </tr>
            </thead>
            <tbody id="objectData" >
                <?php
                    $respuesta= $mysqli->query("SELECT ID_OBJETO, OBJETO, cantidad FROM objetos WHERE ID_ALUMNO='$id_alumno' ORDER BY OBJETO; ") or die ($mysqli->error);
                    while($fila=mysqli_fetch_array($respuesta)){
                ?>

                <tr class="ObjetosCantidad" id="Objetos">
                    <td><?php echo "$fila[OBJETO]";?></td>
                    <td><?php echo "$fila[cantidad]";?></td>
                </tr>
                <?php } ?>
            </tbody>
        </table> <!--  table stock -->

        <table class="table" id="table-score" border="1" cellpadding="4">   <!--table score -->          
            <thead>
                <tr>
                    <th><i class="fa fa-cubes" aria-hidden="true"></i> Objeto</th>
                    <th><i class="fa fa-usd" aria-hidden="true"></i> Precio</th>
                    <th><i class="fa fa-star" aria-hidden="true"></i> Puntos</th>
                    <th><i class="fa fa-calendar" aria-hidden="true"></i> Fecha</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $respuestaGrade= $mysqli->query("SELECT OBJETO, PRECIO, PUNTOS, FECHA FROM calificaciones WHERE ID_ALUMNO='$id_alumno' ORDER BY ID_CALIFICACION DESC; ") or die ($mysqli->error);
                    while($rowGrade=mysqli_fetch_array($respuestaGrade)){
                ?>

                    <tr>
                        <td><i class="fa fa-cube" aria-hidden="true"></i> <?php echo "$rowGrade[OBJETO]";?></td>
                        <td>$<?php echo "$rowGrade[PRECIO]";?></td>
                        <td><?php echo "$rowGrade[PUNTOS]";?>pts</td>
                        <td><?php echo "$rowGrade[FECHA]";?></td>
                    </tr>

                    <?php } ?>
            </tbody>                    
        </table> <!--table score -->  


        <table class="table" id="table-loses" border="1" cellpadding="4"> <!--table loses -->
            <thead>
                <tr>
                    <th><i class="fa fa-cubes" aria-hidden="true"></i> Objeto</th>
                    <th><i class="fa fa-star" aria-hidden="true"></i> Puntos</th>
                    <th><i class="fa fa-calendar" aria-hidden="true"></i> Fecha</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $respuestaGrade= $mysqli->query("SELECT objeto, puntuacion, fecha FROM less_score WHERE id_alumno='$id_alumno'; ") or die ($mysqli->error);
                    while($rowGrade=mysqli_fetch_array($respuestaGrade)){
                ?>

                <tr>
                    <td><i class="fa fa-cube" aria-hidden="true"></i> <?php echo "$rowGrade[objeto]";?></td>
                    <td><?php echo "$rowGrade[puntuacion]";?>pts</td>
                    <td><?php echo "$rowGrade[fecha]";?></td>
                </tr>

                <?php } ?>
            </tbody>
        </table> <!--table loses -->



        <table class="table" id="table-errors" border="1" cellpadding="4"> <!--table loses -->
            <thead>
                <tr>
                    <th>Objeto</th>
                    <th>Errores</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $respuestaTable= $mysqli->query("SELECT objeto, errores FROM calificaciones WHERE ID_ALUMNO='$id_alumno' AND errores <> 0 ORDER BY fecha DESC") or die ($mysqli->error);
                    while($filas=mysqli_fetch_array($respuestaTable)){          
                ?>

                <tr>
                    <td><?php echo "$filas[objeto]";?></td>
                    <td><?php echo "$filas[errores]";?></td>
                </tr>

                <?php } ?>
            </tbody>
        </table> <!--table errors -->

        <table class="table" id="table-max" border="1" cellpadding="4"> <!--table loses -->
            <thead>
                <tr>
                    <th>Minimo</th>
                    <th>Actual</th>
                    <th>Maximo</th>             
                </tr>
            </thead>
            <tbody>
            
                <tr>
                    <td><?php echo "$smaller";?></td>
                    <td><?php echo "$current";?></td>
                    <td><?php echo "$high";?></td>              
                </tr>

            </tbody>
        </table> <!--table max -->
    </div> <!-- row -->

<!-- ******************************************************************************************************************************* -->
<!-- ******************************************************************************************************************************* -->
<!-- ******************************************************************************************************************************* -->


 
    <div class="contenedorGraficas" id="noPadding">    

      <div class="row">
          <br>
                <div class="col-lg-6 col-md-6 col-lg-offset-3">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-bar-chart fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">Datos</div>
                                    <div>Estadisticos</div>
                                </div>
                            </div>
                        </div>
                        <a href="#">
                            <div class="panel-footer">
                                <span class="pull-left"><?php echo "$raw[NOMBRE]";  ?>&nbsp;<?php echo "$raw[APELLIDO_P]"; ?></span>
                                <!-- <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span> -->
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
      </div><!-- rom -->

    <div class="row">
        <div class="col-lg-10 col-md-6 col-lg-offset-1">

        <div class="col-lg-4 col-md-6">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-star fa-3x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge"> </div>
                            <?php
                                $currentScore=0;
                                $respta= $mysqli->query("SELECT puntuacion FROM current_score WHERE id_alumno='$id_alumno' ORDER BY id_score DESC LIMIT 1;") or die ($mysqli->error);
                                $row=mysqli_fetch_array($respta);
                                    
                                $currentScore = $row['puntuacion'];
                                ?>
                            <div><?php echo $currentScore; ?> pts</div>
                        </div>
                    </div>
                </div>
                <a href="#">
                    <div class="panel-footer">
                        <span class="pull-left">Puntos Actuales</span>
                        <!-- <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span> -->
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div><!-- panele 1 -->

        <div class="col-lg-4 col-md-6">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-flag fa-3x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge"> </div>
                            <?php
                                $currentScore=0;
                                $respta= $mysqli->query("SELECT puntuacion FROM high_score WHERE id_alumno='$id_alumno' ORDER BY id_score DESC LIMIT 1;") or die ($mysqli->error);
                                $row=mysqli_fetch_array($respta);
                                    
                                $hightScorePrint = $row['puntuacion'];
                                ?>
                            <div><?php echo $hightScorePrint; ?> pts</div>
                        </div>
                    </div>
                </div>
                <a href="#">
                    <div class="panel-footer">
                        <span class="pull-left">Puntuaje Maximo</span>
                        <!-- <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span> -->
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div><!-- panele 1 -->

        <div class="col-lg-4 col-md-6">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-close fa-3x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge"> </div>
                            <?php
                                $currentScore=0;
                                $respta= $mysqli->query("SELECT puntuacion FROM smaller_score WHERE id_alumno='$id_alumno' ORDER BY id_smaller DESC LIMIT 1;") or die ($mysqli->error);
                                $row=mysqli_fetch_array($respta);
                                    
                                $smallScorePrint = $row['puntuacion'];
                                ?>
                            <div><?php echo $smallScorePrint; ?> pts</div>
                        </div>
                    </div>
                </div>
                <a href="#">
                    <div class="panel-footer">
                        <span class="pull-left">Puntuaje Minimo</span>
                        <!-- <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span> -->
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div><!-- panele 1 -->

    </div><!-- rom -->


<!-- ******************************************************************************************************************************* -->
<!-- ******************************************************************************************************************************* -->
<!-- ******************************************************************************************************************************* -->


      <div class="graficaDoughnut">

        <div class="panel-body">
          <div class="row">
              <div class="col-lg-5">
              <div class="container-table-grades">
                  <div class="table-responsive">
                        <table class="table table-bordered" border="1" cellpadding="4">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Objeto</th>
                                        <th>Cantidad</th>
                                    </tr>
                                </thead>
                            </table>
                            <div class="wrapper" id="wrapper">
                                <table class="table">
                                    <tbody id="objectData" >
                                        <?php
                                            $respuesta= $mysqli->query("SELECT ID_OBJETO, OBJETO, cantidad FROM objetos WHERE ID_ALUMNO='$id_alumno' ORDER BY OBJETO; ") or die ($mysqli->error);
                                            while($fila=mysqli_fetch_array($respuesta)){
                                        ?>

                                        <tr class="ObjetosCantidad <?php echo "$fila[ID_OBJETO]"; ?>" id="Objetos">
                                            <td>
                                            <!-- <a class="btn-delete" href="#" role="button"><i class="fa fa-times" aria-hidden="true"></i></a> -->
                                            <?php echo "$fila[OBJETO]";?></td>
                                            <td><?php echo "$fila[cantidad]";?> </td>
                                        </tr>

                                            <?php } ?>
                                    </tbody>
                                </table>
                            </div><!-- /. div wraper -->
                        </table>

                    <!-- <input type="button" name="" value="Imprimir esta pagina" onClick="imprimirPagina('myChart')"> -->
                 </div><!-- /.table-responsive -->
                    <div class="btn_printer" id="print_Dough" onClick="imprimirPagina('myChart','<?php echo "$fullName" ?>')"><p>Imprimir</p></div>
                 </div> <!-- /.container grades-->
                 <br>
             </div><!-- col-4- -->
                       <div class="col-lg-7">
                         <div class="grafica" >
                           <div class="graficaTitle">
                                <h5><i class="fa fa-pie-chart" aria-hidden="true"></i> Objetos Comprados</h5>
                           </div>
                           <div class="chart-container circle" id="grafica-Doughnut">
                               <canvas id="myChart"></canvas>
                           </div>

                         </div>
                       </div>
                       <!-- /.col-lg-8 (nested) -->
                </div>
                <!-- /.row -->
              </div>
              <!-- /.panel-body -->
        </div>

        <div class="row">
            <div class="graficaDoughnut">
            `   <div class="col-lg-9">
                    <div class="grafica" >
                        <div class="graficaTitle">
                            <h5> <i class="fa fa-bar-chart" aria-hidden="true"></i> Puntos Obtenidos</h5>
                        </div>
                        <div class="chart-container" id="grafica-barPoints">
                            <canvas id="barPointsChart" ></canvas>
                        </div>

                    </div>
                </div><!-- /.grafica -->
            </div><!-- /.graficaDoughnut -->
            <br>
            <div class="col-lg-3">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-star fa-3x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"> </div>
                                    <?php
                                        $currentScore=0;
                                        $respta= $mysqli->query("SELECT puntuacion FROM current_score WHERE id_alumno='$id_alumno' ORDER BY id_score DESC LIMIT 1;") or die ($mysqli->error);
                                        $row=mysqli_fetch_array($respta);
                                            
                                        $currentScore = $row['puntuacion'];
                                        ?>
                                    <div><?php echo $currentScore; ?> pts</div>
                                </div>
                            </div>
                        </div>
                        <a href="#">
                            <div class="panel-footer">
                                <span class="pull-left">Puntos Actuales</span>
                                <!-- <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span> -->
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
        </div> <!-- /.col-lg-12 Puntos obtenidos -->
         <br>
         <br>                           
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-12">
                <div class="container-table-grades">
                
                    <table class="table">
              
                        <table class="table">     
                            <thead>
                                <tr>
                                    <th><i class="fa fa-cubes" aria-hidden="true"></i> Objeto</th>
                                    <th><i class="fa fa-usd" aria-hidden="true"></i> Precio</th>
                                    <th><i class="fa fa-star" aria-hidden="true"></i> Puntos</th>
                                    <th><i class="fa fa-calendar" aria-hidden="true"></i> Fecha</th>
                                </tr>
                            </thead>
                        </table>

                        <div class="wrapper" id="wrapper">
                            <table class="table">
                                <tbody>
                                    <?php
                                        $respuestaGrade= $mysqli->query("SELECT OBJETO, PRECIO, PUNTOS, FECHA FROM calificaciones WHERE ID_ALUMNO='$id_alumno' ORDER BY ID_CALIFICACION DESC; ") or die ($mysqli->error);
                                        while($rowGrade=mysqli_fetch_array($respuestaGrade)){
                                    ?>

                                        <tr>
                                            <td><i class="fa fa-cube" aria-hidden="true"></i> <?php echo "$rowGrade[OBJETO]";?></td>
                                            <td>$<?php echo "$rowGrade[PRECIO]";?></td>
                                            <td><?php echo "$rowGrade[PUNTOS]";?>pts</td>
                                            <td><?php echo "$rowGrade[FECHA]";?></td>
                                        </tr>

                                        <?php } ?>
                                </tbody>
                            </table>
                        </div><!--  wrapper -->
                        
                    </table>
                    <div class="btn_printer" id="print_Score" onClick="printScore('barPointsChart', '<?php echo "$fullName" ?>')">Imprimir</div>                    
                    
                </div><!--  container-table-grades -->
            </div><!--  col-md-12 -->
        </div> <!--  table Puntos obtenidos roooooooow -->

        <div class="row"> <!--          Veces Perdidadas   -->
            <div class="graficaDoughnut">
            `   <div class="col-lg-12">
                    <div class="grafica" >
                        <div class="graficaTitle">
                            <h5> <i class="fa fa-bar-chart" aria-hidden="true"></i> Puntos perdidos por Objeto</h5>
                        </div>
                        <div class="chart-container" id="chart-bar-loses">
                            <canvas id="barChartLoses" ></canvas>
                        </div>

                    </div>
                </div><!-- /.graficaDoughnut -->
            </div><!-- /.col-lg-12 -->
        </div> <!-- /.row Veces Perdidadas -->
        
    <br>
    <br>                           
    <div class="row">
        <div class="col-lg-8 col-lg-offset-2 col-md-12">
            <div class="container-table-grades">
                <table class="table">
                    <table class="table">
                        <thead>
                            <tr>
                                <th><i class="fa fa-cubes" aria-hidden="true"></i> Objeto</th>
                                <th><i class="fa fa-star" aria-hidden="true"></i> Puntos</th>
                                <th><i class="fa fa-calendar" aria-hidden="true"></i> Fecha</th>
                            </tr>
                        </thead>
                    </table>

                    <div class="wrapper" id="wrapper">
                            <table class="table">
                                <tbody>
                                    <?php
                                        $respuestaGrade= $mysqli->query("SELECT objeto, puntuacion, fecha FROM less_score WHERE id_alumno='$id_alumno'; ") or die ($mysqli->error);
                                        while($rowGrade=mysqli_fetch_array($respuestaGrade)){
                                    ?>

                                        <tr>
                                            <td><i class="fa fa-cube" aria-hidden="true"></i> <?php echo "$rowGrade[objeto]";?></td>
                                            <td><?php echo "$rowGrade[puntuacion]";?>pts</td>
                                            <td><?php echo "$rowGrade[fecha]";?></td>
                                        </tr>

                                        <?php } ?>
                                </tbody>
                            </table>
                    <div class="btn_printer" id="print_loses" onClick="printLoses('barChartLoses', '<?php echo "$fullName" ?>')">Imprimir</div>
                            
                    </div><!--  wrapper -->
                </table>
            </div><!--  container-table-grades -->
        </div><!--  col-md-12 -->
    </div> <!--  table Puntos obtenidos roooooooow -->

        <br>
        <div class="row">
            <div class="graficaDoughnut">
                    
                    <div class="col-lg-3">
                        <br>
                        <br>
                        <br>
                        <br>
                    <div class="col-lg-12"> <!-- /.primer huge, total -->
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-window-close fa-3x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge"> </div>
                                        <?php
                                        $total = 0;
                                            $respuesta= $mysqli->query("SELECT errores FROM calificaciones WHERE ID_ALUMNO='$id_alumno';") or die ($mysqli->error);
                                            while($fila=mysqli_fetch_array($respuesta)){          
                                                $total+=$fila['errores'];
                                            } 
                                        ?>
                                        <div><?php echo $total; ?> Errores</div>
                                    </div>
                                </div>
                            </div>
                            <a href="#">
                                <div class="panel-footer">
                                    <span class="pull-left">Total de Errores</span>
                                    <!-- <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span> -->
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div> <!-- /.primer huge, total -->

                    <div class="col-lg-12"> <!-- /.primer huge, total -->
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-window-close-o fa-3x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge"> </div>

                                        <?php
                                            $rounded =0;
                                            $avg= $mysqli->query("SELECT AVG(errores) AS PROMEDIO FROM calificaciones WHERE ID_ALUMNO = '$id_alumno' AND errores<>0;") or die ($mysqli->error);
                                            $fila=mysqli_fetch_array($avg);
                                            $rounded = round("$fila[PROMEDIO]");
                                        ?>
                                        <div><?php echo "$rounded"; ?> Errores</div>
                                    </div>
                                </div>
                            </div>
                            <a href="#">
                                <div class="panel-footer">
                                    <span class="pull-left">Promedio de Errores</span>
                                    <!-- <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span> -->
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div> <!-- /.primer huge, total -->

                    </div> <!-- /.col-lg-3 -->  <!-- /.row para dos huges, total erroes y promedio -->

            `   <div class="col-lg-9">
                    <div class="grafica" >
                        <div class="graficaTitle">
                            <h5> <i class="fa fa-pie-chart" aria-hidden="true"></i> Errores Obtenidos</h5>
                        </div>
                        <div class="chart-container circle" id="grafica-barErrors">
                            <canvas id="barErrorsChart" ></canvas>
                        </div>
                    </div>                    
                </div><!-- /.grafica -->

            </div><!-- /.graficaDoughnut -->
            
        </div> <!-- /.col-lg-12 -->
        <br>
        <div class="btn_printer" id="print_errors" onClick="printErrors('barErrorsChart', '<?php echo "$fullName" ?>')">Imprimir</div>
        

    
        <div class="row"> <!--          Puntuaje Maximo - Minimo   -->
            <div class="graficaDoughnut">
            `   <div class="col-lg-12">
                    <div class="grafica" >
                        <div class="graficaTitle">
                            <h5> <i class="fa fa-bar-chart" aria-hidden="true"></i> Puntuaje Maximo - Minimo</h5>
                        </div>
                        <div class="chart-container" id="grafica-barMulti">
                            <canvas id="barMultiChart" ></canvas>
                        </div>
                    </div>
                </div><!-- /.grafica -->
            </div><!-- /.graficaDoughnut -->
        </div> <!-- /.col-lg-12         Puntuaje Maximo - Minimo -->
         <br>                                   
        <div class="btn_printer" id="print_max" onClick="printMax('barMultiChart', '<?php echo "$fullName" ?>')">Imprimir</div>

        
      </div> <!-- /.row                    -->
      </div> <!-- /.row    contenedor de graficas   --> 
    </div>

    <script src="./js/jquery-3.2.1.min.js"></script>
    <script src="./js/bootstrap.min.js"></script>
    <script type="text/javascript" src="./js/ajax-libs-Chart-js-2-6-0.js"></script>
    <script src="./js/codigoGraficas.js"></script> 
    <script src="./js/prefixfree.min.min"></script>
    
    <script>

         
        window.addEventListener("load", function(){
            setTimeout(timedOut, 1000 );
        });
    
        function timedOut() {
            var load_screen = document.getElementById("load_screen");
            $('#load_screen').fadeOut();
        }

        /* 
        print_Dough
        print_Score
        print_loses
        print_errors
        print_max
        
        */

    function pageNext(){
        
        var i=0;
        $('#objectData').empty();
        <?php
            $respuesta= $mysqli->query("SELECT ID_OBJETO, OBJETO, cantidad FROM objetos WHERE ID_ALUMNO='$id_alumno' LIMIT 9,19; ") or die ($mysqli->error);
             while($fila=mysqli_fetch_array($respuesta)){
        ?>
        i++;
        $('#objectData').append(" <tr id=\"createdClass"+i+"\">");
        $('#createdClass'+i).append("<td> <?php echo "$fila[OBJETO]";?>  </td>");
        $('#createdClass'+i).append("<td> <?php echo "$fila[cantidad]";?> </td>");
        $('#objectData').append(" </tr>");
        
             <?php } ?>
    }

    function pagePrev(){
        
        var i=0;
        $('#objectData').empty();
        <?php
            $respuesta= $mysqli->query("SELECT ID_OBJETO, OBJETO, cantidad FROM objetos WHERE ID_ALUMNO='$id_alumno' LIMIT 0,9; ") or die ($mysqli->error);
             while($fila=mysqli_fetch_array($respuesta)){
        ?>
        i++;
        $('#objectData').append(" <tr id=\"createdClass"+i+"\">");
        $('#createdClass'+i).append("<td> <?php echo "$fila[OBJETO]";?>  </td>");
        $('#createdClass'+i).append("<td> <?php echo "$fila[cantidad]";?> </td>");
        $('#objectData').append(" </tr>");
        
             <?php } ?>
    }
    
    var ctx = document.getElementById('myChart').getContext('2d');
    var ctxPoints = document.getElementById('barPointsChart').getContext('2d');
    var ctxErrors = document.getElementById('barErrorsChart').getContext('2d');
    var ctxMaxMin = document.getElementById('barMultiChart').getContext('2d');
    var ctxLoses = document.getElementById('barChartLoses').getContext('2d');    
    Chart.defaults.global.defaultFontColor = 'black';

    // Dona
    var barChart = new Chart(ctx, {
        type: 'doughnut',
        data: {
        labels:[
            <?php
                include("./conexion.php");
                $respuesta= $mysqli->query("SELECT OBJETO FROM objetos WHERE ID_ALUMNO='$id_alumno' AND cantidad<>0;") or die ($mysqli->error);
                while($fila=mysqli_fetch_array($respuesta)){          
            ?>
            
            '<?php echo "$fila[OBJETO]"; ?>',
            
            <?php } ?>
        ],
        datasets: [
            {
            label: "Points",
            data: [
                <?php
                    $respuesta= $mysqli->query("SELECT cantidad FROM objetos WHERE ID_ALUMNO='$id_alumno' AND cantidad<>0;") or die ($mysqli->error);
                    while($fila=mysqli_fetch_array($respuesta)){          
                ?>

                <?php echo "$fila[cantidad]"; ?>,

                <?php } ?>
            ],
            // borderColor: ['#333','#333','#333','#333','#333','#333','#333','#333','#333','#333','#333','#333','#333','#333','#333','#333','#333','#333','#333','#333'],
            backgroundColor:['#36a2eb','#ff6384','#9966ff','#ffcd56','#4bc0c0','#ff9f40','#c9cbcf','#f6d009','#ee63ff','#63d0ff', '#28d143', '#63ffc2',
            '#9966ff','#ffcd56','#4bc0c0','#ff9f40','#c9cbcf','#f6d009','#ee63ff','#63d0ff'
            ]
            }
        ]
        }

    });


    // Line Points

    var barPointsChart = new Chart(ctxPoints, {
        type: 'line',

        data: {
            labels:[
                <?php
                    $respuesta= $mysqli->query("SELECT fecha FROM current_score WHERE ID_ALUMNO='$id_alumno' ORDER BY fecha LIMIT 20;") or die ($mysqli->error);
                    while($fila=mysqli_fetch_array($respuesta)){          
                ?>
            
                '<?php echo "$fila[fecha]"; ?>',
                
                <?php } ?>
            ],
            datasets: [
            {
                steppedLine: false,
                borderColor: "#0CD0C9",
                fill: false,
                label: "Puntos Obtenidos",
                data: [
                    <?php
                        include("./conexion.php");
                        $respuesta= $mysqli->query("SELECT puntuacion FROM  current_score WHERE ID_ALUMNO='$id_alumno' LIMIT 20;") or die ($mysqli->error);
                        while($fila=mysqli_fetch_array($respuesta)){          
                    ?>

                    <?php echo "$fila[puntuacion]"; ?>,

                    <?php } ?>
                ]
            }
            ]
        }
    });

    // Chart de Errores
    var barErrorsChart = new Chart(ctxErrors, {
        type: 'pie',
        data: {
            labels:[
                <?php
                    include("./conexion.php");
                    $respuesta= $mysqli->query("SELECT OBJETO FROM calificaciones WHERE ID_ALUMNO='$id_alumno' AND errores <> 0 LIMIT 20;") or die ($mysqli->error);
                    while($fila=mysqli_fetch_array($respuesta)){          
                ?>
            
                '<?php echo "$fila[OBJETO]"; ?>',
                
                <?php } ?>
            ],
            datasets: [
            {
                backgroundColor:['#36a2eb','#ff6384','#9966ff','#ffcd56','#4bc0c0','#ff9f40','#c9cbcf','#f6d009','#ee63ff','#63d0ff', '#28d143', '#63ffc2',
                '#9966ff','#ffcd56','#4bc0c0','#ff9f40','#c9cbcf','#f6d009','#ee63ff','#63d0ff'
                ],
                borderColor: ['#36a2eb','#ff6384','#9966ff','#ffcd56','#4bc0c0','#ff9f40','#c9cbcf','#f6d009','#ee63ff','#63d0ff', '#28d143', '#63ffc2',
                '#9966ff','#ffcd56','#4bc0c0','#ff9f40','#c9cbcf','#f6d009','#ee63ff','#63d0ff'
                ],
                label: "Errores Obtenidos",
                data: [
                    <?php
                        include("./conexion.php");
                        $respuesta= $mysqli->query("SELECT errores FROM calificaciones WHERE ID_ALUMNO='$id_alumno' AND errores <> 0 LIMIT 20;") or die ($mysqli->error);
                        while($fila=mysqli_fetch_array($respuesta)){          
                    ?>

                    <?php echo "$fila[errores]"; ?>,

                    <?php } ?>
                ]
            }
            ]
        }
    });

    //Max min points
    var barMaxMinChart = new Chart(ctxMaxMin, {
        type: 'bar',
        data: {
            labels:["Minimo", "Actual", "Maximo"],
            datasets: [
            {
                backgroundColor:['rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(70, 247, 194, 0.20)'
                ],
                borderColor: ['rgba(255,99,132,1)',
                'rgba(54, 162, 235, 1)',
                'rgba(70, 247, 194, 1)'
                ],
                label: "Puntuaje",
                data: [<?php echo "$smaller"; ?>,<?php echo "$current"; ?>,<?php echo "$high"; ?>]
            }
            ]
        }
    });

    // Loses
    var barLosesChart = new Chart(ctxLoses, {
        type: 'bar',
        data: {
            labels:[
                <?php
                    $respuestaLoses2= $mysqli->query("SELECT objeto FROM less_score WHERE ID_ALUMNO='$id_alumno';") or die ($mysqli->error);
                    while($filaLoses2=mysqli_fetch_array($respuestaLoses2)){          
                ?>
            
                '<?php echo "$filaLoses2[objeto]"; ?>',
                
                <?php } ?>

            ],
            datasets: [
            {
                backgroundColor:['#36a2eb','#ff6384','#9966ff','#ffcd56','#4bc0c0','#ff9f40','#c9cbcf','#f6d009','#ee63ff','#63d0ff', '#28d143', '#63ffc2',
                '#9966ff','#ffcd56','#4bc0c0','#ff9f40','#c9cbcf','#f6d009','#ee63ff','#63d0ff'
                ],
                borderColor: ['#36a2eb','#ff6384','#9966ff','#ffcd56','#4bc0c0','#ff9f40','#c9cbcf','#f6d009','#ee63ff','#63d0ff', '#28d143', '#63ffc2',
                '#9966ff','#ffcd56','#4bc0c0','#ff9f40','#c9cbcf','#f6d009','#ee63ff','#63d0ff'
                ],
                label: "Juegos Perdidos",
                data: [
                    <?php
                    $respuestaLoses= $mysqli->query("SELECT puntuacion FROM less_score WHERE ID_ALUMNO='$id_alumno';") or die ($mysqli->error);
                    while($filaLoses=mysqli_fetch_array($respuestaLoses)){          
                     ?>
            
                '<?php echo "$filaLoses[puntuacion]"; ?>',
                
                <?php } ?>
                ]
            }
            ]
        }
    });

    
    </script>

    <!-- <script src="./js/printElement.min.js"></script> -->

    <!-- <script src="./js/codigoGraficas.js"> -->

    </script>
  </body>

</html>

