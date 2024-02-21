<?php

namespace Tests\Feature\Livewire\Admin\Config;

use App\Livewire\Admin\Config\PointTitles;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class PointTitlesTest extends TestCase
{
    /** @test */
    public function renders_successfully()
    {
        Livewire::test(PointTitles::class)
            ->assertStatus(200);
    }
}
