<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OutletMenu extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function outlet()
    {
    	return $this->belongsTo(Outlet::class);
    }

    public function menu()
    {
    	return $this->belongsTo(Menu::class);
    }
}
