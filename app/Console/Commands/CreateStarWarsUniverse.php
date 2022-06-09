<?php

namespace App\Console\Commands;

use App\Models\Person;
use App\Models\Planet;
use App\Models\Specie;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class CreateStarWarsUniverse extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'universe:create';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Initialize the database with data from the swapi api. Run this only once...please :)';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->insertAllPlanets();
        $this->insertAllPeople();
        $this->insertAllSpecies();

        $this->info('We have created the StarWars universe 🌟');

        return 0;
    }

    public function insertAllPeople()
    {
        $this->info('Getting all people  👥');
        $allPeople = $this->getAllEntitiesByCategory('people');

        foreach ($allPeople as $key => $person) {
            Person::create([
                'id' => $this->getEntityIdByUrl($person->url),
                'name' => $person->name,
                'height' => $person->height,
                'hair_color' => $person->hair_color,
                'mass' => $person->mass,
                'birth_year' => $person->birth_year,
                'gender' => $person->gender,
                'planet_id' => $this->getEntityIdByUrl($person->homeworld)
            ]);
        }

        $this->info('Retrieved all people 👥');
    }

    public function insertAllPlanets()
    {
        $this->info('Getting all planets 🪐');
        $allPlanets = $this->getAllEntitiesByCategory('planets');

        foreach ($allPlanets as $key => $planet) {
            $id = $this->getEntityIdByUrl($planet->url);
            Planet::create([
                'id' => $id,
                'name' => $planet->name,
                'rotation_period' => $planet->rotation_period,
                'orbital_period' => $planet->orbital_period,
                'diameter' => $planet->diameter,
                'climate' => $planet->climate,
                'gravity' => $planet->gravity,
                'terrain' => $planet->terrain,
                'population' => $planet->population,
                'surface_water' => $planet->surface_water,
            ]);
        }

        $this->info('Retrieved all planets');
    }

    public function connectSpecieWithPerson($specie) {
        foreach ($specie->people as $person) {
            $person = Person::findOr($this->getEntityIdByUrl($person), function () {
               $this->info('Count not locate entity :(');
            });

            $person->specie_id = $this->getEntityIdByUrl($specie->url);
            $person->save();
        }
    }

    public function insertAllSpecies()
    {
        $this->info('Getting all species 👽');
        $allSpecies = $this->getAllEntitiesByCategory('species');

        foreach ($allSpecies as $key => $specie) {
            Specie::create([
                'id' => $this->getEntityIdByUrl($specie->url),
                'name' => $specie->name,
                'classification' => $specie->classification,
                'designation' => $specie->designation,
                'average_height' => $specie->average_height,
                'skin_colors' => $specie->skin_colors,
                'hair_colors' => $specie->hair_colors,
                'eye_colors' => $specie->eye_colors,
                'average_lifespan' => $specie->average_lifespan,
                'language' => $specie->language,
                'planet_id' => isset($specie->homeworld) ? $this->getEntityIdByUrl($specie->homeworld) : null
            ]);

            $this->connectSpecieWithPerson($specie);
        }

        $this->info('Retrieved all species 👽');
    }

    public function getTotalPagesByCategory($category)
    {
        $pageResponse = Http::get("https://swapi.dev/api/{$category}/")->object();
        return ceil($pageResponse->count / count($pageResponse->results));
    }

    public function getEntitiesByCategory($category, $pageNumber)
    {
        $entityResponse = Http::get("https://swapi.dev/api/{$category}/?page={$pageNumber}")->object();
        return (isset($entityResponse->results)) ? $entityResponse->results : null;
    }

    public function getAllEntitiesByCategory($category)
    {
        $allEntities = [];
        $totalPages = $this->getTotalPagesByCategory($category);

        for ($i = 0; $i < $totalPages; $i++) {
            $entityResponse = $this->getEntitiesByCategory($category, $i);
            $this->info("Retrieving {$category} page {$i} of {$totalPages}");
            if (isset($entityResponse)) {
                $allEntities = [...$allEntities, ...$entityResponse];
            }
        }

        return $allEntities;
    }

    public function getEntityIdByUrl($url)
    {
        $parsed_url = parse_url($url, PHP_URL_PATH);
        preg_match_all('/\d+/', $parsed_url, $matches);
        return $matches[0][0];
    }
}
