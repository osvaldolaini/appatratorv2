<?php

namespace Tests\Feature\Livewire\Admin\PropertyConfigs;

use App\Livewire\Admin\PropertyConfigs\Types;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class TypesTest extends TestCase
{
    /** @test */
    public function renders_successfully()
    {
        Livewire::test(Types::class)
            ->assertStatus(200);
    }
}
