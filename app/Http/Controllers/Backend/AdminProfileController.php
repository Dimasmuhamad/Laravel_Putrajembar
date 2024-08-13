<!-- 

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\UserRequest;
use Illuminate\Routing\Controller;

class AdminProfileController extends Controller
{
    public function index()
    {
        // Fetch the currently authenticated user
        $user = auth()->user();
        return view('backend.profile.index', compact('user'));
    }

    public function store(UserRequest $request)
    {
        $data = $request->only(['name', 'email']);
        
        // Update password if it is present in the request
        if ($request->filled('password')) {
            $data['password'] = bcrypt($request->password);
        }

        // Update the authenticated user's information
        $user = auth()->user();
        $user->update($data);

        return redirect()->route('admin.profile.index')->with('success', __('Profile updated successfully.'));
    }
} -->
