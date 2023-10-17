<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('todo.create') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <form method="post" action="{{ route('todo.store') }}" class="mt-6 space-y-6">
                        @csrf


                        <div>
                            <x-input-label for="title" :value="__('todo.title')" />
                            <x-text-input id="title" name="title" type="text" class="mt-1 block w-full" autocomplete="title" />
                            <x-input-error :messages="$errors->createTodo->get('title')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="description" :value="__('todo.description')" />
                            <x-text-input id="description" name="description" type="text" class="mt-1 block w-full" autocomplete="description" />
                            <x-input-error :messages="$errors->createTodo->get('description')" class="mt-2" />
                        </div>

                        <div class="flex items-center gap-4">
                            <x-primary-button>{{ __('todo.save') }}</x-primary-button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
