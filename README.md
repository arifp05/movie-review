<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

# ResyncMovies 🎬

At Resync Digital, we love lots of things. Great design, great coffee, great code, and when it comes time to unwind… great movies.

We want to share our enthusiasm for movies with our customers, and have decided to write a program to read in movie reviews that our employees have written, and then compose "tweets" that we can share through our company account.

## Files

Files that will be used in this application consist of:

- `reviews.json` — captured via an online survey tool, this file has the list of all new employee reviews we have yet to tweet about.
- `movies.json` — this file contains a list of the movies we've watched, and information about that movie.

and the output of the application will be generated as one of this file:

- `tests.json` — this file contains a list of expected output "tweets", see the **Testing** section below for more details.

## Installation

After pull or download this code, there are some processes that need to do:

- Make sure the active directory in this project, if it's not, you can follow this instruction:


``` 
cd <path_for_this_project>
```

- If you clone from git, you can run this commands

```
composer install
php artisan key:generate
```

- Run the application with this command, and the default port will be 8000

```
php artisan serve
```

### Run The Assignment

After finish the project installation, you can run this code for check the assignment result. 

```
php artisan resync:movie reviews.json movies.json
```
All prerequisites files has been written on `storage/data/` directory.

## Output

Output of this project consist for JSON inside the `tests.json` file, and of course it can be accessed by application's URL. After run the assignments above, this application will give the json output and instruction if there is need to open in the browser.


## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
