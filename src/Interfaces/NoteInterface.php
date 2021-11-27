<?php

namespace Chenshikang\SendNoteSdk\Interfaces;

interface NoteInterface
{
    public function sendNote($phone, $code);
}