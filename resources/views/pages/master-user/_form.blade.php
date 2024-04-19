<div class="mt-6 space-y-2">
    <x-form.label
        for="name"
        value="Nama"
    />

    <x-form.input
        id="name"
        name="name"
        type="text"
        class="block w-full"
        :value="old('name', @$record->name ?? '')"
        placeholder="Nama"
    />

    <x-form.error :messages="$errors->get('name')" />
</div>

<div class="mt-6 space-y-2">
    <x-form.label
        for="email"
        value="Email"
    />

    <x-form.input
        id="email"
        name="email"
        type="text"
        class="block w-full"
        :value="old('email', @$record->email ?? '')"
        placeholder="Email"
    />

    <x-form.error :messages="$errors->get('email')" />
</div>

@if(!$isEditing)
<div class="mt-6 space-y-2">
    <x-form.label
        for="password"
        value="Password"
    />

    <x-form.input
        id="password"
        name="password"
        type="password"
        class="block w-full"
        :value="old('password', @$record->password ?? '')"
        placeholder="Password"
    />

    <x-form.error :messages="$errors->get('password')" />
</div>

<div class="mt-6 space-y-2">
    <x-form.label
        for="password_confirmation"
        value="Konfirmasi Password"
    />

    <x-form.input
        id="password_confirmation"
        name="password_confirmation"
        type="password"
        class="block w-full"
        :value="old('password_confirmation')"
        placeholder="Konfirmasi Password"
    />

    <x-form.error :messages="$errors->get('password_confirmation')" />
</div>
@endif

<div class="flex items-center gap-4">
    <x-button>
        {{ __('Save') }}
    </x-button>
</div>
