<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserGroupMember extends Model
{
    use HasFactory;

    protected $fillable = ['group_leader_id', 'member_id'];

    public function leader()
    {
        return $this->belongsTo(User::class, 'group_leader_id');
    }

    public function member()
    {
        return $this->belongsTo(User::class, 'member_id');
    }
}
