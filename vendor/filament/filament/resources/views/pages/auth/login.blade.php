<x-filament-panels::page.simple>
    @if (filament()->hasRegistration())
        <x-slot name="subheading">
            {{ __('filament-panels::pages/auth/login.actions.register.before') }}

            {{ $this->registerAction }}
        </x-slot>
    @endif

    {{ \Filament\Support\Facades\FilamentView::renderHook('panels::auth.login.form.before') }}

    <x-filament-panels::form wire:submit="authenticate">
        {{ $this->form }}

        <x-filament-panels::form.actions
            :actions="$this->getCachedFormActions()"
            :full-width="$this->hasFullWidthFormActions()"
        />
        <div style="text-align: center; margin-top: 10px;">
    <a href="{{ url('/') }}" style="background-color: orange; padding: 10px 20px; border-radius: 15px; text-decoration: none; color: black; transition: all 0.7s; display: inline-block; font-weight: normal; font-size: 16px;">
        Go to homepage
    </a>
</div>

<style>
    a:hover {
        font-weight: bold !important;
        box-shadow: 0 0 10px orange;
    }
</style>
    </x-filament-panels::form>

    {{ \Filament\Support\Facades\FilamentView::renderHook('panels::auth.login.form.after') }}
</x-filament-panels::page.simple>
