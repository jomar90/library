<x-layout>
    <x-slot:heading>
        Books
    </x-slot:heading>

    <div class="space-y-4">
        @foreach ($books as $book)
            <a href="/books/{{ $book->id }}" class="block px-4 py-6 border border-gray-200 rounded-lg">
                <div class="font-bold text-blue-500 text-sm">{{ $book->publisher?->name }}</div>

                <div>
                    <strong class="text-laracasts">{{ $book['title'] }}:</strong> written by {{ $book['author'] }}.
                </div>
            </a>
        @endforeach

        <div>
            {{ $books->links() }}
        </div>
    </div>
</x-layout>
