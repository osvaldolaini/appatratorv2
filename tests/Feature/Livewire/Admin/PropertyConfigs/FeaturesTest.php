<?php

namespace Tests\Feature\Livewire\Admin\PropertyConfigs;

use App\Livewire\Admin\PropertyConfigs\Features;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class FeaturesTest extends TestCase
{
    /** @test */
    public function renders_successfully()
    {
        Livewire::test(Features::class)
            ->assertStatus(200);
    }
}
