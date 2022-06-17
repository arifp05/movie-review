<?php

namespace App\Helpers;

class Helpers {

    /**
     * Function for generating star and half rating.
     *
     * @param integer
     * @return string (Example: **** or ***1/2)
     */

    public static function rating($score)
    {
        $score = $score/20;
        $rate = round($score);
        $rating = str_repeat("*", $rate);

        $accumulated = $score - intval($score);

        if($accumulated > 0 && $accumulated <= 0.5) {
            $rating = str_repeat("*", floor($score));
            $rating .= "½";
        }

        return $rating; 
    }

    /**
     * Function for encoding the data from its resource.
     *
     * @param array -> Movie Information for the first param
     * @param array -> Review Information for the second param
     * @return array An encoded array with specific format
     */

    public static function encode($info, $review)
    {
        $data = "";
        $plus = 0;

        for ($inc = 0; $inc < count($review); $inc++) {
            if($review[$inc]['title'] == $info[$plus]['title']){
                $tweet[] = self::stack($review[$inc]['title'], $info[$plus]['year'], $review[$inc]['review'], self::rating($review[$inc]['score']));
                $plus++;
            } else {
                $tweet[] = self::stack($review[$inc]['title'], "", $review[$inc]['review'], self::rating($review[$inc]['score']));
                continue;
            }
        }

        return $tweet;
    }

    /**
     * Function for stacking the array, based on tweets result.
     *
     * @param string -> "title" for movie title
     * @param string -> "year" for movie year
     * @param string -> "review" for movie review
     * @param string -> "rating" for movie rating (Example: **** or ***1/2)
     * @return string An encoded string with specific format
     */

    public static function stack($title, $year = "", $review = "", $rating)
    {
        if($year != ""){
            $year = " (" . $year .")";
        }
        $tweet = $title . $year . ": " . $review . " " . $rating;
        if(strlen($tweet) > 140) {
            $tweet = $title . $year . ": " . $review;
            $tweet = substr($tweet,0,140-strlen(" " . $rating));
            $tweet = $tweet . " " . $rating;
        }

        return $tweet;
    }
}