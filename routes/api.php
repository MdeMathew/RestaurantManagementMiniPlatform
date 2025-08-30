use App\Http\Controllers\MenuItemController;

// Menu Items : CRUD ---- Crea automaticamente rutas API GET UPDATE DELETE

Route::apiResource('menu-items', MenuItemController::class);
