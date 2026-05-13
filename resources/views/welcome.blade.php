<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Loja Virtual</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700&display=swap" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans bg-gray-100 text-gray-900">
    <header class="bg-white border-b border-gray-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="h-16 flex justify-between items-center">
                <a href="{{ route('home') }}" class="text-2xl font-bold text-blue-700">
                    Loja Virtual
                </a>

                <nav class="flex items-center gap-3">
                    @auth
                        <a href="{{ route('dashboard') }}" class="text-sm font-medium text-gray-700 hover:text-blue-700">
                            Dashboard
                        </a>
                        <a href="{{ route('products') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 text-sm">
                            Produtos
                        </a>
                    @else
                        <a href="{{ route('login') }}" class="text-sm font-medium text-gray-700 hover:text-blue-700">
                            Login
                        </a>
                        <a href="{{ route('register') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 text-sm">
                            Registrar
                        </a>
                    @endauth
                </nav>
            </div>
        </div>
    </header>

    <main>
        <section class="bg-blue-700 text-white">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
                <div class="max-w-3xl">
                    <p class="text-sm font-semibold uppercase tracking-wide text-blue-100">
                        Produtos para venda
                    </p>
                    <h1 class="text-3xl sm:text-4xl font-bold mt-2">
                        Encontre os produtos disponiveis em nossa loja
                    </h1>
                    <p class="mt-3 text-blue-100">
                        Confira os itens cadastrados, veja o preco, a quantidade em estoque e filtre por tipo de produto.
                    </p>
                </div>
            </div>
        </section>

        <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
            <form method="GET" action="{{ route('home') }}" class="bg-white p-4 rounded-lg shadow mb-6">
                <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                    <div class="md:col-span-2">
                        <label class="block mb-1 text-gray-700">Buscar produto:</label>
                        <input
                            type="text"
                            name="search"
                            value="{{ request('search') }}"
                            placeholder="Digite o nome do produto"
                            class="w-full p-2 rounded border-gray-300"
                        >
                    </div>

                    <div>
                        <label class="block mb-1 text-gray-700">Tipo:</label>
                        <select name="type_id" class="w-full p-2 rounded border-gray-300">
                            <option value="">Todos os tipos</option>

                            @foreach ($types as $type)
                                <option value="{{ $type->id }}" @selected(request('type_id') == $type->id)>
                                    {{ $type->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="flex items-end gap-2">
                        <button type="submit" class="w-full bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                            Filtrar
                        </button>

                        @if(request('search') || request('type_id'))
                            <a href="{{ route('home') }}" class="px-4 py-2 rounded border border-gray-300 text-gray-700 hover:bg-gray-100">
                                Limpar
                            </a>
                        @endif
                    </div>
                </div>
            </form>

            <div class="flex justify-between items-center mb-4">
                <h2 class="text-2xl font-bold text-gray-900">
                    Produtos disponiveis
                </h2>
                <span class="text-sm text-gray-600">
                    {{ $products->count() }} produto(s)
                </span>
            </div>

            @if($products->count() > 0)
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach ($products as $product)
                        <div class="bg-white rounded-lg shadow overflow-hidden">
                            @if ($product->image)
                                <img
                                    src="{{ asset('storage/' . $product->image) }}"
                                    alt="Imagem do produto {{ $product->name }}"
                                    class="w-full h-48 object-cover"
                                >
                            @else
                                <div class="w-full h-48 bg-gray-200 flex items-center justify-center">
                                    <span class="text-gray-500 font-semibold">
                                        Sem imagem
                                    </span>
                                </div>
                            @endif

                            <div class="p-5">
                                <div class="flex justify-between items-start gap-3">
                                    <h3 class="text-xl font-bold text-gray-900">
                                        {{ $product->name }}
                                    </h3>

                                    <span class="bg-blue-100 text-blue-700 text-xs font-semibold px-2 py-1 rounded">
                                        {{ $product->type->name }}
                                    </span>
                                </div>

                                @if($product->description)
                                    <p class="text-gray-600 mt-2">
                                        {{ $product->description }}
                                    </p>
                                @endif

                                <div class="mt-4 flex justify-between items-center border-t pt-4">
                                    <div>
                                        <p class="text-sm text-gray-500">Preco</p>
                                        <p class="text-2xl font-bold text-blue-700">
                                            R$ {{ number_format($product->price, 2, ',', '.') }}
                                        </p>
                                    </div>

                                    <div class="text-right">
                                        <p class="text-sm text-gray-500">Estoque</p>
                                        <p class="font-semibold text-gray-800">
                                            {{ $product->quantity }} unidade(s)
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="bg-white rounded-lg shadow p-8 text-center">
                    <h3 class="text-xl font-bold text-gray-900">
                        Nenhum produto encontrado
                    </h3>
                    <p class="text-gray-600 mt-2">
                        Tente remover os filtros ou cadastre novos produtos com preco e quantidade maior que zero.
                    </p>
                </div>
            @endif
        </section>
    </main>
</body>
</html>
