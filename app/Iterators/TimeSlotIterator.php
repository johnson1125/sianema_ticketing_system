<?php
namespace App\Iterators;

class TimeSlotIterator implements \Iterator
{
    private $timeSlots;
    private $position;

    public function __construct(array $timeSlots)
    {
        $this->timeSlots = $timeSlots;
        $this->position = 0;
    }

    // Rewind the iterator to the first element
    public function rewind(): void
    {
        $this->position = 0;
    }

    // Return the current element
    public function current(): mixed
    {
        return $this->timeSlots[$this->position];
    }

    // Return the key of the current element
    public function key(): mixed
    {
        return $this->position;
    }

    // Move forward to the next element
    public function next(): void
    {
        ++$this->position;
    }

    // Check if the current position is valid
    public function valid(): bool
    {
        return isset($this->timeSlots[$this->position]);
    }
}
