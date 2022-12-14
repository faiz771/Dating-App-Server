<?php
namespace App\Repositories;
use App\Models\User;
class Dashboard{

    public function allUsers()
    {
        return User::latest()->get();
    }

}
?>
