<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EbookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ebooks')->insert([
            [
                'ebook_id' => 1,
                'title' => 'Nineteen Eighty-Four',
                'author' => 'George Orwell',
                'description' => 'Nineteen Eighty-Four is a dystopian social science fiction novel and cautionary tale written by English writer George Orwell. It was published on 8 June 1949 by Secker & Warburg as Orwells ninth and final book completed in his lifetime.',
            ],
            [
                'ebook_id' => 2,
                'title' => 'One Hundred Years of Solitude',
                'author' => 'Gabriel García Márquez',
                'description' => 'One Hundred Years of Solitude is a 1967 novel by Colombian author Gabriel García Márquez that tells the multi-generational story of the Buendía family, whose patriarch, José Arcadio Buendía, founded the town of Macondo. The novel is often cited as one of the supreme achievements in literature.',
            ],
            [
                'ebook_id' => 3,
                'title' => 'A Brief History of Time',
                'author' => 'Stephen Hawking',
                'description' => 'A Brief History of Time: From the Big Bang to Black Holes is a book on theoretical cosmology by English physicist Stephen Hawking. It was first published in 1988. Hawking wrote the book for readers who had no prior knowledge of physics and people who are interested in learning something new about interesting subjects.',
            ],
            [
                'ebook_id' => 4,
                'title' => 'The Immortal Life of Henrietta Lacks',
                'author' => 'Rebecca Skloot',
                'description' => 'The Immortal Life of Henrietta Lacks is a non-fiction book by American author Rebecca Skloot. It was the 2011 winner of the National Academies Communication Award for best creative work that helps the public understanding of topics in science, engineering or medicine.',
            ],
            [
                'ebook_id' => 5,
                'title' => 'Silent Spring',
                'author' => 'Rachel Carson',
                'description' => 'Silent Spring is an environmental science book by Rachel Carson. The book was published on September 27, 1962, documenting the adverse environmental effects caused by the indiscriminate use of pesticides',
            ],
            [
                'ebook_id' => 6,
                'title' => 'Clean Code',
                'author' => 'Robert Cecil Martin',
                'description' => 'Even bad code can function. But if code isnt clean, it can bring a development organization to its knees. Every year, countless hours and significant resources are lost because of poorly written code.',
            ],
            [
                'ebook_id' => 7,
                'title' => 'The C Programming Language. 2nd Edition',
                'author' => 'Brian Kernighan and Dennis Ritchie',
                'description' => 'The C Programming Language is a computer programming book written by Brian Kernighan and Dennis Ritchie, the latter of whom originally designed and implemented the language, as well as co-designed the Unix operating system with which development of the language was closely intertwined.',
            ],
            [
                'ebook_id' => 8,
                'title' => 'Introduction to Algorithms',
                'author' => 'Thomas H. Cormen, Charles E. Leiserson, Ronald Rivest, Clifford Stein',
                'description' => 'Introduction to Algorithms is a book on computer programming by Thomas H. Cormen, Charles E. Leiserson, Ronald L. Rivest, and Clifford Stein.',
            ],
            [
                'ebook_id' => 9,
                'title' => 'Genghis Khan and the Making of the Modern World',
                'author' => 'Jack Weatherford',
                'description' => 'Genghis Khan and the Making of the Modern World is a history book written by Jack Weatherford, Dewitt Wallace Professor of Anthropology at Macalester College. It is a narrative of the rise and influence of Genghis Khan and his successors, and their influence on European civilization.',
            ],
            [
                'ebook_id' => 10,
                'title' => 'The Guns of August',
                'author' => 'Barbara W. Tuchman',
                'description' => 'The Guns of August is a volume of history by Barbara W. Tuchman. It is centered on the first month of World War I. After introductory chapters, Tuchman describes in great detail the opening events of the conflict. Its focus then becomes a military history of the contestants, chiefly the great powers.',
            ]
        ]);
    }
}
