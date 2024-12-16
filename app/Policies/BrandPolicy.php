<?php

namespace App\Policies;

use App\Models\Product;
use App\Models\User;
use Illuminate\Auth\Access\Response;
use Illuminate\Support\Facades\Auth;

class BrandPolicy
{

    private $user;

    public function __construct(){
        $this->user = Auth::user();
    }
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny()
    {
        return $this->user;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view()
    {
       return $this->user;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create()
    {
        return $this->user->is_admin;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update()
    {
        return $this->user->is_admin;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete()
    {
        return $this->user->is_admin;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore()
    {
        return $this->user->is_admin;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete()
    {
        return $this->user->is_admin;
    }
}
