<?php 
    include_once('includes/header.php');
?>

<div class="all-title-box">
    <div class="container text-center">
        <h1>Documentación Técnica<span class="m_1"></span></h1>
        <p class="lead" data-animation="animated fadeInLeft">Análisis de exploratorio de datos empleo y desempleo del Ecuador</p>
    </div>
</div>

<div class="container">
        <!-- Contenido -->
        <div class="col-md-12 ">
            <div class="contenido_temas">
                <div id="esquema">
<div align="center"><img src="images/Ecuador.jpg" 
     width="400"
     height="341"></div>
                           <h2><b>Creación de esquema</b></h2>
                  <p>Una vez obtenida la data proporcianda del página <a href="https://www.ecuadorencifras.gob.ec/institucional/home/" style="color:blue;">Ecuador en cifras</a> se procedió a realizar el análisis de cada una de las columnas y su tipo de dato. Una vez determinada se planteó el siguiente esquema:<br/></p>

<pre>
<code>
import org.apache.spark.sql.types._
import org.apache.spark.sql.functions._
val myDataSchema = StructType(
  Array(
    StructField("id",DecimalType(26, 0),true),
    StructField("anio",IntegerType,true),
    StructField("mes",IntegerType,true),
    StructField("provincia",IntegerType,true),
    StructField("canton",IntegerType,true),
    StructField("area",StringType,true),
    StructField("genero",StringType,true),
    StructField("edad",IntegerType,true),
    StructField("estado_civil",StringType,true),
    StructField("nivel_de_instruccion",StringType,true),
    StructField("etnia",StringType,true),
    StructField("ingreso_laboral",IntegerType,true),
    StructField("condicion_actividad",StringType,true),
    StructField("sectorizacion",StringType,true),
    StructField("grupo_ocupacion",StringType,true),
    StructField("rama_actividad",StringType,true),
    StructField("factor_expansion",DoubleType,true)
  ));
</code>
</pre>                 
                </div>
                <div id="carga_datos">
                    <h2><b>Lectura de la Data</b></h2>
                    <p>Para realizar el análisis se cargó la data con <td><a href="https://github.com/davisalex22/ProyectoBimestral_PAvanzada/wiki".$act.">Apache Zepellin</a>. Para ello se realizó la lectura de un archivo csv de la siguiente forma: </p> 
<pre>
<code>
val data = spark
	  .read
	  .option("inferSchema","true")
	  .option("header","true")
	  .option("delimiter","\t")
	  .csv("/home/davisalex22/Programacion/Datos_ENEMDU_PEA_v2.csv")
</code>
</pre> 

                
                </div>
<div id="carga_datos">
                    <h2><b>Carga de la Base de Datos</b></h2>
                    <p>Para poder llevar acabo las consultas sql desde la base de datos en Zeppelin
fue necesario configurar el interprete MariaDB en Zepellin <a href="https://zeppelin.apache.org/docs/latest/interpreter/jdbc.html" style="color:blue;">(Guía de configuración)</a>, posterior a ello se inicializa la base de datos para poder realizar las consultas.</a></p> 
<pre>
<code>
%mariadb
USE PAvanzada_Enemdu
</code>
</pre>  
       

                
                </div>
                <div id="consulta1">
                    <h2><b>Conteo condición actividad de personas afroecuatorianas</b></h2>
<pre>
<code>
z.show(data.stat.crosstab("condicion_actividad", "anio")
           .orderBy("condicion_actividad_anio"))
</code>
</pre>  
                    <p>En esta consulta  usamos un where delimitanto las etnias a solo etnias afroecuatorianas, luego agrupamos la columna nivel_instruccion y realizamos un pivot, el método pivot nos brinda
                     una gran cantidad de operaciones que necesitemos dentro de nuestra consulta (count, avg, round, min, max, etc). Utilizamos un pivot con la columna género que conjuntamente con la función avg permite sacar el promedio de sueldos de los generos afroecuatorianos y así ordenandolos 
                        con un orderBy. Y al final lo mostramos con z.show el cual es un método de Zeppelin para presentar nuestras consultas en un gráfico estadístico.<br/><br/></p> 
<iframe src="http://42e9d765490d.ngrok.io/#/notebook/2FG9QDTXR/paragraph/paragraph_1595798412458_-574222663?asIframe" style="width: 1000px; height: 400px; border: 0px"></iframe>
                </div>
                 <div id="consulta2">
                    <h2><b>Nivel de instrucción proporcionada a personas afroecuatorianas</b></h2>
<pre>
<code>
z.show(data.where($"etnia" === "2 - Afroecuatoriano")
           .groupBy("nivel_de_instruccion")
           .count()
           .orderBy("nivel_de_instruccion"))
</code>
</pre> 
                    <p>En esta consulta primero realizamos un where el cual delimito el dataframe, en este caso lo delimitamos con la 
                        etnia Afroecuatoriano, en el cual hacemos un groupBy que agrupa la columna nivel_instruccion
                       y los cuenta todos los datos que son iguales dentro de la columna y al final ordenamos con 
                        un groupBy. Y al final lo mostramos con z.show el cual es un método de Zeppelin para presentar nuestras consultas de una manera más dinámica un gráfico estadístico.<br/><br/></p> 
                     <iframe src="http://42e9d765490d.ngrok.io/#/notebook/2FG9QDTXR/paragraph/paragraph_1595799293852_-456687849?asIframe"style="width: 1000px; height: 400px; border: 0px"></iframe>
                </div>
                <div id="consulta3">
                    <h2><b>Salario promedio por nivel de instrucción proporcionada a personas afroecuatorianas</b></h2>
<pre>
<code>
z.show(data.where($"etnia" === "2 - Afroecuatoriano")
           .groupBy("nivel_de_instruccion")
           .pivot("genero")
           .avg("ingreso_laboral")
           .orderBy("nivel_de_instruccion"))
</code>
</pre> 
                    <p>En esta consulta  usamos un where delimitanto las etnias a solo etnias afroecuatorianas, 
                        luego agrupamos la columna nivel_instruccion y realizamos un pivot, el método pivot nos brinda gran cantidad de operaciones que necesitemos dentro de nuestra consulta (count, avg, round, min, max, etc).
                         Utlizamos un pivot con la columna género que conjuntamente con la funcion avg permite sacar el promedio de sueldos de los generos afroecuatorianos y así ordenandolos 
                        con un orderBy. Y al final lo mostramos con z.show el cual es un método de Zeppelin para presentar nuestras consultas de una manera más dinámica un gráfico estadístico.<br/><br/></p> 
                </div>
                    <iframe src="http://42e9d765490d.ngrok.io/#/notebook/2FG9QDTXR/paragraph/paragraph_1595799654056_-1614270673?asIframe"style="width: 1000px; height: 400px; border: 0px"></iframe>
                <div id="consulta4">
                    <h2><b>Ingreso promedio anual de hombres y mujeres afroecuatorianos</b></h2>
<pre>
<code>
z.show(data.where($"etnia" === "2 - Afroecuatoriano")
           .groupBy("anio")
           .pivot("genero")
           .agg(round(avg("ingreso_laboral")))
           .orderBy("anio"))
</code>
</pre>
                    <p>Esta consulta sirve para sacar el sueldo promedio de generos de las etnias afroecuatorianas, la consulta es posible gracias a un where, 
                        el cual delimita a etnias afroecuatorianas, luego agrupa cada anio  con la función groupBy y conjuntamente con la función pivot permite sacar el sueldo promedio por medio del método avg que está dentro de las funciones del pivot, luego de ello se ordena por año gracias a la función orderBy.
                        Y al final lo mostramos con z.show el cual es un método de Zeppelin para presentar nuestras consultas de una manera más dinámica un gráfico estadístico.<br/><br/></p> 
                    <iframe src="http://42e9d765490d.ngrok.io/#/notebook/2FG9QDTXR/paragraph/paragraph_1595800028755_1251201211?asIframe"style="width: 1000px; height: 400px; border: 0px"></iframe>
                </div>
                <div id="consulta5">
                    <h2><b>Grupo ocupación en la que laboran las personas afroecuatorianas</b></h2>
<pre>
<code>
z.show(data.where($"etnia" === "2 - Afroecuatoriano" && $"grupo_ocupacion".isNotNull)
           .groupBy("grupo_ocupacion")
           .pivot("genero")
           .count()
           .orderBy("grupo_ocupacion"))
</code>
</pre>
                    <p>Esta consulta permite visualizar las ocupaciones más destacadas de la etnia afroecuatoriana, esto es posible gracias a la delimitación de la data con una función where que limita que solo me muestre a etnias afroecuatorianas 
                        que no tengan un grupo ocupación nulo, luego de ello lo agrupamos con groupBy y hacemos un conteo por género, para finalmente ordenarlos por grupo_ocupacion, realizada con la función orderBy. 
                        Y al final lo mostramos con z.show el cual es un método de Zeppelin para presentar nuestras consultas de una manera más dinámica un gráfico estadístico<br/><br/></p> 
                     <iframe src="http://42e9d765490d.ngrok.io/#/notebook/2FG9QDTXR/paragraph/paragraph_1595800106823_-364907899?asIframe"style="width: 1000px; height: 400px; border: 0px"></iframe>
                </div>
                <div id="consulta6">
                    <h2><b>Promedio de ingreso laboral por etnias</b></h2>
<pre>
<code>
%mariadb
SELECT etnia, COUNT(*) AS "Personas que superan el salario básico", ROUND(AVG(ingresos)) AS "Salario promedio"
FROM Personas p
JOIN etnias e ON p.cod_etnia = e.cod_etnia
WHERE p.ingresos > 400
GROUP BY etnia
ORDER BY 3 DESC;
</code>
</pre>
                    <p>Primeramente al quere efectuar está consulta utilizamos sentencias sql con consultas nativas (ANSI-SQL), el cual seleccionamos la etnia, a la vez contamos cuantos son de la misma etnia y el sueldo promedio de esas etnias,
                        luego le decimos que la obtenga de la tabla personas, luego lo unimos con join con la tabla etnias que cod_canton de etnias sea igual al de cod_canton de la tabla personas. Donde le decimos que que delimite a las personas 
                        ingresos sea mayor a 400, todo esto con un where. y que los agrupe por las etnias con un groupBy y al final que los orderne con un groupBy con la tercera columna de nuestra consulta.<br/><br/></p> 
                    <iframe src="http://42e9d765490d.ngrok.io/#/notebook/2FG9QDTXR/paragraph/paragraph_1596315763297_-1761999486?asIframe" style="width: 1000px; height: 400px; border: 0px"></iframe>
                </div>
                <div id="consulta7">
                    <h2><b>Conteo de las personas registradas por género en cada una de las etnias</b></h2>
<pre>
<code>
z.show(data.groupBy("etnia")
           .pivot("genero")
           .count
           .orderBy("etnia"))
</code>
</pre>
        
                    <p>En la siguiente consulta se procedió primero a realizar la agrupación de las etnias con el groupBy, y seguido se crea un pivote de genero por la ventaja que nos permite realizar mas operaciones, el cual conjuntamente con el count el cual va contando y nos dará el número de personas clasificada por hombres y mujeres de cada una de las etnias. Finalmente para que se presenten ordenas se le aplica el orderBy y se le especifica en base que columna en este caso las etnias. Y para su visualización se implemente el z.show que en este caso se lo presenta con la gráfica de frecuencias.<br/><br/></p> 
                    <iframe src="http://42e9d765490d.ngrok.io/#/notebook/2FG9QDTXR/paragraph/paragraph_1595800292774_606324939?asIframe" style="width: 1000px; height: 400px; border: 0px"></iframe>
                </div>
            <div id="consulta8">
                    <h2><b>Edad promedio de hombre y mujeres por cada una de las etnias registradas </b></h2>
<pre>
<code>
z.show(data.groupBy("etnia")
           .pivot("genero")
           .agg(round(avg("edad")).cast(IntegerType))
           .orderBy("etnia"))
</code>
</pre>
        
                    <p>En la siguiente consulta se realizó nuevamente la agrupación de las etnias con el empleo del groupBy y de igual forma con la utilización de un pivote el cual nos pemite la realización de más operaciones en este caso del género, en la cual con el .agg se le agrega las edades se le calcula el promedio con el avg, la cual nos da en decimales, pero al momento de aplicarle el round se lo redondea y se lo castea a Integer para que nos de la edad promedio exacta de cada personas (hombres y mujeres) de cada etnia. Y de igual forma con el z.show para presentarla de forma vizual y dinámica un gráfico estadistico como se puede ver en una gráfica de frecuencias.<br/><br/></p> 
                    <iframe src="http://42e9d765490d.ngrok.io/#/notebook/2FG9QDTXR/paragraph/paragraph_1595800814770_-929282467?asIframe" style="width: 1000px; height: 400px; border: 0px"></iframe>
                </div>
            <div id="consulta9">
                    <h2><b>Conteo de las personas que laboran en cada tipo de Sectorización en cada año registrado</b></h2>
<pre>
<code>
z.show(data.where($"sectorizacion".isNotNull)
           .groupBy("sectorizacion")
           .pivot("anio")
           .count
           .orderBy("sectorizacion"))
</code>
</pre>
                    <p>Para las siguientes representaciones se aplicó la misma consulta pero con diferente reprentación, la cual antes de su realización se excluyo los nulos con el isNotNull ya que se encontraban registros que no tenian en los datos de sectorización, seguido se agrupó la sectorización con el groupBy y presentar cada uno de los tipo de datos de esta columna, seguido con el empleo de un pivote de los años la cual nos permite realizar el conteo de los registros de cada año con el .count y se los ordena por el tipo de sectorización con el orderBy. Finalmente con el z.show se muestra el conteo de las personas que trabajan en cada uno de los años depende el tipo de trabajo, es decir de la sectorización, la cual en este caso se la presentó en tabla y en barras.<br/><br/></p> 
                    <iframe src="http://42e9d765490d.ngrok.io/#/notebook/2FG9QDTXR/paragraph/paragraph_1595800886939_-2053402092?asIframe" style="width: 1000px; height: 400px; border: 0px"></iframe>
<iframe src="http://42e9d765490d.ngrok.io/#/notebook/2FG9QDTXR/paragraph/paragraph_1595801114971_227048157?asIframe" style="width: 1000px; height: 400px; border: 0px"></iframe>
                </div>
            <div id="consulta10">
                    <h2><b>Ingreso laboral promedio de las personas que laboran en cada tipo de Sectorización en cada año</b></h2>
<pre>
<code>
z.show(data.where($"sectorizacion".isNotNull)
           .groupBy("sectorizacion")
           .pivot("anio")
           .agg(round(avg("ingreso_laboral")))
           .orderBy("sectorizacion"))
</code>
</pre>
       
                    <p>En la presente consulta se agrupo nuevamente con el groupBy de la sectorización pero excluyendo los nulos con el empleo del .isNotNull, se utilizó un pivote de los años y así poder realizar el .agg para agregar del promedio de los ingresos laborales con el uso del avg, en este caso se los ordenó con el orderBy de sectorización. De esta forma con el z.show se presenta la gráfica en tabla que nos refleja el promedio del ingreso laboraral.<br/><br/></p> 
                    <iframe src="http://42e9d765490d.ngrok.io/#/notebook/2FG9QDTXR/paragraph/paragraph_1595801319682_269850659?asIframe" style="width: 1000px; height: 400px; border: 0px"></iframe>
                </div>
                 <div id="consulta11">
                    <h2><b>Cantidad de hombre y mujeres que se dedican al Empleo doméstico registrado en el Ecuador</b></h2>
<pre>
<code>
z.show(data.where($"sectorizacion" === "3 - Empleo Doméstico")
           .groupBy("etnia")
           .pivot("genero")
           .count
           .orderBy("etnia"))
</code>
</pre>
                    <p>Para la siguiente consulta se filtró primeramente los registro correspondientes al empleo doméstico con el data.where y se crea la igualadad con la sectorización, luego se procede a agrupar por cada una de las etnias y se creo un pivote del género y reflejar la cantidad hombres y mujeres con la ayuda del .count que nos cuenta la cantidad de registro y se los ordena por etnia con el orderBy.
<br/><br/></p> 
                    <iframe src="http://42e9d765490d.ngrok.io/#/notebook/2FG9QDTXR/paragraph/paragraph_1595801925549_-905991312?asIframe" style="width: 1000px; height: 400px; border: 0px"></iframe>
                </div>
                <div id="consulta12">
                    <h2><b>Conteo de las personas dedicadas al empleo doméstico en cada provicia registrada</b></h2>
<pre>
<code>
%mariadb
SELECT provincia , COUNT(*) AS "Personas con empleo doméstico"
FROM Provincias p 
JOIN Cantones c ON p.cod_provincia = c.cod_provincia
JOIN Personas pe ON c.cod_canton = pe.cod_canton
WHERE Sectorizacion = "empleo doméstico"
GROUP BY Provincia
ORDER BY 2 DESC;
</code>
</pre>
                    <p>Para la siguiente consulta sql la realizó de la siguiente forma: con el SELECT se colocó las provincias y el conteo la cual nos presentará con un alias de persoans con empleo doméstico. Con el FROM se apunta a provincias la cual vamos a ocupar. Para llegar a cada una de las tablas que se necesita se emplea el JOIN, primero de cantones en donde se usa el cod_provincia y relacionar las provincias y los cantones, luego de ello para personas se relaciona con el cod_canton de cantones y la tabla personas, con la sentencia WHERE se ubica a todas aquellas personas con empleo doméstico. Y finalmente se los agrupa por provincia ordenando por la cantidad de personas.<br/><br/></p> 
                   <iframe src="http://42e9d765490d.ngrok.io/#/notebook/2FG9QDTXR/paragraph/paragraph_1596318043034_1719707679?asIframe" style="width: 1000px; height: 400px; border: 0px"></iframe>
                </div>
                <div id="consulta13">
                    <h2><b>Conteo de las personas registradas por rama de Construcción</b></h2>
<pre>
<code>
z.show(data.where($"rama_actividad" === "06 - F. Construcción")
           .groupBy("etnia")
           .pivot("anio")
           .count
           .orderBy("etnia"))
</code>
</pre>
                    <p>A continuación, se muestra gráficamente la cantidad de personas de cada etnia que se dedicaron durante los años 2015-2019 a la construcción, para obtener esta consulta se utilizó la data general, con una cláusula where en el cual se especifica la rama de construcción, seguido de un groupBy para agrupar por etnia, un pivot de anio para agrupar datos procedentes de otra tabla y finalmente un conteo (count) y ordenado por etnia (orderBy).
<br/><br/></p> 
                     <iframe src="http://42e9d765490d.ngrok.io/#/notebook/2FG9QDTXR/paragraph/paragraph_1595801827694_-332891911?asIframe" style="width: 1000px; height: 400px; border: 0px"></iframe>

                </div>
 <div id="consulta14">
                    <h2><b>Cantidad de hombres y mujeres de etnia Mestiza y Montubia</b></h2>
<pre>
<code>
z.show(data.where($"etnia" === "6 - Mestizo" || $"etnia" === "5 - Montubio")
            .groupBy("etnia")
            .pivot("genero")
            .count.orderBy("etnia"))
</code>
</pre>
                    <p>En la siguiente consulta primero se establece una cláusula where para especificar la etnia Mestizo y Montubio,seguidamente una agrupacion por etnia con un groupBy haciendo un pivote de género para agrupar los datos procedentes de otra tabla y posteriormente se realiza un conteo (count) y un ordenamiento (orderBy) por etnia.
<br/><br/></p> 
                    <iframe src="http://42e9d765490d.ngrok.io/#/notebook/2FG9QDTXR/paragraph/paragraph_1595802850428_2031264569?asIframe" style="width: 1000px; height: 400px; border: 0px"></iframe>

                </div>
 <div id="consulta15">
                    <h2><b>Conteo de Personas por etnia que pertenezcan al área rural y nivel de instrucción superio universitario</b></h2>
<pre>
<code>
z.show(data.where($"area" === "2 - Rural" && $"nivel_de_instruccion" === "09 - Superior Universitario")
           .groupBy("etnia")
           .count
           .orderBy("etnia"))
</code>
</pre>
                    <p>En la siguiente consulta primero se establece una cláusula where para especificar la area rural y el nivel de instrucción superior universitario,seguidamente una agrupación por etnia con un groupBy y posteriormente se realiza un conteo (count) y un ordenamiento (orderBy) por etnia. Además de usar z.show que es un contenedor de todo el sistema para funciones de utilidad comunes y datos específicos del usuario e implementa funciones para la entrada de datos, visualización de datos.
<br/><br/></p> 
                   <iframe src="http://42e9d765490d.ngrok.io/#/notebook/2FG9QDTXR/paragraph/paragraph_1595802986559_-493911874?asIframe" style="width: 1000px; height: 400px; border: 0px"></iframe>

                </div>
 <div id="consulta16">
                    <h2><b>Conteo de personas por etnia que pertenecen al área urbana</b></h2>
<pre>
<code>
%mariadb
SELECT etnia, COUNT(*) AS "Total Área Urbana"
FROM Personas p
JOIN etnias e ON p.cod_etnia = e.cod_etnia
WHERE p.area = "U"
GROUP BY etnia
ORDER BY 2;
</code>
</pre>
                    <p>Para la siguiente consulta sql utilizando mariadb se realizó de la siguiente forma: con el SELECT se selecciona la etnia y se reliza un conteo de personas que pertenecen al área urbana asignando un alias de “Total Área Urbana”. Con el FROM se señala a la tabla personas y para llegar a cada una de las tablas que se necesita se emplear el JOIN, primero al cod_etnia de personas luego al cod_etnia de etnias. Finalmente se los agrupa por etnia y ordena por el el total área urbana.
<br/><br/></p> 
                    <iframe src="http://42e9d765490d.ngrok.io/#/notebook/2FG9QDTXR/paragraph/paragraph_1596316074432_-359048355?asIframe" style="width: 1000px; height: 400px; border: 0px"></iframe>

                </div>
 <div id="consulta17">
                    <h2><b>Cantidad de personas por etnia de la provincia de Santa Elena</b></h2>
<pre>
<code>
val dataCantones = spark
	  .read
	  .option("inferSchema","true")
	  .option("header","true")
	  .option("delimiter",",")
	  .csv("/home/davisalex22/Programacion/cantonesEcuador.csv")
</code>
</pre>
                    <p>Para esta consulta previamente se realizo la lectura del csv denominado dataCantones que contiene una columna codCanton y nombreCanton, luego de ello se declaró una variable dataCanton, en el cual se aplica un join que sirve para la unión interna de tablas básicamente, luego dentro de un z.show usando la dataCanton se utiliza la cláusula where para especificar la provincia 24 (Santa Elena),luego se agrupa por etnia (groupBy), seguidamente un pivot de nombreCanton,un conte de las personas (count) y un ordenamiento por etnia (orderBy).
<pre>
<code>
val dataCanton = data.join(dataCantones,data("canton") === dataCantones("codigoCanton"),"inner")
z.show(dataCanton.where($"provincia" === 24).groupBy($"etnia").pivot("nombreCanton").count.orderB
</code>
</pre>
<br/><br/></p> 
                    <iframe src="http://42e9d765490d.ngrok.io/#/notebook/2FG9QDTXR/paragraph/paragraph_1596301276205_1139107517?asIframe" style="width: 1000px; height: 400px; border: 0px"></iframe>

                </div>
 <div id="consulta18">
                    <h2><b>Promedio de sueldo de cada Rama de Actividad</b></h2>
<pre>
<code>
%mariadb
SELECT rama, ROUND(AVG(ingresos)) AS "Sueldo Promedio"
FROM Personas p
JOIN Ramas_Actividad r ON p.cod_rama = r.cod_rama
GROUP BY rama
ORDER BY 2 DESC;
</code>
</pre>
                    <p>Para la siguiente consulta sql utilizando mariadb se realizó de la siguiente forma: con el SELECT se selecciona la rama actividad y se calcula el promedio de ingresos realizando un redondeo y asignando un alias de “Sueldo Promedio”. Con el FROM se señala a la tabla personas y para llegar a cada una de las tablas que se necesita se emplear el JOIN, primero al cod_rama de personas luego al cod_rama de Ramas_Actividad. Finalmente se los agrupa por rama y ordena por el sueldo promedio.
<br/><br/></p> 
                    <iframe src="http://42e9d765490d.ngrok.io/#/notebook/2FG9QDTXR/paragraph/paragraph_1596318097989_799072919?asIframe" style="width: 1000px; height: 400px; border: 0px"></iframe>

                </div>
<h2><b><br><br>Links importantes</b></h2>
                  <p> Repositorio del Proyecto: <a href="https://www.ecuadorencifras.gob.ec/institucional/home/" style="color:blue;">Click Aquí</a> <br/></p>
                  <p> Ecuador en Cifras: <a href="https://www.ecuadorencifras.gob.ec/institucional/home/" style="color:blue;">Click Aquí</a>
                  <p> Información Detallada: <a href="https://github.com/davisalex22/ProyectoBimestral_PAvanzada/wiki" style="color:blue;">Click Aquí</a>
                  <p> Data Cantones Ecuador: <a href="https://www.utmachala.edu.ec/archivos/SNIESE/Codificacion_Provincia-Canton-Parroquia.xlsx" style="color:blue;">Click Aquí<br></a>

            </div>
        </div>
</div>


<?php include_once('includes/footer.php') ?>
