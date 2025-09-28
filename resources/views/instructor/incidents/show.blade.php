<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Detalles del Reporte de Falla') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="mb-4">
                        <p class="text-lg font-semibold">Título:</p>
                        <p>{{ $incident->title }}</p>
                    </div>

                    <div class="mb-4">
                        <p class="text-lg font-semibold">Descripción:</p>
                        <p>{{ $incident->description }}</p>
                    </div>

                    <div class="mb-4">
                        <p class="text-lg font-semibold">Estado:</p>
                        <p>{{ ucfirst($incident->status) }}</p>
                    </div>

                    <div class="mb-4">
                        <p class="text-lg font-semibold">Reportado por:</p>
                        <p>{{ $incident->reportedBy->name }}</p>
                    </div>

                    @if ($incident->image)
                        <div class="mb-4">
                            <p class="text-lg font-semibold">Imagen del Incidente:</p>
                            <img src="{{ asset('storage/' . $incident->image) }}" alt="Imagen del Incidente" class="mt-2 max-w-lg h-auto rounded-lg shadow-md">
                        </div>
                    @endif

                    <div class="mb-4">
                        <p class="text-lg font-semibold">Fecha de Reporte:</p>
                        <p>{{ $incident->created_at->format('d/m/Y H:i') }}</p>
                    </div>

                    <div class="flex justify-end mt-6">
                        <a href="{{ route('instructor.incidents.index') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                            Volver a la lista de reportes
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
