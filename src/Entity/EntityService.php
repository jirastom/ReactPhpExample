<?php

namespace React\Http\Entity;

use React\EventLoop\LoopInterface;

class EntityService
{
    private $loop;

    private $counter = 0;

    public function __construct(LoopInterface $loop)
    {
       $this->loop = $loop;
    }

    /**
     * @param int $time
     */
    public function add($time)
    {
        $counter = ++$this->counter;

        $this->loop->addTimer($time, function () use ($counter) {
            echo sprintf(
                "Volání %d. akce loopu.\n",
                $counter
            );
        });
    }
}
