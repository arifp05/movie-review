<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Helpers\Helpers;
use File;

class ResyncMovies extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'resync:movie {reviewJson} {moviesJson}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Movie review and its rating on this command, just run and load 2 json files as argument';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $reviews = json_decode(file_get_contents(storage_path() . "/data/" . $this->argument('reviewJson')));
        $movies = json_decode(file_get_contents(storage_path() . "/data/" . $this->argument('moviesJson')));

        $movieReview = [];
        $movieInfo = [];
        foreach($reviews as $key => $review) {
            $movieReview[] = [
                "title" => $review->title,
                "review" => $review->review,
                "score" => $review->score
            ];
        }

        foreach($movies as $key => $movie) {
            $movieInfo[] = [
                "title" => $movie->title,
                "year" => $movie->year
            ];
        }

        $encode = Helpers::encode($movieInfo, $movieReview);

        $path = public_path() . '/download/';

        if(!File::exists($path)) {
            File::makeDirectory($path);
        }
        
        $outputFile = "tests.json";
        file_put_contents($path . $outputFile, json_encode($encode, JSON_PRETTY_PRINT));

        $information = "You can download the extracted tweet on " . $_SERVER['APP_URL'] . ":8000/download/" . $outputFile . "\n";
        $information .= "Eitherwise, host and port depend on your server configuration, and please make sure you've run the server."; 

        $this->info(json_encode($encode, JSON_PRETTY_PRINT));
        $this->info($information);
    }
}
