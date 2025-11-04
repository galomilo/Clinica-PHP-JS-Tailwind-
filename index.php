<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <script src="https://cdn.jsdelivr.net/gh/galomilo/ShowHub@latest/banner/banner.build.js"></script>

    <script>
        const banner = new ShowHubLib.GitBanner({ username: "galomilo" });
        banner.show();
    </script>

    <?php
    include('header.php');
    ?>
    <!-- contenido principal -->
    <main class="relative h-[1000px] w-full">
        <!-- imagen de fondo -->
        <div class="absolute h-[1000px] inset-0 bg-[url('/clinica/public/images/img_back_index2.jpg')] bg-cover bg-center z-8"></div>

        <!-- capa azul transparente -->
        <div class="absolute inset-0 bg-blue-500/30 h-[1000px] z-9"></div>

        <div class="flex items-center justify-between p-20 h-[100%]">
            <div class="flex flex-col justify-end items-start pacifico-regular text-white font-bold z-10">
                <h2 class="text-[#1D2666] text-5xl text-center">
                    El mejor servicio, para vos.
                </h2>
                <p class="text-base text-white text-center font-['arial'] font-bold mt-6">
                    Atención rápida y al instante, comprobalo vos mismo.
                </p>
            </div>

            <div></div>
        </div>
    </main>

    <div class="relative bg-[#edeef0] flex flex-col justify-center md:flex-row gap-6 px-4 p-20 h-[60vh]">
        <!-- tarjeta Pacientes -->
        <div class="flex-1 flex flex-col justify-center bg-white shadow-lg rounded-xl p-6 text-center hover:scale-105 transition-transform duration-300">
            <h2 class="text-2xl font-bold mb-2">Pacientes</h2>
            <p class="text-gray-600">Ver y agregar pacientes de manera sencilla.</p>
        </div>

        <!-- tarjeta Diagnósticos -->
        <div class="flex-1 flex flex-col justify-center bg-white shadow-lg rounded-xl p-6 text-center hover:scale-105 transition-transform duration-300">
            <h2 class="text-2xl font-bold mb-2">Diagnósticos</h2>
            <p class="text-gray-600">Registrar y consultar diagnósticos clínicos.</p>
        </div>

        <!-- tarjeta Consultas -->
        <div class="flex-1 flex flex-col justify-center bg-white shadow-lg rounded-xl p-6 text-center hover:scale-105 transition-transform duration-300">
            <h2 class="text-2xl font-bold mb-2">Consultas</h2>
            <p class="text-gray-600">Programar y revisar consultas médicas.</p>
        </div>

        <!-- gradiente hacia arriba separador -->
        <div class="absolute top-[-100px] left-0 w-full h-[100px] bg-gradient-to-b from-[transparent] to-[#edeef0] z-10">

        </div>
    </div>

    <footer class="bg-[#374151] text-white py-8">
        <div class="max-w-6xl mx-auto px-4 flex flex-col md:flex-row justify-between gap-6">

            <!-- Sección de enlaces -->
            <div>
                <h3 class="font-bold mb-2">Enlaces</h3>
                <ul class="space-y-1">
                    <li><a href="/clinica/Pacientes/pacientes_index.php" class="hover:text-blue-300">Pacientes</a></li>
                    <li><a href="/clinica/Diagnosticos/diagnosticos_index.php" class="hover:text-blue-300">Diagnósticos</a></li>
                    <li><a href="/clinica/Consultas/consultas_index.php" class="hover:text-blue-300">Consultas</a></li>
                    <li><a href="/clinica/sobre_mi.php" class="hover:text-blue-300">Sobre nosotros</a></li>
                </ul>
            </div>

            <!-- Sección de contacto -->
            <div>
                <h3 class="font-bold mb-2">Contacto</h3>
                <p>Email: info@curate.com</p>
                <p>Tel: +54 11 1234 5678</p>
                <p>Dirección: Almafuerte, Argentina, Buenos Aires</p>
            </div>

            <!-- Redes sociales -->
            <div>
                <h3 class="font-bold mb-2">Redes Sociales</h3>
                <div class="flex gap-4 text-xl">
                    <a href="https://www.facebook.com" class="hover:text-blue-300"><i class="fab fa-facebook-f"></i></a>
                    <a href="https://www.twitter.com" class="hover:text-blue-300"><i class="fab fa-twitter"></i></a>
                    <a href="https://www.instagram.com" class="hover:text-blue-300"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
        </div>

        <!-- Derechos de autor -->
        <div class="mt-8 text-center text-gray-200 text-sm">
            &copy; 2025 CuraTe. Todos los derechos reservados.
        </div>
    </footer>

</body>

</html>