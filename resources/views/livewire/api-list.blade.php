<div class="container w-full mx-auto">
    <div class="flex items-center justify-center py-4">
        <button wire:click="fetchApi" class="items-center px-4 py-2 bg-blue-500 text-white hover:cursor-pointer">
            Fetch API List
        </button>
    </div>
    @empty($this->results)
        <p>Keine Ergebnisse</p>
    @else
        @foreach($this->results['docs'] as $result)
            <p>{!! $result['name'] !!}</p>
        @endforeach
    @endisset


</div>

<script>
    window.addEventListener('load', function () {
        console.log({{json_encode($this->results)}})
    })
</script>
