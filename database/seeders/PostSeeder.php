<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use App\Models\Tag; // Tambahkan Import Model Tag
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class PostSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        // 1. Pastikan ada user
        $user = User::first() ?? User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@travesta.id',
            'password' => bcrypt('password'),
        ]);

        if (Tag::count() == 0) {
            $this->call(TagSeeder::class);
        }

        $allTags = Tag::all();

        $posts = [
            [
                'title' => 'Menikmati Keindahan Pantai Kuta di Bali',
                'content' => '<p>Pantai Kuta merupakan salah satu destinasi wisata paling terkenal di Bali. Pasir putih, ombak yang indah, serta suasana matahari terbenam menjadi daya tarik utama bagi wisatawan lokal maupun mancanegara.</p>',
                'category' => 'pantai',
            ],
            [
                'title' => 'Pendakian Seru ke Gunung Bromo',
                'content' => '<p>Gunung Bromo menawarkan pengalaman mendaki dengan pemandangan sunrise terbaik di Indonesia. Keindahan alamnya membuat Bromo menjadi destinasi wajib bagi para pecinta alam.</p>',
                'category' => 'pegunungan',
            ],
            [
                'title' => 'Wisata Kuliner Malam di Yogyakarta',
                'content' => '<p>Yogyakarta terkenal dengan gudeg, sate klathak, dan bakpia. Suasana malam di Malioboro selalu ramai oleh wisatawan yang berburu kuliner khas Jawa.</p>',
                'category' => 'kuliner',
            ],
            [
                'title' => 'Menyusuri Jejak Sejarah di Kota Tua Jakarta',
                'content' => '<p>Kota Tua Jakarta menyimpan banyak bangunan bersejarah peninggalan kolonial Belanda. Area ini menjadi tempat favorit untuk wisata budaya dan fotografi.</p>',
                'category' => 'sejarah',
            ],
            [
                'title' => 'Menjelajahi Keindahan Modern Kota Surabaya',
                'content' => '<p>Surabaya, kota terbesar kedua di Indonesia, memiliki beragam destinasi menarik mulai dari Taman Bungkul, Jembatan Suramadu, hingga wisata kuliner malam yang menggoda.</p>',
                'category' => 'kota',
            ],
            [
                'title' => 'Menikmati Keindahan Air Terjun Madakaripura',
                'content' => '<p>Air Terjun Madakaripura di Probolinggo merupakan salah satu air terjun tertinggi di Indonesia dengan keindahan alam yang menakjubkan.</p>',
                'category' => 'air-terjun',
            ],
            [
                'title' => 'Liburan Eksotis di Pulau Komodo',
                'content' => '<p>Pulau Komodo terkenal dengan satwa langka komodo serta keindahan pantainya yang menawan seperti Pink Beach dan Padar Island.</p>',
                'category' => 'pulau',
            ],
            [
                'title' => 'Menjelajahi Desa Wisata Penglipuran Bali',
                'content' => '<p>Desa Penglipuran di Bali terkenal karena kebersihannya dan budaya lokal yang masih terjaga dengan baik.</p>',
                'category' => 'desa-wisata',
            ],
            [
                'title' => 'Wisata Religi ke Masjid Agung Demak',
                'content' => '<p>Masjid Agung Demak adalah salah satu masjid tertua di Indonesia yang memiliki nilai sejarah tinggi dalam penyebaran Islam di Jawa.</p>',
                'category' => 'religi',
            ],
            [
                'title' => 'Petualangan Seru di Sungai Elo Magelang',
                'content' => '<p>Rafting di Sungai Elo memberikan pengalaman seru dengan pemandangan alam yang hijau dan udara segar khas pedesaan.</p>',
                'category' => 'petualangan',
            ],
            [
                'title' => 'Wisata Edukasi di Museum Geologi Bandung',
                'content' => '<p>Museum Geologi Bandung menyajikan koleksi batuan, fosil, dan sejarah geologi Indonesia secara menarik dan interaktif.</p>',
                'category' => 'edukasi',
            ],
            [
                'title' => 'Menjelajahi Hutan Mangrove Surabaya',
                'content' => '<p>Hutan Mangrove Wonorejo menjadi tempat wisata edukatif dan alami untuk menikmati keindahan ekosistem pesisir.</p>',
                'category' => 'hutan',
            ],
            [
                'title' => 'Petualangan Alam di Taman Nasional Komodo',
                'content' => '<p>Taman Nasional Komodo adalah rumah bagi komodo, hewan purba yang hanya hidup di Indonesia.</p>',
                'category' => 'taman-nasional',
            ],
            [
                'title' => 'Menikmati Festival Budaya Dieng Culture Festival',
                'content' => '<p>Festival Dieng adalah perayaan budaya khas masyarakat Dieng dengan acara pemotongan rambut gimbal yang unik.</p>',
                'category' => 'festival',
            ],
            [
                'title' => 'Menelusuri Keindahan Candi Borobudur',
                'content' => '<p>Candi Borobudur merupakan warisan dunia UNESCO yang menjadi simbol keagungan budaya dan arsitektur Buddha di Indonesia.</p>',
                'category' => 'candi',
            ],
            [
                'title' => 'Eksplorasi Pantai Tanjung Bira di Sulawesi Selatan',
                'content' => '<p>Pantai Tanjung Bira memiliki pasir putih yang halus dan air laut yang jernih, cocok untuk snorkeling dan diving.</p>',
                'category' => 'pantai',
            ],
            [
                'title' => 'Pendakian Gunung Rinjani di Lombok',
                'content' => '<p>Gunung Rinjani menawarkan danau kawah Segara Anak yang mempesona di ketinggian 3.726 meter di atas permukaan laut.</p>',
                'category' => 'pegunungan',
            ],
            [
                'title' => 'Kuliner Laut di Kota Makassar',
                'content' => '<p>Makassar terkenal dengan coto, pallubasa, dan seafood segar di pinggir Pantai Losari.</p>',
                'category' => 'kuliner',
            ],
            [
                'title' => 'Wisata Sejarah di Candi Prambanan',
                'content' => '<p>Candi Prambanan merupakan kompleks candi Hindu terbesar di Indonesia dengan arsitektur yang menakjubkan.</p>',
                'category' => 'candi',
            ],
            [
                'title' => 'Petualangan di Goa Jomblang Gunungkidul',
                'content' => '<p>Goa Jomblang menawarkan pengalaman caving menantang dengan cahaya surga (heaven light) yang spektakuler.</p>',
                'category' => 'petualangan',
            ],
            [
                'title' => 'Menikmati Pesona Alam di Desa Wisata Nglanggeran',
                'content' => '<p>Desa Nglanggeran terkenal dengan Gunung Api Purba dan kegiatan edukatif masyarakat lokal.</p>',
                'category' => 'desa-wisata',
            ],
            [
                'title' => 'Menjelajahi Pulau Derawan di Kalimantan Timur',
                'content' => '<p>Pulau Derawan terkenal dengan keindahan bawah lautnya yang cocok untuk snorkeling dan diving.</p>',
                'category' => 'pulau',
            ],
            [
                'title' => 'Menikmati Hutan Pinus Mangunan Bantul',
                'content' => '<p>Hutan Pinus Mangunan menjadi tempat favorit wisatawan untuk bersantai dan berfoto di tengah suasana asri.</p>',
                'category' => 'hutan',
            ],
            [
                'title' => 'Menyaksikan Festival Danau Toba',
                'content' => '<p>Festival Danau Toba menampilkan atraksi budaya Batak, lomba perahu, dan musik tradisional di tepi danau terbesar di Indonesia.</p>',
                'category' => 'festival',
            ],
            [
                'title' => 'Wisata Edukatif di Taman Pintar Yogyakarta',
                'content' => '<p>Taman Pintar merupakan destinasi wisata edukatif yang menarik bagi anak-anak dan keluarga.</p>',
                'category' => 'edukasi',
            ],
        ];

        foreach ($posts as $data) {
            // Ambil kategori berdasarkan slug
            $category = Category::where('slug', $data['category'])->first();

            // Simpan Post
            $post = Post::create([
                'title' => $data['title'],
                'slug' => Str::slug($data['title']),
                'content' => $data['content'],
                'status' => 'published',
                'user_id' => $user->id,
                'category_id' => $category ? $category->id : null,
                'published_at' => now()->subDays(rand(1, 30)), // Random tanggal 1 bulan terakhir
            ]);

            if ($allTags->count() > 0) {
                $randomTags = $allTags->random(rand(2, 4))->pluck('id');
                $post->tags()->attach($randomTags);
            }
        }
    }
}