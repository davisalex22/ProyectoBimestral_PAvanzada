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

val dataI = data.where($"etnia" === "1 - Indígena")
val dataA = data.where($"etnia" === "2 - Afroecuatoriano")
val dataN = data.where($"etnia" === "3 - Negro")
val dataMu = data.where($"etnia" === "4 - Mulato")
val dataMo = data.where($"etnia" === "5 - Montubio")
val dataMe = data.where($"etnia" === "6 - Mestizo")
val dataB = data.where($"etnia" === "7 - Blanco")
val dataO = data.where($"etnia" === "8 - Otro")

// COMMAND ----------

val dataB = data.where($"etnia" === "7 - Blanco")
println(dataB.count)

// COMMAND ----------

val dataM = data.where($"etnia" === "6 - Mestizo")
println(dataM.count)

// COMMAND ----------

val dataN = data.where($"etnia" === "3 - Negro")
println(dataN.count)

// COMMAND ----------

dataI.select(avg("ingreso_laboral") as "Sueldo promedio Indígena").show
dataA.select(avg("ingreso_laboral")as "Sueldo promedio Afroecuatoriano").show
dataN.select(avg("ingreso_laboral")as "Sueldo promedio Negra").show
dataMu.select(avg("ingreso_laboral")as "Sueldo promedio Mulato").show
dataMo.select(avg("ingreso_laboral")as "Sueldo promedio Montuvio").show
dataMe.select(avg("ingreso_laboral")as "Sueldo promedio Mestizo").show
dataB.select(avg("ingreso_laboral")as "Sueldo promedio Blanca").show
dataO.select(avg("ingreso_laboral")as "Sueldo promedio Otro").show

// COMMAND ----------

//Cuantas personas de etnia Negras trabajan en condicion formal, informal, Empleo Domestico, No clasificado por sector

val SFN = dataN.where($"sectorizacion" === "1 - Sector Formal")
val SIN = dataN.where($"sectorizacion" === "2 - Sector Informal")
val EDN = dataN.where($"sectorizacion" === "3 - Empleo Doméstico")
val NCN = dataN.where($"sectorizacion" === "4 - No Clasificados por Sector")

println("Etnia negra en Sector formal "+ SFN.count)
println("Etnia negra en Sector informal "+ SIN.count)
println("Etnia negra en Sector empleo domestico "+ EDN.count)
println("Etnia negra en No Clasificados por Sector "+ NCN.count)

// COMMAND ----------
//Cuantas personas de etnia Blancas trabajan en condicion forma, informal, Empleo Domestico, No clasificado por sector

val SFB = dataB.where($"sectorizacion" === "1 - Sector Formal")
val SIB = dataB.where($"sectorizacion" === "2 - Sector Informal")
val EDB = dataB.where($"sectorizacion" === "3 - Empleo Doméstico")
val NCB = dataB.where($"sectorizacion" === "4 - No Clasificados por Sector")

println("Etnia blanca en Sector formal "+ SFB.count)
println("Etnia blanca en Sector informal "+ SIB.count)
println("Etnia blanca en Sector empleo domestico "+ EDB.count)
println("Etnia blanca en No Clasificados por Sector "+ NCB.count)

// COMMAND ----------
//Cuantas personas de etnia mestizas trabajan en condicion forma, informal, Empleo Domestico, No clasificado por sector

val SFM = dataMe.where($"sectorizacion" === "1 - Sector Formal")
val SIM = dataMe.where($"sectorizacion" === "2 - Sector Informal")
val EDM = dataMe.where($"sectorizacion" === "3 - Empleo Doméstico")
val NCM = dataMe.where($"sectorizacion" === "4 - No Clasificados por Sector")

println("Etnia mestiza en Sector formal "+ SFM.count)
println("Etnia mestiza en Sector informal "+ SIM.count)
println("Etnia mestiza en Sector empleo domestico "+ EDM.count)
println("Etnia mestiza en No Clasificados por Sector "+ NCM.count)

// COMMAND ----------
//Cuantas personas de etnia negra, blanca, mestiza tienen un nivel de instrucción superior universitario vs superior no universitario vs post grado
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




