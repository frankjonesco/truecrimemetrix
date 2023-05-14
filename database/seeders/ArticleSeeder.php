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
        $model = new Article();
        
        $items = [
            [
                'hex' => '8qChAGMJOUr',
                'user_id' => 1,
                'criminal_case_id' => 1,
                'topic_id' => 1,
                'title' => 'The Criminal Blunders of Luis Rivera & Sigfredo Garcia',
                'caption' => 'A brief summary of the jaw-drop stupidity of the knuckleheads that murdered revered FSU Law Professor Dan Markel.',
                'body' => '<p>As Luis Rivera stood in the dock waiting for proceedings to begin, he didn’t have much trouble eyeballing his co-conspirators to whom against he was the State’s star witness. Brought out in irons and shackled to a desk, it was his first time seeing Sigfredo or Katie since before he struck his plea deal with the State. A plea deal that later mandated his truthful testimony to the plot to murder Professor Dan Markel.</p><p>The silent tension grew in the room, seeming to take its on physical mass, the air no longer seemed weightless. The added gravity of the heavy air had a dampening effect on any sound that dared be evoked.</p><p>It was the same ungodly vibe the would silence a flock of songbirds, if there were any in court.</p><p>The hostile odours of polished mahogany and freshly disinfected floor tile combined with the recycled Florida air to make the courtroom seem like a gas chamber to the two defendants having their lives tried by 12 strangers today.</p><p>When the Jury was boxed, the gallery benched, lead prosecutor Georgia Cappleman stood assembled and tuned as Rivera faced the clerk to be sworn.</p><p>With such tensity piping into the room, the mood would have hardly given credence to the fact that by the end of the State’s direct examination of this witness, a comedic saga of criminal blunders will have been painted in technicolor. Had the picture been black &amp; white it would have befit any of the many ‘boo-boo faux pas debacles’ of Stan Laurel &amp; Oliver Hardy.</p><p>Although we now know this was a difficult case for law enforcement to even make any arrests for the first three years, when it was finally brought to be examined in court, it is hard to imagine a criminal duo making any more critical errors and absent-minded, brain-fart gaffes than Luis ‘Taco’ Rivera &amp; Sigfredo ’Tuto’ Garcia.</p><h2><strong>A little background</strong></h2><p>Rivera had been the “Inca” or “First Crown” of the North Miami faction of the nationwide motorcycle club, the Latin Kings. A position he had apparently held since he was 15 years old, which is a fact that makes the gang bare more semblance to a Boy Scout troop than the ruthless bike tribe of a organised crime syndicate.</p><p>The irony in the logic of a trial by jury is that, although it maybe the best we have mastered the blind eyes of justice, but the overall impression created of the individual under examination is, almost by default, skewed and stretched by both the prosecution and defence to the point the final depiction of a persons history, attitude and world view</p>',
                'image' => '6c3806-1684100113.webp',
                'image_caption' => 'Rivera pleaded guilty to second degree murder of Dan Markel. He is testifying against Sigfredo Garcia and Katherine Magbanua.',
                'image_copyright' => 'Tallahassee Democrat',
                'created_at' => '2023-05-14 21:34:24',
                'updated_at' => '2023-05-14 22:23:24',
                'status' => 'public'
    
            ]
        ];
    
    
        foreach($items as $item){
            $model::create($item);
        }
    }
}
