<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Job extends Model
{
    use HasFactory;

    protected $fillable = [
        'job_title',
        'user_id',
        'category_id',
        'company_id',
        'company_email',
        'company_website',
        'vacancy',
        'location',
        'job_type_id',
        'salary',
        'experience',
        'job_description',
        'benefits',
        'responsibilty',
        'qualification'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }
    public function job_type(): BelongsTo
    {
        return $this->belongsTo(JobType::class);
    }
    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class, 'job_tag');
    }
    public function applications() {
        return $this->hasMany(JobApplication::class);
    }
}
