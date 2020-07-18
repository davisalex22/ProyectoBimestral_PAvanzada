// Databricks notebook source

// Esquema 

import org.apache.spark.sql.types._
import org.apache.spark.sql.functions._
val myDataSchema = StructType(
  Array(
    StructField("id",IntegerType,true),
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

// COMMAND ----------
// Lectura data

val data = spark
	  .read
	  .option("inferSchema","true")
	  .option("header","true")
	  .option("delimiter","\t")
	  .csv("/FileStore/tables/Datos_ENEMDU_PEA_v2.csv")


// COMMAND ----------
// Separacion de etnias

val dataI = data.where($"etnia" === "1 - Indígena")
val dataA = data.where($"etnia" === "2 - Afroecuatoriano")
val dataN = data.where($"etnia" === "3 - Negro")
val dataMu = data.where($"etnia" === "4 - Mulato")
val dataMo = data.where($"etnia" === "5 - Montubio")
val dataMe = data.where($"etnia" === "6 - Mestizo")
val dataB = data.where($"etnia" === "7 - Blanco")
val dataO = data.where($"etnia" === "8 - Otro")


// COMMAND ----------
// Promedio de ingreso laboral en la columna etnias

dataI.select(avg("ingreso_laboral") as "Sueldo promedio Indígena").show
dataA.select(avg("ingreso_laboral")as "Sueldo promedio Afroecuatoriano").show
dataN.select(avg("ingreso_laboral")as "Sueldo promedio Negra").show
dataMu.select(avg("ingreso_laboral")as "Sueldo promedio Mulato").show
dataMo.select(avg("ingreso_laboral")as "Sueldo promedio Montuvio").show
dataMe.select(avg("ingreso_laboral")as "Sueldo promedio Mestizo").show
dataB.select(avg("ingreso_laboral")as "Sueldo promedio Blanca").show
dataO.select(avg("ingreso_laboral")as "Sueldo promedio Otro").show

// COMMAND ----------

// Cuantas personas de etnia negra trabajan en condicion formal, informal, Empleo Domestico, No clasificado por sector

val SFN = dataN.where($"sectorizacion" === "1 - Sector Formal")
val SIN = dataN.where($"sectorizacion" === "2 - Sector Informal")
val EDN = dataN.where($"sectorizacion" === "3 - Empleo Doméstico")
val NCN = dataN.where($"sectorizacion" === "4 - No Clasificados por Sector")

println("Etnia negra en Sector formal "+ SFN.count)
println("Etnia negra en Sector informal "+ SIN.count)
println("Etnia negra en Sector empleo domestico "+ EDN.count)
println("Etnia negra en No Clasificados por Sector "+ NCN.count)

// COMMAND ----------

// Cuantas personas de etnia Blancas trabajan en condicion forma, informal, Empleo Domestico, No clasificado por sector

val SFB = dataB.where($"sectorizacion" === "1 - Sector Formal")
val SIB = dataB.where($"sectorizacion" === "2 - Sector Informal")
val EDB = dataB.where($"sectorizacion" === "3 - Empleo Doméstico")
val NCB = dataB.where($"sectorizacion" === "4 - No Clasificados por Sector")

println("Etnia blanca en Sector formal "+ SFB.count)
println("Etnia blanca en Sector informal "+ SIB.count)
println("Etnia blanca en Sector empleo domestico "+ EDB.count)
println("Etnia blanca en No Clasificados por Sector "+ NCB.count)

// COMMAND ----------

// Cuantas personas de etnia mestiza trabajan en condicion forma, informal, Empleo Domestico, No clasificado por sector

val SFM = dataMe.where($"sectorizacion" === "1 - Sector Formal")
val SIM = dataMe.where($"sectorizacion" === "2 - Sector Informal")
val EDM = dataMe.where($"sectorizacion" === "3 - Empleo Doméstico")
val NCM = dataMe.where($"sectorizacion" === "4 - No Clasificados por Sector")

println("Etnia mestiza en Sector formal "+ SFM.count)
println("Etnia mestiza en Sector informal "+ SIM.count)
println("Etnia mestiza en Sector empleo domestico "+ EDM.count)
println("Etnia mestiza en No Clasificados por Sector "+ NCM.count)

// COMMAND ----------
// Cuantas personas de etnia negra, blanca, mestiza tienen un nivel de instrucción superior universitario vs superior no universitario vs post grado

val SUM = dataMe.where($"nivel_de_instruccion" === "09 - Superior Universitario")
val SNUM = dataMe.where($"nivel_de_instruccion" === "08 - Superior no universitario")
val PGM = dataMe.where($"nivel_de_instruccion" === "10 - Post-grado")

println(f"${(SUM.count / data.count.toDouble) * 100}%.2f%%Mestizos universitaria\n${(SNUM.count / data.count.toDouble) * 100}%.2f%%Mestizos no universitario\n${(PGM.count / data.count.toDouble) * 100}%.2f%%Mestizos post grado")

val SUB = dataB.where($"nivel_de_instruccion" === "09 - Superior Universitario")
val SNUB = dataB.where($"nivel_de_instruccion" === "08 - Superior no universitario")
val PGB = dataB.where($"nivel_de_instruccion" === "10 - Post-grado")

println(f"${(SUB.count / data.count.toDouble) * 100}%.2f%%Blancos universitaria\n${(SNUB.count / data.count.toDouble) * 100}%.2f%%Blancos no universitario\n${(PGB.count / data.count.toDouble) * 100}%.2f%%Blancos post grado")


val SUN = dataN.where($"nivel_de_instruccion" === "09 - Superior Universitario")
val SNUN = dataN.where($"nivel_de_instruccion" === "08 - Superior no universitario")
val PGN = dataN.where($"nivel_de_instruccion" === "10 - Post-grado")

println(f"${(SUN.count / data.count.toDouble) * 100}%.2f%%Etnia negra universitaria\n${(SNUN.count / data.count.toDouble) * 100}%.2f%%Etnia negra no universitaria\n${(PGN.count / data.count.toDouble) * 100}%.2f%%Etnia negra con post grado")

// COMMAND ----------

// Cual es el sueldo maxímo y minímo de una persona de etnia negra, blanca, mestiza con nivel de instruccion universitario, no universitaria, post grado 

SUM.select(min("ingreso_laboral").as("minímo mestizos con educación superior"), max("ingreso_laboral").as("maxímo mestizos con educación superior")).show
SNUM.select(min("ingreso_laboral").as("minímo mestizos con educación no superior"), max("ingreso_laboral").as("maxímo mestizos con educación no superior")).show
PGM.select(min("ingreso_laboral").as("minímo mestizos con post grado"), max("ingreso_laboral").as("maxímo mestizos con post grado")).show

SUB.select(min("ingreso_laboral").as("minímo blancos con educación superior"), max("ingreso_laboral").as("maxímo blancos con educación superior")).show
SNUB.select(min("ingreso_laboral").as("minímo blancos con educación no superior"), max("ingreso_laboral").as("maxímo blancos con educación no superior")).show
PGB.select(min("ingreso_laboral").as("minímo blancos con post grado"), max("ingreso_laboral").as("maxímo blancos con post grado")).show

SUN.select(min("ingreso_laboral").as("minímo etnia negra con educación superior"), max("ingreso_laboral").as("maxímo etnia negra con educación superior")).show
SNUN.select(min("ingreso_laboral").as("minímo etnia negra con educación no superior"), max("ingreso_laboral").as("maxímo etnia negra con educación no superior")).show
PGN.select(min("ingreso_laboral").as("minímo etnia negra con post grado"), max("ingreso_laboral").as("maxímo etnia negra con post grado")).show


// COMMAND ----------

// Edades promedio de cada una de las etnias  ----------

dataI.select(avg("edad") as "Edad promedio Indígena").show
dataA.select(avg("edad") as "Edad promedio Afroecuatoriano").show
dataN.select(avg("edad") as "Edad promedio Negro").show
dataMu.select(avg("edad") as "Edad promedio Mulato").show
dataMo.select(avg("edad") as "Edad promedio Montubio").show
dataMe.select(avg("edad") as "Edad promedio Mestizo").show
dataB.select(avg("edad") as "Edad promedio Blanco").show
dataO.select(avg("edad") as "Edad promedio Otros").show

// Porcentaje de personas de cada una de las etnias Etnias  ----------

println(f"${(dataI.count/data.count.toDouble)*100}%.2f%% Indígenas\n${(dataA.count/data.count.toDouble)*100}%.2f%% Afroecuatoriano\n${(dataN.count/data.count.toDouble)*100}%.2f%% Negro\n${(dataMu.count/data.count.toDouble)*100}%.2f%% Mulato\n${(dataMo.count/data.count.toDouble)*100}%.2f%% Montubio\n${(dataMe.count/data.count.toDouble)*100}%.2f%% Mestizo\n${(dataB.count/data.count.toDouble)*100}%.2f%% Blanco\n${(dataO.count/data.count.toDouble)*100}%.2f%% Otro")


// Número de personas que tiene un empleo adecuado de etnia Mestiza, Blanco y Negra ----------

val condMe = dataMe.where($"condicion_actividad" === "1 - Empleo Adecuado/Pleno").count
val condB = dataB.where($"condicion_actividad" === "1 - Empleo Adecuado/Pleno").count
val condN = dataN.where($"condicion_actividad" === "1 - Empleo Adecuado/Pleno").count

println("Número de personas con Empleo adecuado de Mestizos: "+ condMe+ "\nNúmero de personas con Empleo adecuado de Blancos: "+condB+"\nNúmero de personas con Empleo adecuado de Negros: "+condN)

// Porcentaje de personas de Loja que son Mestizos, Blanco y Negro ----------

val cantTotal = data.where($"provincia" === "11")
val cantMe = dataMe.where($"provincia" === "11")
val cantB = dataB.where($"provincia" === "11")
val cantN = dataN.where($"provincia" === "11")
println(f"${(cantMe.count*100)/cantTotal.count.toDouble}%.2f%% Mestizos\n"+ f"${(cantB.count*100)/cantTotal.count.toDouble}%.2f%% Blancos\n"+f"${(cantN.count*100)/cantTotal.count.toDouble}%.2f%% Negros")

// COMMAND ----------
// Cantidad de Hombres y Mujeres Mestizas y afroecuatorianas

val dataMe = data.where($"genero" === "2 - Mujer" && $"etnia" === "6 - Mestizo")
val dataHe = data.where($"genero" === "1 - Hombre" && $"etnia" === "6 - Mestizo")
val dataMa = data.where($"genero" === "2 - Mujer" && $"etnia" === "2 - Afroecuatoriano")
val dataHa = data.where($"genero" === "1 - Hombre" && $"etnia" === "2 - Afroecuatoriano")
println("Existen "+ dataHe.count + " mujeres mestizas")
println("Existen "+ dataMe.count + " hombres mestizos")
println("Existen "+ dataHa.count + " hombres afroecuatorianos")
println("Existen "+ dataMa.count + " mujeres afroecuatorianas")

// COMMAND ----------
// Sueldo maximo que gana una mujer meztiza y afroecuatoriana en el sector Empleo Doméstico

dataMe.where($"sectorizacion" === "3 - Empleo Doméstico").select(max("ingreso_laboral").as("Máximo sueldo de una empleada domestica mestiza")).show
dataMa.where($"sectorizacion" === "3 - Empleo Doméstico").select(max("ingreso_laboral").as("Máximo sueldo de una empleada domestica afroecuatorina")).show

// COMMAND ----------
// Cantidad de personas que trabajan en el sector de la construccion de todas las etnias

data
   .where($"rama_actividad" === "06 - F. Construcción")
   .groupBy("etnia")
   .agg(count("*").as("Cantidad de personas"))
   .show()

// COMMAND ----------
// Cantidad de personas del sector rural que tienen un nivel de instruccion superior universitario de todas las etnias

data
   .where($"area" === "2 - Rural" && $"nivel_de_instruccion" === "09 - Superior Universitario")
   .groupBy("etnia")
   .agg(count("*").as("Area Urbana")).show()
