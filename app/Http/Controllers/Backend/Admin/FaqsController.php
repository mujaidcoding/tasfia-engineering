<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class FaqsController extends Controller
{
    public function AllFaqs()
    {
        $action = 'index';
        $faqs = Faq::orderBy('serial', 'asc')->get();
        return view('backend.admin.faqs.index', compact('action', 'faqs'));
    }
    //End Method

    public function AddFaq()
    {
        $action = 'create';
        return view('backend.admin.faqs.index', compact('action'));
    }
    //End Method

    public function StoreFaq(Request $request)
    {
        $request->validate([
            'question' => 'required',
            'answer' => 'required',
            'serial' => 'required|integer|unique:faqs,serial',
        ]);

        // Create a new Service instance
        $faq = new Faq([
            'question' => $request->question,
            'answer' => $request->answer,
            'serial' => $request->serial,
        ]);
        $faq->save();
        // Redirect to a success page or do something else
        return redirect()->route('all.faqs')->with('update', [
            'type' => 'success',
            'message' => 'Faq Create Successfully.',
        ]);
    }
    //End Method

    public function EditFaq($id)
    {
        $action = 'edit';
        $faq = Faq::findOrFail($id);
        return view('backend.admin.faqs.index', compact('action', 'faq'));
    } //End Method

    public function UpdateFaq(Request $request)
    {
        $id = $request->id;
        $faq = Faq::find($id);
        // Validate the incoming request data
        $request->validate([
            'question' => 'required',
            'answer' => 'required',
            'serial' => [
                'required',
                'integer',
                Rule::unique('faqs')->ignore($id),
            ],
        ]);


        $faq->question = $request->question;
        $faq->answer = $request->answer;
        $faq->serial = $request->serial;
        $faq->save();

        // Redirect to a success page or do something else
        return redirect()->route('all.faqs')->with('update', [
            'type' => 'success',
            'message' => 'Faq Update Successfully.',
        ]);
    } //End Method

    public function DeleteFaq($id)
    {
        $faq = Faq::find($id);
        if(!is_null($faq)) {

            $faq->delete();
        }
        return redirect()->route('all.faqs')->with('update', [
            'type' => 'success',
            'message' => 'Faq Delete Successfully.',
        ]);
    } // End Method
}
