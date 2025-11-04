<head>
    <link rel="stylesheet" href="/clinica/public/css/output.css">
    <link rel="stylesheet" href="/clinica/public/css/styles.css">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" integrity="sha512-Vz+/...==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Google Fonts: Pacifico -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">

</head>
<header id="main-header" class="transition-all duration-100 fixed top-0 left-0 w-full z-[999] flex flex-col md:flex-row items-center justify-between px-8 py-4 bg-gradient-to-l h-[200px] md:h-[200px] from-indigo-600 to-blue-400 text-white shadow-md">
    <a href="/clinica/index.php">
        <h1 class="pacifico-regular text-5xl font-extrabold tracking-wide">CuraTe</h1>
    </a>
    <nav class="flex gap-16 text-lg">
        <!-- Pacientes -->
        <div>
            <a href="/clinica/Pacientes/pacientes_index.php" class="hover:text-blue-200 transition-colors font-semibold">Pacientes</a>
            <ul class="mt-8 ml-2 text-base list-none submenu text-[#1D2666] font-semibold">
                <li><a href="/clinica/Pacientes/pacientes_index.php" class="hover:text-blue-200">Ver</a></li>
                <li><a href="/clinica/Pacientes/pacientes_agregar.php" class="hover:text-blue-200">Agregar</a></li>
            </ul>
        </div>

        <!-- diagnósticos -->
        <div>
            <a href="/clinica/Diagnosticos/diagnosticos_index.php" class="hover:text-blue-200 transition-colors font-semibold">Diagnósticos</a>
            <ul class="mt-8 ml-2 text-base list-none submenu text-[#1D2666] font-semibold">
                <li><a href="/clinica/Diagnosticos/diagnosticos_index.php" class="hover:text-blue-200">Ver</a></li>
                <li><a href="/clinica/Diagnosticos/diagnosticos_agregar.php" class="hover:text-blue-200">Agregar</a></li>
            </ul>
        </div>

        <!-- consultas -->
        <div>
            <a href="/clinica/Consultas/consultas_index.php" class="hover:text-blue-200 transition-colors font-semibold">Consultas</a>
            <ul class="mt-8 ml-2 text-base list-none submenu text-[#1D2666] font-semibold">
                <li><a href="/clinica/Consultas/consultas_index.php" class="hover:text-blue-200">Ver</a></li>
                <li><a href="/clinica/Consultas/consultas_agregar.php" class="hover:text-blue-200">Agregar</a></li>
            </ul>
        </div>

        <!-- sobre nosotros -->
        <div>
            <a href="/clinica/sobre_mi.php" class="hover:text-blue-200 transition-colors font-semibold">Sobre Mi</a>
        </div>
    </nav>
</header>

<script>
    const currentPage = window.location.pathname.split("/").pop();
    const header = document.getElementById('main-header');
    const submenus = document.getElementsByClassName('submenu');
    const initialHeight = 200;
    const reducedHeight = 100; // altura reducida en vh

    window.addEventListener('scroll', () => {
        if (currentPage == "index.php") {
            if (window.scrollY > 50) { // si se scrolea más de 50px
                header.style.height = reducedHeight + "px";
                for (let i = 0; i < submenus.length; i++) {
                    const element = submenus[i];
                    element.style.display = "none";
                }
            } else {
                header.style.height = initialHeight + "px";
                for (let i = 0; i < submenus.length; i++) {
                    const element = submenus[i];
                    element.style.display = "block";
                }
            }   
        }
    });
</script>