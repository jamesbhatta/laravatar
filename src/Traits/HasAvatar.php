<?php

namespace JamesBhatta\Laravatar\Traits;

trait HasAvatar
{
    protected $defaultGravatarEmailField = 'email';
    protected $defaultAvatarSize = 200;
    protected $defaultAvatarTextColor = '7F9CF5';
    protected $defaultAvatarBackgroundColor = 'EBF4FF';

    public function getAvatarUrlAttribute()
    {
        $email = $this->getEmail();
        $hash = $this->generateHash($email);
        $url = 'https://www.gravatar.com/avatar/' . $hash;

        $queryStrings = http_build_query([
            's' => $this->getAvatarSize(),
            'd' => $this->defaultAvatarUrl()
        ]);

        $url = $url . '?' . $queryStrings;

        return $url;
    }

    public function getEmail()
    {
        return $this->attributes[$this->getGravatarEmailField()];
    }

    /**
     * Generate the has for gravatar.com
     *
     * @param  string $email
     * @return string
     */
    public function generateHash($email)
    {
        return md5(strtolower(trim($email)));
    }

    /**
     * Get the size of avatar to be generated
     *
     * @return int
     */
    public function getAvatarSize()
    {
        return defined('static::AVATAR_SIZE') ? static::AVATAR_SIZE : $this->defaultAvatarSize;
    }

    /**
     * Get the email field name for gravatar
     *
     * @return int
     */
    public function getGravatarEmailField()
    {
        return defined('static::GRAVATAR_EMAIL_FIELD') ? static::GRAVATAR_EMAIL_FIELD : $this->defaultGravatarEmailField;
    }

    /**
     * Get the default profile photo URL if no profile photo has been uploaded.
     *
     * @return string
     */
    public function defaultAvatarUrl()
    {
        $providerURL = 'https://ui-avatars.com/api/';
        $url = $providerURL . '?' . http_build_query([
            'name' => urlencode($this->name),
            'size' => $this->getAvatarSize(),
            'color' => $this->getAvatarTextColor(),
            'background' => $this->getAvatarBackgroundColor(),
        ]);
     
        return $url;
    }

    public function getAvatarTextColor()
    {
        return defined('static::AVATAR_TEXT_COLOR') ? static::AVATAR_TEXT_COLOR : $this->defaultAvatarTextColor;
    }

    public function getAvatarBackgroundColor()
    {
        return defined('static::AVATAR_BACKGROUND_COLOR') ? static::AVATAR_BACKGROUND_COLOR : $this->defaultAvatarBackgroundColor;
    }
}
