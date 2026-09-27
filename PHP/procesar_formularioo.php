<?php
    $host = "localhost";
    $username = "root";
    $password = "";
    $dbname = "practica_alumnado";

    $con = mysqli_connect($host, $username, $password, $dbname, 3307);

    //AÑADIR ALUMNO
    if(isset($_POST["inscribir"]))
    {
        $lista_alumnos = mysqli_query($con,"SELECT id_alumno FROM alumnado");
        if($lista_alumnos->num_rows >= 25)
        {
            echo '<script>alert("Has alcanzado el máximo de alumnos, elimina alguno para añadir más.")</script>';
        }else
        {
            $nombre = $_POST["nombre"];
            $apellido1 = $_POST["apellido1"];
            $apellido2 = $_POST["apellido2"];
            $nacimiento = $_POST["nacimiento"];
            $curso = $_POST["curso"];
            $email = $_POST["email"];
            $password = $_POST["password"];

            $sql = "INSERT INTO alumnado (nombre, apellido1, apellido2, nacimiento, curso, email, password)
                VALUES ('$nombre', '$apellido1', '$apellido2', '$nacimiento', '$curso', '$email', '$password')";
            $rs = mysqli_query($con, $sql);

            if(!$rs)
            {
                //echo "Ha habido un error. No se han añadido los datos.";
                echo '<script>alert("Ha habido un error. No se han añadido los datos.")</script>';

            }else
            {
                //echo "Se han añadido los datos";
                echo '<script>alert("Se han añadido los datos")</script>';
            }
        }
    }

    //LISTA DE ALUMNOS
    if(isset($_POST["ver"]))
    {
        $lista_alumnos = mysqli_query($con,"SELECT * FROM alumnado");

        //if($lista_alumnos)
        if($lista_alumnos->num_rows > 0)
        {
            while($row = $lista_alumnos->fetch_assoc())
            {
                echo "ID: " . $row["id_alumno"] . "<br/>";
                echo "Nombre: " . $row["nombre"] . " " . $row["apellido1"] . " " . $row["apellido2"] . "<br/>";
                echo "Curso: " . $row["curso"] . "<br/>";
                echo "Fecha de nacimiento: " . $row["nacimiento"] . "<br/>";
                echo "Email: " . $row["email"] . "<br/>" . "<br/>";
            }
        }else
        {
            echo '<script>alert("Error al cargar lista de alumnos")</script>';
        }
    }

    //BORRAR ALUMNO
    if(isset($_POST['eliminar']))
    {
        $id_alumno = $_POST["id_alumno"];

        $sql = "DELETE FROM alumnado WHERE id_alumno = '$id_alumno'";

        if($con->query($sql) === TRUE)
        {
            echo '<script>alert("Alumno eliminado correctamente.")</script>';
        }else
        {
            echo '<script>alert("Ha habido un error al eliminar al alumno.")</script>';
        }
    }

    //EDITAR ALUMNO
    if(isset($_POST['editar']))
    {
        $id_alumno = $_POST["id_alumno"];
        $nombre = $_POST["nombre"];
        $apellido1 = $_POST["apellido1"];
        $apellido2 = $_POST["apellido2"];
        $nacimiento = $_POST["nacimiento"];
        $curso = $_POST["curso"];
        $email = $_POST["email"];
        $password = $_POST["password"];

        $sql = "UPDATE alumnado SET nombre = '$nombre', apellido1 = '$apellido1', apellido2 = '$apellido2', nacimiento = '$nacimiento', curso = '$curso', email = '$email', password = '$password' WHERE id_alumno = '$id_alumno'";

        if($con->query($sql) === TRUE)
        {
            echo '<script>alert("Datos del alumnos editados correctamente.")</script>';
        }else
        {
            echo '<script>alert("Ha habido un error al editar los datos de alumno.")</script>';
        }
    }

    if(!$con)
    {
        die("La conexión ha fallado". mysqli_connect_error());
    }

    mysqli_close($con);
?>