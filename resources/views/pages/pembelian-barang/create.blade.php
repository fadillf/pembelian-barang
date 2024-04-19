
<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl leading-tight">
                {{ __($pageTitle) }}
            </h2>
        </div>
    </x-slot>

    <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg dark:bg-gray-800 w-full">
        <form method="post" action="{{ route('pembelian-barang.store') }}" class="">
            @csrf
            @include('pages.pembelian-barang._form', [
                'isEditing' => false,
            ])
        </form>
    </div>
</x-app-layout>
