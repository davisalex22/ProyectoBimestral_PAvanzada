<?php 
    include_once('includes/header.php');
?>

<div class="all-title-box">
    <div class="container text-center">
        <h1>Documentación Técnica<span class="m_1"></span></h1>
        <p class="lead" data-animation="animated fadeInLeft">Analisis de exploratorio de datos Empleo y desempleo del Ecuador</p>
    </div>
</div>

<div class="container">
    <div class="row contenido">
        <!-- menu despegable -->
        <div class="col-md-4 menu_temas">
            <div class="menu_temas">
                <ul>
                    <li><a href="#esquema">Esquema planteado</a></li>
                        <li><a href="#carga_datos">Carga de la data</a></li>
                        <li><a href="#consulta1">Consulta 1</a></li>
                        <li><a href="#consulta2">Consulta 2</a></li>
                        <li><a href="#consulta3">Consulta 3</a></li>
                        <li><a href="#consulta4">Consulta 4</a></li>
                        <li><a href="#consulta5">Consulta 5</a></li>
                        <li><a href="#consulta6">Consulta 6</a></li>
                    </ul>
                </ul>
            </div>
        </div>
        <!-- Contenido -->
        <div class="col-md-8 ">
            <div class="contenido_temas">
                <div id="esquema">
                  <h2><b>Esquema Planeado</b></h2>
                  <p>Una vez obtenida la data proporcianda del página:... se procedió a realizar el analisis de cada una de las columnas y su tipo de dato. Una vez determinada se planteó el siguiente esquema:<br/></p> 
                  <center><IMG src="" width="700" height="500"/><br/><br/></center>
                </div>
                <div id="carga_datos">
                    <h2><b>2. Carga de la data</b></h2>
                    <p>Para realizar el analisis se cargó la data con <td><a href="https://github.com/davisalex22/ProyectoBimestral_PAvanzada/wiki".$act.">Apache Zepellin</a> la cual se la realizó de la siguiente forma en la cual al esquema que se planteó anteriormente se le carga la data y de esta manera evitar que Spark no determine los difenrentes tipos de datos.</p> 

                    <center><IMG src="" width="700" height="500"/><br/><br/></center>
                </div>
                <div id="consulta1">
                    <h2><b>Conteo condicion actividad de personas afroecuatorianas</b></h2>
                    <p>En esta consulta  usamos un where delimitanto las etnias a solo etnias afroecuatorianas, luego agrupamos la columna nivel_instruccion y realizamos un pivot, el métod pivot nos brinda
                     gran cantidad de operaciones que necesitemos dentro de nuestra consulta (count, avg, round, min, max, etc). utlizamos un pivot con la columna genero que conjuntamente con la funcion avg permite sacar el promedio de sueldos de los generos afroecuatorianos y así ordenandolos 
                        con un orderBy. Y al final lo mostramos con z.show el cual es un método de zeppelin para presentar nuestras consultas de una manera más dinámica un gráfico estadístico.<br/><br/></p> 
                    <center><IMG src="" width="700" height="500"/><br/><br/></center>
                </div>
                 <div id="consulta2">
                    <h2><b>nivel de instruccion proporcionada a personas afroecuatorianas</b></h2>
                    <p>En esta consulta primero realizamos un where el cual delimito la dataframe, en este caso lo delimitamos con la 
                        etnia Afroecuatoriano, en el cual hacemos un groupBy el cual agrupa con la columna nivel_instruccion, 
                        el cual los cuenta todos los datos que son iguales dentro de la columna y al final ordenamos con 
                        un groupBy. Y al final lo mostramos con z.show el cual es un método de zeppelin para presentar nuestras consultas de una manera más dinámica un gráfico estadístico.<br/><br/></p> 
                    <center><IMG src="" width="700" height="500"/><br/><br/></center>
                </div>
                <div id="consulta3">
                    <h2><b>nivel de instruccion proporcionada a personas afroecuatorianas</b></h2>
                    <p>En esta consulta  usamos un where delimitanto las etnias a solo etnias afroecuatorianas, 
                        luego agrupamos la columna nivel_instruccion y realizamos un pivot, el métod pivot nos brinda gran cantidad de operaciones que necesitemos dentro de nuestra consulta (count, avg, round, min, max, etc).
                         utlizamos un pivot con la columna genero que conjuntamente con la funcion avg permite sacar el promedio de sueldos de los generos afroecuatorianos y así ordenandolos 
                        con un orderBy. Y al final lo mostramos con z.show el cual es un método de zeppelin para presentar nuestras consultas de una manera más dinámica un gráfico estadístico.<br/><br/></p> 
                    <center><IMG src="" width="700" height="500"/><br/><br/></center>
                </div>
                <div id="consulta4">
                    <h2><b>promedio de ingreso laboral de hombres y mujeres afroecuatorianos</b></h2>
                    <p>Esta consulta sirve para sacar el sueldo promedio de generos de las etnias afroecuatorianas, la consulta es posible gracias a un where, 
                        el cual delimita a etnias afroecuatorianas, luego agrupa cada anio  con la función groupBy y conjuntamente con la funcion pivot permite sacar el sueldo promedio por medio del método avg que está dentro de las funciones del pivot, luego de ello se ordena por anio gracias a la funcion orderBy.
                        Y al final lo mostramos con z.show el cual es un método de zeppelin para presentar nuestras consultas de una manera más dinámica un gráfico estadístico.<br/><br/></p> 
                    <center><IMG src="" width="700" height="500"/><br/><br/></center>
                </div>
                <div id="consulta5">
                    <h2><b>En que grupo ocupacion ocupan las personas afroecuatorianas?</b></h2>
                    <p>Esta consulta permite visualizar las ocupaciones más destacadas de la etnia afroecuatoriana, esto es posible gracias a la delimitación de la data con una funcion where que limita que solo me muestre a etnias afroecuatorianas 
                        que no tengan un grupo ocupacion nulo, luego de ello lo agrupamos con groupBy y hacemos un conteo por genero, para finalmente ordenarlos por grupo_ocupacion, realizada con la funcion orderBy. 
                        Y al final lo mostramos con z.show el cual es un método de zeppelin para presentar nuestras consultas de una manera más dinámica un gráfico estadístico<br/><br/></p> 
                    <center><IMG src="" width="700" height="500"/><br/><br/></center>
                </div>
                <div id="consulta6">
                    <h2><b>Ingreso promedio por etnias</b></h2>
                    <p>primeramente al quere efectuar está consulta utilizamos sentencias sql con consultas nativas (ANSI-SQL), el cual seleccionamos la etnia, a la vez contamos cuantos son de la misma etnia y el sueldo promedio de esas etnias,
                        luego le decimos que la obtenga de la tabla personas, luego lo unimos con join con la tabla etnias que cod_canton de etnias sea igual al de cod_canton de la tabla personas. Donde le decimos que que delimite a las personas 
                        ingresos sea mayor a 400, todo esto con un where. y que los agrupe por las etnias con un groupBy y al final que los orderne con un groupBy con la tercera columna de nuestra consulta.<br/><br/></p> 
                    <center><IMG src="" width="700" height="500"/><br/><br/></center>
                </div>
            </div>
        </div>
    </div>
</div>


<?php include_once('includes/footer.php') ?>
