<?php

namespace Database\Seeders;

use App\Models\About;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AboutSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        About::create([
            'email' => 'info@novnat.co.uk',
            'partnering_email' => 'abdulbari@novnat.co.uk',
            'bio'=>'We are committed to creating a world where water is accessible to all.',
            'address' => 'Birmingham Research Park, Vincent Drive, Birmingham B15 2SQ United Kingdom',
            'linkedin_url' => 'https://www.linkedin.com/company/novnattech/posts/?feedView=all'
        ]);
    }
}
