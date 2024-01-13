<x-form-section submit="updatePassword">
    <x-slot name="title">
        {{ __('Управление паролем') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Убедитесь, что ваша учетная запись использует длинный, случайный пароль, чтобы быть в безопасности.') }}
    </x-slot>

    <x-slot name="form">
        <div class="col-span-6 sm:col-span-4">
            <x-label for="current_password" value="{{ __('Текущий пароль') }}" />
            <x-input id="current_password" type="password" class="mt-1 block w-full" wire:model="state.current_password" autocomplete="current-password" />
            <x-input-error for="current_password" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-label for="password" value="{{ __('Новый пароль') }}" />
            <x-input id="password" type="password" class="mt-1 block w-full" wire:model="state.password" autocomplete="new-password" />
            <x-input-error for="password" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-label for="password_confirmation" value="{{ __('Повторите пароль') }}" />
            <x-input id="password_confirmation" type="password" class="mt-1 block w-full" wire:model="state.password_confirmation" autocomplete="new-password" />
            <x-input-error for="password_confirmation" class="mt-2" />
        </div>
    </x-slot>

    <x-slot name="actions">
        <x-action-message class="me-3" on="saved">
            {{ __('Сохранено.') }}
        </x-action-message>

        <x-button>
            {{ __('Сохранить изменения') }}
        </x-button>
    </x-slot>
</x-form-section>
