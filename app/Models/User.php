<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'Perfils_id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    
     
    public function perfil(){
        return $this->hasOne('App\Models\Perfil','id','perfils_id');
    }
    

    public function egresados() {
        
        return $this->hasMany(Egresado::class,'idusuario','id');
    }
    

    public function esAdmin(){

        if($this->perfil->perfil=='administrador'){
            return true;
        }
        else {
        return false;}
    }

    public function esSecretariaE(){

        if($this->perfil->perfil=='secretariaE'){
            return true;
        }
        else {
        return false;}
    }

    public function esSecretariaC(){

        if($this->perfil->perfil=='secretariaC'){
            return true;
        }
        else {
        return false;}
    }
    public function EsComite(){

        if($this->perfil->perfil=='comite'){
            return true;
        }
        else {
        return false;}
    }

    public function esEgresado(){

        if($this->perfil->perfil=='egresado'){
            return true;
        }
        else {
        return false;}
    }







    
    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];


    public function isAdmin()
    {
        return $this->is_admin;
    }

    public function isStaff()
    {
        return $this->is_staff;
    }

    public function authorizeRoles($roles)
    {
        abort_unless($this->hasAnyRole($roles), 404);
        return true;
    }

    public function hasAnyRole($roles)
    {
        if (is_array($roles)) {
            foreach ($roles as $role) {
                if ($this->$role) {
                    return true;
                }
            }
        } else {
            if ($this->$roles) {
                return true;
            }
        }
        return false;
    }
    
}
