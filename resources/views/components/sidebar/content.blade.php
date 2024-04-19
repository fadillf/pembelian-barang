<x-perfect-scrollbar as="nav" aria-label="main" class="flex flex-col flex-1 gap-4 px-3">

    <div x-transition x-show="isSidebarOpen || isSidebarHovered" class="text-sm text-gray-500">
        Main
    </div>

    <x-sidebar.link title="Dashboard" href="{{ route('dashboard') }}" :isActive="request()->routeIs('dashboard')">
        <x-slot name="icon">
            <x-icons.dashboard class="flex-shrink-0 w-6 h-6" aria-hidden="true" />
        </x-slot>
    </x-sidebar.link>

    <x-sidebar.link title="Master User" href="{{ route('master-user.index') }}" :isActive="request()->routeIs('master-user.index')" />

    <x-sidebar.link title="Master Barang" href="{{ route('master-barang.index') }}" :isActive="request()->routeIs('master-barang')" />

    <x-sidebar.link title="Pembelian Barang" href="{{ route('pembelian-barang.index') }}" :isActive="request()->routeIs('pembelian-barang')" />

    <div x-transition x-show="isSidebarOpen || isSidebarHovered" class="text-sm text-gray-500">
        Settings
    </div>

    <x-sidebar.link title="Profile" href="{{ route('profile.edit') }}" :isActive="request()->routeIs('profile.edit')" />

    {{-- <x-sidebar.link title="Payment Gateway Settings" href="{{ route('payment-gateway-settings.index') }}" :isActive="request()->routeIs('payment-gateway-settings.index')" /> --}}
</x-perfect-scrollbar>
