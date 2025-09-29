<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SIGERD - Sistema Integral de Gestión de Reportes y Mantenimiento</title>
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700,800" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        html { scroll-behavior: smooth; }
        body { font-family: 'Inter', sans-serif; }
    </style>
</head>
<body class="antialiased bg-gray-50 text-gray-800">

    <!-- Navbar -->
    <header class="bg-white/80 backdrop-blur shadow-sm fixed top-0 w-full z-50">
        <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">
            <h1 class="text-2xl font-extrabold text-indigo-600 tracking-tight">SIGERD</h1>
            <nav class="hidden md:flex items-center gap-6">
                <a href="#features" class="text-gray-700 hover:text-indigo-600 transition">Características</a>
                <a href="#benefits"  class="text-gray-700 hover:text-indigo-600 transition">Beneficios</a>
                <a href="#pricing"  class="text-gray-700 hover:text-indigo-600 transition">Planes</a>
                <a href="#contact" class="text-gray-700 hover:text-indigo-600 transition">Contacto</a>
            </nav>
            <a href="{{ route('login') }}" 
               class="ml-4 bg-indigo-600 text-white px-4 py-2 rounded-lg shadow hover:shadow-md hover:bg-indigo-700 transition-all">
               Ingresar
            </a>
        </div>
    </header>

    <!-- Hero -->
    <section class="relative pt-32 pb-24 bg-gradient-to-br from-indigo-50 via-white to-gray-50">
        <div class="max-w-7xl mx-auto px-6 grid md:grid-cols-2 gap-12 items-center">
            <div class="space-y-6">
                <h2 class="text-5xl font-extrabold text-gray-900 leading-tight text-balance">
                    Optimiza la gestión de mantenimiento con <span class="text-indigo-600">SIGERD</span>
                </h2>
                <p class="text-lg text-gray-600 text-pretty">
                    Un sistema web desarrollado en <strong>Laravel 12</strong> con frontend en <strong>Tailwind CSS</strong>,
                    diseñado para ayudar a administradores, trabajadores e instructores a organizar, supervisar y ejecutar tareas de mantenimiento de forma eficiente.
                </p>
                <div class="flex flex-wrap gap-4">
                    <a href="{{ route('register') }}" 
                       class="bg-indigo-600 text-white px-6 py-3 rounded-xl shadow-md hover:shadow-lg hover:bg-indigo-700 transition-all">
                       Probar ahora
                    </a>
                    <a href="#features" class="text-indigo-600 font-medium hover:underline self-center">
                        Conoce más →
                    </a>
                </div>
            </div>
            <div>
                <img src="/images/dashboard-preview.png" 
                     alt="Vista previa SIGERD" 
                     class="w-full max-w-xl mx-auto rounded-2xl shadow-xl">
            </div>
        </div>
    </section>

    <!-- Features -->
    <section id="features" class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-6 text-center">
            <h3 class="text-4xl font-bold text-gray-900 mb-12">Características principales</h3>
            <div class="grid md:grid-cols-3 gap-10">
                <div class="p-6 rounded-2xl bg-gray-50 hover:shadow-lg transition-all hover:scale-105">
                    <h4 class="text-xl font-semibold text-indigo-600 mb-2">Gestión de Reportes</h4>
                    <p class="text-gray-600">Crea, administra y supervisa reportes de mantenimiento en tiempo real.</p>
                </div>
                <div class="p-6 rounded-2xl bg-gray-50 hover:shadow-lg transition-all hover:scale-105">
                    <h4 class="text-xl font-semibold text-indigo-600 mb-2">Asignación de Tareas</h4>
                    <p class="text-gray-600">Asigna actividades de manera clara y organizada para evitar retrasos.</p>
                </div>
                <div class="p-6 rounded-2xl bg-gray-50 hover:shadow-lg transition-all hover:scale-105">
                    <h4 class="text-xl font-semibold text-indigo-600 mb-2">Supervisión Eficiente</h4>
                    <p class="text-gray-600">Monitorea el avance de cada tarea y genera reportes de desempeño.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Benefits -->
    <section id="benefits" class="py-20 bg-gray-50">
        <div class="max-w-7xl mx-auto px-6 text-center">
            <h3 class="text-4xl font-bold text-gray-900 mb-12">Beneficios para tu organización</h3>
            <div class="grid md:grid-cols-2 gap-10 text-left">
                <div class="p-6">
                    <h4 class="text-xl font-semibold text-indigo-600 mb-2">Mayor organización</h4>
                    <p class="text-gray-600">Centraliza la información y evita pérdidas de tiempo buscando reportes dispersos.</p>
                </div>
                <div class="p-6">
                    <h4 class="text-xl font-semibold text-indigo-600 mb-2">Eficiencia operativa</h4>
                    <p class="text-gray-600">Mejora la productividad de trabajadores e instructores con flujos de trabajo claros.</p>
                </div>
                <div class="p-6">
                    <h4 class="text-xl font-semibold text-indigo-600 mb-2">Seguimiento en tiempo real</h4>
                    <p class="text-gray-600">Accede a paneles de control con métricas de desempeño y estado de las tareas.</p>
                </div>
                <div class="p-6">
                    <h4 class="text-xl font-semibold text-indigo-600 mb-2">Soporte escalable</h4>
                    <p class="text-gray-600">SIGERD está listo para crecer con las necesidades de tu organización.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Pricing -->
    <section id="pricing" class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-6 text-center">
            <h3 class="text-4xl font-bold text-gray-900 mb-12">Planes accesibles</h3>
            <div class="grid md:grid-cols-3 gap-8">
                <!-- Básico -->
                <div class="p-8 bg-white rounded-2xl shadow-sm hover:shadow-lg transition-all">
                    <h4 class="text-xl font-bold mb-4">Básico</h4>
                    <p class="text-4xl font-extrabold text-indigo-600 mb-6">$0</p>
                    <ul class="space-y-3 text-gray-600 mb-6 text-left">
                        <li>✔ Registro de reportes</li>
                        <li>✔ Gestión de tareas</li>
                    </ul>
                    <a href="{{ route('register') }}" 
                       class="w-full bg-indigo-600 text-white px-6 py-3 rounded-lg shadow hover:shadow-md hover:bg-indigo-700 transition-all block">
                       Empezar
                    </a>
                </div>

                <!-- Profesional -->
                <div class="relative p-8 bg-white rounded-2xl shadow-xl ring-2 ring-indigo-500">
                    <span class="absolute -top-3 left-1/2 -translate-x-1/2 bg-indigo-600 text-white text-xs font-semibold px-3 py-1 rounded-full">Recomendado</span>
                    <h4 class="text-xl font-bold mb-4">Profesional</h4>
                    <p class="text-4xl font-extrabold text-indigo-600 mb-6">$19<span class="text-lg font-medium text-gray-500">/mes</span></p>
                    <ul class="space-y-3 text-gray-600 mb-6 text-left">
                        <li>✔ Todo del Básico</li>
                        <li>✔ Paneles avanzados</li>
                        <li>✔ Exportación de reportes</li>
                    </ul>
                    <a href="{{ route('register') }}" 
                       class="w-full bg-indigo-600 text-white px-6 py-3 rounded-lg shadow hover:shadow-md hover:bg-indigo-700 transition-all block">
                       Elegir
                    </a>
                </div>

                <!-- Empresarial -->
                <div class="p-8 bg-white rounded-2xl shadow-sm hover:shadow-lg transition-all">
                    <h4 class="text-xl font-bold mb-4">Empresarial</h4>
                    <p class="text-4xl font-extrabold text-indigo-600 mb-6">$49<span class="text-lg font-medium text-gray-500">/mes</span></p>
                    <ul class="space-y-3 text-gray-600 mb-6 text-left">
                        <li>✔ Todo del Profesional</li>
                        <li>✔ Integraciones avanzadas</li>
                        <li>✔ Soporte dedicado</li>
                    </ul>
                    <a href="{{ route('register') }}" 
                       class="w-full bg-indigo-600 text-white px-6 py-3 rounded-lg shadow hover:shadow-md hover:bg-indigo-700 transition-all block">
                       Elegir
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer id="contact" class="bg-gray-900 text-gray-300 py-12">
        <div class="max-w-7xl mx-auto px-6 text-center space-y-4">
            <h4 class="text-xl font-semibold text-white">Contáctanos</h4>
            <p>¿Tienes dudas? Escríbenos a <a href="mailto:soporte@sigerd.com" class="text-indigo-400 hover:underline">soporte@sigerd.com</a></p>
            <p class="text-gray-500 text-sm">&copy; {{ date('Y') }} SIGERD. Todos los derechos reservados.</p>
        </div>
    </footer>

</body>
</html>