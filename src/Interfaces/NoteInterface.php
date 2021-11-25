<?php

namespace ChenShikang\SendNoteSdk\Interfaces;

interface NoteInterface
{
    public function sendNote($phone, $code);
}