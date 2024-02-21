<?php

namespace Tests\Feature\Livewire\Admin\Marketing;

use App\Livewire\Admin\Marketing\PageEmails;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class PageEmailsTest extends TestCase
{
    /** @test */
    public function renders_successfully()
    {
        Livewire::test(PageEmails::class)
            ->assertStatus(200);
    }
}
