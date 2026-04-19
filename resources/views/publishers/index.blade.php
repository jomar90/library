<x-layout>
    <x-slot:heading>
        Publishers
    </x-slot:heading>

    <div class="space-y-4">
        @foreach ($publishers as $publisher)
            <a href="/publishers/{{ $publisher['id'] }}" class="block px-4 py-6 border border-gray-200 rounded-lg">
                <div class="font-bold text-blue-500 text-sm">{{ $publisher->name }}</div>

        @endforeach

        <div>
            {{ $publishers->links() }}
        </div>
    </div>
</x-layout>
