<x-layout>
    <x-slot:heading>
        Create Publisher
    </x-slot:heading>

    <form method="POST" action="/publishers">
        @csrf

        <div class="space-y-12">
            <div class="border-b border-gray-900/10 pb-12">
                <h2 class="text-base font-semibold leading-7 text-gray-900">Add Publisher</h2>


                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                    <x-form-field>
                        <x-form-label for="name">Name</x-form-label>

                        <div class="mt-2">
                            <x-form-input name="name" id="name" placeholder="Hachette" />

                            <x-form-error name="name" />
                        </div>
                    </x-form-field>

                    <x-form-field>
                        <x-form-label for="email">Email</x-form-label>

                        <div class="mt-2">
                            <x-form-input name="email" id="email" placeholder="abc@example.com" />

                            <x-form-error name="email" />
                        </div>
                    </x-form-field>

                    <x-form-field>
                        <x-form-label for="website">Website</x-form-label>

                        <div class="mt-2">
                            <x-form-input name="website" id="website" placeholder="https://hachette.com" />

                            <x-form-error name="website" />
                        </div>
                    </x-form-field>

                </div>
            </div>
        </div>

        <div class="mt-6 flex items-center justify-end gap-x-6">
            <button type="button" class="text-sm font-semibold leading-6 text-gray-900">Cancel</button>
            <x-form-button>Save</x-form-button>
        </div>
    </form>
</x-layout>
