<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Detalles del Incidente') }}
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

                    @if ($incident->image)
                        <div class="mb-4">
                            <p class="text-lg font-semibold">Imagen del Incidente:</p>
                            <img src="{{ asset('storage/' . $incident->image) }}" alt="Imagen del Incidente" class="mt-2 max-w-lg h-auto rounded-lg shadow-md">
                        </div>
                    @endif

                    <div class="mb-4">
                        <p class="text-lg font-semibold">Estado:</p>
                        <p>{{ ucfirst($incident->status) }}</p>
                    </div>

                    <div class="mb-4">
                        <p class="text-lg font-semibold">Reportado por:</p>
                        <p>{{ $incident->reportedBy->name }}</p>
                    </div>

                    <div class="mb-6">
                        <p class="text-lg font-semibold">Fecha de Reporte:</p>
                        <p>{{ $incident->created_at->format('d/m/Y H:i') }}</p>
                    </div>

                    @if ($incident->status === 'pendiente')
                        <h3 class="text-xl font-semibold mb-4">Convertir a Tarea</h3>
                        <form method="POST" action="{{ route('admin.incidents.convert-to-task', $incident->id) }}">
                            @csrf

                            <!-- Assigned To -->
                            <div class="mt-4">
                                <x-input-label for="assigned_to" :value="__('Asignar a')" />
                                <select id="assigned_to" name="assigned_to" class="block mt-1 w-full border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-900 text-gray-700 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm" required>
                                    <option value="">Selecciona un trabajador</option>
                                    @foreach ($workers as $worker)
                                        <option value="{{ $worker->id }}" {{ old('assigned_to') == $worker->id ? 'selected' : '' }}>{{ $worker->name }}</option>
                                    @endforeach
                                </select>
                                <x-input-error :messages="$errors->get('assigned_to')" class="mt-2" />
                            </div>

                            <!-- Priority -->
                            <div class="mt-4">
                                <x-input-label for="priority" :value="__('Prioridad')" />
                                <select id="priority" name="priority" class="block mt-1 w-full border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-900 text-gray-700 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm" required>
                                    @foreach ($priorities as $priority)
                                        <option value="{{ $priority }}" {{ old('priority') == $priority ? 'selected' : '' }}>{{ ucfirst($priority) }}</option>
                                    @endforeach
                                </select>
                                <x-input-error :messages="$errors->get('priority')" class="mt-2" />
                            </div>

                            <div class="flex items-center justify-end mt-4">
                                <x-primary-button class="ms-4">
                                    {{ __('Convertir a Tarea') }}
                                </x-primary-button>
                            </div>
                        </form>
                    @else
                        <div class="mt-6 p-4 bg-gray-100 dark:bg-gray-700 rounded-lg">
                            <p class="text-gray-700 dark:text-gray-300">Este incidente ya ha sido gestionado.</p>
                        </div>
                    @endif

                    <div class="flex justify-start mt-6">
                        <a href="{{ route('admin.incidents.index') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                            Volver a la lista de incidentes
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
