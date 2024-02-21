<?php

namespace Tests\Feature\Livewire\Admin\Registers;

use App\Livewire\Admin\Registers\Generals;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class GeneralsTest extends TestCase
{
    /** @test */
    public function renders_successfully()
    {
        Livewire::test(Generals::class)
            ->assertStatus(200);
    }
}
