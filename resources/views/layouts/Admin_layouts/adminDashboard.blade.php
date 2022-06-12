<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Admin Dashboard
        </h2>
        <style>
            table, th, td {
              border:1px solid grey;
            }
            th,td{
                padding:10px;
            }
            tr:hover {background-color: #D6EEEE};

        </style>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h2>
                        <table style="width:100%">
                            <tr>
                                <th>Members</th>
                                <th>Number of Souls</th>
                                <th>Last entry</th>
                                @if (Auth::user()->roles->role_name =="super_Admin")
                                <th>Roles</th> 
                                @endif
                                
                              </tr>
                              @foreach ($users as $user)
                              <tr>
                                <td>{{ $user->firstname }} {{$user->lastname}}</td>
                                <td>{{ $user->collosal_count }}</td>
                                <td>N/A</td>
                                @if (Auth::user()->roles->role_name =="super_Admin")
                                    <td>
                                        <form method="POST" action="/role_change/{{$user->id}}">
                                            @csrf
                                            @if ($user->roles->role_name =="super_Admin")
                                                <select id="role_select" name="role_change">
                                                    <option value="super_Admin">{{$user->roles->role_name}}</option>
                                                    <option value="Admin">Admin</option>
                                                    <option value="Usher">Usher</option>
                                                    <option value="user">User</option>
                                                </select>
                                                <x-button class="ml-4" type="submit">{{ __('Update') }}</x-button>
                                            @elseif($user->roles->role_name =="Admin") 
                                                <select id="role_select" name="role_change">
                                                    <option value="Admin">{{$user->roles->role_name}}</option>
                                                    <option value="super_Admin">Super Admin</option>
                                                    <option value="Usher">Usher</option>
                                                    <option value="user">User</option>
                                                </select>
                                                <x-button class="ml-4" type="submit">{{ __('Update') }}</x-button>
                                            @elseif($user->roles->role_name =="Usher") 
                                                <select id="role_select" name="role_change">
                                                    <option value="Admin">{{$user->roles->role_name}}</option>
                                                    <option value="super_Admin">Super Admin</option>
                                                    <option value="Admin">Admin</option>
                                                    <option value="user">User</option>
                                                </select>
                                                <x-button class="ml-4" type="submit">{{ __('Update') }}</x-button>
                                            @else 
                                                <select id="role_select" name="role_change">
                                                    <option value="user">{{$user->roles->role_name}}</option>
                                                    <option value="super_Admin">Super Admin</option>
                                                    <option value="Admin">Admin</option>
                                                    <option value="Usher">Usher</option>
                                                </select>
                                                <x-button class="ml-4" type="submit">{{ __('Update') }}</x-button>
                                            @endif

                                        </form>
                                    </td>
                                @endif
                              </tr>
                              @endforeach
                        </table>
                    </h2>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
