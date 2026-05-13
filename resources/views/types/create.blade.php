<x-app-layout>

    <form method="POST" action="" class="p-4">
        @csrf
        <x-input-label class="mt-1">Nome: (Tipo) </x-input-label>
        <x-text-input required id="name" name="name" type="text" class="mt-1" />
        <x-primary-button>Salvar</x-primary-button>
    </form>
</x-app-layout>