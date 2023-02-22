<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BookCategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $books = DB::table('book')->get();
        $categories = DB::table('categories')->get();

        foreach ($books as $book) {
            // seleccionar entre 1 y 3 categorías aleatorias
            $randomCategories = $categories->random(rand(1, 3));

            // asignar las categorías al libro
            foreach ($randomCategories as $category) {
                DB::table('book_category')->insert([
                    'book_id' => $book->id,
                    'category_id' => $category->id,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s')
                ]);
            }
        }
    }
} 
