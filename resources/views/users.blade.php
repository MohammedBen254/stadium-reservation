@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center" >
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="row">
                        <table class="table">
                            <thead  class="thead bg-dark" >
                                <tr class="title bg-dark">
                                    <th scope="col">
                                        User ID 
                                    </th>
                                    <th scope="col">
                                        User Name
                                    </th>
                                    <th scope="col">
                                        Email
                                    </th>
                                    <th scope="col">
                                        Phone Number
                                    </th>
                                    <th scope="col">
                                        Role
                                    </th>
                                    <th scope="col">
                                        Signed on
                                    </th>
                                    <th scope="col" colspan="2">
                                        Operations
                                    </th>
                                </tr>
                            </thead>
                            @foreach ($users as $user)
                            <tr id="tr">
                                <td>
                                {{$user->id}}
                                </td>   
                                <td>
                                    {{$user->name}}
                                </td>
                                <td>
                                    {{$user->email}}
                                </td>
                                <td>
                                    {{$user->phone_number}}
                                </td>
                                <td>
                                    @if ($user->role_as==1)
                                    Admin
                                    @else
                                    User
                                    @endif
                                </td>
                                <td>
                                    {{$user->created_at}}
                                </td>
                                @if ($user->role_as==1)
                                    <td>
                                        
                                    <form action="{{ route('removeAdmin', ['id' => $user->id]) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-warning" onclick="return confirm('Are you sure you want to remove this admin?')">Remove Admin</button>
                                    </form>
                                    </td>   
                                @else
                                    <td>
                                        <form action="{{ route('setAdmin', ['id' => $user->id]) }}" method="POST">
                                            @csrf
                                            <button type="submit" class="btn btn-success" onclick="return confirm('Are you sure you want to set it Admin?')">Set Admin</button>
                                        </form>
                                    </td>   
                                @endif
                                <td>
                                    <form action="{{ route('deleteUser', $user->id) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this user?')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
