# Swapi assignment

## Demo video
https://hiz.stackstorage.com/s/WbfjT8sTnBdPn0hD

# Getting started

For this guide I assume you have docker installed and using Laravel Sail.
If not replace `sail` with `php` and use laravel valet.

1. Clone the repo
2. [Install dependencies](https://laravel.com/docs/9.x/sail#installing-composer-dependencies-for-existing-projects)
3. run `sail up`
4. run `sail artisan migrate:fresh`
5. (optional) run this if you aren't running this for the first time `sail cache:clear`
6. run `sail artisan universe:create`

And you are ready to go.

# Api endpoints
- `/api/people`
- `/api/people/{id}`
- `/api/species`
- `/api/species/{id}`
- `/api/planets}`
- `/api/planets/{id}}`


# Webpages (using Laravel Sail & Docker):

- `http://vfz-swapi.localhost` : Homepage
- `http://vfz-swapi.localhost/people` : people overview
- `http://vfz-swapi.localhost/people/{1}` : people detail
- `http://vfz-swapi.localhost/planets` : planets overview
- `http://vfz-swapi.localhost/species` : species overview
