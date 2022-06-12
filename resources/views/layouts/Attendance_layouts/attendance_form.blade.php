<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Attendance Form
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form method="POST" action="/attendance_submit">
                        @csrf
                        <!-- Validation Errors -->
                        <x-auth-validation-errors class="mb-4" :errors="$errors" />
                        <div>
                            <p class="block mb-3 py-2 w-full">Number of Entries Today: {{$entries_made}}</p>
                        </div>
                        <div>
                            <x-label for="fullName" :value="__('Fullname')" />
                            <x-input id="email" class="block mt-1 w-full" type="text" name="fullName" :value="old('fullName')" required />
                        </div>
                        <div>
                            <x-label for="residence" :value="__('Residence')" />
                            <x-input id="email" class="block mt-1 w-full" type="text" name="residence" :value="old('residence')" required />
                        </div>
                        <div>
                            <x-label for="number" :value="__('Phone Number')" />
                            <x-input id="email" class="block mt-1 w-full" type="number" name="number" :value="old('number')" required />
                        </div>
                        <div>
                            <x-label for="email" :value="__('Email')" />
                            <x-input id="email" class="block mt-1 w-full" type="text" name="email" :value="old('email')" required />
                        </div>
                        <div>
                            <x-label for="cell" :value="__('Cell')" />
                            <x-input id="email" class="block mt-1 w-full" type="text" name="cell" :value="old('cell')" required />
                        </div>
                        <div>
                            <x-label for="DOB" :value="__('Date of Birth')" />
                            <x-input id="email" class="block mt-1 w-full" type='date' name="DOB" :value="old('DOB')" required/>
                        </div>
                        <div>
                            <x-label for="invited" :value="__('Invited By')" />
                            <x-input id="email" class="block mt-1 w-full" type="text" name="invited" :value="old('invited')" required/>
                        </div>

                        {{-- ************ CHECKBOX FIELDS *********** --}}
                        
                        <div class="form-check form-check-inline">
                            <x-label for="Firsttimer" :value="__('First Timer')" />
                            <x-input id="email" class="block mt-1 max-w-7xl" type="checkbox"  name="Firsttimer" :value="old('Firsttimer')"/>
                        </div>
                        <x-button class="ml-4" type="submit">
                            {{ __('Submit') }}
                        </x-button>
                </div>
                    </form>
        </div>
    </div>
</x-app-layout>
