<?php
/**
 * Created by PhpStorm.
 * User: yangsen
 * Date: 2017/9/17
 * Time: 上午10:32
 */
namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Note;
use Illuminate\Http\Request;



class NoteController extends Controller
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function index()
    {
        $notes = Note::orderBy('id', 'desc')->paginate(20);
        return view('note.index', ['notes' => $notes]);
    }

    public function save(Request $request)
    {
        $content = $request->input('content');
        if($content){
            Note::create(array('content' => $content));
        }
        return redirect()->route('index');
    }
}