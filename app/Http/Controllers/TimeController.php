<?php

namespace App\Http\Controllers;

use App\Http\Requests\Time\StoreTime;
use App\Http\Requests\Time\UpdateTime;
use App\Models\Time;

class TimeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('index', Time::class);

        $times = Time::paginate(20);

        return view('time.index', [
            'times' => $times,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', Time::class);

        return view('Time.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTime $request)
    {
        $this->authorize('create', Time::class);

        $Time = new Time($request->all());
        $Time->save();
        session()->flash('success', 'Time created');

        return redirect()->route('Times.edit', ['id' => $Time->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Time $Time
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Time $Time)
    {
        return redirect()->route('Times.edit', ['id' => $Time->id]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Time $Time
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Time $Time)
    {
        $this->authorize('update', $Time);

        return view('Time.edit', [
            'Time' => $Time,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Time         $Time
     *
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTime $request, Time $Time)
    {
        $this->authorize('update', $Time);

        $Time->update($request->all());
        session()->flash('success', 'Time updated');

        return redirect()->route('Times.edit', ['id' => $Time->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Time $Time
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Time $Time)
    {
        $this->authorize('delete', $Time);

        $TimeName = $Time->name;
        $Time->delete();
        session()->flash('success', "Time '{$TimeName}' deleted");

        return redirect()->route('Times.index');
    }
}
