<?php

namespace Tests\Feature\Livewire\Admin\Marketing;

use App\Livewire\Admin\Marketing\Subscribers;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class SubscribersTest extends TestCase
{
    /** @test */
    public function renders_successfully()
    {
        Livewire::test(Subscribers::class)
            ->assertStatus(200);
    }
}
