<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Soul List
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @if ($collosal_holder->count() == 0)
                        <p>You have 0 entries of soul data</p>
                    @endif
                    <style>
                       
                        @media screen and (max-width: 1000px) {
                            .listed li a{
                                display: flex;
                                justify-content: space-between;
                                padding: 14px 16px  }

                        @media screen and (max-width: 400px){
                            .listed li a{
                                 color: red;
                                justify-content: space-between;
                            margin-right: 20px;
                            }
}
                            
                        }
}
                    </style>
                    @foreach ($collosal_holder as $collosal)
                    <span class="listed">
                        
                            <Li class="email">
                                {{ $collosal->fullName }}
                                <a  href="/soulmod/{{$collosal->id}}/edit">Edit</a>
                                <a  href="/soulmod/{{ $collosal->id}}/delete">Delete</a>
                            </Li> 
                        
                    </span>
                    @endforeach
                </div>
        </div>
    </div>


</x-app-layout>
   
