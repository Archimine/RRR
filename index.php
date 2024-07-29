<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilos.css">
    <title>GESTIÓN DE LISTAS DE ESPERA</title>
</head>
<body>
    <header class="site-header inicio">
        <div class="contenedor contenido-header">
            <div class="barra">
                <a href="index.php">
                    <img src="Imagenes/university_logo.png" alt="Logo Universidad Ejemplo">
                </a>
                <nav id="navegacion" class="navegacion">
                    <a href="admin.php">Administrador</a>
                    <a href="contacto.php">Contacto</a>
                </nav>
            </div>
            <h1>Sistema de Generación de Listas de Espera</h1>
        </div>
    </header>

    <section class="contenedor seccion">
        <h3 class="fw-300 centrar-texto">Sobre Nosotros</h3>
        <div class="iconos-nosotros">
            <div class="icono">
                <img src="Imagenes/icons8-smart-home-shield-100.png" alt="Seguridad">
                <h3 class="encabezado mayusculas">Seguridad</h3>
                <p>Rutas profesionales te guían de principiante a profesional</p>
            </div>
            <div class="icono">
                <img src="Imagenes/icons8-presupuesto-100.png" alt="Precios Accesibles">
                <h3 class="encabezado mayusculas">Precios Accesibles</h3>
                <p>Inteligencia artificial y comunidad que responde tus dudas</p>
            </div>
            <div class="icono">
                <img src="Imagenes/icons8-protección-en-tiempo-real-100.png" alt="A tiempo">
                <h3 class="encabezado mayusculas">A tiempo</h3>
                <p>Organiza el aprendizaje de tu equipo.</p>
            </div>
        </div>
    </section>

    <section class="matriculacion">
        <h3 class="fw-300 centrar-texto seccion">Matriculación en Cursos</h3>
        <form method="post" action="matricular.php">
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" placeholder="Nombre" required>
            <br>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" placeholder="Email" required>
            <br>
            <label for="cedula">Cédula:</label>
            <input type="text" id="cedula" name="cedula" placeholder="Cédula" required>
            <br>
            <label for="id_curso">Selecciona un Curso:</label>
            <select id="id_curso" name="id_curso" required>
                <!-- Los cursos se cargarán dinámicamente desde PHP -->
                <?php
                include("get_cursos.php");
                foreach ($cursos as $curso) {
                    echo "<option value='{$curso['id']}'>{$curso['nombre']}</option>";
                }
                ?>
            </select>
            <br>
            <input type="submit" name="register" value="Matricularse">
        </form>
    </section>

    <footer class="site-footer seccion">
        <div class="contenedor contenedor-footer">
            <nav class="navegacion">
                <a href="admin.php">Administración</a>
                <a href="contacto.php">Contacto</a>
            </nav>
            <p class="copyrigth">Todos los derechos reservados 2023 &copy;</p>
            <p class="copyright">Página hecha por: Michelle Stefania Orquera Bazurto</p>
        </div>
    </footer>
</body>
</html>
