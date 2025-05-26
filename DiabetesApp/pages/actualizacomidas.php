<?php
//? Guarda fecha en la variable para marcar límite en el registro
$fecha_hoy = date('Y-m-d');
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Registro de Glucosa</title>
    <style>
        .custom-radio .form-check-input {
            background-color: #6c757d;
            border-color: #6c757d; 
        }
        .custom-radio .form-check-input:checked {
            background-color: #0d6efd;
            border-color: #0d6efd; 
        }
    </style>
</head>
<body>
    <div class="container mt-4">
        <div class="row">
            <div class="col-lg-8 mx-auto border border-primary-subtle rounded p-4">
                <form action="../php/comidas/update.php" method="post">
                    <h3>Introduce los datos de la comida realizada</h3>
                    <div class="row">
                        <div class="mb-3 col-md-4">
                            <label class="form-label">Fecha de control</label>
                            <input type="date" name="fecha_control" max="<?= $fecha_hoy;?>" class="form-control">
                        </div>
                        <div class="mb-3 col-md-4">
                            <label class="form-label">Tipo de comida</label>
                            <select class="form-select" id="tipo_comida" name="tipo_comida">
                                <option selected>Elige el tipo de comida...</option>
                                <option value="Desayuno">Desayuno</option>
                                <option value="Aperitivo">Aperitivo</option>
                                <option value="Comida">Comida</option>
                                <option value="Merienda">Merienda</option>
                                <option value="Cena">Cena</option>
                            </select>
                        </div>
                        <div class="mb-3 col-md-4">
                            <label class="form-label">Raciones</label>
                            <input type="number" name="raciones" class="form-control" min="0">
                        </div>
                    </div>

                    <div class="row">
                        <div class="mb-3 col-md-4">
                            <label class="form-label">Glucosa antes de la ingesta</label>
                            <input type="number" name="glucosa_preingesta" class="form-control" min="0">
                        </div>
                        <div class="mb-3 col-md-4">
                            <label class="form-label">Insulina inyectada</label>
                            <input type="number" name="insulina" class="form-control" min="0">
                        </div>
                        <div class="mb-3 col-md-4">
                            <label class="form-label">Glucosa después de la ingesta</label>
                            <input type="number" name="glucosa_postingesta" class="form-control" min="0">
                        </div>
                    </div>

                    <div class="text-center">
                        <h6>Posibles incidencias</h6>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="glucosa_estado" id="hiperRadio" value="hiperglucemia">
                            <label class="form-check-label" for="hiperRadio">Hiperglucemia</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="glucosa_estado" id="hipoRadio" value="hipoglucemia">
                            <label class="form-check-label" for="hipoRadio">Hipoglucemia</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="glucosa_estado" id="desmarcarRadio" value="desmarcar">
                            <label class="form-check-label" for="desmarcarRadio">Desmarcar</label>
                        </div>
                    </div>

                    <!-- Formulario Hiperglucemia -->
                    <div id="hiperForm" class="border p-3 rounded mt-3 d-none">
                        <h5>Hiperglucemia</h5>
                        <div class="mb-3">
                            
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Medida de glucosa</label>
                            <input type="number" name="glucosa_hiper" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Hora de la medida</label>
                            <input type="time" name="hora_hiper" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Unidades de corrección de insulina</label>
                            <input type="number" name="unidades_correccion" class="form-control" min="0">
                        </div>
                    </div>

                    <!-- Formulario Hipoglucemia -->
                    <div id="hipoForm" class="border p-3 rounded mt-3 d-none">
                        <h5>Hipoglucemia</h5>
                        <div class="mb-3">
                            <label class="form-label">Medida de glucosa</label>
                            <input type="number" name="glucosa_hipo" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Hora de la medida</label>
                            <input type="time" name="hora_hipo" class="form-control">
                        </div>
                    </div>

                    <div class="text-center mt-4">
                        <button type="submit" class="btn btn-primary">Enviar</button>
                        <a href="../panel.php" class="btn btn-light">Volver a Inicio</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const hiperglucemia = document.getElementById("hiperRadio");
        const hipoglucemia = document.getElementById("hipoRadio");
        const desmarcar = document.getElementById("desmarcarRadio");
        const hiperglucemiaForm = document.getElementById("hiperForm");
        const hipoglucemiaForm = document.getElementById("hipoForm");

        function mostrarHiper() {
            hipoglucemiaForm.classList.add("d-none");
            hiperglucemiaForm.classList.remove("d-none");
        }

        function mostrarHipo() {
            hiperglucemiaForm.classList.add("d-none");
            hipoglucemiaForm.classList.remove("d-none");
        }

        function ocultarFormularios() {
            hiperglucemiaForm.classList.add("d-none");
            hipoglucemiaForm.classList.add("d-none");
        }

        hiperglucemia.addEventListener("change", mostrarHiper);
        hipoglucemia.addEventListener("change", mostrarHipo);
        desmarcar.addEventListener("change", ocultarFormularios);
    });
</script>
</body>
</html>
