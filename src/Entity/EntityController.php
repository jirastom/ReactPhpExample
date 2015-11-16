<?php

namespace React\Http\Entity;

use React\Http\Request;

class EntityController
{
    /**
     * @var EntityService
     */
    private $entityService;

    public function __construct(EntityService $entityService)
    {
       $this->entityService = $entityService;
    }

    /**
     * @param Request $request
     * @return mixed[]
     */
    public function handleRequest(Request $request)
    {
        $query = $request->getQuery();
        if (isset($query['time'])) {
            $time = $query['time'];

            if ($time) {
                $this->entityService->add($time);

                return [
                    'code' => '200',
                    'status' => 'OK'
                ];
            }
        }

        return [
            'code' => '400',
            'status' => 'Bad request'
        ];
    }
}
