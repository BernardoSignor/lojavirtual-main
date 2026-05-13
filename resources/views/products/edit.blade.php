<x-app-layout>
<form enctype="multipart/form-data"
    class="w-full bg-white dark:bg-gray-800 p-6 rounded-lg shadow" action="{{ url('products/update') }}" method="POST">

    @csrf
    <!-- campo oculto passando o ID como parâmetro no request -->
    <input type="hidden" name="id" value="{{ $product['id'] }}">

    <h1 class="text-2xl font-bold mb-6 text-gray-900
dark:text-white">Atualizar Produto</h1>

    <label class="block mb-1 text-gray-700 dark:text-gray-300">Nome:</label>
    <input class="w-full p-2 mb-4 
    rounded border dark:bg-gray-700 dark:text-white" name="name" type="text" value="{{ $product['name'] }}" />

    <label class="block mb-1 text-gray-700 dark:text-gray-300">Descrição:</label>
    <input class="w-full p-2 mb-4 
    rounded border dark:bg-gray-700 dark:text-white" name="description" type="textarea" value="{{ $product['description'] }}" />

    <label class="block mb-1 text-gray-700 dark:text-gray-300">Quantidade:</label>
    <input class="w-full p-2 mb-4 
    rounded border dark:bg-gray-700 dark:text-white" name="quantity" type="number" value="{{ $product['quantity'] }}" />

    <label class="block mb-1 text-gray-700 dark:text-gray-300">Preço:</label>
    <input class="w-full p-2 mb-4 
    rounded border dark:bg-gray-700 dark:text-white" name="price" type="number" value="{{ $product['price'] }}" />

    <label class="block mb-1 text-gray-700
dark:text-gray-300">Imagem:</label>
    <input name="image" type="file" accept="image/*" class="w-full p-2 mb-4
rounded border dark:bg-gray-700 dark:text-white" />
    @error('image')
    <p class="text-red-600 font-bold text-sm mb-4">{{ $message }}</p>
    @enderror

    <label class="block mb-1 text-gray-700 dark:text-gray-300">Tipo:</label>
    <select class="w-full p-2 mb-4 rounded border dark:bg-gray-700 dark:text-white" name="type_id">
        <option value="">Selecione</option>

        @foreach($types as $type)
        <option
            {{ $product['type_id'] == $type->id ? "selected" : "" }}
            value="{{ $type->id }}">
            {{ $type->name }}
        </option>
        @endforeach
    </select>

    <x-primary-button>
        Salvar
    </x-primary-button>

</form>
</x-app-layout>