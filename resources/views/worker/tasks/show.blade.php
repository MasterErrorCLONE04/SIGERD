<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Detalles y Actualización de Tarea') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="mb-6">
                        <p class="text-lg font-semibold">Título:</p>
                        <p>{{ $task->title }}</p>
                    </div>

                    <div class="mb-6">
                        <p class="text-lg font-semibold">Descripción:</p>
                        <p>{{ $task->description }}</p>
                    </div>

                    <div class="mb-6">
                        <p class="text-lg font-semibold">Prioridad:</p>
                        <p>{{ ucfirst($task->priority) }}</p>
                    </div>

                    <div class="mb-6">
                        <p class="text-lg font-semibold">Asignado por:</p>
                        <p>{{ $task->createdBy->name ?? 'N/A' }}</p>
                    </div>

                    <form method="POST" action="{{ route('worker.tasks.update', $task->id) }}">
                        @csrf
                        @method('PUT')

                        <!-- Status -->
                        <div class="mt-4">
                            <x-input-label for="status" :value="__('Estado')" />
                            <select id="status" name="status" class="block mt-1 w-full border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-900 text-gray-700 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
                                @foreach ($statuses as $status)
                                    <option value="{{ $status }}" {{ old('status', $task->status) == $status ? 'selected' : '' }}>{{ ucfirst($status) }}</option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('status')" class="mt-2" />
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <x-primary-button class="ms-4">
                                {{ __('Actualizar Estado') }}
                            </x-primary-button>
                        </div>
                    </form>

                    <div class="flex justify-start mt-6">
                        <a href="{{ route('worker.tasks.index') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                            Volver a mis tareas
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
