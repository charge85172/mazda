<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CatalogController extends Controller
{
    /**
     * Een lijst van vooraf gedefinieerde Mazda modellen voor de catalogus.
     */
    private $models = [
        ['name' => 'MX-3'],
        ['name' => 'MX-5'],
        ['name' => 'MX-6'],
        ['name' => 'RX-7'],
        ['name' => 'RX-8'],
        ['name' => 'Mazda 2'],
        ['name' => 'Mazda 3'],
        ['name' => 'Mazda 5'],
        ['name' => 'Mazda 6'],
        ['name' => 'CX-3'],
        ['name' => 'CX-30'],
        ['name' => 'CX-5'],
        ['name' => 'CX-50'],
        ['name' => 'CX-60'],
        ['name' => 'CX-7'],
        ['name' => 'CX-80'],
        ['name' => 'CX-9'],
        ['name' => 'CX-90'],
    ];

    /**
     * Toon de catalogus pagina.
     */
    public function index()
    {
        // Geef de lijst met modellen door aan de view
        return view('catalog.index', ['mazdaModels' => $this->models]);
    }
}
