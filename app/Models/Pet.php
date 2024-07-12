<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Pet extends Model
{
    use HasFactory;
    public const NAME = 'name';
    public const AGE = 'age';
    public const SPECIES = 'species';
    public const BREED = 'breed';
    public const DESCRIPTION = 'description';
    public const STATUS = 'status';
    public const USER_ID = 'user_id';
    public const CREATED_AT = 'created_at';
    public const UPDATED_AT = 'updated_at';

    protected $fillable = [Pet::NAME, Pet::AGE, Pet::SPECIES, Pet::BREED, Pet::DESCRIPTION, Pet::STATUS];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
