<div class="mt-6 space-y-2">
    <x-form.label
        for="Kode_Barang"
        value="Kode Barang"
    />

    <x-form.input
        id="Kode_Barang"
        name="Kode_Barang"
        type="text"
        class="block w-full"
        :value="old('Kode_Barang', @$record->Kode_Barang ?? '')"
        placeholder="Kode Barang"
    />

    <x-form.error :messages="$errors->get('Kode_Barang')" />
</div>


<div class="mt-6 space-y-2">
    <x-form.label
        for="Nama_Barang"
        value="Nama Barang"
    />

    <x-form.input
        id="Nama_Barang"
        name="Nama_Barang"
        type="text"
        class="block w-full"
        :value="old('Nama_Barang', @$record->Nama_Barang ?? '')"
        placeholder="Nama Barang"
    />

    <x-form.error :messages="$errors->get('Nama_Barang')" />
</div>

<div class="mt-6 space-y-2">
    <x-form.label
        for="Satuan"
        value="Satuan"
    />

    <x-form.input
        id="Satuan"
        name="Satuan"
        type="text"
        class="block w-full"
        :value="old('Satuan', @$record->Satuan ?? '')"
        placeholder="Satuan"
    />

    <x-form.error :messages="$errors->get('Satuan')" />
</div>

<div class="mt-6 space-y-2">
    <x-form.label
        for="Qty"
        value="Qty"
    />
    <x-form.input
        id="Qty"
        name="Qty"
        type="number"
        class="block w-full"
        :value="old('Qty', (int) @$record->Qty ?: 0)"
        placeholder="Qty"
    />
    <x-form.error :messages="$errors->get('Qty')" />
</div>

<div class="mt-6 space-y-2">
    <x-form.label
        for="Harga"
        value="Harga"
    />
    <x-form.input
        id="Harga"
        name="Harga"
        type="number"
        class="block w-full"
        :value="old('Harga', (int) @$record->Harga ?: 0)"
        placeholder="Harga"
    />
    <x-form.error :messages="$errors->get('Harga')" />
</div>

@if($isEditing)
{{-- <div class="mt-6 space-y-2">
    <x-form.label
        for="booth_status"
        value="Status"
    />

    <x-form.input
        id="booth_status"
        name="booth_status"
        type="text"
        class="block w-full"
        :value="old('booth_status', @$record->booth_status ?? '')"
        placeholder="Status"
    />

    <x-form.error :messages="$errors->get('booth_status')" />
</div> --}}
@endif

<div class="flex items-center gap-4">
    <x-button>
        {{ __('Save') }}
    </x-button>
</div>
