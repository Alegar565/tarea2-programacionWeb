<?php

$message = '';

if (isset($_POST['submit'])) {

    $studentsCount = $_POST["studentsCount"];
    $averageNotes = [];
    $passStudents = [];
    $failStudents = [];
    $maxNote = ["math" => 0, "physics" => 0, "programming" => 0];
    $studentsPassAll = 0;
    $studentsPassTwo = 0;
    $studentsPassOne = 0;

    /* --- Informacion de materias ---*/
    // Matematicas
    $mathSum = 0;
    $mathPass = 0;
    $mathFail = 0;

    for ($i = 0; $i < $studentsCount; $i++) {
        $mathSum += (int)$_POST["mathNote$i"];

        if ($_POST["mathNote$i"] > 9.5) {
            $mathPass++;
        } else {
            $mathFail++;
        }

        if ($_POST["mathNote$i"] > $maxNote["math"]) {
            $maxNote["math"] = $_POST["mathNote$i"];
        }
    }
    $averageNotes["math"] = $mathSum / $studentsCount;
    $passStudents["math"] = $mathPass;
    $failStudents["math"] = $mathFail;

    // Fisica
    $physicsSum = 0;
    $physicsPass = 0;
    $physicsFail = 0;

    for ($i = 0; $i < $studentsCount; $i++) {
        $physicsSum += (int)$_POST["physicsNote$i"];

        if ($_POST["physicsNote$i"] > 9.5) {
            $physicsPass++;
        } else {
            $physicsFail++;
        }

        if ($_POST["physicsNote$i"] > $maxNote["physics"]) {
            $maxNote["physics"] = $_POST["physicsNote$i"];
        }
    }
    $averageNotes["physics"] = $physicsSum / $studentsCount;
    $passStudents["physics"] = $physicsPass;
    $failStudents["physics"] = $physicsFail;

    // Programación
    $programmingSum = 0;
    $programmingPass = 0;
    $programmingFail = 0;

    for ($i = 0; $i < $studentsCount; $i++) {
        $programmingSum += (int)$_POST["programmingNote$i"];

        if ($_POST["programmingNote$i"] > 9.5) {
            $programmingPass++;
        } else {
            $programmingFail++;
        }

        if ($_POST["programmingNote$i"] > $maxNote["programming"]) {
            $maxNote["programming"] = $_POST["programmingNote$i"];
        }
    }
    $averageNotes["programming"] = $programmingSum / $studentsCount;
    $passStudents["programming"] = $programmingPass;
    $failStudents["programming"] = $programmingFail;


    /* --- Informacion de estudiantes --- */
    for ($i = 0; $i < $studentsCount; $i++) {
        $passed = 0;

        if ($_POST["physicsNote$i"] > 9.5) {
            $passed++;
        }
        if ($_POST["physicsNote$i"] > 9.5) {
            $passed++;
        }
        if ($_POST["programmingNote$i"] > 9.5) {
            $passed++;
        }

        if ($passed == 3) {
            $studentsPassAll++;
        }
        if ($passed == 2) {
            $studentsPassTwo++;
        }
        if ($passed == 1) {
            $studentsPassOne++;
        }
    }
} else {
    $message = 'Datos incompletos, rellene el formulario correctamente.';
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>

<body>
    <main class="container-fluid">
        <h1>Resultados</h1>

        <h3>Notas promedio</h3>
        <ul>
            <li>Matematicas: <b><?= $averageNotes["math"] ?></b></li>
            <li>Física: <b><?= $averageNotes["physics"] ?></b></li>
            <li>Programación: <b><?= $averageNotes["programming"] ?></b></li>
        </ul>

        <h3>Alumnos aprobados en cada materia</h3>
        <ul>
            <li>Matematicas: <b><?= $passStudents["math"] ?></b></li>
            <li>Física: <b><?= $passStudents["physics"] ?></b></li>
            <li>Programación: <b><?= $passStudents["programming"] ?></b></li>
        </ul>

        <h3>Alumnos aplazados en cada materia</h3>
        <ul>
            <li>Matematicas: <b><?= $failStudents["math"] ?></b></li>
            <li>Física: <b><?= $failStudents["physics"] ?></b></li>
            <li>Programación: <b><?= $failStudents["programming"] ?></b></li>
        </ul><br>

        <h3>Número de alumnos que aprobaron todas las materias</h3>
        Alumnos: <b><?= $studentsPassAll ?></b><br>

        <h3>Número de alumnos que aprobaron una sola materia</h3>
        Alumnos: <b><?= $studentsPassOne ?></b><br>

        <h3>Número de alumnos que aprobaron dos materias</h3>
        Alumnos: <b><?= $studentsPassTwo ?></b><br>

        <br>

        <h3>Nota máxima de cada materia</h3>
        <ul>
            <li>Matematicas: <b><?= $maxNote["math"] ?></b></li>
            <li>Física: <b><?= $maxNote["physics"] ?></b></li>
            <li>Programación: <b><?= $maxNote["programming"] ?></b></li>
        </ul><br>

        <a href="./index.php"><button class="btn btn-danger">Volver</button></a>

        <?= "<br><br>$message<br>" ?>

    </main>
</body>


</html>