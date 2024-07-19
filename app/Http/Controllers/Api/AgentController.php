<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\AgentRequest;
use App\Http\Resources\DelayReportResource;
use App\Repositories\Agent\AgentRepositoryInterface;
use App\Services\DelayReport\DelayReportService;
use App\Services\DelayReport\Exceptions\DelayReportException;
use Symfony\Component\HttpFoundation\Response;

class AgentController extends Controller
{
    public function __construct(protected AgentRepositoryInterface $agentRepository, protected DelayReportService $delayReportService) {}

    public function assign(AgentRequest $request)
    {
        $agent = $this->agentRepository->find($request->get('agent_id'));
        try {

            $result = $this->delayReportService->assignReportToAgent($agent);

            return response()->json(DelayReportResource::make($result['report']));

        } catch (DelayReportException $e) {
            return response([
                'error' => [
                    'message' => $e->getMessage(),
                ],
            ], Response::HTTP_UNPROCESSABLE_ENTITY);
        }
    }
}
