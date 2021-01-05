<?php

namespace JamesBhatta\Laravatar\Tests\Feature;

use JamesBhatta\Laravatar\Tests\TestCase;
use JamesBhatta\Laravatar\Tests\User;

class ExampleTest extends TestCase
{
    /** @test */
    public function it_returns_gravatar_url()
    {
        $user = new User([
            'email' => 'jmsbhatta@gmail.com',
            'name' => 'James Bhatta'
        ]);

        $expectedUrl = 'https://www.gravatar.com/avatar/2acfb745ecf9d4dccb3364752d17f65f';
        $expectedUrl = $expectedUrl . '?' . http_build_query([
            's' => 200,
            'd' => $user->defaultAvatarUrl()
        ]);

        $this->assertEquals($expectedUrl, $user->avatar_url);
    }

    /** @test */
    public function we_are_able_to_customize_avatar_attributes()
    {
        $user = new class extends User
        {
            const AVATAR_SIZE = 600;
            const GRAVATAR_EMAIL_FIELD = 'custom_field';
            const AVATAR_TEXT_COLOR = 'FFFFFF';
            const AVATAR_BACKGROUND_COLOR = '000000';

            public function __construct()
            {
                $this->custom_field = 'jmsbhatta@gmail.com';
                $this->name = 'James Bhatta';
            }
        };


        $expectedUrl = 'https://www.gravatar.com/avatar/2acfb745ecf9d4dccb3364752d17f65f';
        $expectedUrl = $expectedUrl . '?' . http_build_query([
            's' => 600,
            'd' => $user->defaultAvatarUrl()
        ]);

        $this->assertEquals($expectedUrl, $user->avatar_url);
    }
}
