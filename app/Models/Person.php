<?php

namespace App\Models;

use App\Models\Scopes\ScopePerson;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\ScopedBy;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;

#[ScopedBy([ScopePerson::class])]
class Person extends Model
{
    public function getData(){
        return "{$this->id}: {$this->name}({$this->age})";
    }

    public function scopeNameEqual($query, $str)
    {
        return $query->where('name',$str);
    }
    public function scopeAgeGreaterThan($query, $n)
    {
        return $query->where('age','>=',$n);
    }
    public function scopeAgeLessThan($query, $n)
    {
        return $query->where('age','<=',$n);
    }

    public function board(): HasMany{
        return $this->hasMany(related: Board::class);
    }
    // public function board(): HasOne{
    //     return $this->hasOne(Board::class);
    // }
}
