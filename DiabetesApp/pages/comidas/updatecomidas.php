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
    <title>Actualizar Registro de Comida</title>
    <style>
        body {
            background-color: #f8f9fa;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .form-container {
            background: white;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 600px;
        }
        .btn {
            font-weight: 600;
            border-radius: 8px;
        }
        h3 {
            text-align: center;
            color: #007bff;
            font-weight: bold;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>

    <div class="form-container">
        <h3>Actualizar Registro de Comida</h3>
        <form action="../../php/comidas/update.php" method="post">
            
            <div class="row">
                <div class="mb-3 col-md-6">
                    <label class="form-label">Fecha de control</label>
                    <input type="date" name="fecha_control" id="fecha_control" class="form-control"  max="<?=$fecha_hoy;?>">
                </div>
                <div class="mb-3 col-md-6">
                    <label class="form-label">Tipo de comida</label>
                    <select class="form-select" name="tipo_comida" required>
                        <option value="" disabled selected>Elige el tipo de comida...</option>
                        <option value="Desayuno">Desayuno</option>
                        <option value="Aperitivo">Aperitivo</option>
                        <option value="Comida">Comida</option>
                        <option value="Merienda">Merienda</option>
                        <option value="Cena">Cena</option>
                    </select>
                </div>
            </div>

            <div class="row">
                <div class="mb-3 col-md-6">
                    <label class="form-label">Raciones</label>
                    <input type="number" name="raciones" class="form-control" min="0" required>
                </div>
                <div class="mb-3 col-md-6">
                    <label class="form-label">Glucosa antes de la ingesta</label>
                    <input type="number" name="glucosa_preingesta" class="form-control" min="0" required>
                </div>
            </div>

            <div class="row">
                <div class="mb-3 col-md-6">
                    <label class="form-label">Insulina inyectada</label>
                    <input type="number" name="insulina" class="form-control" min="0">
                </div>
                <div class="mb-3 col-md-6">
                    <label class="form-label">Glucosa después de la ingesta</label>
                    <input type="number" name="glucosa_postingesta" class="form-control" min="0">
                </div>
            </div>

            <div class="text-center">
                <h6>¿Hubo alguna incidencia?</h6>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="glucosa_estado" id="hiperRadio" value="hiperglucemia">
                    <label class="form-check-label" for="hiperRadio">Hiperglucemia</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="glucosa_estado" id="hipoRadio" value="hipoglucemia">
                    <label class="form-check-label" for="hipoRadio">Hipoglucemia</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="glucosa_estado" id="desmarcarRadio" value="ninguna">
                    <label class="form-check-label" for="desmarcarRadio">Ninguna</label>
                </div>
            </div>

            <div id="hiperForm" class="border p-3 rounded mt-3 d-none">
                <h5>Hiperglucemia</h5>
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
                <button type="submit" class="btn btn-primary">Actualizar Registro</button>
            </div>
        </form>
    </div>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        document.getElementById("fecha_control").valueAsDate = new Date();

        const hiperRadio = document.getElementById("hiperRadio");
        const hipoRadio = document.getElementById("hipoRadio");
        const desmarcarRadio = document.getElementById("desmarcarRadio");
        const hiperForm = document.getElementById("hiperForm");
        const hipoForm = document.getElementById("hipoForm");

        hiperRadio.addEventListener("change", function () {
            hipoForm.classList.add("d-none");
            hiperForm.classList.remove("d-none");
        });

        hipoRadio.addEventListener("change", function () {
            hiperForm.classList.add("d-none");
            hipoForm.classList.remove("d-none");
        });

        desmarcarRadio.addEventListener("change", function () {
            hiperForm.classList.add("d-none");
            hipoForm.classList.add("d-none");
        });
    });
</script>

</body>
</html>
