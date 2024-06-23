<?php

namespace Database\Seeders;

use App\Models\Document;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DocumentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('documents')->truncate();

        for ($i = 1; $i <= 10; $i++) {
            Document::create([
                'user_id' => 1,
                'file_name' => 'example' . $i . '.docx',
                'file_path' => 'documents/example' . $i . '.docx',
                'file_size' => rand(10000, 50000),
                'file_extension' => 'docx',
                'description' => 'Test document ' . $i,
                'status' => 'active',
            ]);
        }
    }
}
