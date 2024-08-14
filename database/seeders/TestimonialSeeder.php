<?php
namespace Database\Seeders;
use App\Models\Testimonial;
use Illuminate\Database\Seeder;


class TestimonialSeeder extends Seeder
{
    public function run()
    {
        Testimonial::create([
            'author' => 'John Doe',
            'content' => 'The team at this firm is exceptional. They helped me save a significant amount on my taxes and provided excellent financial advice.',
            'author_image' => 'john_doe.jpg', // Assuming you have an image
        ]);

        Testimonial::create([
            'author' => 'Jane Smith',
            'content' => 'Their bookkeeping services are top-notch. I can now focus on growing my business without worrying about my financial records.',
            'author_image' => 'jane_smith.jpg',
        ]);

        Testimonial::create([
            'author' => 'Michael Johnson',
            'content' => 'Highly recommend this firm for anyone seeking reliable and professional accounting services. They truly care about their clients.',
            'author_image' => 'michael_johnson.jpg',
        ]);
    }
}
