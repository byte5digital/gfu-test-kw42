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

                <div class="grid grid-cols-5 font-bold text-blue-500">
                    <p>Id</p>
                    <p>Title</p>
                    <p>Description</p>
                    <p>zugewiesen an</p>
                    <p>löschen</p>
                </div>

                @php
                    /* @var \App\Models\ToDo $todo */
                @endphp
                @foreach ($todos as $todo)

                    <div class="grid grid-cols-5">
                        <p>{{$todo->id}}</p>
                        <a href="{{route('todo.edit', $todo)}}" class="hover:underline hover:text-red-500">
                            <p>{{$todo->title}}</p>
                        </a>
                        <p>{{$todo->description}}</p>
                        <p>{{$todo->user?->name ?? "nicht zugewiesen"}}</p>
                        <form method="post" action="{{ route('todo.delete', $todo) }}" class="">
                            @csrf
                            @method('delete')
                            <button class="p-4">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16">
                                    <path fill="currentColor"
                                          d="M3 0c-.55 0-1 .45-1 1H1c-.55 0-1 .45-1 1h7c0-.55-.45-1-1-1H5c0-.55-.45-1-1-1H3zM1 3v4.81c0 .11.08.19.19.19h4.63c.11 0 .19-.08.19-.19V3h-1v3.5c0 .28-.22.5-.5.5s-.5-.22-.5-.5V3h-1v3.5c0 .28-.22.5-.5.5s-.5-.22-.5-.5V3h-1z"/>
                                </svg>
                            </button>
                        </form>
                    </div>

                @endforeach
                {{$todos->links()}}
            </div>

        </div>
    </div>
</x-app-layout>
