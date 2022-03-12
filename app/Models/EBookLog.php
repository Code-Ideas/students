<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EBookLog extends Model
{
    protected $fillable = ['title', 'e_book_id', 'created_by', 'role'];

    public function createdBy()
    {
        return $this->belongsTo(Admin::class, 'created_by');
    }

    public function eBook()
    {
        return $this->belongsTo(EBook::class, 'e_book_id');
    }
}
