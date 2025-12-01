@extends('admin.layouts.master')
@section('content')
    <h1>Accounts Management</h1>
    <p>Welcome to the account Management Dashboard.</p>
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            DataTable Example
        </div>
        <div class="card-body">
            <a href="{{ route('admin.account.create') }}" class="btn btn-primary mb-3">Create New Account</a>
            <table id="datatablesSimple">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>SĐT</th>
                        <th>Address</th>
                        <th>Role</th>
                        <th>Edit</th>
                        <th>Remove</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>SĐT</th>
                        <th>Address</th>
                        <th>Role</th>
                        <th>Edit</th>
                        <th>Remove</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach ($accounts as $account)
                        <tr>
                            <td>{{ $account->id }}</td>
                            <td>{{ $account->profile?->full_name }}</td>
                            <td>{{ $account->email}}</td>
                            <td>{{ $account->profile?->phone_number }}</td>
                            <td>{{ $account->profile?->address }}</td>
                            <td>{{ $account->role->name }}</td>
                            <td><a href="{{ route('admin.account.edit', $account->id) }}" class="btn btn-warning">Edit</a></td>
                            <td>
                                <form method="POST" action="{{ route('admin.account.destroy') }}">
                                    @csrf
                                    @method('DELETE')
                                    <input type="hidden" name="id" value="{{ $account->id }}">
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
