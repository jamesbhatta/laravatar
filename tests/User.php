<?php
namespace JamesBhatta\Laravatar\Tests;

use Illuminate\Database\Eloquent\Model;
use JamesBhatta\Laravatar\Traits\HasAvatar;

class User extends Model
{
    use HasAvatar;

    protected $guarded = [];

    // const AVATAR_SIZE = 200;
    // const GRAVATAR_EMAIL_FIELD = 'email';
    // const AVATAR_TEXT_COLOR = '7F9CF5';
    // const AVATAR_BACKGROUND_COLOR = 'EBF4FF';
}