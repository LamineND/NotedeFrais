<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Jetstream\Jetstream;


class NotedeFrais extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'montant', 'categorie', 'description', 'date_depense', 'preuve', 'etat'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
