<?php
    namespace App\Models;

    use Illuminate\Database\Eloquent\Model;

    class Estado_x_roles extends Model
    {
        protected $table = "estados_x_roles"; 
        protected $fillable = [
            'id',
            'estados_id',
            'roles_id',
        ];
    }

