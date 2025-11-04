<?php
include('header.php');
?>

<section class="bg-white/80 dark:bg-slate-900/80 mt-[200px] py-12 px-6 md:px-12">
    <div class="max-w-6xl mx-auto grid grid-cols-1 md:grid-cols-2 gap-8 items-center">
        <div>
            <div class="inline-flex items-center gap-3 mb-4">
                <span class="bg-[#98a3f3] text-white text-xs font-semibold px-3 py-1 rounded-full">Proyecto diseño web estatico 6°</span>
                <span class="text-sm text-gray-500">Demo / Portafolio</span>
            </div>

            <h2 class="text-3xl md:text-4xl font-extrabold text-[#98a3f3] dark:text-white mb-4">Sobre el proyecto</h2>

            <p class="text-gray-700 dark:text-slate-300 mb-4 leading-relaxed">
                Este sistema fue desarrollado de forma independiente como proyecto para demostrar
                conocimientos en desarrollo web. Mi objetivo es ofrecer una gestion sencilla para una clinica.
            </p>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mb-6">
                <div>
                    <h3 class="text-sm font-semibold text-slate-700 dark:text-slate-200 mb-2">Tecnologías</h3>
                    <ul class="text-sm text-gray-600 dark:text-slate-300 list-disc pl-5">
                        <li>PHP / MySQL</li>
                        <li>Tailwind CSS</li>
                        <li>JavaScript para algo de interactividad</li>
                    </ul>
                </div>
            </div>

            <div class="flex items-center gap-4">
                <a href="https://github.com/galomilo/Clinica-PHP-JS-Tailwind-" target="_blank" class="inline-block bg-indigo-600 hover:bg-indigo-700 text-white px-5 py-2 rounded shadow">Ver código / repositorio</a>
            </div>
        </div>

        <div class="flex items-center justify-center">
            <div class="w-full max-w-md bg-gradient-to-br from-white to-slate-50 dark:from-slate-800 dark:to-slate-700 rounded-2xl shadow-lg p-6">
                <div class="flex items-center gap-4 mb-4">
                    <div class="w-16 h-16 rounded-lg overflow-hidden bg-indigo-100 flex items-center justify-center">
                        <svg class="w-8 h-8 text-indigo-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 11c2.21 0 4-1.79 4-4S14.21 3 12 3 8 4.79 8 7s1.79 4 4 4zM6 21v-1a4 4 0 014-4h4a4 4 0 014 4v1" />
                        </svg>
                    </div>
                    <div>
                        <div class="text-lg font-semibold text-slate-900 dark:text-white">Mi Sistema de Clínica</div>
                        <div class="text-sm text-gray-500 dark:text-slate-300">Demo funcional • PHP & Tailwind</div>
                    </div>
                </div>

                <p class="text-sm text-gray-600 dark:text-slate-300 mb-4">
                    Interfaz simple y orientada a la gestión. Ideal para pruebas, aprendizaje y como
                    demostración técnica en un portfolio.
                </p>
            </div>
        </div>
    </div>
</section>