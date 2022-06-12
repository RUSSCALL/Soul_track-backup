<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit Page
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form method="POST" action="/soulmod/{{$collosal->id}}/update">
                        @csrf
                        <!-- Validation Errors -->
                        <x-auth-validation-errors class="mb-4" :errors="$errors" />
                        <div>
                            <x-label for="fullName" :value="__('Fullname')" />
                            <x-input id="email" class="block mt-1 w-full" type="text" name="fullName" value="{{$collosal->fullName}}" required />
                        </div>
                        <div>
                            <x-label for="location" :value="__('Location')" />
                            <x-input id="email" class="block mt-1 w-full" type="text" name="location" value="{{$collosal->location}}" required />
                        </div>
                        <div>
                            <x-label for="occupation" :value="__('Occupation')" />
                            <x-input id="email" class="block mt-1 w-full" type="text" name="occupation" value="{{$collosal->occupation}}" required />
                        </div>
                        <div>
                            <x-label for="num1" :value="__('Primary Number')" />
                            <x-input id="email" class="block mt-1 w-full" type="number" name="num1" value="{{$collosal->num1}}" required />
                        </div>
                        <div>
                            <x-label for="num2" :value="__('(Optional) Secondary Number')" />
                            <x-input id="email" class="block mt-1 w-full" type="number" name="num2" value="{{$collosal->num2}}" />
                        </div>
                        <div>
                            <x-label for="num3" :value="__('(Optional) Tertiary Number')" />
                            <x-input id="email" class="block mt-1 w-full" type="number" name="num3" value="{{$collosal->num3}}"  />
                        </div>
                        <div>
                            <x-label for="general_comments" :value="__('General Comments')" />
                            <x-input id="email" class="block mt-1 w-full" type="text" name="general_comments" value="{{$collosal->general_comments}}"  />
                        </div>
                        <x-button class="ml-4" type="submit">
                            {{ __('Submit') }}
                        </x-button>
                </div>
                    </form>
        </div>
    </div>
</x-app-layout>
