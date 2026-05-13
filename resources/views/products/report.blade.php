<x-app-layout>
    <div class="w-full bg-white dark:bg-gray-800 p-6 rounded-lg shadow mx-auto">
        <h1 class="text-2xl font-bold mb-6 text-gray-900 dark:text-white">Relatorio de Produtos</h1>

        <form method="GET" action="{{ route('products.report.pdf') }}" class="space-y-4">
            <div>
                <x-input-label for="name" value="Nome" />
                <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" value="{{ request('name') }}" />
            </div>

            <div>
                <x-input-label for="type_id" value="Tipo" />
                <select id="type_id" name="type_id" class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                    <option value="">Todos</option>
                    @foreach($types as $type)
                        <option value="{{ $type->id }}" @selected(request('type_id') == $type->id)>
                            {{ $type->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <x-input-label for="min_quantity" value="Quantidade minima" />
                    <x-text-input id="min_quantity" name="min_quantity" type="number" class="mt-1 block w-full" value="{{ request('min_quantity') }}" />
                </div>

                <div>
                    <x-input-label for="max_quantity" value="Quantidade maxima" />
                    <x-text-input id="max_quantity" name="max_quantity" type="number" class="mt-1 block w-full" value="{{ request('max_quantity') }}" />
                </div>
            </div>

            <div class="flex gap-2">
                <x-primary-button>Exportar PDF</x-primary-button>
                <a href="{{ route('products') }}" class="inline-flex items-center px-4 py-2 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-500 rounded-md font-semibold text-xs text-gray-700 dark:text-gray-300 uppercase tracking-widest shadow-sm hover:bg-gray-50 dark:hover:bg-gray-700">
                    Voltar
                </a>
            </div>
        </form>
    </div>
</x-app-layout>
