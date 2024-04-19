<?php
    $transaction_status = [
        0 => "Tidak Aktif",
        1 => "Aktif"
    ]
?>

<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl leading-tight">
                {{ __($pageTitle) }}
            </h2>
            <div>
                <x-button href="{{ route('master-user.create') }}">Tambah + </x-button>
            </div>
        </div>
    </x-slot>

    @if (session('success'))
        <div class="bg-green-500 text-white p-4 mb-4 rounded">
            {{ session('success') }}
        </div>
    @endif
    <div class="overflow-x-auto">
        <table class="min-w-full bg-white border border-gray-300 rounded">
            <thead>
                <tr class="bg-gray-100">
                    <th class="py-2 px-4 border-b border-r">No</th>
                    <th class="py-2 px-4 border-b border-r">Nama</th>
                    <th class="py-2 px-4 border-b border-r">Email</th>
                    <th class="py-2 px-4 border-b border-r">Role</th>
                    <th class="py-2 px-4 border-b border-r">Terakhir Login</th>
                    <th class="py-2 px-4 border-b border-r">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($data as $item)
                    <tr class="hover:bg-gray-200 transition-all">
                        <td class="py-2 px-4 border-b border-r">{{ $loop->iteration }}</td>
                        <td class="py-2 px-4 border-b border-r">{{ $item->name }}</td>
                        <td class="py-2 px-4 border-b border-r">{{ $item->email }}</td>
                        <td class="py-2 px-4 border-b border-r">{{ $item->role }}</td>
                        <td class="py-2 px-4 border-b border-r">{{ $item->last_login }}</td>
                        <td class="py-2 px-4 border-b border-r">
                            <div class="flex space-x-2">
                                <a href="{{ route('master-user.edit', $item->id) }}"
                                    class="text-sm py-1 px-2 mr-2 bg-blue-500 text-white rounded hover:bg-blue-600">Edit</a>
                                <form
                                    action="{{ route('master-user.destroy', $item->id) }}"
                                    method="POST" style="display: inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="text-sm py-1 px-2 bg-red-500 text-white rounded hover:bg-red-600"
                                        onclick="return confirm('Are you sure you want to delete this item?')">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <td class="py-2 px-4 border-b border-r text-center" colspan="8">Tidak ada data</td>
                @endforelse
            </tbody>
        </table>
    </div>
</x-app-layout>
