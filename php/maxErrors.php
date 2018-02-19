<title>Compra</title>        
<?php include ("../headOut.php"); ?>

<link rel="stylesheet" href="../css/estilos-side.css">
<link rel="stylesheet" href="../css/style-max.css">

    </head>

    <body>
        <?php include ("../navbarP.php"); ?>

        <?php
            include("../conexion.php");
            $id_boy= $_REQUEST['id'];
        ?>

            <!-- masthead -->
        <header class="masthead">
            <div class="container">
                <img class="img-fluid" src="../img-detalles/attention.svg" alt="">
                <div class="intro-text">
                    <span class="name">Numero Maximo de Errores</span>
                    <hr class="star-light">
                    <span class="skills">Vuelve a seleccionar el objeto o selecciona uno diferente.</span>
                </div>
            </div><!-- container --> 

            <div class="btn_container">
            <a href="./juego.php?id=<?php echo $id_boy;?>"><div class="btn_continue">Continuar</div></a>
                
            </div>  

        </header>
        <script src="../js/jquery-3.2.1.min.js"></script>
        <script src="../js/bootstrap.min.js"></script>
    </body>

</html>