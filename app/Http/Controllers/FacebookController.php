<?php namespace App\Http\Controllers;
use App\Http\Requests;
use App\Http\Controllers\Controller;
//use App\Http\Requests\CreateTypeRequest;
use Illuminate\Http\Request;
use Illuminate\Foundation\Http\FormRequest;
use App\models\User;

class FacebookController extends Controller {
    public function __construct(User $user){
        
        $this->user=$user;
        
    }
    public function index()
    {
        //$types = $this->type->orderBy('id', 'desc')->paginate(10);
        //return view('types.types', ['types' => $types]);
    
    }
    public function show(User $user)
    {
        return view('welcome', compact('user'));
    }
}