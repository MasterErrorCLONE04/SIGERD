<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SIGERD - Sistema Integral de Gestión de Reportes y Mantenimiento</title>

    <!-- Fuente moderna -->
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="antialiased bg-gray-50 text-gray-800">

    <!-- Navbar -->
    <header class="bg-white shadow-sm fixed top-0 w-full z-50">
        <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">
            <h1 class="text-xl font-bold text-indigo-600">SIGERD</h1>
            <nav class="space-x-6 hidden md:flex">
                <a href="#features" class="text-gray-700 hover:text-indigo-600 transition">Características</a>
                <a href="#benefits" class="text-gray-700 hover:text-indigo-600 transition">Beneficios</a>
                <a href="#pricing" class="text-gray-700 hover:text-indigo-600 transition">Planes</a>
                <a href="#contact" class="text-gray-700 hover:text-indigo-600 transition">Contacto</a>
            </nav>
            <a href="{{ route('login') }}" 
               class="ml-4 bg-indigo-600 text-white px-4 py-2 rounded-lg hover:bg-indigo-700 transition">
               Ingresar
            </a>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="relative pt-32 pb-20 bg-gradient-to-r from-indigo-50 to-white">
        <div class="max-w-7xl mx-auto px-6 grid md:grid-cols-2 gap-12 items-center">
            <div>
                <h2 class="text-4xl font-bold text-gray-900 leading-tight mb-4">
                    Optimiza la gestión de mantenimiento con <span class="text-indigo-600">SIGERD</span>
                </h2>
                <p class="text-lg text-gray-600 mb-6">
                    Un sistema web desarrollado en <strong>Laravel 12</strong> con frontend en <strong>Tailwind CSS</strong>, diseñado para ayudar a 
                    <span class="font-medium">administradores, trabajadores e instructores</span> a organizar, supervisar y ejecutar tareas de mantenimiento de forma eficiente.
                </p>
                <div class="space-x-4">
                    <a href="{{ route('register') }}" 
                       class="bg-indigo-600 text-white px-6 py-3 rounded-lg shadow hover:bg-indigo-700 transition">
                       Probar ahora
                    </a>
                    <a href="#features" class="text-indigo-600 font-medium hover:underline">
                        Conoce más
                    </a>
                </div>
            </div>
            <div class="relative">
                <img src="/images/dashboard-preview.png" alt="Vista previa SIGERD" class="w-full max-w-lg mx-auto rounded-xl shadow-md">
            </div>
        </div>
    </section>

    <!-- Features -->
    <section id="features" class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-6 text-center">
            <h3 class="text-3xl font-bold text-gray-900 mb-12">Características principales</h3>
            <div class="grid md:grid-cols-3 gap-10">
                <div class="p-6 rounded-2xl shadow hover:shadow-lg transition">
                    <h4 class="text-xl font-semibold text-indigo-600 mb-2">Gestión de Reportes</h4>
                    <p class="text-gray-600">Crea, administra y supervisa reportes de mantenimiento en tiempo real.</p>
                </div>
                <div class="p-6 rounded-2xl shadow hover:shadow-lg transition">
                    <h4 class="text-xl font-semibold text-indigo-600 mb-2">Asignación de Tareas</h4>
                    <p class="text-gray-600">Asigna actividades de manera clara y organizada para evitar retrasos.</p>
                </div>
                <div class="p-6 rounded-2xl shadow hover:shadow-lg transition">
                    <h4 class="text-xl font-semibold text-indigo-600 mb-2">Supervisión Eficiente</h4>
                    <p class="text-gray-600">Monitorea el avance de cada tarea y genera reportes de desempeño.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Benefits -->
    <section id="benefits" class="py-20 bg-gray-50">
        <div class="max-w-7xl mx-auto px-6 text-center">
            <h3 class="text-3xl font-bold text-gray-900 mb-12">Beneficios para tu organización</h3>
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
            <h3 class="text-3xl font-bold text-gray-900 mb-12">Planes accesibles</h3>
            <div class="grid md:grid-cols-3 gap-8">
                <div class="p-8 bg-white rounded-2xl shadow hover:shadow-lg transition">
                    <h4 class="text-xl font-bold mb-4">Básico</h4>
                    <p class="text-4xl font-bold text-indigo-600 mb-6">$0</p>
                    <ul class="space-y-3 text-gray-600 mb-6">
                        <li>✔ Registro de reportes</li>
                        <li>✔ Gestión de tareas</li>
                    </ul>
                    <a href="{{ route('register') }}" class="bg-indigo-600 text-white px-6 py-3 rounded-lg hover:bg-indigo-700 transition">
                        Empezar
                    </a>
                </div>
                <div class="p-8 bg-white rounded-2xl shadow-xl border-2 border-indigo-600">
                    <h4 class="text-xl font-bold mb-4">Profesional</h4>
                    <p class="text-4xl font-bold text-indigo-600 mb-6">$19/mes</p>
                    <ul class="space-y-3 text-gray-600 mb-6">
                        <li>✔ Todo del Básico</li>
                        <li>✔ Paneles avanzados</li>
                        <li>✔ Exportación de reportes</li>
                    </ul>
                    <a href="{{ route('register') }}" class="bg-indigo-600 text-white px-6 py-3 rounded-lg hover:bg-indigo-700 transition">
                        Elegir
                    </a>
                </div>
                <div class="p-8 bg-white rounded-2xl shadow hover:shadow-lg transition">
                    <h4 class="text-xl font-bold mb-4">Empresarial</h4>
                    <p class="text-4xl font-bold text-indigo-600 mb-6">$49/mes</p>
                    <ul class="space-y-3 text-gray-600 mb-6">
                        <li>✔ Todo del Profesional</li>
                        <li>✔ Integraciones avanzadas</li>
                        <li>✔ Soporte dedicado</li>
                    </ul>
                    <a href="{{ route('register') }}" class="bg-indigo-600 text-white px-6 py-3 rounded-lg hover:bg-indigo-700 transition">
                        Elegir
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer id="contact" class="bg-gray-900 text-gray-300 py-12">
        <div class="max-w-7xl mx-auto px-6 text-center">
            <h4 class="text-xl font-semibold text-white mb-4">Contáctanos</h4>
            <p class="mb-6">¿Tienes dudas? Escríbenos a <a href="mailto:soporte@sigerd.com" class="text-indigo-400 hover:underline">soporte@sigerd.com</a></p>
            <p class="text-gray-500 text-sm">&copy; {{ date('Y') }} SIGERD. Todos los derechos reservados.</p>
        </div>
    </footer>

</body>
</html>
