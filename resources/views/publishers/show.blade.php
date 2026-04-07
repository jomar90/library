<x-layout>
    <x-slot:heading>
        Publisher Details
    </x-slot:heading>

    <h2 class="font-bold text-lg">{{ $publisher->name }}</h2>

    <p>Email: {{ $publisher->email }}</p>
    <p>Website: {{ $publisher->website }}</p>

    @can('edit', $publisher)
        <p class="mt-6">
           <x-button href="/publishers/{{ $publisher->id }}/edit">Edit Publisher</x-button>
        </p>
    @endcan

            {{-- <p class="mt-6">
           <x-button href="/publishers/{{ $publisher->id }}/edit">Edit Publisher</x-button>
        </p> --}}
</x-layout>
