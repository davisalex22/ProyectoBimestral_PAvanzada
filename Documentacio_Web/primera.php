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
        <!-- Contenido -->
        <div class="col-md-8 ">
            <div class="contenido_temas">
                <div id="esquema">
                  <h2><b>Esquema Planeado</b></h2>
                  <p>Una vez obtenida la data proporcianda del página: <a href="https://www.ecuadorencifras.gob.ec/institucional/home/".$act.">Ecuador en cifras</a> se procedió a realizar el analisis de cada una de las columnas y su tipo de dato. Una vez determinada se planteó el siguiente esquema:<br/></p> 
                 <iframe src="http://4ecb8aad8d77.ngrok.io/#/notebook/2FGATDZNY/paragraph/paragraph_1595798412458_-574222663?asIframe" style="width: 500px; height: 130px; border: 0px"></iframe>
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
<iframe src="http://42e9d765490d.ngrok.io/#/notebook/2FG9QDTXR/paragraph/paragraph_1595798412458_-574222663?asIframe" style="width: 1000px; height: 400px; border: 0px"></iframe>
                </div>
                 <div id="consulta2">
                    <h2><b>nivel de instruccion proporcionada a personas afroecuatorianas</b></h2>
                    <p>En esta consulta primero realizamos un where el cual delimito la dataframe, en este caso lo delimitamos con la 
                        etnia Afroecuatoriano, en el cual hacemos un groupBy el cual agrupa con la columna nivel_instruccion, 
                        el cual los cuenta todos los datos que son iguales dentro de la columna y al final ordenamos con 
                        un groupBy. Y al final lo mostramos con z.show el cual es un método de zeppelin para presentar nuestras consultas de una manera más dinámica un gráfico estadístico.<br/><br/></p> 
                     <iframe src="http://42e9d765490d.ngrok.io/#/notebook/2FG9QDTXR/paragraph/paragraph_1595799293852_-456687849?asIframe"style="width: 1000px; height: 400px; border: 0px"></iframe>
                </div>
                <div id="consulta3">
                    <h2><b>nivel de instruccion proporcionada a personas afroecuatorianas</b></h2>
                    <p>En esta consulta  usamos un where delimitanto las etnias a solo etnias afroecuatorianas, 
                        luego agrupamos la columna nivel_instruccion y realizamos un pivot, el métod pivot nos brinda gran cantidad de operaciones que necesitemos dentro de nuestra consulta (count, avg, round, min, max, etc).
                         utlizamos un pivot con la columna genero que conjuntamente con la funcion avg permite sacar el promedio de sueldos de los generos afroecuatorianos y así ordenandolos 
                        con un orderBy. Y al final lo mostramos con z.show el cual es un método de zeppelin para presentar nuestras consultas de una manera más dinámica un gráfico estadístico.<br/><br/></p> 
                </div>
                    <iframe src="http://42e9d765490d.ngrok.io/#/notebook/2FG9QDTXR/paragraph/paragraph_1595799654056_-1614270673?asIframe"style="width: 1000px; height: 400px; border: 0px"></iframe>
                <div id="consulta4">
                    <h2><b>promedio de ingreso laboral de hombres y mujeres afroecuatorianos</b></h2>
                    <p>Esta consulta sirve para sacar el sueldo promedio de generos de las etnias afroecuatorianas, la consulta es posible gracias a un where, 
                        el cual delimita a etnias afroecuatorianas, luego agrupa cada anio  con la función groupBy y conjuntamente con la funcion pivot permite sacar el sueldo promedio por medio del método avg que está dentro de las funciones del pivot, luego de ello se ordena por anio gracias a la funcion orderBy.
                        Y al final lo mostramos con z.show el cual es un método de zeppelin para presentar nuestras consultas de una manera más dinámica un gráfico estadístico.<br/><br/></p> 
                    <iframe src="http://42e9d765490d.ngrok.io/#/notebook/2FG9QDTXR/paragraph/paragraph_1595800028755_1251201211?asIframe"style="width: 1000px; height: 400px; border: 0px"></iframe>
                </div>
                <div id="consulta5">
                    <h2><b>En que grupo ocupacion ocupan las personas afroecuatorianas?</b></h2>
                    <p>Esta consulta permite visualizar las ocupaciones más destacadas de la etnia afroecuatoriana, esto es posible gracias a la delimitación de la data con una funcion where que limita que solo me muestre a etnias afroecuatorianas 
                        que no tengan un grupo ocupacion nulo, luego de ello lo agrupamos con groupBy y hacemos un conteo por genero, para finalmente ordenarlos por grupo_ocupacion, realizada con la funcion orderBy. 
                        Y al final lo mostramos con z.show el cual es un método de zeppelin para presentar nuestras consultas de una manera más dinámica un gráfico estadístico<br/><br/></p> 
                     <iframe src="http://42e9d765490d.ngrok.io/#/notebook/2FG9QDTXR/paragraph/paragraph_1595800106823_-364907899?asIframe"style="width: 1000px; height: 400px; border: 0px"></iframe>
                </div>
                <div id="consulta6">
                    <h2><b>Ingreso promedio por etnias</b></h2>
                    <p>primeramente al quere efectuar está consulta utilizamos sentencias sql con consultas nativas (ANSI-SQL), el cual seleccionamos la etnia, a la vez contamos cuantos son de la misma etnia y el sueldo promedio de esas etnias,
                        luego le decimos que la obtenga de la tabla personas, luego lo unimos con join con la tabla etnias que cod_canton de etnias sea igual al de cod_canton de la tabla personas. Donde le decimos que que delimite a las personas 
                        ingresos sea mayor a 400, todo esto con un where. y que los agrupe por las etnias con un groupBy y al final que los orderne con un groupBy con la tercera columna de nuestra consulta.<br/><br/></p> 
                    <<iframe src="http://42e9d765490d.ngrok.io/#/notebook/2FG9QDTXR/paragraph/paragraph_1596315763297_-1761999486?asIframe" style="width: 1000px; height: 400px; border: 0px"></iframe>
                </div>
                <div id="consulta7">
                    <h2><b>Conteo de las personas registradas por genero en cada una de las etnias</b></h2>
                    <p>En la siguiente consulta se procedió primero a realizar la agrupación de las etnias con el groupBy, y seguido se crea un pivote de genero por la ventaja que nos permite realizar mas operaciones, el cual conjuntamente con el count el cual va contando y nos dará el número de personas clasificada por hombres y mujeres de cada una de las etnias. Finalmente para que se presenten ordenas se le aplica el orderBy y se le especifica en base que columna en este caso las etnias. Y para su visualización se implemente el z.show que en este caso se lo presenta con la gráfica de frecuencias.<br/><br/></p> 
                    <iframe src="http://42e9d765490d.ngrok.io/#/notebook/2FG9QDTXR/paragraph/paragraph_1595800292774_606324939?asIframe" style="width: 1000px; height: 400px; border: 0px"></iframe>
                </div>
            <div id="consulta8">
                    <h2><b>Edad promedio de hombre y mujeres por cada una de las etnias registradas </b></h2>
                    <p>En la siguiente consulta se realizó nuevamente la agrupación de las etnias con el empleo del groupBy y de igual forma con la utilización de un pivote el cual nos pemite la realizacion de mas operaciones en este caso del género, en la cual con el .agg se le agrega las edades se le calcula el promedio con el avg, la cual nos da en decimales, pero al momento de aplicarle el round se lo redondea y se lo castea a Integer para que nos de la edad promedio exacta de cada personas (hombres y mujeres) de cada etnia. Y de igual forma con el z.show para presentarla de forma vizual y dinámica un gráfico estadistico como se puede ver en una gráfica de frecuencias.<br/><br/></p> 
                    <iframe src="http://42e9d765490d.ngrok.io/#/notebook/2FG9QDTXR/paragraph/paragraph_1595800814770_-929282467?asIframe" style="width: 1000px; height: 400px; border: 0px"></iframe>
                </div>
            <div id="consulta9">
                    <h2><b>Conteo de las personas que laboran en cada tipo de Sectorización en cada año registrado</b></h2>
                    <p>Para las siguientes representaciones se aplicó la misma consulta pero con diferente reprentación, la cual antes de su realización se excluyo los nulos con el isNotNull ya que se encontraban registros que no tenian en los datos de sectorización, seguido se agrupó la sectorización con el groupBy y presentar cada uno de los tipo de datos de esta columna, seguido con el empleo de un pivote de los años la cual nos permite realizar el conteo de los registros de cada año con el .count y se los ordena por el tipo de sectorizacion con el orderBy. Finalmente con el z.show se muestra el conteo de las personas que trabajan en cada uno de los años depende el tipo de trabajo, es decir de la sectorización, la cual en este caso se la presentó en tabla y en barras.<br/><br/></p> 
                    <iframe src="http://42e9d765490d.ngrok.io/#/notebook/2FG9QDTXR/paragraph/paragraph_1595800886939_-2053402092?asIframe" style="width: 1000px; height: 400px; border: 0px"></iframe>
<iframe src="http://42e9d765490d.ngrok.io/#/notebook/2FG9QDTXR/paragraph/paragraph_1595801114971_227048157?asIframe" style="width: 1000px; height: 400px; border: 0px"></iframe>
                </div>
            <div id="consulta10">
                    <h2><b>Ingreso laboral promedio de las personas que laboran en cada tipo de Sectorización en cada año</b></h2>
                    <p>En la presente consulta se agrupo nuevamente con el groupBy de la sectorización pero excluyendo los nulos con el empleo del .isNotNull, se utilizó un pivote de los años y así poder realizar el .agg para agregar del promedio de los ingresos laborales con el uso del avg, en este caso se los ordenó con el orderBy de sectorización. De esta forma con el z.show se presenta la gráfica en tabla que nos refleja el promedio del ingreso laboraral.<br/><br/></p> 
                    <iframe src="http://42e9d765490d.ngrok.io/#/notebook/2FG9QDTXR/paragraph/paragraph_1595801319682_269850659?asIframe" style="width: 1000px; height: 400px; border: 0px"></iframe>
                </div>
                 <div id="consulta11">
                    <h2><b>Cantidad de hombre y mujeres que se dedican al Empleo doméstico registrado en el Ecuador</b></h2>
                    <p>Para la siguiente consulta se filtró primeramente los registro correspondientes al empleo doméstico con el data.where y se crea la igualadad con la sectorización, luego se procede a agrupar por cada una de las etnias y se creo un pivote del género y reflejar la cantidad hombres y mujeres con la ayuda del .count que nos cuenta la cantidad de registro y se los ordena por etnia con el orderBy.
<br/><br/></p> 
                    <iframe src="http://42e9d765490d.ngrok.io/#/notebook/2FG9QDTXR/paragraph/paragraph_1595801925549_-905991312?asIframe" style="width: 1000px; height: 400px; border: 0px"></iframe>
                </div>
                <div id="consulta12">
                    <h2><b>Conteo de las personas dedicadas al empleo doméstico en cada provicia registrada</b></h2>
                    <p>Para la siguiente consulta sql la realizó de la siguiente forma: con el SELECT se colocó las provincias y el conteo la cual nos presentará con un alias de persoans con empleo doméstico. Con el FROM se apunta a provincias la cual vamos a ocupar. Para llegar a cada una de las tablas que se necesita se emplea el JOIN, primero de cantones en donde se usa el cod_provincia y relacionar las provincias y los cantones, luego de ello para personas se relaciona con el cod_canton de cantones y la tabla personas, con la sentencia WHERE se ubica a todas aquellas personas con empleo doméstico. Y finalmente se los agrupa por provincia ordenando por la cantidad de personas.
<br/><br/></p> 
                   <iframe src="http://42e9d765490d.ngrok.io/#/notebook/2FG9QDTXR/paragraph/paragraph_1596318043034_1719707679?asIframe" style="width: 1000px; height: 400px; border: 0px"></iframe>

                </div>
                <div id="consulta13">
                    <h2><b>Conteo de las personas registradas por rama de Construcción</b></h2>
                    <p>A continuación, se muestra gráficamente la cantidad de personas de cada etnia que se dedicaron durante los años 2015-2019 a la construcción, para obtener esta consulta se utilizó la data general, con una cláusula where en el cual se especifica la rama de construcción, seguido de un groupBy para agrupar por etnia, un pivot de anio para agrupar datos procedentes de otra tabla y finalmente un conteo (count) y ordenado por etnia (orderBy).
<br/><br/></p> 
                     <iframe src="http://42e9d765490d.ngrok.io/#/notebook/2FG9QDTXR/paragraph/paragraph_1595801827694_-332891911?asIframe" style="width: 1000px; height: 400px; border: 0px"></iframe>

                </div>
 <div id="consulta14">
                    <h2><b>Cantidad de hombres y mujeres de etnia Mestiza y Montubia</b></h2>
                    <p>En la siguiente consulta primero se establece una cláusula where para especificar la etnia Mestizo y Montubio,seguidamente una agrupacion por etnia con un groupBy haciendo un pivote de genero para agrupar los datos procedentes de otra tabla y posteriormente se realiza un conteo (count) y un ordenamiento (orderBy) por etnia.
<br/><br/></p> 
                    <iframe src="http://42e9d765490d.ngrok.io/#/notebook/2FG9QDTXR/paragraph/paragraph_1595802850428_2031264569?asIframe" style="width: 1000px; height: 400px; border: 0px"></iframe>

                </div>
 <div id="consulta15">
                    <h2><b>Conteo de Personas por etnia que pertenezcan al área rural y nivel de instrucción superio universitario</b></h2>
                    <p>En la siguiente consulta primero se establece una cláusula where para especificar la area rural y el nivel de instrucción superior universitario,seguidamente una agrupacion por etnia con un groupBy y posteriormente se realiza un conteo (count) y un ordenamiento (orderBy) por etnia. Además de usar z.show que es un contenedor de todo el sistema para funciones de utilidad comunes y datos específicos del usuario e implementa funciones para la entrada de datos, visualización de datos.
<br/><br/></p> 
                   <iframe src="http://42e9d765490d.ngrok.io/#/notebook/2FG9QDTXR/paragraph/paragraph_1595802986559_-493911874?asIframe" style="width: 1000px; height: 400px; border: 0px"></iframe>

                </div>
 <div id="consulta16">
                    <h2><b>Conteo de personas por etnia que pertenecen al área urbana</b></h2>
                    <p>Para la siguiente consulta sql utilizando mariadb se realizó de la siguiente forma: con el SELECT se selecciona la etnia y se reliza un conteo de personas que pertenecen al área urbana asignando un alias de “Total Área Urbana”. Con el FROM se señala a la tabla personas y para llegar a cada una de las tablas que se necesita se emplear el JOIN, primero al cod_etnia de personas luego al cod_etnia de etnias. Finalmente se los agrupa por etnia y ordena por el el total área urbana.
<br/><br/></p> 
                    <iframe src="http://42e9d765490d.ngrok.io/#/notebook/2FG9QDTXR/paragraph/paragraph_1596316074432_-359048355?asIframe" style="width: 1000px; height: 400px; border: 0px"></iframe>

                </div>
 <div id="consulta17">
                    <h2><b>Cantidad de personas por etnia de la provincia de Santa Elena</b></h2>
                    <p>Para esta consulta previamente se realizo la lectura del csv denominado dataCantones que contiene una columna codCanton y nombreCanton, luego de ello se declaró una variable dataCanton, en el cual se aplica un join que sirve para la unión interna de tablas básicamente, luego dentro de un z.show usando la dataCanton se utiliza la cláusula where para especificar la provincia 23 (Santo Domingo),luego se agrupa por etnia (groupBy), seguidamente un pivot de nombreCanton,un conte de las personas (count) y un ordenamiento por etnia (orderBy).
<br/><br/></p> 
                    <iframe src="http://42e9d765490d.ngrok.io/#/notebook/2FG9QDTXR/paragraph/paragraph_1596301276205_1139107517?asIframe" style="width: 1000px; height: 400px; border: 0px"></iframe>

                </div>
 <div id="consulta18">
                    <h2><b>Promedio de sueldo de cada Rama de Actividad</b></h2>
                    <p>Para la siguiente consulta sql utilizando mariadb se realizó de la siguiente forma: con el SELECT se selecciona la rama actividad y se calcula el promedio de ingresos realizando un redondeo y asignando un alias de “Sueldo Promedio”. Con el FROM se señala a la tabla personas y para llegar a cada una de las tablas que se necesita se emplear el JOIN, primero al cod_rama de personas luego al cod_rama de Ramas_Actividad. Finalmente se los agrupa por rama y ordena por el sueldo promedio.
<br/><br/></p> 
                    <iframe src="http://42e9d765490d.ngrok.io/#/notebook/2FG9QDTXR/paragraph/paragraph_1596318097989_799072919?asIframe" style="width: 1000px; height: 400px; border: 0px"></iframe>

                </div>
            </div>
        </div>
</div>


<?php include_once('includes/footer.php') ?>
