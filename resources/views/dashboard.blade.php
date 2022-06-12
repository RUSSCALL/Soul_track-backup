<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Soul Form
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form method="POST" action="/soul_form">
                        @csrf
                        <!-- Validation Errors -->
                        <x-auth-validation-errors class="mb-4" :errors="$errors" />
                        <div>
                            <x-label for="fullName" :value="__('Fullname')" />
                            <x-input id="email" class="block mt-1 w-full" type="text" name="fullName" :value="old('fullName')" required />
                        </div>
                        <div>
                            <x-label for="place_of_meeting" :value="__('Place of meeting')" />
                            <x-input id="email" class="block mt-1 w-full" type="text" name="place_of_meeting" :value="old('place_of_meeting')" required />
                        </div>
                        <div>
                            <x-label for="location" :value="__('Location')" />
                            <x-input id="email" class="block mt-1 w-full" type="text" name="location" :value="old('location')" required />
                        </div>
                        <div>
                            <x-label for="occupation" :value="__('Occupation')" />
                            <x-input id="email" class="block mt-1 w-full" type="text" name="occupation" :value="old('occupation')" required />
                        </div>
                        <div>
                            <x-label for="num1" :value="__('Primary Number')" />
                            <x-input id="email" class="block mt-1 w-full" type="number" name="num1" :value="old('num1')" required />
                        </div>
                        <div>
                            <x-label for="num2" :value="__('(Optional) Secondary Number')" />
                            <x-input id="email" class="block mt-1 w-full" type="number" name="num2" :value="old('num2')" />
                        </div>
                        <div>
                            <x-label for="num3" :value="__('(Optional) Tertiary Number')" />
                            <x-input id="email" class="block mt-1 w-full" type="number" name="num3" :value="old('num3')"  />
                        </div>
                        <div>
                            <x-label for="general_comments" :value="__('General Comments')" />
                            <x-input id="email" class="block mt-1 w-full" type="text" name="general_comments" :value="old('general_comments')"  />
                        </div>

                        {{-- ************ CHECKBOX FIELDS *********** --}}
                        
                        <div class="form-check form-check-inline">
                            <x-label for="not_born_again" :value="__('Not Born Again')" />
                            <x-input id="email" class="block mt-1 max-w-7xl" type="checkbox"  name="not_born_again" :value="old('not_born_again')"/>
                        </div>
                        <div class="form-check form-check-inline">
                            <x-label for="already_born_again" :value="__('Already Born Again')" />
                            <x-input id="email" class="block mt-1 max-w-7xl" type="checkbox"  name="already_born_again" :value="old('already_born_again')" />
                        </div>
                        <div class="form-check form-check-inline">
                            <x-label for="got_born_again" :value="__('Got Born Again')" />
                            <x-input id="email" class="block mt-1 max-w-7xl" type="checkbox" name="got_born_again" :value="old('got_born_again')"/>
                        </div>
                        <div class="form-check form-check-inline">
                            <x-label for="already_in_church" :value="__('Already In Church')" />
                            <x-input id="email" class="block mt-1 max-w-7xl" type="checkbox" name="already_in_church" :value="old('already_in_church')"/>
                        </div class="form-check form-check-inline">
                        
                        <div class="form-check form-check-inline">
                            <x-label for="no_church" :value="__('No Church')" />
                            <x-input id="email" class="block mt-1 max-w-7xl" type="checkbox" value="1" name="no_church" :value="old('no_church')"/>
                        </div>
                        <div class="form-check form-check-inline">
                            <x-label for="HG_filled" :value="__('Soul was filled with Holy Ghost by you?')" />
                            <x-input id="email" class="block mt-1 max-w-7xl" type="checkbox" value="1"  name="HG_filled" :value="old('HG_filled')"/>
                        </div>
                        <x-button class="ml-4" type="submit">
                            {{ __('Submit') }}
                        </x-button>
                </div>
                    </form>
        </div>
    </div>
</x-app-layout>
