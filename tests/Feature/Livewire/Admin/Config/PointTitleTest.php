<?php

namespace Tests\Feature\Livewire\Admin\Config;

use App\Livewire\Admin\Config\PointTitle;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class PointTitleTest extends TestCase
{
    /** @test */
    public function renders_successfully()
    {
        Livewire::test(PointTitle::class)
            ->assertStatus(200);
    }
}
