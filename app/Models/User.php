<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

#[Fillable(['name', 'email', 'password','role'])]
#[Hidden(['password', 'remember_token'])]
class User extends Authenticatable
{
  /** @use HasFactory<UserFactory> */
  use HasFactory, Notifiable;

  /**
   * Get the attributes that should be cast.
   *
   * @return array<string, string>
   */
  protected function casts(): array
  {
    return [
      'email_verified_at' => 'datetime',
      'password' => 'hashed',
    ];
  }
  // علاقة المستخدم بالتكوينات (Many-to-Many)
  public function formations()
    {
        return $this->belongsToMany(Formation::class, 'enrollments')
                    ->withPivot('status', 'completed_at')
                    ->withTimestamps();
    }

  // علاقة المستخدم بالشهادات (One-to-Many)
  public function certificates()
  {
    return $this->hasMany(Certificate::class);
  }


}
