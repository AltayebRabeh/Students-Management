@props(['submit'])
    <div {{ $attributes->merge() }}>
        <div class="md:mt-0 md:col-span-2">
            <form wire:submit.prevent="{{ $submit }}">
                <div class="{{ isset($actions) ? 'sm:rounded-tl-md sm:rounded-tr-md' : 'sm:rounded-md' }}">
                    <div class="row">
                        {{ $form }}
                    </div>
                </div>

                @if (isset($actions))
                        {{ $actions }}
                @endif
            </form>
        </div>
    </div>
