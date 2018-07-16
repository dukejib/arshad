<?php

namespace App\Http\Controllers\Administrator;

use App\Contact;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class ContactController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($type)
    {

        switch ($type) {
            case 'Feedback':
                //Send Pending contacts
                return view('backend.contacts.index')
                ->with('type','Feedback')
                ->with('contacts',Contact::where('reason','Feedback')->orderBy('created_at','DESC')->get());
                break;

            case 'General Query':
                //Send Pending contacts
                return view('backend.contacts.index')
                ->with('type','General Query')
                ->with('contacts',Contact::where('reason','General Query')->orderBy('created_at','DESC')->get());
                break;
            
            case 'Complain':
                //Send COmpleted contacts
                return view('backend.contacts.index')
                ->with('type','Complain')
                ->with('contacts',Contact::where('reason','Complain')->orderBy('created_at','DESC')->get());
                break;

            case 'Job':
                //Send COmpleted contacts
                return view('backend.contacts.index')
                ->with('type','Job')
                ->with('contacts',Contact::where('reason','Job')->orderBy('created_at','DESC')->get());
                break;
            case 'All':
                //Send COmpleted contacts
                return view('backend.contacts.index')
                ->with('type','All')
                ->with('contacts',Contact::orderBy('created_at','DESC')->get());
                break;
        }
       
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function make_contact_read($id)
    {
        $contact = Contact::find($id);
        $contact->read = 1;
        $contact->save();

        Session::flash('success','contact read');
        return redirect()->back();
    }
}
