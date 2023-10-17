<x-app-layout>
    <x-slot name="meta">
        <meta name="description" content="Meine Tolle Todo Seite">
        <meta name="title" content="Meine Tolle Todo Seite">
        <title content="Meine tolle Todo Seite">Meine tolle Todo Seite</title>
    </x-slot>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('todo.index') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <div class="grid grid-cols-4 font-bold text-blue-500">
                        <p>Id</p>
                        <p>Title</p>
                        <p>Description</p>
                        <p>zugewiesen an</p>
                    </div>

                    @php
                        /* @var \App\Models\ToDo $todo */
                    @endphp
                    @foreach ($todos as $todo)
                        <div class="grid grid-cols-4">
                            <p>{{$todo->id}}</p>
                            <p>{{$todo->title}}</p>
                            <p>{{$todo->description}}</p>
                            <p>{{$todo->user?->name ?? "nicht zugewiesen"}}</p>
                        </div>
                    @endforeach
                    {{$todos->links()}}
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
