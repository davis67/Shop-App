<x-layout>
        <form method="POST" action="/items">
            @csrf

            <x-form.input name="name" required />
            <x-form.input name="quantity" required />
            <x-form.textarea name="description" required />   
            <x-form.button>Create</x-form.button>
             
</x-layout>
