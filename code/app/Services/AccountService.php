<?php

namespace App\Services;

use App\Models\Accounts;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;


class AccountService
{
    protected $model;
    protected $split;
    public function __construct()
    {
        $this->model = new Accounts();
    }

    public function splitData($data)
    {
        return [
            'account' => Arr::only($data, ['email', 'role_id', 'password']),
            'profile' => Arr::only($data, ['full_name', 'phone_number', 'address','image_url']),
        ];
    }

    public function setData(array $data)
    {
        $this->split = $this->splitData($data);
        return $this;
    }

    private function defaultPassword()
    {
        return '12345678';
    }

    public function getAllAccounts()
    {
        return $this->model->with(['profile', 'role'])->get();
    }

    public function getAccountById($id)
    {
        return $this->model->with('profile')->findOrFail($id);
    }

    public function createAccount()
    {
        DB::beginTransaction();
        try {
             $account = $this->model->create($this->split['account'] + ['password' => bcrypt($this->defaultPassword())]);
            $account->profile()->create($this->split['profile']);
            DB::commit();
            return $account;
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

    public function updateAccount($id)
    {
        DB::beginTransaction();
        try {
            
            $account = $this->model->findOrFail($id);
            $account->update($this->split['account']);
            if ($account->profile) {
                $account->profile->update($this->split['profile']);
            } else {
                $account->profile()->create($this->split['profile']);
            }
            DB::commit();
            return $account;
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }
}
