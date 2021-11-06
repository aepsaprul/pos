<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NavMainUser extends Model
{
    use HasFactory;
    
    /**
     * Get the navMain that owns the NavMainUser
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function navMain()
    {
        return $this->belongsTo(NavMain::class, 'nav_main_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
