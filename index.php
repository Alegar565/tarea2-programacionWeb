 <!DOCTYPE html>
 <html lang="en">

 <head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Document</title>
 </head>

 <body>
     <h1>Actividad web 2</h1>

     <?php if (isset($_POST['submit'])) : ?>
         <form action="calculate.php" method="post">
             <?php for ($i = 0; $i < $_POST['studentsCount']; $i++) : ?>
                 <h2>Alumno <?= $i + 1 ?></h2>
                 <label for=<?= "idCard$i" ?>>Cédula de alumno</label><br>
                 <input id=<?= "idCard$i" ?> type="text" name=<?= "idCard$i" ?>><br><br>

                 <label for=<?= "name$i" ?>>Nombre de alumno</label><br>
                 <input id=<?= "name$i" ?> type="text" name=<?= "name$i" ?>><br><br>

                 <label for=<?= "mathNote$i" ?>>Nota de matemáticas</label><br>
                 <input id=<?= "mathNote$i" ?> type="text" name=<?= "mathNote$i" ?>><br><br>

                 <label for=<?= "physicsNote$i" ?>>Nota de física</label><br>
                 <input id=<?= "physicsNote$i" ?> type="text" name=<?= "physicsNote$i" ?>><br><br>

                 <label for=<?= "programmingNote$i" ?>>Nota de física</label><br>
                 <input id=<?= "programmingNote$i" ?> type="text" name=<?= "programmingNote$i" ?>><br><br>
                 <hr>
             <?php endfor ?>

             <label for="studentsCount">Cantidad de alumnos (solo lectura)</label><br>
             <input id="studentsCount" type="text" name="studentsCount" value="<?= $_POST['studentsCount'] ?>" readonly><br><br>

             <label for="submit">Enviar</label>
             <input id="submit" type="submit" name="submit">
         </form>

         <br><br>
         <a href="./"><button>Atrás</button></a>
     <?php else : ?>

         <form action="./" method="post">
             <label for="studentsCount">Cantidad de alumnos</label>
             <input id="studentsCount" type="text" name="studentsCount"><br><br>

             <label for="studentsCount">Enviar</label>
             <input id="submit" type="submit" name="submit">
         </form>

     <?php endif ?>
     <br><br>
     
     <footer>
        Diego Garcia (27.970.112)<br>
        Programación web (N1013)
     </footer>
 </body>

 
 </html>
