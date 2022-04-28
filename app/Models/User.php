<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Validation\Rules\Password;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * @mixin IdeHelperUser
 */
class User extends Authenticatable
{
    use HasApiTokens;
    use  HasFactory;
    use Notifiable;

    /**
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function listings(): HasMany
    {
        return $this->hasMany(
            related: Listing::class,
            foreignKey: 'user_id'
        );
    }

    public function toArray(): array
    {
        return [
            'name' => $this->name,
            'email' => $this->email,
        ];
    }

    public static function rules(): array
    {
        return [
            'name' => [
                'required',
                'string',
                'max:255',
                function ($attribute, $value, $fail) {
                    if (str_word_count($value) <= 1) {
                        $fail("Kindly enter your full name. Single names aren't allowed.");
                    }
                }
            ],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique(User::class),
            ],
            'password' => [
                'required',
                'string',
                Password::min(8)
                    ->default(),
                // ->letters()
                // ->mixedCase()
                // ->numbers()
                // ->symbols()
                // ->uncompromised(),
                'confirmed'
            ],
        ];
    }
}
