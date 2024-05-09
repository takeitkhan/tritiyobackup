<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class ProjectReport implements FromCollection, WithHeadings, ShouldAutoSize
{
    private $id;
    private $date;

    public function __construct($id, $date)
    {
        $this->id = $id;
        $this->date = $date;
    }

    public function collection()
    {
        $dates = explode(' - ', $this->date);
        $start = $dates[0];
        $end = $dates[1];

        $getData = \Tritiyo\Task\Models\Task::where('project_id', $this->id)->whereBetween('task_for', [$start, $end])->get();
        //dd($getData);
        $v = [];
        foreach($getData as $task) {
            //dd($task->project_id);
            $project = \Tritiyo\Project\Models\Project::where('id', $task->project_id)->first();
            $sites = \Tritiyo\Task\Models\TaskSite::leftjoin('sites', 'sites.id', 'tasks_site.site_id')->select('sites.site_code')->where('tasks_site.task_id', $task->id)->first();
            $task_name = $task->task_name;
            $task_for = $task->task_for;
            $project_name = $project->name;
            $manager_name = \App\Models\User::where('id', $task->user_id)->first()->name;
            $site_code = $sites->site_code;
            $site_head = $task->site_head;
            $site_head_name = \App\Models\User::where('id', $task->site_head)->first()->name;

            $rm = new \Tritiyo\Task\Helpers\SiteHeadTotal('requisition_edited_by_accountant', $task->id, true);

            $requisition_approved_total = $rm->getTotal();

            $rm = new \Tritiyo\Task\Helpers\SiteHeadTotal('bill_edited_by_accountant', $task->id, true);

            $bill_approved_total = $rm->getTotal();


            $value = [];
            $v[] = [
                $value[] = $task_name,
                $value[] = $task_for,
                $value[] = $project_name,
                $value[] = $manager_name,
                $value[] = $site_code,
                $value[] = $site_head_name,
                $value[] = $requisition_approved_total,
                $value[] = $bill_approved_total,
            ];

        }
        if (count($v) == count($getData)) {
            return collect([$v]);
        }
    }

    public function headings(): array
    {
       return [
            'Task Name',
            'Task For',
            'Project Name',
            'Project Manager',
            'Site Code',
            'Site Head',
            'Requisition Approved',
            'Bill Approved',
       ];
    }
}
