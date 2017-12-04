<?php

// Enrico Simonetti
// enricosimonetti.com

class afterEntryPoint
{
    public function disableActivityStream($event, $arguments)
    {
        // disable activity stream
        Activity::disable();
    }
}
