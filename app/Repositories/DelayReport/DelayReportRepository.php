<?php

namespace App\Repositories\DelayReport;

use App\Models\DelayReport;
use App\Models\DelayReportStatus;

class DelayReportRepository implements DelayReportRepositoryInterface
{
    public function create($data)
    {
        return DelayReport::create($data);
    }

    public function agentActiveDelayReport($agentID)
    {
        return DelayReport::where('agent_id', $agentID)->where('delay_report_status_id', DelayReportStatus::STATUS_IN_PROGRESS);
    }

    public function updateFirstPendingReport($agentID)
    {
        return DelayReport::where(['delay_report_status_id' => DelayReportStatus::STATUS_PENDING, 'agent_id' => null])
            ->orderBy('id', 'asc')
            ->limit(1)
            ->update(['agent_id' => $agentID, 'delay_report_status_id' => DelayReportStatus::STATUS_IN_PROGRESS]);
    }
}
