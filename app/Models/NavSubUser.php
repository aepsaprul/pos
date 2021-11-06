<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NavSubUser extends Model
{
    use HasFactory;

    /**
     * Get the navSub that owns the NavSubUser
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function navSub()
    {
        return $this->belongsTo(NavSub::class, 'nav_sub_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
