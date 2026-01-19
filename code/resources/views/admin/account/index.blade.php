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
         <x-admin.data-table id="accountTable" table="accounts" 
            :actions="[
                'edit' => [
                    'route' => 'admin.service.edit',
                ],
                'delete' => [
                    'route' => 'admin.service.destroy',
                ],
            ]" :columns="[
                ['data' => 'id', 'title' => 'ID'],
                ['data' => 'profile.full_name', 'title' => 'Name'],
                ['data' => 'email', 'title' => 'Email'],
                ['data' => 'profile.phone_number', 'title' => 'Phone Number'],
                 ['data' => 'profile.address', 'title' => 'Address'],
                ['data' => 'role.name', 'title' => 'Role'],
                ['data' => 'edit', 'title' => 'Edit'],
                ['data' => 'delete', 'title' => 'Delete'],
            ]" />
        </div>
    </div>
@endsection
