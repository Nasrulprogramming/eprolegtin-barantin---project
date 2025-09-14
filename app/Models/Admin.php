<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Admin extends Authenticatable
{
    use Notifiable; // supaya bisa kirim notifikasi reset password

    protected $fillable = ['name', 'email', 'password', 'role'];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Kirim notifikasi reset password khusus admin
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new \App\Notifications\AdminResetPasswordNotification($token));
    }
}
