protected $middlewareAliases = [
// ... andere aliassen
'admin' => \App\Http\Middleware\CheckAdminRole::class, // Voeg deze regel toe
];
