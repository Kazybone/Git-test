<?php

namespace App\Http\Controllers;

use App\Models\Report;
use App\Models\Status;
use Illuminate\Http\Request;
use Illuminate\View\View;
class ReportController extends Controller
{
    // Показать список всех заявлений
   public function index(Request $request)
{
    $sort = $request->input('sort');
    if($sort != 'asc' && $sort != 'desc') {
        $sort = 'desc';
    }
    
    $status = $request->input('status');
    $validate = $request->validate([
        'status' => "exists:statuses,id"
    ]);
    
    if($validate){
        $reports = Report::where('status_id', $status)
            ->orderBy('created_at', $sort)
            ->paginate(8);
    } else {
        $reports = Report::orderBy('created_at', $sort)
            ->paginate(8);
    }
    
    $statuses = Status::all();
    
    return view('reports.index', compact('reports','statuses','sort','status'));
}

    // Показать форму создания заявления
    public function create()
    {
        return view('reports.create');
    }

    // Сохранить новое заявление
  public function store(Request $request)
{
    $request->validate([
        'number'      => 'required|string|max:10',
        'description' => 'required|string',
    ]);

    Report::create([
        'number'      => $request->number,
        'description' => $request->description,
        'status_id'   => 1,               
    ]);

    return redirect()->route('reports.index')
                     ->with('success', 'Заявление успешно создано!');
}

    // Показать форму редактирования заявления
    public function show(Report $report)
    {
        return view('reports.show', compact('reports'));
    }

    // Обновить заявление
    public function update(Request $request, Report $report)
    {
        $request->validate([
            'number' => 'required|string|max:10',
            'description' => 'required|string'
        ]);

        $report->update($request->all());

        return redirect()->route('reports.index')
            ->with('success', 'Заявление успешно обновлено!');
    }

    // Удалить заявление (мягкое удаление)
    public function destroy(Report $report)
    {
        $report->delete();

        return redirect()->route('reports.index')
            ->with('success', 'Заявление успешно удалено!');
    }
}