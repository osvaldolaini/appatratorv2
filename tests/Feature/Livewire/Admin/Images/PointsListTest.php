<?php

namespace Tests\Feature\Livewire\Admin\Images;

use App\Livewire\Admin\Images\PointsList;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class PointsListTest extends TestCase
{
    /** @test */
    public function renders_successfully()
    {
        Livewire::test(PointsList::class)
            ->assertStatus(200);
    }
}
