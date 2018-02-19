<title>Error interno del servidor</title>        
<?php include ("./head.php"); ?>

<link rel="stylesheet" href="./css/estilos-side.css">
<link rel="stylesheet" href="./css/style-max.css">

    </head>

    <body>
        <?php include ("./adminSide.php"); ?>

            <!-- masthead -->
        <header class="masthead error">
            <div class="container">
                <img class="img-fluid" src="./img-detalles/errorPage/e1.svg" alt="">
                <div class="intro-text">
                    <span class="name errorCase">Upps! Algo salio mal durante el proceso!</span>
                    <hr class="star-error">            
                    <span class="skills">¡Error interno del servidor!</span><br>
                    <span class="skills">Por favor, vuelve a la seccion de inicio.</span>
                </div>
            </div><!-- container --> 

            <div class="btn_container">
            <a href="./alumnos.php"><div class="btn_continue">Continuar</div></a>
            </div>  

        </header>
        <script src="./js/jquery-3.2.1.min.js"></script>
        <script src="./js/bootstrap.min.js"></script>
    </body>

</html>