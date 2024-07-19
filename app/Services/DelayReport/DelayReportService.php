<?php

namespace App\Services\DelayReport;

use App\Models\Agent;
use App\Models\DelayReportStatus;
use App\Models\Order;
use App\Models\TripStatus;
use App\Repositories\DelayReport\DelayReportRepositoryInterface;
use App\Services\DelayReport\Exceptions\DelayReportException;
use Carbon\Carbon;

class DelayReportService
{
    const NEW_ESTIMATE_STATUS = 1;

    const DELAY_REPORTED_STATUS = 2;

    const DELAY_REPORT_ASSIGNED_STATUS = 3;

    public function __construct(DelayReportRepositoryInterface $delayReportRepository)
    {
        $this->delayReportRepository = $delayReportRepository;
    }

    public function report($order)
    {
        $this->validateReport($order);

        if ($order->trip()->exists() && $order->trip->trip_status_id != TripStatus::STATUS_DELIVERED) {

            $newEstimatedTime = rand(1, 5); // documents estimate api doesnt work (404) so i used a random time
            $delayReport = $this->delayReportRepository->create(['order_id' => $order->id, 'delay_report_status_id' => DelayReportStatus::STATUS_NEW_ESTIMATE, 'estimated_time' => $newEstimatedTime]);
            $order->delivery_time = Carbon::now()->addMinutes($newEstimatedTime);

            if (! $order->save()) {
                \Log::info('Failed to save order`s new estimate', [
                    'order_id' => $order->id,
                ]);
                throw new DelayReportException(__('messages.internal_service_error'), DelayReportException::INTERNAL_SERVICE_ERROR);
            }

            return ['status' => self::NEW_ESTIMATE_STATUS, 'message' => __('messages.new_estimate', ['estimate' => $newEstimatedTime])];

        } else {
            $this->delayReportRepository->create(['order_id' => $order->id]);

            return ['status' => self::DELAY_REPORTED_STATUS, 'message' => __('messages.delay_reported')];
        }

    }

    public function assignReportToAgent(Agent $agent)
    {
        $this->validateAgent($agent);
        //Todo : lock user on redis to avoid race condition (one agent can have two delay reports if he sends two requests at same time)

        //update first to avoid race condition (two different agents can send request at same time and get same report if we select report first)
        $result = $this->delayReportRepository->updateFirstPendingReport($agent->id);

        if ($result) {
            $delayReport = $this->delayReportRepository->agentActiveDelayReport($agent->id)->first();

            return ['status' => self::DELAY_REPORT_ASSIGNED_STATUS, 'report' => $delayReport];
        }

        throw new DelayReportException(__('messages.no_delay_reports_error'), DelayReportException::NO_DELAY_REPORTS_ERROR);
    }

    public function validateReport(Order $order)
    {
        if ($order->delivery_time > Carbon::now()) {
            throw new DelayReportException(__('messages.delivery_time_error'), DelayReportException::DELIVERY_TIME_ERROR);
        }
        if ($order->activeDelayReports()->exists()) {
            throw new DelayReportException(__('messages.report_exists_error'), DelayReportException::REPORT_EXISTS_ERROR);
        }
    }

    public function validateAgent(Agent $agent)
    {
        if ($this->delayReportRepository->agentActiveDelayReport($agent->id)->exists()) {
            throw new DelayReportException(__('messages.agent_have_active_report'), DelayReportException::AGENT_REPORT_EXISTS_ERROR);
        }
    }
}
