
<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl leading-tight">
                {{ __($pageTitle) }}
            </h2>
        </div>
    </x-slot>

    <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg dark:bg-gray-800 w-full">
        <form method="post" action="{{ route('master-user.store') }}" class="mt-6 space-y-6">
            @csrf
            @include('pages.master-user._form', [
                'isEditing' => false,
            ])
        </form>
    </div>
</x-app-layout>
