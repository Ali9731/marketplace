<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\DelayReportRequest;
use App\Repositories\Order\OrderRepositoryInterface;
use App\Services\DelayReport\DelayReportService;
use App\Services\DelayReport\Exceptions\DelayReportException;
use Symfony\Component\HttpFoundation\Response;

class DelayReportController extends Controller
{
    public function __construct(
        protected OrderRepositoryInterface $orderRepository,
        protected DelayReportService $delayReportService

    ) {}

    public function report(DelayReportRequest $request)
    {

        $order = $this->orderRepository->find($request->get('order_id'));

        try {

            $result = $this->delayReportService->report($order);

            return response([
                'success' => [
                    'message' => $result['message'],
                ],
            ], Response::HTTP_OK);

        } catch (DelayReportException $e) {
            return response([
                'error' => [
                    'message' => $e->getMessage(),
                ],
            ], Response::HTTP_UNPROCESSABLE_ENTITY);
        }

    }
}
