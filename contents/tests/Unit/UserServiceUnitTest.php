<?php

namespace Tests\Unit;

use App\Services\UserService;
// use PHPUnit\Framework\TestCase; // no use 
use Tests\TestCase; // should use 
use App\Models\User;
use App\Repositories\UserRepository; 
use Illuminate\Http\Request;

class UserServiceUnitTest extends TestCase
{
    public function testIsAccountLocked()
    {
        $userRepository = new UserRepository();
        $userService = new UserService($userRepository);
                
        $user1 = new User(['is_delete' => 0, 'is_block' => 0]);
        $this->assertFalse($userService->isAccountLocked($user1));

        $user2 = new User(['is_delete' => 1, 'is_block' => 0]);
        $this->assertTrue($userService->isAccountLocked($user2));

        $user3 = new User(['is_delete' => 0, 'is_block' => 1]);
        $this->assertTrue($userService->isAccountLocked($user3));

        $user4 = new User(['is_delete' => 1, 'is_block' => 1]);
        $this->assertTrue($userService->isAccountLocked($user4));
    }
}
