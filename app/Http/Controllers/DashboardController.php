<?php namespace App\Http\Controllers;
use App\Http\Requests;
use App\Http\Controllers\Controller;
//use App\Http\Requests\CreateTypeRequest;
use Illuminate\Http\Request;
use Illuminate\Foundation\Http\FormRequest;
use App\models\User;
use Auth;

class DashboardController extends Controller {
    public function __construct(User $user){
        /**
        *
        *Middleware accessibility for only authenticated users
        **/
       // $this->middleware('auth');
        $this->user=$user;

    }
    public function index()
    {
        //$types = $this->type->orderBy('id', 'desc')->paginate(10);
        //return view('types.types', ['types' => $types]);
        //return Auth::user()->email;
        //if(Auth::check()){
          //  return view('feed');
        //}else{
          //  return redirect('/');
        //}

       // return view('welcome');
    }
    public function create()
    {

       // return view('types.create');

    }
    public function store(CreateTypeRequest $request, Type $type)
    {

        //$type->create($request->all());
        //return redirect()->route('types.index');

    }

    public function show(User $user)
    {
        return view('dashboard.show', compact('user'));
    }
    public function edit(Type $type)
    {
        //return view('types.edit', compact('type'));

    }
    public function update(Type $type, Request $request)
    {

        //$type->fill($request->input())->save();
        //return view('types.show', compact('type'));

    }
    public function destroy(Type $type)
    {

        //$type->delete();
        //return redirect('types');

    }
}
