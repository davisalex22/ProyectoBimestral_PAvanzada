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

