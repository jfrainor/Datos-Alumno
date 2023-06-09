<?php
$cedulas = $_POST['cedula'];
$nombres = $_POST['nombre'];
$nota_matematicas = $_POST['matematicas'];
$nota_fisica = $_POST['fisica'];
$nota_programacion = $_POST['programacion'];

$totalAlumnos = count($cedulas);

$notaPromedioMatematicas = array_sum($nota_matematicas) / $totalAlumnos;
$notaPromedioFisica = array_sum($nota_fisica) / $totalAlumnos;
$notaPromedioProgramacion = array_sum($nota_programacion) / $totalAlumnos;

$aprobadosMatematicas = 0;
$aprobadosFisica = 0;
$aprobadosProgramacion = 0;

$aplazadosMatematicas = 0;
$aplazadosFisica = 0;
$aplazadosProgramacion = 0;

$aprobadosTodasMaterias = 0;
$aprobadosUnaMateria = 0;
$aprobadosDosMaterias = 0;

$notaMaximaMatematicas = max($nota_matematicas);
$notaMaximaFisica = max($nota_fisica);
$notaMaximaProgramacion = max($nota_programacion);

for ($i = 0; $i < $totalAlumnos; $i++) {
    $notas = array($nota_matematicas[$i], $nota_fisica[$i], $nota_programacion[$i]);

    if ($nota_matematicas[$i] >= 10) {
        $aprobadosMatematicas++;
    } else {
        $aplazadosMatematicas++;
    }

    if ($nota_fisica[$i] >= 10) {
        $aprobadosFisica++;
    } else {
        $aplazadosFisica++;
    }

    if ($nota_programacion[$i] >= 10) {
        $aprobadosProgramacion++;
    } else {
        $aplazadosProgramacion++;
    }

    $numAprobadas = 0;
    foreach ($notas as $nota) {
        if ($nota >= 6) {
            $numAprobadas++;
        }
    }

    if ($numAprobadas == 3) {
        $aprobadosTodasMaterias++;
    } elseif ($numAprobadas == 1) {
        $aprobadosUnaMateria++;
    } elseif ($numAprobadas == 2) {
        $aprobadosDosMaterias++;
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Resultados</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <br>
        <h2>Resultados de Alumnos</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>Materia</th>
                    <th>Nota Promedio</th>
                    <th>Alumnos Aprobados</th>
                    <th>Alumnos Aplazados</th>
                    <th>Alumnos que Aprobaron todas las Materias</th>
                    <th>Alumnos que Aprobaron una Sola Materia</th>
                    <th>Alumnos que Aprobaron dos Materias</th>
                    <th>Nota Máxima</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Matemáticas</td>
                    <td><?php echo $notaPromedioMatematicas; ?></td>
                    <td><?php echo $aprobadosMatematicas; ?></td>
                    <td><?php echo $aplazadosMatematicas; ?></td>
                    <td><?php echo $aprobadosTodasMaterias; ?></td>
                    <td><?php echo $aprobadosUnaMateria; ?></td>
                    <td><?php echo $aprobadosDosMaterias; ?></td>
                    <td><?php echo $notaMaximaMatematicas; ?></td>
                </tr>
                <tr>
                    <td>Física</td>
                    <td><?php echo $notaPromedioFisica; ?></td>
                    <td><?php echo $aprobadosFisica; ?></td>
                    <td><?php echo $aplazadosFisica; ?></td>
                    <td><?php echo $aprobadosTodasMaterias; ?></td>
                    <td><?php echo $aprobadosUnaMateria; ?></td>
                    <td><?php echo $aprobadosDosMaterias; ?></td>
                    <td><?php echo $notaMaximaFisica; ?></td>
                </tr>
                <tr>
                    <td>Programación</td>
                    <td><?php echo $notaPromedioProgramacion; ?></td>
                    <td><?php echo $aprobadosProgramacion; ?></td>
                    <td><?php echo $aplazadosProgramacion; ?></td>
                    <td><?php echo $aprobadosTodasMaterias; ?></td>
                    <td><?php echo $aprobadosUnaMateria; ?></td>
                    <td><?php echo $aprobadosDosMaterias; ?></td>
                    <td><?php echo $notaMaximaProgramacion; ?></td>
                </tr>
            </tbody>
        </table>
    </div>
    <script src="script.js"></script>
</body>
</html>
