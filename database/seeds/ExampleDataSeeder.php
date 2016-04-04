<?php

use Illuminate\Database\Seeder;
use App\Ingredient;
use App\Recipe;

class ExampleDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        $ingredients = ["aglio", "olio", "peproncino", "pepe", "pasta", "carne", "hemmental", "pomodoro", "insalta", "salmone", "tonno", "sale", "mozzarella", "pane", "farina", "mealnzane", "zucchine", "peperoni", "burro", "salvia", "paprika", "guanciale", "maionese", "ricotta", "limone"];

        foreach($ingredients as $ingredient){

            $thisRecipe = Ingredient::create([
                'name' => $ingredient
            ]);
        }

        $recipes = [
            [
                "title" => "Pasta aglio olio e peperoncino",
                "directions" => "Inizia lavando un peperoncino, tagliandolo a rondelle ed eliminando una parte dei semi. Sbuccia 4 spicchi d'aglio, elimina l'eventuale germoglio e taglialo a fettine. Fai scaldare in un largo tegame 4 cucchiai d'olio, unisci l'aglio e fallo dorare a fuoco moderato, prestando attenzione a non bruciarlo. Aggiungi anche il peperoncino regolandone a piacere la quantità e lascialo scaldare leggermente; spegni il fuoco. Lessa i 320gr di pasta in una pentola con abbondante acqua bollente e salata; scolala leggermente al dente e trasferiscila nel tegame con l'olio profumato al peperoncino. Fai saltare il tutto per qualche istante ed aggiungi altri 4 cucchiai d'olio, questa volta a crudo, prima di servire.",
                "image" => "salmone"
            ],
            [
                "title" => "Tiramisu",
                "directions" => "Cerca su google",
                "image" => null
            ],
            [
                "title" => "Hamburgher",
                "directions" => "1) Per prima cosa, tagli a metà i 4 panini per hamburger e tostali sulla piastra bene calda, dalla parte dei tagli per farle dorare. 

2) Una volta fatti tostare i pani, spolverizza sulla piastra un pizzico di sale e comincia a cuocere gli hamburger di manzo per circa 3 minuti per lato. Condisci gli hamburger di manzo con la salsa Worcester o, in alternativa, con il tabasco, salali leggermente e disponili all'interno dei panini ancora caldi aggiungendo anche un cucchiaio senape.

 3) Completate gli hamburger classica all'americana aggiungendo una fettina di pomodoro, delle rondelle di cipolla, le foglie di insalata verde e servi il piatto pronto con il  ketchup o con la maionese.",
                "image" => "hamburger"
            ],
            [
                "title" => "Polpette",
                "directions" => "Fate ammorbidire il pancarré, privato dei bordi, in mezzo bicchiere di latte. Lasciatelo dentro per  una decina di minuti. Strizzatelo molto bene, mettetelo in un recipiente aggiungete la carne e amalgamate il tutto aggiungendo via via le uova, il parmigiano, il prezzemolo tritato finemente, sale e pepe.

L’impasto dovrà avere una certa consistenza senza risultare troppo morbido altrimenti le polpette in cottura si apriranno. Una buona prova per capire se la consistenza è giusta consiste nel prendere l’impasto in una mano e tenerlo per qualche secondo in verticale verso il basso. Se cade lentamente senza sfaldarsi subito è pronto, altrimenti aggiungete ancora del parmigiano. Attenzione a non aggiungerne troppo altrimenti le polpette diventeranno troppo dure.

Amalgamate il tutto e formate delle palline di circa 4 cm di diametro.

In un tegame mettete qualche cucchiaio di olio evo, aggiungete la cipollina tagliata a fettine sottili, un goccio di acqua per non farla bruciare e un pizzico di sale, e lasciatela stufare fino a che non diventa trasparente. Aggiungete il pomodoro, aggiustate di sale e pepe, e fatelo cuocere per qualche minuto, quindi mettete le polpette e coprite con il coperchio.

Lasciate cuocere a fuoco basso per una ventina di minuti. Se a fine cottura il sugo dovesse risultare troppo liquido, lasciate cuocere ancora per qualche minuto senza coperchio.

Servite le polpette al sugo, cospargendo ancora con del prezzemolo tritato",
                "image" => "polpette"
            ],
            [
                "title" => "Pollo fritto",
                "directions" => "Cerca su google",
                "image" => "pollofritto"
            ],
            [
                "title" => "Gricia",
                "directions" => "Cerca su google",
                "image" => "gricia"
            ],

            [
                "title" => "Salmone al forno",
                "directions" => "Cerca su google",
                "image" => "salmoneforno"
            ],
            [
                "title" => "Insalata Mista",
                "directions" => "Cerca su google",
                "image" => "insalata"
            ],
            [
                "title" => "Uramaki",
                "directions" => "Cerca su google",
                "image" => "sushi"
            ],
            [
                "title" => "Spiedini di pollo",
                "directions" => "Cerca su google",
                "image" => null
            ],
            [
                "title" => "Fritto misto di pesce",
                "directions" => "Cerca su google",
                "image" => "frittopesce"
            ],

            [
                "title" => "Pizza",
                "directions" => "Cerca su google",
                "image" => "pizza"
            ],
            [
                "title" => "Amatriciana",
                "directions" => "Cerca su google",
                "image" => "amatriciana"
            ]

        ];

        foreach($recipes as $recipe){

            $image = $recipe['image'] !=null? '/img/'.$recipe['image'].'.jpg': "";

            $thisRecipe[ $recipe["title"] ] = Recipe::create([
                'title' => $recipe['title'],
                'directions' => $recipe['directions'],
                'image' => $image,
                'user_id' => 0,
            ]);

            $ingredientNumber = rand(1 , 10);

            for($I=1; $I<=$ingredientNumber; $I++)
                $thisRecipe[ $recipe["title"] ]->ingredient()->attach( rand(0 , count($ingredients)-1) );

        }

    }
}
