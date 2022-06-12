<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{$progName}}
        </h2>
    </x-slot>
@if ($progName)
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <form method="POST" action="/user_program_entry">
                            @csrf
                            <!-- Validation Errors -->
                            <x-auth-validation-errors class="mb-4" :errors="$errors" />
                            <div>
                                <x-label for="InviteeName" :value="__('Invitee Name')" />
                                <x-input id="email" class="block mt-1 w-full" type="text" name="InviteeName" :value="old('InviteeName')" required />
                            </div>
                            <div>
                                <x-label for="location" :value="__('Location')" />
                                <x-input id="email" class="block mt-1 w-full" type="text" name="location" :value="old('location')" required />
                            </div>
                            <div>
                                <x-label for="contact" :value="__('Contact')" />
                                <x-input id="email" class="block mt-1 max-w-7x7" type="number" name="contact" :value="old('contact')" required />
                            </div>
                            <div class="form-check form-check-inline">
                                <x-label for="status" :value="__('Check if confirmed')" />
                                <x-input id="email" class="block mt-1 max-w-7xl" type="checkbox"  name="status" :value="old('status')"/>
                            </div>
                            <x-button class="ml-4" type="submit">
                                {{ __('Submit') }}
                            </x-button>
                    </div>
                    </form>
            </div>
        </div>
@else
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <h1>Sorry there is no current program</h1>

            </div>
        </div>
    </div>
</div>
@endif

</x-app-layout>
