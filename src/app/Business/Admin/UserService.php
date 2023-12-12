<?php

namespace App\Business\Admin;

use App\Repository\UserRepositoryInterface;

class UserService implements UserServiceInterface
{

    protected $user;
    public function __construct(UserRepositoryInterface $user)
    {
        $this->user = $user;
    }


    public function getUserListWithSearch()
    {
        return $this->user->getUserListWithSearch();
    }

    public function create($payload)
    {
        if (@$payload['active']){
            $payload['email_verified_at'] = now();
        }
        unset($payload['active']);
        return $this->user->create($payload);
    }

    public function update($id, $payload)
    {
        if (@$payload['active']){
            $user = $this->user->findById($id);
            if (!$user->email_verified_at){
                $payload['email_verified_at'] = now();
            }
        }else{
            $payload['email_verified_at'] = null;
        }
        if (!@$payload['password']){
            unset($payload['password']);
        }
        unset($payload['active']);
        return $this->user->update($id,$payload);
    }

    public function delete($id)
    {
        $this->user->findById($id)->userAnswers()->delete();
        return $this->user->deleteById($id);
    }

}
