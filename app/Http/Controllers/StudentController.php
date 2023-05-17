<?php

namespace App\Http\Controllers;

use App\Bulletin;
use App\Level;
use App\Subject;
use App\Note;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class StudentController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }




    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $levels = Level::get();
        $bulletins = Bulletin::where('student', Auth::user()->id)->paginate(10);

        return view('bulletin.index', compact('levels','bulletins'));
    }



    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function createBulletin()
    {
        if (!isset($_GET['level'])) {
            return redirect()->route('home');
        }

        $level_id = $_GET['level'];
        
        $level = Level::findOrFail($level_id);

        $subjects = Subject::where('level', $level_id)->get();

        return view('bulletin.create', compact('subjects','level'));
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function showBulletin($id)
    {

        $bulletin = Bulletin::findOrFail($id);

        $notes = Note::where('bulletin_id', $bulletin->id)->get();


        return view('bulletin.show', compact('bulletin', 'notes'));

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function calculator()
    {
        return view('calculator');
    }



    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function storeBulletin()
    {



        $data = (array) $_REQUEST;

        if (in_array("", $data)) 
        {
            return "error";
        }


        foreach($data as $subjId => $mark)
        {
            if ((int) $subjId ) 
            {
                if ($mark > 20 OR $mark < 0 OR !preg_match("/\d/", $mark)) 
                {
                    return redirect()->back()->with('error',"Vous devez: entrer la marque entre 0 et 20 Ou saisir uniquement des chiffres")->with('old', $data);
                }
            }
        }

        $userid = Auth::user()->id;

        $bulletinId = Bulletin::insertGetId(['student' => $userid, 'level' => $data["level"], 'total' => '0']);


        $subTotal = 0;
        $totalCoefficient = 0;



        foreach($data as $subjId => $mark){
            
            if ((int) $subjId ) {

                $subject = Subject::findOrFail($subjId);
                $subjectCoefficient  = $subject->coefficient;
                $subjectName  = $subject->name;

                $subTotal += $subjectCoefficient * $mark;
                $totalCoefficient += $subjectCoefficient;

                Note::create(['mark' => $mark, 'bulletin_id' => $bulletinId, 'subject_id' => $subjId]);

            }

        }

        $finalTotal = $subTotal/$totalCoefficient;

        $updateResult = Bulletin::where('id', $bulletinId)->update(['total' => $finalTotal]);

        return redirect()->route('showBulletin', $bulletinId);
    }
}
