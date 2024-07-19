<?php

namespace App\Services\DelayReport\Exceptions;

use Exception;

class DelayReportException extends Exception
{
    const DELIVERY_TIME_ERROR = 1;

    const REPORT_EXISTS_ERROR = 2;

    const AGENT_REPORT_EXISTS_ERROR = 3;

    const NO_DELAY_REPORTS_ERROR = 4;

    const INTERNAL_SERVICE_ERROR = 5;

    public function render()
    {
        return response()->json(['error' => true, 'message' => $this->getMessage(), 'code' => $this->code]);
    }
}
