namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    // Show user list
    <!-- public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    } -->

    // UserController@index method
    public function index()
    {
        $dummyUsers = [
            ['id' => 1, 'name' => 'John Doe', 'email' => 'john@example.com'],
            ['id' => 2, 'name' => 'Jane Doe', 'email' => 'jane@example.com'],
            // Add more dummy users as needed
        ];

        return view('users.index', compact('dummyUsers'));
    }


    // Show user creation form
    public function create()
    {
        return view('users.create');
    }

    // Store new user
    public function store(Request $request)
    {
        // Validation can be added here

        User::create($request->all());

        return redirect('/users')->with('success', 'User created successfully!');
    }

    // Show edit user form
    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    // Update user
    public function update(Request $request, User $user)
    {
        // Validation can be added here

        $user->update($request->all());

        return redirect('/users')->with('success', 'User updated successfully!');
    }

    // Delete user
    public function destroy(User $user)
    {
        $user->delete();

        return redirect('/users')->with('success', 'User deleted successfully!');
    }
}
