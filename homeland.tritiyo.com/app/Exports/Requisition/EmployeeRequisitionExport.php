<?php

namespace App\Exports\Requisition;

use App\Models\EmployeeRequisition;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use \Tritiyo\Task\Models\Task;
use Tritiyo\Task\Models\TaskRequisitionBill;
use Tritiyo\Task\Models\TaskSite;

class EmployeeRequisitionExport implements FromCollection, WithHeadings, ShouldAutoSize
{
    private $date;

    /**
     * EmployeeRequisitionExport constructor.
     * @param $date
     */
    public function __construct($date)
    {
        $this->date = $date;
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        $dates = explode(' - ', $this->date);
        $start = $dates[0];
        $end = $dates[1];
        $getData = \Tritiyo\Task\Models\TaskRequisitionBill::leftjoin('tasks', 'tasks.id', 'tasks_requisition_bill.task_id')
                                            ->select('tasks_requisition_bill.*', 'tasks.task_for')
                                            ->whereBetween('tasks.task_for', [$start, $end])
                                            ->get()->toArray();
        $v = [];
        foreach ($getData as $data) {
            $total = new \Tritiyo\Task\Helpers\SiteHeadTotal('requisition_edited_by_accountant', $data['task_id']);


            $getTask = Task::where('id', $data['task_id'])->first();
            $getTaskSite = TaskSite::leftjoin('sites', 'sites.id', 'tasks_site.site_id')
                ->select('tasks_site.site_id', 'sites.site_code', 'sites.location')
                ->where('tasks_site.task_id', $data['task_id'])->groupBy('tasks_site.site_id')->get()->toArray();

            $getResource = TaskSite::leftjoin('users', 'users.id', 'tasks_site.resource_id')
                ->select('tasks_site.resource_id', 'users.name')
                ->where('tasks_site.task_id', $data['task_id'])->groupBy('tasks_site.resource_id')->get()->toArray();


            $task_name = $getTask->task_name;
            $task_for = $getTask->task_for;
            $task_details = $getTask->task_details;
            $siteCode = implode(',', array_column($getTaskSite, 'site_code'));
            $location = implode(',', array_column($getTaskSite, 'location'));
            $resource = implode(',', array_column($getResource, 'name'));
            $project = \Tritiyo\Project\Models\Project::where('id', $getTask->project_id)->first()->code;
            $siteHead = \App\Models\User::where('id', $getTask->site_head)->first()->name;

            $value = [];
            $v[] = [
                $value[] = $task_name,
                $value[] = $task_for,
                $value[] = $task_details,
                $value[] = $project,
                $value[] = $siteCode,
                $value[] = $location,
                $value[] = $siteHead,
                $value[] = $resource,

                $value[] = $total->getVehicleTotal(),
                $value[] = $total->getMaterialTotal(),
                $value[] = $total->getRegularTotal(),
                $value[] = $total->getTransportTotal(),
                $value[] = $total->getPurchaseTotal(),
                $value[] = $total->getTotal(),
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
            'Description',
            'Project Code',
            'Site Code',
            'Site Location',
            'Site Head',
            'Resources',
            'Vehicle Rent',
            'Material Cost',
            'Regular Amount (DA, Labour, Other)',
            'Transport Total',
            'Purchase Total',
            'Total Amount'
        ];
    }
}
