<div class="grid grid-cols-3 gap-4">
    <div class="...">
        <div class="space-y-2">
            <x-form.label
                for="Kode_Barang"
                value="Kode Barang"
            />

            <select id="Kode_Barang" class="block w-full" name="Kode_Barang">
                <option value="">-Pilih Barang-</option>
                @foreach($masterBarang as $item)
                    <option value="{{$item->Kode_Barang}}" dt_nama_barang="{{$item->Nama_Barang}}" dt_satuan="{{$item->Satuan}}">{{$item->Nama_Barang}}</option>
                @endforeach
            </select>

            
            <!-- <x-form.input
                id="Kode_Barang"
                name="Kode_Barang"
                type="text"
                class="block w-full"
                :value="old('Kode_Barang', @$record->Kode_Barang ?? '')"
                placeholder="Kode Barang"
            /> -->
            <x-form.error :messages="$errors->get('Kode_Barang')" />
        </div>
    </div>
    <div>
        <div class="space-y-2">
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
                readonly="readonly"
            />
            <x-form.error :messages="$errors->get('Nama_Barang')" />
        </div>
    </div>
    <div class="space-y-2">
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
            readonly="readonly"
        />
        <x-form.error :messages="$errors->get('Satuan')" />
    </div>
</div>


<div class="grid grid-cols-3 gap-4 mb-6">
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

    <div class="mt-6 space-y-2">
        <x-form.label
            for="Diskon"
            value="Diskon"
        />
        <x-form.input
            id="Diskon"
            name="Diskon"
            type="number"
            class="block w-full"
            :value="old('Diskon', (int) @$record->Diskon ?: 0)"
            placeholder="Diskon"
        />
        <x-form.error :messages="$errors->get('Diskon')" />
    </div>

    <!-- <div class="mt-6 space-y-2">
        <x-form.label
            for="Subtotal"
            value="Subtotal"
        />
        <x-form.input
            id="Subtotal"
            name="Subtotal"
            type="number"
            class="block w-full"
            :value="old('Subtotal', (int) @$record->Subtotal ?: 0)"
            placeholder="Subtotal"
        />
        <x-form.error :messages="$errors->get('Subtotal')" />
    </div> -->
</div>

<!-- <div class="flex flex-row-reverse">
    <x-button>
        {{ __('Tambah Ke Pembelian') }}
    </x-button>
</div> -->

<!-- 

<hr class="my-6">

<div class="mt-6 mb-4">
    <div class="flex">
        <div class="me-3">Nomor Pembelian</div>
        <div class="">: PO_001</div>
    </div>
    <div class="flex">
        <div class="me-3">Tanggal Pembelian</div>
        <div class="">: {{Carbon\Carbon::now()}}</div>
    </div>
</div>

<x-form.input
    id="Nomor_Pembelian"
    name="Nomor_Pembelian"
    type="hidden"
    class="block w-full"
    :value="old('Nomor_Pembelian', @$record->Nomor_Pembelian ?? '')"
    placeholder="Nomor Pembelian"
/>
<x-form.error :messages="$errors->get('Nomor_Pembelian')" />


<div class="overflow-x-auto">
    <table class="min-w-full bg-white border border-gray-300 rounded">
        <thead>
            <tr class="bg-gray-100">
                <th class="py-2 px-4 border-b border-r">No</th>
                <th class="py-2 px-4 border-b border-r">Nama Barang</th>
                <th class="py-2 px-4 border-b border-r">Qty</th>
                <th class="py-2 px-4 border-b border-r">Satuan</th>
                <th class="py-2 px-4 border-b border-r">Harga</th>
                <th class="py-2 px-4 border-b border-r">Diskon</th>
                <th class="py-2 px-4 border-b border-r">Subtotal</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
</div>
 -->


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

<div class="flex flex-row-reverse mt-6">
    <x-button>
        {{ __('Simpan') }}
    </x-button>
</div>

<script>
    $(document).ready(function() {
        $('#Kode_Barang').select2();

        $(document).on('change', '#Kode_Barang', function(){
            var dt_nama_barang = $(this).find(":selected").attr('dt_nama_barang');
            var dt_satuan = $(this).find(":selected").attr('dt_satuan');

            $('#Nama_Barang').val(dt_nama_barang);
            $('#Satuan').val(dt_satuan);
        });
    });
</script>
