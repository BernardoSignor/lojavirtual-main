<x-app-layout>
    <form enctype="multipart/form-data" class="w-full bg-white dark:bg-gray-800 p-6 rounded-lg
shadow" action="{{ url('products/new') }}" method="POST">
        @csrf

        @if(session('error'))
        <div class="bg-red-100 text-red-800 p-3 rounded mb-4">
            {{ session('error') }}
        </div>
        @endif

        <h1 class="text-2xl font-bold mb-6 text-gray-900
dark:text-white">Cadastrar Produto</h1>

        <x-meu-input name="name" label="Nome:" />

        @error('name')
        <p class="text-red-600 mb-4 text-sm">{{ $message }}</p>
        @enderror

        <x-meu-input name="quantity" label="Quantidade:" type="number" />

        @error('quantity')
        <p class="text-red-600 mb-4 text-sm">{{ $message }}</p>
        @enderror

        <x-meu-input name="description" label="Descrição:" type="text" />

        <x-meu-input name="price" label="Preço:" type="number" />

        @error('price')
        <p class="text-red-600 mb-4 text-sm">{{ $message }}</p>
        @enderror

        <div x-data="{ imageURL: null}">
            <label class="block mb-1 text-gray-700 dark:text-gray-300">Imagem:</label>
            <input 
            x-on:change="imageURL = URL.createObjectURL($event.target.files[0])"
            name="image" type="file" accept="image/*" class="w-full p-2 mb-4
rounded border dark:bg-gray-700 dark:text-white" />

        <img x-show="imageURL" x-bind:src="imageURL" class="mt-4 h-48" />
        </div>

        @error('image')
        <p class="text-red-600 font-bold text-sm mb-4">{{ $message }}</p>
        @enderror



        <select class="w-full p-2 mb-4 rounded border dark:bg-gray-700 dark:text-white" name="type_id">
            <option value="">Selecione</option>

            @foreach($types as $type)
            <option value="{{ $type->id }}">
                {{ $type->name }}
            </option>
            @endforeach
        </select>

        <x-primary-button>
            Salvar
        </x-primary-button>


    </form>
</x-app-layout>