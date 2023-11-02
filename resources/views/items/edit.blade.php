<x-layout>
        <form method="POST" action="/items/{{ $item->id }}" >
            @csrf
            @method('PATCH')

            <x-form.input name="name" :value="old('name', $item->name)" required />
            <x-form.input name="quantity" :value="old('quantity', $item->quantity)" required />
            <x-form.textarea name="description" required>{{ old('description', $item->description) }}</x-form.textarea>
            <x-form.button>Update</x-form.button>
        </form>
</x-layout>
