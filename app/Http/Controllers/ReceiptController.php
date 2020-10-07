<?php

namespace App\Http\Controllers;

use App\Receipt;
use Illuminate\Http\Request;
use App\Student;
use App\Batch;

class ReceiptController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Student $student)
    {
      $batches = Batch::all();
      return view('receipts.create')->with([
        'student' => $student,
        'batches' => $batches
      ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $this->validate($request, [
        'receipt_number' => 'required',
        'date'           => 'required|date',
        'amount'         => 'required',
        'student_id'     => 'required',
        'batch_id'       => 'required'
      ]);

      $receipt = new Receipt;

      $receipt->number = $request->receipt_number;
      $receipt->date = $request->date;
      $receipt->amount = $request->amount;
      $receipt->student_id = $request->student_id;
      $receipt->batch_id = $request->batch_id;

      if($request->file('image')) {
        $file = $request->file('image');
        $ext = strtolower($file->getClientOriginalExtension());
        $file_name = 'receipt'.time().'.'.$ext;
        $destination = 'uploads/receipts/'.$file_name;
        $file->move('uploads/receipts/', $file_name);
      }

      $receipt->image = $destination;
      
      $receipt->save();
      return redirect()->route('courses.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Receipt  $receipt
     * @return \Illuminate\Http\Response
     */
    public function show(Receipt $receipt, Request $request)
    {
      $batch_id = $request->session()->get('batch');
      return view ('receipts.show')->with([
        'receipt' => $receipt,
        'batch_id' => $batch_id
      ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Receipt  $receipt
     * @return \Illuminate\Http\Response
     */
    public function edit(Receipt $receipt)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Receipt  $receipt
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Receipt $receipt)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Receipt  $receipt
     * @return \Illuminate\Http\Response
     */
    public function destroy(Receipt $receipt)
    {
        //
    }
}
