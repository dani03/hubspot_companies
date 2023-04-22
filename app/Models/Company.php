<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Company extends Model
{
    use HasFactory;
    protected $fillable = ['name','industry',
        'city','country','website','phone','zip','numberofemployees','annualrevenue','description'];

    public function contacts(): BelongsToMany {
        return $this->BelongsToMany(Contact::class);
    }


}
