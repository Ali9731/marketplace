<?php

namespace App\Repositories\DelayReport;

interface DelayReportRepositoryInterface
{
    public function create($data);

    public function agentActiveDelayReport($agentID);

    public function updateFirstPendingReport($agentID);
}
