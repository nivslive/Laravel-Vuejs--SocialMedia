<?php

namespace Tests\Feature;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\{Theme, Message, Reaction, Subject, User};
use Modules\Social\Reaction\Database\Factories\{ReactionFactory, ReactionTypeFactory};
use Database\Seeders\DatabaseSeeder;
class ThemeTest extends TestCase
{

    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */

    public function test_should_be_get_topall_dashboard()
    {
        $response = $this->get('/topof/all');
        $response->assertStatus(200);
    }

    public function test_should_be_able_to_create_theme() {
        // migration
        // $table->string('slug')->nullable();
        // $table->string('title');
        // $table->string('description');
        // $table->string('image_url')->nullable();
        // $table->integer('subjects_all_messages_count');
        $themeCreated = Theme::create([
                'title' => 'testing...',
                'description' => 'testando.',
                'subjects_all_messages_count' => '0', 
        ]);
        $this->assertTrue($themeCreated->title === 'testing...');
        $this->assertTrue($themeCreated->description === 'testando.');
        
        $delete = Theme::find($themeCreated->id);
        $delete->delete();
    }


    public function test_should_be_able_enter_to_page_about_theme_after_created() {
        // migration
        // $table->string('slug')->nullable();
        // $table->string('title');
        // $table->string('description');
        // $table->string('image_url')->nullable();
        // $table->integer('subjects_all_messages_count');
        $themeCreated = Theme::create([
            'title' => 'testing',
            'slug' => 'testing',
            'description' => 'testando.',
            'subjects_all_messages_count' => '0', 
        ]);

        $response = $this->get('/theme/' . $themeCreated->slug);
        $response->assertStatus(200);

        $delete = Theme::find($themeCreated->id);
        $delete->delete();
    
    }

}
