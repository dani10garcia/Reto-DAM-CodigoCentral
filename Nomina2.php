<!DOCTYPE html lang=es>

<head>
    <title>NBA Player Searcher</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="NominaCSS.css">
</head>
<style>
         body {
            background-color: black;
            background-size: cover;
            font-family: Arial, sans-serif;
            color: red;
            margin: 0;
            padding: 20px;
            
            
        }

        form {
            background-image: url('foto.jpg');
          background-repeat: repeat;
            padding: 20px;
            border-radius: 10px;
            
        
        }
        
    fieldset {
        margin-bottom: 20px; 
        border: none;
    }

    label, input {
        margin-bottom: 10px; 
    }
    button {
        background-color: #4CAF50; /* Color verde como ejemplo */
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    button:hover {
        background-color: #45a049; /* Cambio de color al pasar el ratón sobre el botón */
    }
</style>
<body>
<h1>Formulario de Nómina</h1>
<?php
if(!isset ($_POST ['salario_base1'])){
    ?>
    <form action="Nomina2.php" method="POST">
        <fieldset>
            <legend>Empresa</legend>
            <label for="nombre_empresa">Nombre:</label>
            <input type="text" id="nombre_empresa" name="nombre_empresa" value="NBA" required><br>

            <label for="domicilio_empresa">Domicilio:</label>
            <input type="text" id="domicilio_empresa" name="domicilio_empresa" value="USA" required><br>

            <label for="cif_empresa">CIF:</label>
            <input type="text" id="cif_empresa" name="cif_empresa" value="63458737c"required><br>

            <label for="cuenta_cotizacion">Código de Cuenta de Cotización:</label>
            <input type="text" id="cuenta_cotizacion" name="cuenta_cotizacion" value="45689032A" required><br>
        </fieldset>

        <fieldset>
            <legend>Trabajador</legend>
            <label for="nombre_trabajador">Nombre:</label>
            <input type="text" id="nombre_trabajador" name="nombre_trabajador" value="Jesus Zancada" required><br>

            <label for="nif_trabajador">NIF:</label>
            <input type="text" id="nif_trabajador" name="nif_trabajador" value="18956321V" required><br>

            <label for="num_seg_social">Número de la Seguridad Social:</label>
            <input type="text" id="num_seg_social" name="num_seg_social" value="945739485S" required><br>

            <label for="grupo_profesional">Grupo Profesional:</label>
            <input type="text" id="grupo_profesional" name="grupo_profesional"VALUE="Entrenador" required><br>

            <label for="grupo_cotizacion">Grupo de Cotización:</label>
            <input type="text" id="grupo_cotizacion" name="grupo_cotizacion" VALUE="4" required><br>
        </fieldset>

        <fieldset>
            <legend>Periodo de Liquidación</legend>
            <label for="periodo_liquidacion">Periodo:</label>
            <input type="text" id="periodo_liquidacion" name="periodo_liquidacion" VALUE="01/03/2024" required><br>
        </fieldset>

        <fieldset>
            <legend>Devengos</legend>
            <h4>1.Percepciones salariales</h4>
            <label for="salario_base">Salario base:</label>
            <input type="number" id="salario_base1" name="salario_base1" value="0" required><br>

            <label for="complementos_salariales">Complementos Salariales:</label><br>
            <input type="text" id="complementos_salariales" name="complementos_salariales">
            <input type="number" id="complementos_salariales1" name="complementos_salariales1"><br>
            <input type="text" id="complementos_salariales" name="complementos_salariales">
            <input type="number" id="complementos_salariales2" name="complementos_salariales2"><br>
            <input type="text" id="complementos_salariales" name="complementos_salariales">
            <input type="number" id="complementos_salariales3" name="complementos_salariales3"><br>
           
            <label for="total_complementos">Total:</label>
                <input type="number" id="total_complementos1" name="total_complementos1"value="0"><br>

            <label for="horas_extraordinarias">Horas extraordinarias:</label>
            <input type="number" id="horas_extraordinarias1" name="horas_extraordinarias1"value="0"><br>

            <label for="horas_complementarias">Horas complementarias:</label>
            <input type="number" id="horas_complementarias1" name="horas_complementarias1" VALUE="0"><br>

            <label for="gratificaciones_extraordinarias">Gratificaciones extraordinarias:</label>
            <input type="number" id="gratificaciones_extraordinarias1" name="gratificaciones_extraordinarias1" value="0"><br>

            <label for="salario_especie">Salario en especie:</label>
            <input type="number" id="salario_especie1" name="salario_especie1" value="0"><br>

            <h4>2.Percepciones no salariales</h4>
            <label for="Indemnizaciones">Indemnizaciones o suplidos</label><br>
            <input type="text" id="Indemnizaciones" name="Indemnizaciones">
            <input type="number" id="Indemnizaciones1" name="Indemnizaciones1"  value="0"><br>

            <label for="Prestaciones">Prestaciones e indemnizaciones de la Seguridad Social</label><br>
            <input type="text" id="Prestaciones" name="Prestaciones">
            <input type="number" id="Prestaciones1" name="Prestaciones1"value="0"> <br>

            <label for="otras">Otras percepciones no salariales</label><br>
            <input type="text" id="otras" name="otras">
            <input type="number" id="otras1" name="otras1"value="0"><br><br>

            
</fieldset>



<?php

}
else{
  
  
extract($_POST);
   
   
    
   $total_devengado1=$salario_base1+$total_complementos1+$horas_extraordinarias1+$horas_complementarias1+$gratificaciones_extraordinarias1+$salario_especie1+$Indemnizaciones1+$Prestaciones1+$otras1;
  //$total_devengado1 = $salario_base1 + $total_complementos1+$horas_extraordinarias1 + $horas_complementarias1 + $gratificaciones_extraordinarias1 + $salario_especie1 + $indemnizaciones1 + $prestaciones1 + $otras1;
    

    

}

?>
<?php
if(!isset ($_POST ['contingencias_comunes2'])){
    ?>

            <fieldset>
             <legend>Deducciones</legend>
             <h4>1.Aportación del trabajador a las cotizaciones de la Seguridad Social</h4>
             <label for="contingencias_comunes">Contingencias comunes:</label>
             <input type="number" id="contingencias_comunes1" name="contingencias_comunes1">%
            <input type="number" id="contingencias_comunes2" name="contingencias_comunes2"><br>

            <label for="Desempleo">Desempleo:</label>
             <input type="number" id="Desempleo1" name="Desempleo1"1 >%
            <input type="number" id="Desempleo2" name="Desempleo2"><br>

            <label for="formacion_profesional">Formación Profesional:</label>
             <input type="number" id="formacion_profesional1" name="formacion_profesional1" >%
            <input type="number" id="formacion_profesional2" name="formacion_profesional2"><br>

            <label for="Horas_extra">Horas extraordinarias:</label>
            <input type="number" id="Horas_extra1" name="Horas_extra1" >% 
            <input type="number" id="Horas_extra2" name="Horas_extra2"><br>

            <h4>2.Impuesto sobre la renta de las personas físicas</h4>
            <label for="IRPF">IRPF</label>
            <input type="number" id="IRPF1" name="IRPF1" >%
            <input type="number" id="IRPF2" name="IRPF2"><br>

            <h4>3.Anticipos</h4>
             <label for="Anticipos">Anticipos</label>
             <input type="number" id="Anticipos2" name="Anticipos2" value="0"><br>

             <h4>4.Valor de los productos recibidos en especie</h4>
             <label for="especie">Valor</label>
             <input type="number" id="especie2" name="especie2" value="0"><br>

             <h4>5.Otras deducciones<h4>
                <label for="other">Deducciones</label>
                <input type="number" id="other2" name="other2" value="0"><br><br>

               
        </fieldset>

       
        <?php
}
else{
    $ContingenciasComunes=($contingencias_comunes1*$contingencias_comunes2)/100;
    $DesempleoCalc=($Desempleo1*$Desempleo2)/100;
    $FormacionProfesional=($formacion_profesional1*$formacion_profesional2)/100;
    $HorasExtraordinarias=($Horas_extra1*$Horas_extra2)/100;

    $IRPF=($IRPF1*$IRPF2)/100;

    $total_deducir1=$ContingenciasComunes+  $DesempleoCalc+ $FormacionProfesional+$HorasExtraordinarias+ $IRPF;

   
}
    ?>
    <?php
if(!isset ($_POST ['total_liquido1'])){
    ?>
 <fieldset>
            <legend>Total a percibir</legend>
            <h3>Líquido total a percibir</h3>
            
            <button type="submit" >Calcular Líquido total</button>
            
<label for="total_liquido">Total Liquido:</label>
<input type="number" id="total_liquido1" name="total_liquido1" readonly>
        </fieldset>

        
        <?php
}
else{
    $total_liquido1=$total_devengado1-$total_deducir1;

    echo $total_liquido1;
}
    ?>



</form>
</body>
</html>