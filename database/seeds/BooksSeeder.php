<?php

use App\Book;
use App\Category;
use Illuminate\Database\Seeder;

class BooksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Sample categories
		$category1 = Category::create(['name'=>'Comic/Manga']);
		$category2 = Category::create(['name'=>'Informatics']);
		$category3 = Category::create(['name'=>'Fashion']);

		// Sample books
		$book1 = Book::create([
			'category_id'=>$category1->id,
			'title'=>'One Piece', 
			'desc'=>'One Piece (Japanese: ワンピース Hepburn: Wan Pīsu) is a Japanese manga series written and illustrated by Eiichiro Oda. It has been serialized in Shueishas Weekly Shōnen Jump magazine since July 19, 1997, with the chapters collected into eighty-two tankōbon volumes to date. One Piece follows the adventures of Monkey D. Luffy, a young man whose body gained the properties of rubber after unintentionally eating a Devil Fruit. With his diverse crew of pirates, named the Straw Hat Pirates, Luffy explores the Grand Line in search of the world\'s ultimate treasure known as "One Piece" in order to become the next King of the Pirates.',
			'author'=>'Eiichiro Oda',
			'publisher'=>'Shueisha', 
			'price'=>25000,
		]);
		$book2 = Book::create([
			'category_id'=>$category2->id,
			'title'=>'Mastering JavaScript High Performance', 
			'desc'=>'Studying JavaScript performance in depth will make you capable of tackling the complex and important tasks required to solve performance issues. In this book, you\'ll learn when and why to use an IDE over a common text editor. Packed with examples, you\'ll also learn how to create a build system to test and deploy your JavaScript project by optimizing the code. Next, you will move on to learn about DOM optimization, JavaScript promises, and web workers to better break up your large codebase. You will also learn about JavaScript performance on mobile platforms such as iOS and Android and how to deploy your JavaScript project to a device. Finally, by the end of the book, you\'ll be able to pinpoint JavaScript performance problems using appropriate tools, provide optimization techniques, and provide tools to develop fast applications with JavaScript.',
			'author'=>'Chad R. Adams',
			'publisher'=>'Packt Publishing', 
			'price'=>375000,
		]);
		$book3 = Book::create([
			'category_id'=>$category1->id,
			'title'=>'Shokugeki No Soma', 
			'desc'=>'Food Wars!: Shokugeki no Soma (Japanese: 食戟のソーマ Hepburn: Shokugeki no Sōma, lit. "Sōma of the Shokugeki") is a Japanese shōnen manga series written by Yūto Tsukuda and illustrated by Shun Saeki. Yuki Morisaki also works as a collaborator, providing the recipes for the series. Individual chapters have been serialized in Weekly Shōnen Jump since November 26, 2012, with tankōbon volumes being released by Shueisha. As of November 2016, 21 volumes have been released in Japan. The series is licensed by Viz Media, who has been releasing the volumes digitally since March 18, 2014, and released the first volume in print on August 5, 2014. An anime adaptation by J.C.Staff aired between April 3, 2015 and September 25, 2015. A second season aired between July 2, 2016 and September 24, 2016.',
			'author'=>'Yūto Tsukuda, Illustration: Shun Saeki',
			'publisher'=>'Shueisha', 
			'price'=>25000,
		]);
		$book4 = Book::create([
			'category_id'=>$category3->id,
			'title'=>'The Truth About Style', 
			'desc'=>'The New York Times bestselling style guide from the cohost of What Not to Wear</br>It’s clear why Women’s Wear Daily hails Stacy London as “the Dr. Phil of fashion.” Since 2002, she’s transformed hundreds of guests on TLC’s hit show What Not to Wear. But London has more than just impeccable taste. She has a gift for seeing the core emotional issues behind a disastrous wardrobe. By sharing her own struggle with self-esteem, London illustrates how style develops con­fidence. Including invaluable fashion tips, advice, and a revelatory makeover section, ­The Truth About Style is for London’s legion of fans—and everyone who longs to enhance and celebrate the body she has.',
			'author'=>'Stacy London',
			'publisher'=>'Penguin Books', 
			'price'=>170000,
		]);
		$book5 = Book::create([
			'category_id'=>$category1->id,
			'title'=>'Hayate No Gotoku', 
			'desc'=>'Hayate the Combat Butler (Japanese: ハヤテのごとく! Hepburn: Hayate no Gotoku!) is a Japanese manga series, written and illustrated by Kenjiro Hata, about a boy who starts a new job as a butler and the events he experiences with his employer. Shogakukan have released 49 volumes in Japan. The English edition of the series has been licensed by Viz Media for distribution in North America. The style of the manga has a comedic gag with a slight harem feel and constantly breaks the fourth wall. The series includes numerous references to other anime, manga, video games, and popular culture.</br>A 52-episode anime adaptation of the manga by SynergySP aired between April 2007 and March 2008 on TV Tokyo. A second, 25-episode anime season by J.C.Staff aired between April and September 2009. Bandai Entertainment licensed the first anime series in 2008, but the series went out of print in 2012. An anime film adaption produced by Manglobe was released in August 2011. A third, 12-episode anime television series by Manglobe, based mostly on an original story not seen in the manga aired between October and December 2012. A fourth anime season aired between April and July 2013. Sentai Filmworks has licensed all four seasons of the anime.',
			'author'=>'Kenjiro Hata',
			'publisher'=>'Shogakukan', 
			'price'=>25000,
		]);
    }
}
