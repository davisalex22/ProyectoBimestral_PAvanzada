<?php  include_once('includes/header.php')?>

<!-- Slider -->
<div id="bootstrap-touch-slider" class="carousel bs-slider fade  control-round indicators-line" data-ride="carousel" data-pause="hover" data-interval="false" >
    <!-- Indicators -->
    <ol class="carousel-indicators">
        <li data-target="#bootstrap-touch-slider" data-slide-to="0" class="active"></li>
        <li data-target="#bootstrap-touch-slider" data-slide-to="1"></li>
        <li data-target="#bootstrap-touch-slider" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner" role="listbox">
        <div class="item active">
            <div id="home" class="first-section" style="background-image:url('uploads/portada.jpg');">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 text-center">
                            <div class="big-tagline">
                                <h2 data-animation="animated zoomInRight">Proyecto Programación Avanzada</h2>
                                <p class="lead" data-animation="animated fadeInLeft">Analisis de exploratorio de datos Empleo y desempleo del Ecuador</p>
                                <a data-scroll href="primera.php" class="btn btn-light btn-radius btn-brd effect-1 slide-btn" data-animation="animated fadeInLeft">Ir al Contenido</a>
                               
                            </div>
                        </div>
                    </div><!-- end row -->            
                </div><!-- end container -->
            </div><!-- end section -->
        </div>
        <div class="item">
            <div id="home" class="first-section" style="background-image:url('uploads/portada_1.jpg');">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 text-center">
                            <div class="big-tagline">
                                <h2 data-animation="animated zoomInRight">Documentación Técnica</h2>
                                <p class="lead" data-animation="animated fadeInLeft">Se cuenta con un explicación de consultas </p>
                                    <a data-scroll href="graficar.php" class="btn btn-light btn-radius btn-brd effect-1 slide-btn" data-animation="animated fadeInLeft">Ir documentación Técnica</a>
                            </div>
                        </div>
                    </div><!-- end row -->            
                </div><!-- end container -->
            </div><!-- end section -->
        </div>
        <div class="item">
            <div id="home" class="first-section" style="background-image:url('uploads/portada_2.jpg');">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 text-center">
                            <div class="big-tagline">
                                <h2 data-animation="animated zoomInRight">Documentación Usuario Final</h2>
                                <p class="lead" data-animation="animated fadeInLeft">Se presenta los resultados obtenidos</p>
                                    <a data-scroll href="derivar.php" class="btn btn-light btn-radius btn-brd effect-1 slide-btn" data-animation="animated fadeInLeft">Ir Documentación Final</a>
                            </div>
                        </div>
                    </div><!-- end row -->            
                </div><!-- end container -->
            </div><!-- end section -->
        </div>
        <!-- Left Control -->
        <a class="left carousel-control" href="#bootstrap-touch-slider" role="button" data-slide="prev">
            <span class="fa fa-angle-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>

        <!-- Right Control -->
        <a class="right carousel-control" href="#bootstrap-touch-slider" role="button" data-slide="next">
            <span class="fa fa-angle-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</div>

<div id="overviews" class="section wb">

<!--SABER MAS SOBRE Los Números, Sus Clasificaciones-->
        <div class="container">
        
            <div class="row seccion_inicio">
                <div class="col-md-6">
                    <div class="message-box">
                        <h4>UTPL 2020</h4>
                        <h2>Documentación Técnica</h2>
                        <p class="lead">Aqui explicación tecnica..</p>

                        <p> </p>

                        <a href="primera.php" data-scroll class="btn btn-light btn-radius btn-brd grd1 effect-1">Saber mas documentación Técnica...</a>
                    </div><!-- end messagebox -->
                </div><!-- end col -->
				
				<div class="col-md-6">
                    <div class="post-media wow fadeIn" >
                    <!-- <iframe width="560" height="315" src="https://www.youtube.com/embed/mvj_KLgO_5Q" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen autoplay></iframe> -->
                        <img src="images/numeros.png" alt=""  width="400" height="300">
                        <!-- <a href="http://www.youtube.com/watch?v=nrJtHemSPW4" data-rel="prettyPhoto[gal]" class="playbutton"><i class="flaticon-play-button"></i></a> -->
                    </div><!-- end media -->
                </div><!-- end col -->
            </div><!-- end row -->
        </div><!-- end container -->
<!--SABER MAS SOBRE Funciones-->
        <div class="container">        
            <div class="row seccion_inicio">
                
                <div class="col-md-6">
                    <div class="post-media wow fadeIn">
                    <!-- <iframe width="560" height="315" src="https://www.youtube.com/embed/mvj_KLgO_5Q" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen autoplay></iframe> -->
                        <img src="images/funciones_mate.jpg" alt=""width="300" height="400"></b></b>
                        <!-- <a href="http://www.youtube.com/watch?v=nrJtHemSPW4" data-rel="prettyPhoto[gal]" class="playbutton"><i class="flaticon-play-button"></i></a> -->
                    </div><!-- end media -->
                </div><!-- end col -->

                <div class="col-md-6">
                    <div class="message-box">
                        <h4>UTPL 2020</h4>
                        <h2>Documentación Usuario Final</h2>
                        <p class="lead">Aqui explicación usuario final</p>

                        <p> </p>

                        <a href="segunda.php" data-scroll class="btn btn-light btn-radius btn-brd grd1 effect-1">Saber mas sobre resultados...</a>
                    </div><!-- end messagebox -->
                </div><!-- end col -->
            </div><!-- end row -->
        </div><!-- end container -->
<?php include_once('includes/footer.php') ?>
