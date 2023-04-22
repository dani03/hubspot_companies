<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = ['phone', 'lastname', 'firstname', 'email', 'jobtitle'];

    public function Company(): BelongsToMany {
        return $this->belongsToMany(Company::class);
    }
}
