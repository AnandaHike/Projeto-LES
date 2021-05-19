<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use App\Models\Service;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ScheduleController extends Controller
{
    public function index(Request $request)
    {
        $arrayDate = explode('-', $request->date);
        $schedule = Schedule::where(function ($query) use ($request, $arrayDate) {
            if ($request->date) {
                $query->where([['day', $arrayDate[2]], ['month', $arrayDate[1]], ['year', $arrayDate[0]]]);
            }
            if (Auth::user()->function == 'client')
                $query->where('user_id', Auth::id());
        })->get();
        if ($request->date)
            return view('admin.schedule.show', ['schedule' => $schedule, 'date' => $arrayDate[2] . '/' . $arrayDate[1] . '/' . $arrayDate[0], 'full_date' => $request->date]);
        return view('admin.schedule.index', ['schedule' => $schedule]);
    }

    public function create()
    {
        $clients = User::where('function', 'client')->get();
        $services = Service::all();
        return view('admin.schedule.create', ['clients' => $clients, 'services' => $services]);
    }

    public function store(Request $request)
    {
        $dateArray = explode('-', $request->date);
        $request['year'] = $dateArray[0];
        $request['month'] = $dateArray[1];
        $request['day'] = $dateArray[2];

        $hourArray = explode(':', $request->hour);
        $request['hour'] = $hourArray[0];
        $request['minute'] = $hourArray[1];

        $request->validate([
            'user_id' => ['required'],
            'service_id' => ['required'],
            'day' => ['required'],
            'month' => ['required'],
            'year' => ['required'],
            'hour' => ['required'],
            'minute' => ['required'],
        ]);
        if (Carbon::parse($request->year . $request->month . $request->day . ($request->hour + 3) . $request->minute)->isPast())
            return back()->with('error', 'Insira uma data válida!');

        $schedules = Schedule::all();

        foreach ($schedules as $schedule) {
            if (
                $schedule->service->id == $request->service_id &&
                $schedule->day == $request->day &&
                $schedule->month == $request->month &&
                $schedule->year == $request->year &&
                $schedule->hour == $request->hour &&
                $schedule->minute == $request->minute
            ) return back()->with('error', 'Horário já agendado!');
        }

        Schedule::create([
            'user_id' => $request->user_id,
            'service_id' => $request->service_id,
            'day' => $request->day,
            'month' => $request->month,
            'year' => $request->year,
            'hour' => $request->hour,
            'minute' => $request->minute,
        ]);


        return redirect()->route('admin.dashboard.schedule.index')->with('success', 'Cadastrado com sucesso!');
    }

    public function edit(Schedule $schedule, $id)
    {
        $clients = User::where('function', 'client')->get();
        $services = Service::all();
        $schedule = Schedule::where('id', $id)->first();

        return view('admin.schedule.edit', ['clients' => $clients, 'services' => $services, 'schedule' => $schedule]);
    }

    public function update(Request $request, Schedule $schedule, $id)
    {
        $dateArray = explode('-', $request->date);
        $request['year'] = $dateArray[0];
        $request['month'] = $dateArray[1];
        $request['day'] = $dateArray[2];

        $hourArray = explode(':', $request->hour);
        $request['hour'] = $hourArray[0];
        $request['minute'] = $hourArray[1];

        $request->validate([
            'user_id' => ['required'],
            'service_id' => ['required'],
            'day' => ['required'],
            'month' => ['required'],
            'year' => ['required'],
            'hour' => ['required'],
            'minute' => ['required'],
        ]);

        if (Carbon::parse($request->year . $request->month . $request->day . $request->hour . $request->minute)->isPast())
            return back()->with('error', 'Insira uma data válida!');

        $schedules = Schedule::all();

        foreach ($schedules as $schedule) {
            if (
                $schedule->service->id == $request->service_id &&
                $schedule->day == $request->day &&
                $schedule->month == $request->month &&
                $schedule->year == $request->year &&
                $schedule->hour == $request->hour &&
                $schedule->minute == $request->minute
            ) return back()->with('error', 'Horário já agendado!');
        }

        Schedule::where('id', $id)->update([
            'user_id' => $request->user_id,
            'service_id' => $request->service_id,
            'day' => $request->day,
            'month' => $request->month,
            'year' => $request->year,
            'hour' => $request->hour,
            'minute' => $request->minute,
        ]);


        return redirect()->route('admin.dashboard.schedule.index')->with('success', 'Editado com sucesso!');
    }

    public function destroy(Schedule $schedule, $id)
    {
        Schedule::where('id', $id)->delete();
        return redirect()->route('admin.dashboard.schedule.index')->with('error', 'Serviço cancelado!');
    }
}
