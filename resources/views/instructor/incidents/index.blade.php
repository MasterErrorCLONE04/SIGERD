<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Mis Reportes de Fallas') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="flex justify-end mb-4">
                        <a href="{{ route('instructor.incidents.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            Reportar Nueva Falla
                        </a>
                    </div>
                    <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                        <thead>
                            <tr>
                                <th class="px-6 py-3 bg-gray-50 dark:bg-gray-700 text-left text-xs font-medium text-gray-500 dark:text-gray-200 uppercase tracking-wider">Título</th>
                                <th class="px-6 py-3 bg-gray-50 dark:bg-gray-700 text-left text-xs font-medium text-gray-500 dark:text-gray-200 uppercase tracking-wider">Descripción</th>
                                <th class="px-6 py-3 bg-gray-50 dark:bg-gray-700 text-left text-xs font-medium text-gray-500 dark:text-gray-200 uppercase tracking-wider">Estado</th>
                                <th class="px-6 py-3 bg-gray-50 dark:bg-gray-700 text-left text-xs font-medium text-gray-500 dark:text-gray-200 uppercase tracking-wider">Fecha de Reporte</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-700">
                            @foreach ($incidents as $incident)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap text-gray-900 dark:text-gray-100">{{ $incident->title }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-gray-900 dark:text-gray-100">{{ Str::limit($incident->description, 50) }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-gray-900 dark:text-gray-100">{{ ucfirst($incident->status) }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-gray-900 dark:text-gray-100">{{ $incident->created_at->format('d/m/Y H:i') }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
