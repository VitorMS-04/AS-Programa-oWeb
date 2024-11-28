<?php
 
namespace App\Policies;

use App\Models\Post;
use App\Models\Produto;
use App\Models\User;
 
class ProdutoPolicy
{
    public function delete(?User $user): bool
    {
        return !is_null($user);
    }
    public function create(?User $user, Produto $produto): bool
    {
        return !is_null($user);
    }

    public function update(?User $user): bool
    {
        return !is_null($user);
    }
}