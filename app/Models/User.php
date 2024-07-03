<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Itstructure\LaRbac\Models\Role;
use Itstructure\LaRbac\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Itstructure\LaRbac\Interfaces\RbacUserInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Itstructure\LaRbac\Traits\Administrable;

class User extends Authenticatable implements RbacUserInterface
{
    use HasApiTokens, HasFactory, Notifiable, Administrable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    // Implementing methods required by RbacUserInterface
    public function getMemberKeyAttribute()
    {
        return $this->id;
    }

    public function getMemberNameAttribute():string
    {
        return $this->name;
    }

    public function setRolesAttribute($value):void
    {
        $this->roles()->sync($value);
    }

    // Implement other methods as required by RbacUserInterface
    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    public function hasAccess($permissionKey):bool
    {
        // Get the roles assigned to the user
        $roles = $this->roles()->with('permissions')->get();

        // Check each role's permissions
        foreach ($roles as $role) {
            foreach ($role->permissions as $permission) {
                if ($permission->key === $permissionKey) {
                    return true; // User has access to the permission
                }
            }
        }

        return false; // User does not have access to the permission
    }

    public function inRole($roleKey):bool
    {
        return $this->roles()->where('key', $roleKey)->exists();
    }

    public function canAssignRole(RbacUserInterface $member, Role $role):bool
    {
        // Logic to determine if the user can assign the specified role
        // Check if the user has a specific permission to assign roles
        // You may need to adjust the logic based on your application's permission structure
        return $this->hasAccess('assign-role');
    }

    
}
