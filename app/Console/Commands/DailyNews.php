<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use App\Models\Article;

class DailyNews extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'news:daily';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command pulls news from an api every 6 hours';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $response = Http::get('https://newsapi.org/v2/top-headlines', [
            'country' => 'us',
            'apiKey' => '7ba76cf954de42d994b48b63f8704c99',
           ]);

       
            // if its not successful throw an exception
           if(!$response->successful()){
               $response->throw();
           }


           $articles = $response->json()['articles'];
           foreach ($articles as $article) {
           // dd($article['source']['name']);
            Article::firstOrCreate([
                   "source"  => $article['source']['name'], 
                   "author"  => $article['author'], 
                    "title"  => $article['title'],
                    "description"  => $article['description'],
                    "url"  => $article['url'],
                    "image"  => $article['urlToImage'],
                    "publishedAt"  => date('Y-m-d H:i:s', strtotime($article['publishedAt'])),
                    "content"  => $article['content'],
             ]);
            }

       // return Command::SUCCESS;

    }
}