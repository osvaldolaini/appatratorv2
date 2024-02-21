<?php

namespace Tests\Feature\Livewire\Admin\Properties;

use App\Livewire\Admin\Properties\Properties;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class PropertiesTest extends TestCase
{
    /** @test */
    public function renders_successfully()
    {
        Livewire::test(Properties::class)
            ->assertStatus(200);
    }
}
