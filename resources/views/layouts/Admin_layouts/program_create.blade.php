<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Create Program Form
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @if ($toggle == '1')
                        <form method="POST" action="/end_program">
                            @csrf
                            @method('delete')
                            <!-- Validation Errors -->
                            <x-auth-validation-errors class="mb-4" :errors="$errors" />
                            <div>
                                <x-button class="ml-4" type="submit">
                                    {{ __('End') }}
                                </x-button>
                            </div>
                    @else
                    <form method="POST" action="/program_create">
                        @csrf
                        <!-- Validation Errors -->
                        <x-auth-validation-errors class="mb-4" :errors="$errors" />
                        <div>
                            <x-label for="program_name" :value="__('Program Name')" />
                            <x-input id="email" class="block mt-1 w-full" type="text" name="program_name" :value="old('program_name')" required />
                        </div>
                        <div>
                            <x-label for="indivTarget" :value="__('Individual Target Attendance')" />
                            <x-input id="email" class="block mt-1 w-full" type="number" name="indivTarget" :value="old('indivTarget')" required />
                        </div>
                        <div>
                            <x-label for="totalTarget" :value="__('Total Target Attendance')" />
                            <x-input id="email" class="block mt-1 w-full" type="number" name="totalTarget" :value="old('totalTarget')" required />
                        </div>
                        <div>
                            <x-button class="ml-4" type="submit">
                                {{ __('Submit') }}
                        </x-button>
                        </div>
                    @endif       
                </div>
                    </form>
        </div>
    </div>
</x-app-layout>
