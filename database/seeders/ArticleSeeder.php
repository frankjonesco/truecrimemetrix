<?php

namespace Database\Seeders;

use App\Models\Article;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $articles = [
            [
                'hex' => 'ItBAU4xzpr1',
                'user_id' => 1,
                'title' => 'The Criminal Blunders of Luis Rivera & Sigfredo Garcia',
                'caption' => 'A brief summary of the jaw-drop stupidity of the numbskulls that murdered revered FSU Law Professor Dan Markel.',
                'body' => '<p class="first">
                As Luis Rivera stood in the dock, waiting for proceeding to begin, he didn’t have any trouble eyeballing his co-conspirators to whom he was the State’s star witness against. When he was brought out in irons and clamped to a desk, it was his first time seeing Sigfredo or Katie since before he struck a plea deal with the State which would mandate his truthful testimony regarding the plot behind the murder of Professor Dan Markel.
            </p>

            <p>
                The silent tension grew in the room, seeming to take on a physical mass, where air no longer seemed weightless. The hostile oders of polished mahogany and freshly disinfected floor tile, combined with the conditioned Florida air made the courtroom seem like a gas chamber thise defendents having their lives tried by 12 perfect strangers. It was the same ungodly vibe the would silence a flock of songbirds, had there been any in court.
            </p>

            <p>
                When the Jury was boxed, the gallery was benched, lead prosecutor Georgia Cappleman stood assembled and tuned as Rivera faced the clerk to be sworn.
            </p>

            <p>
                With such tensity piping into the room, the mood would have hardly given credence to the fact that by the end of the State’s direct examination of this witness, a comedic saga of criminal blunders will have been painted in technicolor. Had the picture been black & white it would have befit any of the many ‘boo-boo faux pas debacles’ of Stan Laurel & Oliver Hardy.
            </p>

            <p>
                Although we now know this was a difficult case for law enforcement to even make any arrests for the first three years, when it was finally brought to be examined in court, it is hard to imagine a criminal duo making any more critical errors and absent-minded, brain-fart gaffes than Luis ‘Taco’ Rivera & Sigfredo ’Tuto’ Garcia.
            </p>

            <h2>A little background</h2>

            <p>
                Rivera had been the “Inca” or “First Crown” of the North Miami faction of the nationwide motorcycle club, the Latin Kings. A position he had apparently held since he was 15 years old, which is a fact that makes the gang bare more semblance to a Boy Scout troop than the ruthless bike tribe of a organised crime syndicate.
            </p>

            <p>
                The irony in the logic of a trial by jury is that, although it maybe the best we have mastered the blind eyes of justice, but the overall impression created of the individual under examination is, almost by default, skewed and stretched by both the prosecution and defence to the point the final depiction of a persons history, attitude and world view
            </p>

            <div class="article-image border-t border-t-gray-200 pt-10">
                <img src="{{asset(\'images/articles/2/sigfredo-garcia.jpg\')}}" class="px-6 mx-auto">
                <x-article-image-meta caption="Sigfredo Garcia is claimed to be the triggerman in the 2014 slaying of Prof. Markel. He was sentenced to life without parole in 2019." copyright="Broward Sheriff’s Office" link="" />
            </div>',
                'main_image' => 'luis-rivera.jpg',
                'views' => 388,
                'shares' => 103,
                'status' => 'public'

            ]
        ];


        foreach($articles as $article){
            Article::create($article);
        }
    }
}
