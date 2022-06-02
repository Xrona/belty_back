<?php

declare(strict_types=1);

namespace App\Models;


use App\Http\Requests\CommentsSearchRequest;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Comment extends Model
{
    use HasFactory;

    protected $table = 'comments';

    protected $fillable = [
        'product_id',
        'comment',
        'user_id',
        'evaluation',
        'date',
    ];

    protected $guarded = [
        'id',
        'created_at',
        'updated_at',
    ];

    public static function search(CommentsSearchRequest $request)
    {
        $search = $request->input('search');

        return Comment::query()
            ->where('comment', 'iLIKE', "%{$search}%")->get();
    }

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
}
