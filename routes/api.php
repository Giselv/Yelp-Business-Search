use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Business;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// routes/web.php
Route::get('/', 'HomeController@index');

Route::post('/business/search', function (Request $request) {
    $searchParam = $request->input('search_param');
    $sortCriteria = $request->input('sort_criteria', 'default_sort_field'); // Use the sorting criteria from the frontend, or provide a default

    // Perform the search and sorting logic here
    $businesses = Business::where('name', 'like', "%{$searchParam}%")
        ->orderBy($sortCriteria) // Use the sorting criteria from the frontend
        ->paginate(25); // Adjust the number of results per page as needed

    return response()->json([
        'businesses' => $businesses->items(), // Get the paginated items
        'pagination' => [
            'current_page' => $businesses->currentPage(),
            'last_page' => $businesses->lastPage(),
            'total' => $businesses->total(),
            // Add other pagination data as needed
        ],
    ]);
});
