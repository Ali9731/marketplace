<?php

namespace App\Repositories\Agent;

use App\Models\Agent;

class AgentRepository implements AgentRepositoryInterface
{
    public function find($id)
    {
        return Agent::findOrFail($id);
    }
}
