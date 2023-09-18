<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'tanggal_lahir',
        'alamat',
        'username',
        'password',
    ];

    // public function up(): void
    // {
    //     Schema::create('posts', function (Blueprint $table) {
    //         $table->id();
    //         $table->string('image');
    //         $table->string('title');
    //         $table->text('content');
    //         $table->timestamps();
    //     });
    // }
}
