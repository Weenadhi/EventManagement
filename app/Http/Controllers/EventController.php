<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use MaddHatter\LaravelFullcalendar\Facades\Calendar;
use App\Event;
class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = [];
        $data = Event::all();
        if($data->count()) {
            foreach ($data as $key => $value) {
                $events[] = Calendar::event(
                    $value->title,
                    true,
                    new \DateTime($value->start_date),
                    new \DateTime($value->end_date),
                    null,
                    // Add color and link on event
	                [
	                    'color' => '#f05050',
	                    'url' => 'pass here url and any route',
	                ]
                );
            }
        }
        $calendar = \Calendar::addEvents($events);
        return view('eventpage', compact('events','calendar'));
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function display(){
        return view('addevent');
    }
    public function store(Request $request)
    {
        $this->validate($request,[
            'title'=>'required',
            'color'=>'required',
            'start_date'=>'required',
            'end_date'=>'required',
        ]);
        $events= new Event;
        $events->title=$request->input('title');
        $events->color=$request->input('color');
        $events->start_date=$request->input('start_date');
        $events->end_date=$request->input('end_date');

        $events->save();

        return redirect('events')->with('success','Events Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $events = Event::all();
        return view('display')->with('events',$events); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $events=Event::find($id);
        return view('editform',compact('events','id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
     $this->validate($request,[
            'title'=>'required',
            'color'=>'required',
            'start_date'=>'required',
            'end_date'=>'required',
     ]); 
     $events = Event::find($id);

     $events->title = $request->input('title');
     $events->color = $request->input('color');
     $events->start_date = $request->input('start_date');
     $events->end_date = $request->input('end_date');

     $events->save();
     //echo "data saved";
    
     return redirect('events')->with('success','Event updated');
     
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $event=Event::find($id);
        $events->delete();

        return redirect('events')->with('success','Data deleted');
    }
}
