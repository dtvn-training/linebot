<?php

namespace Tests\Unit;

use App\Services\UserService;
// use PHPUnit\Framework\TestCase;
use Tests\TestCase;
use App\Models\User;
use App\Repositories\UserRepository; 
use Illuminate\Http\Request;

class UserServiceUnitTest extends TestCase
{
    /** @test */
    public function testIsAccountLocked()
    {
        $userRepository = new UserRepository();
        $userService = new UserService($userRepository);
                
        $user1 = (object) ['is_delete' => 1, 'is_block' => 0];
        $result = $userService->isAccountLocked($user1);
        // $this->assertFalse($userService->isAccountLocked($user1));
        $this->assertEquals(false, $result);

        // $user2 = (object) ['is_delete' => 1, 'is_block' => 0];
        // $this->assertTrue($userService->isAccountLocked($user2));

        // $user3 = (object) ['is_delete' => 0, 'is_block' => 1];
        // $this->assertTrue($userService->isAccountLocked($user3));

        // $user4 = (object) ['is_delete' => 1, 'is_block' => 1];
        // $this->assertTrue($userService->isAccountLocked($user4));


        // $this->assertEquals(false, $result);
    }

}
