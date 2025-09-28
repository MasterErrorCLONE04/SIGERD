<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-bold text-3xl text-foreground leading-tight text-balance">
                {{ __('Dashboard de Administrador') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Welcome Section -->
            <div class="bg-card border border-border overflow-hidden shadow-lg rounded-xl mb-8">
                <div class="p-8">
                    <div class="flex items-center space-x-4">
                        <div class="flex-shrink-0">
                            <div class="w-12 h-12 bg-primary/10 rounded-xl flex items-center justify-center">
                                <svg class="w-6 h-6 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                </svg>
                            </div>
                        </div>
                        <div>
                            <h3 class="text-2xl font-bold text-foreground">{{ __("¡Bienvenido, Administrador!") }}</h3>
                            <p class="text-muted-foreground mt-1">Aquí tienes un resumen de la actividad de tu plataforma</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Metrics Grid -->
            <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3 mb-8">
                <!-- Total Users Card -->
                <div class="metric-card rounded-xl p-6 group">
                    <div class="flex items-center justify-between">
                        <div class="flex-1">
                            <div class="flex items-center space-x-3 mb-4">
                                <div class="w-10 h-10 bg-success/10 rounded-lg flex items-center justify-center">
                                    <svg class="w-5 h-5 text-success" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z"></path>
                                    </svg>
                                </div>
                                <dt class="text-sm font-medium text-muted-foreground">Total de Usuarios</dt>
                            </div>
                            <dd class="text-4xl font-bold metric-users leading-none">{{ $totalUsers }}</dd>
                            <div class="mt-3 flex items-center text-sm">
                                <span class="text-success flex items-center">
                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
                                    </svg>
                                    +12%
                                </span>
                                <span class="text-muted-foreground ml-2">vs mes anterior</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Active Tasks Card -->
                <div class="metric-card rounded-xl p-6 group">
                    <div class="flex items-center justify-between">
                        <div class="flex-1">
                            <div class="flex items-center space-x-3 mb-4">
                                <div class="w-10 h-10 bg-warning/10 rounded-lg flex items-center justify-center">
                                    <svg class="w-5 h-5 text-warning" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                </div>
                                <dt class="text-sm font-medium text-muted-foreground">Tareas Activas</dt>
                            </div>
                            <dd class="text-4xl font-bold metric-active leading-none">{{ $activeTasks }}</dd>
                            <div class="mt-3 flex items-center text-sm">
                                <span class="text-warning flex items-center">
                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    En progreso
                                </span>
                                <span class="text-muted-foreground ml-2">requieren atención</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Completed Tasks Card -->
                <div class="metric-card rounded-xl p-6 group">
                    <div class="flex items-center justify-between">
                        <div class="flex-1">
                            <div class="flex items-center space-x-3 mb-4">
                                <div class="w-10 h-10 bg-purple/10 rounded-lg flex items-center justify-center">
                                    <svg class="w-5 h-5 text-purple" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                </div>
                                <dt class="text-sm font-medium text-muted-foreground">Tareas Completadas</dt>
                            </div>
                            <dd class="text-4xl font-bold metric-completed leading-none">{{ $completedTasks }}</dd>
                            <div class="mt-3 flex items-center text-sm">
                                <span class="text-purple flex items-center">
                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
                                    </svg>
                                    +8%
                                </span>
                                <span class="text-muted-foreground ml-2">esta semana</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Quick Actions -->
            <div class="bg-card border border-border overflow-hidden shadow-lg rounded-xl">
                <div class="p-6 border-b border-border">
                    <h3 class="text-lg font-semibold text-foreground">Acciones Rápidas</h3>
                    <p class="text-muted-foreground text-sm mt-1">Gestiona tu plataforma de forma eficiente</p>
                </div>
                <div class="p-6">
                    <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-4">
                        <button class="flex items-center space-x-3 p-4 bg-secondary/50 hover:bg-secondary rounded-lg transition-colors group">
                            <div class="w-8 h-8 bg-primary/10 rounded-lg flex items-center justify-center group-hover:bg-primary/20 transition-colors">
                                <svg class="w-4 h-4 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                </svg>
                            </div>
                            <span class="text-sm font-medium text-foreground">Nuevo Usuario</span>
                        </button>
                        
                        <button class="flex items-center space-x-3 p-4 bg-secondary/50 hover:bg-secondary rounded-lg transition-colors group">
                            <div class="w-8 h-8 bg-success/10 rounded-lg flex items-center justify-center group-hover:bg-success/20 transition-colors">
                                <svg class="w-4 h-4 text-success" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                                </svg>
                            </div>
                            <span class="text-sm font-medium text-foreground">Nueva Tarea</span>
                        </button>
                        
                        <button class="flex items-center space-x-3 p-4 bg-secondary/50 hover:bg-secondary rounded-lg transition-colors group">
                            <div class="w-8 h-8 bg-warning/10 rounded-lg flex items-center justify-center group-hover:bg-warning/20 transition-colors">
                                <svg class="w-4 h-4 text-warning" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v4a2 2 0 01-2 2h-2a2 2 0 00-2 2z"></path>
                                </svg>
                            </div>
                            <span class="text-sm font-medium text-foreground">Ver Reportes</span>
                        </button>
                        
                        <button class="flex items-center space-x-3 p-4 bg-secondary/50 hover:bg-secondary rounded-lg transition-colors group">
                            <div class="w-8 h-8 bg-purple/10 rounded-lg flex items-center justify-center group-hover:bg-purple/20 transition-colors">
                                <svg class="w-4 h-4 text-purple" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                </svg>
                            </div>
                            <span class="text-sm font-medium text-foreground">Configuración</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
