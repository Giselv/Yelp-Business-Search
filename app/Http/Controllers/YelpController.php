use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class YelpController extends Controller
{
    public function searchBusinesses(Request $request)
    {
        $searchTerm = $request->input('search_term');
        $location = $request->input('location');
        
        // Replace with your Yelp Fusion API Key
        $apiKey = 'WtWpDI_zknJnK1VaSxkRt1izIOudC9kprIRm0sy7e-KaszItX2D9nR7yR9hWCnF08XlpD9p0BRNzeinI_6bRlf4EseEzyB0nwA2HQpO5l8OF3CgZugedOzgfJ4qAZXYx';

        // Make a request to the Yelp API
        $response = Http::withHeaders([
            'Authorization' => "Bearer $apiKey", // Use your Yelp Fusion API Key
        ])->get('https://api.yelp.com/v3/businesses/search', [
            'term' => $searchTerm,
            'location' => $location,
        ]);

        // Check for errors and return data
        if ($response->successful()) {
            $businesses = $response->json()['businesses'];
            return response()->json($businesses);
        } else {
            // Handle error here, e.g., return an error response
            return response()->json(['error' => 'Failed to fetch data from Yelp API'], 500);
        }
    }
}
