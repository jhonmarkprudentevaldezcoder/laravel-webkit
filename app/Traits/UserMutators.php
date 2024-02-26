<?php

namespace App\Traits;

use Illuminate\Support\Facades\Hash;

trait UserMutators {
    
    /**
     * Set the password attribute.
     *
     * @param  string  $value
     * @return void
     */
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = Hash::make($value);
    }

    /**
     * Set the email attribute.
     *
     * @param  string  $value
     * @return void
     */
    public function setEmailAttribute($value)
    {
        $this->attributes['email'] = strtolower($value);
    }
   
}