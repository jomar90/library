<x-layout>
    <x-slot:heading>
        Books List
    </x-slot:heading>

    <form class="flex items-center gap-2 mb-6">
        <div class="relative">
            <input
                type="text"
                name="search"
                value="{{ request('search') }}"
                placeholder="Search books..."
                class="w-72 pl-3 pr-3 py-2 rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
            >
        </div>

        <x-form-button>
            Search
        </x-form-button>
    </form>

    <div class="space-y-4">
        @foreach ($books as $book)
            <a href="/books/{{ $book->id }}" class="block px-4 py-6 border border-gray-200 rounded-lg">
                <div class="font-bold text-blue-500 text-sm">{{ $book->publisher?->name }}</div>

                <div>
                    <strong class="text">{{ $book->title }}:</strong> written by {{ $book->author }}.
                </div>
            </a>
        @endforeach

        <div>
            {{ $books->links() }}
        </div>
    </div>
</x-layout>
