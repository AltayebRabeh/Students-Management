<x-jet-form-section submit="updateProfileInformation">

    <x-slot name="form">
        <!-- Profile Photo -->
        @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
            <div x-data="{photoName: null, photoPreview: null}" class="col-md-12">
                <!-- Profile Photo File Input -->
                <input type="file" class="hidden"
                            wire:model="photo"
                            x-ref="photo"
                            x-on:change="
                                    photoName = $refs.photo.files[0].name;
                                    const reader = new FileReader();
                                    reader.onload = (e) => {
                                        photoPreview = e.target.result;
                                    };
                                    reader.readAsDataURL($refs.photo.files[0]);
                            " />

                <!-- Current Profile Photo -->
                <div class="row align-items-center">
                    <div class="col-md-2 col-sm-6 text-center">
                        <div style="position: relative;width:80px;height:80px;overflow:hidden">
                            <div class="avatar avatar-xl" style="position: relative;width:80px;height:80px;overflow:hidden" x-show="! photoPreview">
                                <span class="block rounded-full w-20 h-20 bg-cover bg-no-repeat bg-center"
                                    x-bind:style="'background-image: url({{ $this->user->profile_photo_url }});'">
                                </span>
                            </div>
                            <label for="addPhoto" style="cursor: pointer;position: absolute;left:0;top:30px;background:#3ad29f;width:20px;height:20px;border-radius:50%"><i class="fe fe-camera"></i></label>
                            <label for="removePhoto" style="cursor: pointer;position: absolute;right:0;top:30px;background:#dc3545;width:20px;height:20px;border-radius:50%"><i class="fe fe-trash"></i></label>
                            <!-- New Profile Photo Preview -->
                            <div x-show="photoPreview" style="display: none;">
                                <span class="block rounded-full w-20 h-20 bg-cover bg-no-repeat bg-center"
                                    x-bind:style="'background-image: url(\'' + photoPreview + '\');'">
                                </span>
                            </div>
                        </div>

                    </div>
                    <div class="col">
                        <h4 class="mb-1">{{ $this->user->name }}</h4>
                    </div>
                </div>


            <x-jet-secondary-button class="mt-2 mr-2 d-none" id="addPhoto" type="button" x-on:click.prevent="$refs.photo.click()">
                {{ __('Select A New Photo') }}
            </x-jet-secondary-button>

            <x-jet-section-border />

                @if ($this->user->profile_photo_path)
                    <x-jet-secondary-button type="button" id="removePhoto" class="mt-2 d-none" wire:click="deleteProfilePhoto">
                        {{ __('Remove Photo') }}
                    </x-jet-secondary-button>
                @endif

                <x-jet-input-error for="photo" class="mt-2" />
            </div>
        @endif

        <!-- Name -->
        <div class="col-md-6 mb-4">
            <x-jet-label for="name" value="{{ __('الاسم الكامل') }}" />
            <x-jet-input id="name" disabled type="text" class="mt-1 block w-full" wire:model.defer="state.name" autocomplete="name" />
            <x-jet-input-error for="name" class="mt-2" />
        </div>

        <div class="col-md-6 mb-4">
            <x-jet-label for="username" value="{{ __('إسم الدخول') }}" />
            <x-jet-input id="username" type="text" class="mt-1 block w-full" wire:model.defer="state.username" autocomplete="username" />
            <x-jet-input-error for="username" class="mt-2" />
        </div>

        <!-- Email -->
        <div class="col-md-12 mb-4">
            <x-jet-label for="email" value="{{ __('البريد الالكتروني') }}" />
            <x-jet-input id="email" type="email" class="mt-1 block w-full" wire:model.defer="state.email" />
            <x-jet-input-error for="email" class="mt-2" />
        </div>
    </x-slot>

    <x-slot name="actions">
        <x-jet-action-message class="mr-3" on="saved">
            {{ __('تم الحفظ.') }}
        </x-jet-action-message>

        <x-jet-button wire:loading.attr="disabled" wire:target="photo">
            {{ __('حفظ') }}
        </x-jet-button>
    </x-slot>
</x-jet-form-section>
