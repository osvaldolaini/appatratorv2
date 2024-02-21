<?php

namespace Tests\Feature\Livewire\Admin\Images;

use App\Livewire\Admin\Images\Points;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class PointsTest extends TestCase
{
    /** @test */
    public function renders_successfully()
    {
        Livewire::test(Points::class)
            ->assertStatus(200);
    }
}
