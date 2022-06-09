<?php

namespace App\Console\Commands;

use App\Models\Person;
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
        $this->insertAllPeople();

        $this->info('We have created the StarWars universe 🌟');

        return 0;
    }

    public function insertAllPeople()
    {
        $this->info('Getting all people');
        $allPeople = $this->getAllEntitiesByCategory('people');
        foreach ($allPeople as $key => $person) {
            $newPerson = Person::create([
                'id' => ($key + 1),
                'name' => $person->name,
                'height' => $person->height,
                'hair_color' => $person->hair_color,
                'mass' => $person->mass,
                'birth_year' => $person->birth_year,
                'gender' => $person->gender,
            ]);
        }
    }

    public function insertAllPlanets()
    {
        $person = $this->getEntityIdByUrl('https://swapi.dev/api/people/');
//        $peopleResponse = Http::get('https://swapi.dev/api/people/')->object();
//
//        foreach ($peopleResponse->results as $key => $person) {
//            $newPerson = Person::create([
//                'id' => ($key + 1),
//                'name' => $person->name,
//                'height' => $person->height,
//                'hair_color' => $person->hair_color,
//                'mass' => $person->mass,
//                'birth_year' => $person->birth_year,
//                'gender' => $person->gender,
//            ]);
//        }
    }

    public function getTotalPagesByCategory($category) {
        $pageResponse = Http::get("https://swapi.dev/api/{$category}/")->object();
        return ceil($pageResponse->count / count($pageResponse->results));
    }

    public function getEntitiesByCategory($category, $pageNumber) {
        $entityResponse = Http::get("https://swapi.dev/api/{$category}/?page={$pageNumber}")->object();
        return (isset($entityResponse->results)) ? $entityResponse->results : null;
    }

    public function getAllEntitiesByCategory($category) {
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

    public function getEntityIdByUrl($url) {

    }
}
