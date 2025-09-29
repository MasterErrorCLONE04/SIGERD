<x-app-layout>
{{-- 1. Header ----------------------------------------------------}}


{{-- 2. Contenido -------------------------------------------------}}
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

        {{-- 2.1 Filtros + crear ------------------------------------}}
        <div class="bg-white/70 dark:bg-gray-800/70 backdrop-blur-xl
                    rounded-2xl shadow-lg border border-white/20 dark:border-gray-700/30
                    px-6 py-4 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
            <div class="flex flex-col sm:flex-row gap-3 sm:gap-4 flex-1">
                {{-- Buscador --}}
                <input type="text" placeholder="Buscar por título..."
                       class="w-full sm:w-80 rounded-lg bg-gray-50 dark:bg-gray-900
                              border-gray-300 dark:border-gray-600
                              text-gray-800 dark:text-gray-200
                              focus:ring-2 focus:ring-rose-500 dark:focus:ring-rose-400">
                {{-- Filtro estado --}}
                <select class="rounded-lg bg-gray-50 dark:bg-gray-900
                               border-gray-300 dark:border-gray-600
                               text-gray-800 dark:text-gray-200
                               focus:ring-2 focus:ring-rose-500 dark:focus:ring-rose-400">
                    <option value="">Todos los estados</option>
                    <option>Abierto</option>
                    <option>En progreso</option>
                    <option>Cerrado</option>
                </select>
            </div>
        </div>

        {{-- 2.2 Tabla ---------------------------------------------}}
        <div class="bg-white/70 dark:bg-gray-800/70 backdrop-blur-xl
                    rounded-2xl shadow-lg border border-white/20 dark:border-gray-700/30
                    overflow-hidden">
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                    <thead class="bg-gray-50 dark:bg-gray-900/50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 dark:text-gray-300 uppercase tracking-wider">Título</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 dark:text-gray-300 uppercase tracking-wider">Descripción</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 dark:text-gray-300 uppercase tracking-wider">Estado</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 dark:text-gray-300 uppercase tracking-wider">Reportado por</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 dark:text-gray-300 uppercase tracking-wider">Fecha de Reporte</th>
                        <th class="px-6 py-3 text-right text-xs font-semibold text-gray-600 dark:text-gray-300 uppercase tracking-wider">Acciones</th>
                    </tr>
                    </thead>
                    <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                    @foreach ($incidents as $incident)
                        <tr class="hover:bg-gray-50 dark:hover:bg-gray-700/50 transition">
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-gray-100">{{ $incident->title }}</td>
                            <td class="px-6 py-4 text-sm text-gray-600 dark:text-gray-300 max-w-xs truncate">{{ Str::limit($incident->description, 50) }}</td>

                            {{-- Estado con badge --}}
                            <td class="px-6 py-4 whitespace-nowrap">
                                @php
                                    $statusColors = [
                                        'abierto'      => 'bg-gray-100 text-gray-800 dark:bg-gray-700 dark:text-gray-300',
                                        'en progreso'  => 'bg-blue-100 text-blue-800 dark:bg-blue-500/20 dark:text-blue-300',
                                        'cerrado'      => 'bg-green-100 text-green-800 dark:bg-green-500/20 dark:text-green-300',
                                    ];
                                    $color = $statusColors[strtolower($incident->status)] ?? 'bg-gray-100 text-gray-800 dark:bg-gray-700 dark:text-gray-300';
                                @endphp
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $color }}">
                                    {{ ucfirst($incident->status) }}
                                </span>
                            </td>

                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600 dark:text-gray-300">{{ $incident->reportedBy->name ?? '—' }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600 dark:text-gray-300">{{ $incident->created_at->format('d/m/Y H:i') }}</td>

                            {{-- Acciones --}}
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                <a href="{{ route('admin.incidents.show', $incident->id) }}"
                                   class="inline-flex items-center gap-1 px-3 py-1.5 rounded-md
                                          bg-rose-50 dark:bg-rose-500/20 text-rose-700 dark:text-rose-300
                                          hover:bg-rose-100 dark:hover:bg-rose-500/30 transition">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                    </svg>
                                    Ver Detalle
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</x-app-layout>