<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AccountRequest;
use App\Services\AccountService;
use App\Services\RoleService;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    protected $accountService;
    protected $roleService;
    public function __construct()
    {
        $this->accountService = new AccountService();
        $this->roleService = new RoleService();
    }

    public function index()
    {
        $accounts = $this->accountService->getAllAccounts();
        return view('admin.account.index')->with('accounts', $accounts);
    }

    public function create()
    {
        $roles = $this->roleService->getAllRoles();
        return view('admin.account.create')->with('roles', $roles);
    }

    public function store(AccountRequest $request)
    {
       try {
           $this->accountService->setData($request->all())->createAccount();
           return redirect()->route('admin.account.index')->with('success', 'Account created successfully.');
       } catch (\Exception $e) {
           return redirect()->back()->with('error', 'Failed to create account: ');
       }
    }

    public function edit($id)
    {
        $account = $this->accountService->getAccountById($id);
        $roles = $this->roleService->getAllRoles();
        return view('admin.account.edit')
            ->with([
                'account' => $account,
                'roles' => $roles
            ]);
    }

    public function update(AccountRequest $request)
    {
        try {
            $this->accountService->setData($request->all())->updateAccount($request->id);
            return redirect()->route('admin.account.index')->with('success', 'Account updated successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to update account: ' . $e->getMessage());
        }
    }

    public function destroy(Request $request)
    {
        try {
            $account = $this->accountService->getAccountById($request->id);
            $account->delete();
            return redirect()->route('admin.account.index')->with(['success' => true, 'message' => 'Account deleted successfully.']);
        } catch (\Exception $e) {
            return redirect()->back()->with(['success' => false, 'message' => 'Failed to delete account: ' . $e->getMessage()]);
        }
    }
}
