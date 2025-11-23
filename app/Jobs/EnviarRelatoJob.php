<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class EnviarRelatoJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $data;
    public $anexo;
    public $anexoNome;

    public function __construct($data, $anexo = null, $anexoNome = null)
    {
        $this->data = $data;
        $this->anexo = $anexo;
        $this->anexoNome = $anexoNome;
    }

    public function handle()
    {
        Mail::send('emails.relato', $this->data, function ($message) {
            $message->to('relatoscontosnoturnos@gmail.com')
                    ->subject('Novo relato enviado pelo site');

            if ($this->anexo && $this->anexoNome) {
                $message->attach($this->anexo, ['as' => $this->anexoNome]);
            }
        });
    }
}
