<?php
namespace src;

class ExemploParaTesteIntegridade
{
    public function faturaPedidoNoHubExternoExemploUm(): void
    {
        $this->enviaNotaFiscal();
        $this->registraEnvio();
        $this->alterarStatusParaEnviado();
    }

    public function faturaPedidoNoHubExternoExemploDois($alterarStatus): void
    {
        $this->enviaNotaFiscal();
        $this->registraEnvio();
        if ($alterarStatus) {
            $this->alterarStatusParaEnviado();
        }
    }

    public function enviaNotaFiscal(): void
    {
        /**
         * enviando nota fiscal do pedido no hub externo.
         * código,
         * código,
         * e mais código...
         */
        die('enviaNotaFiscal');
    }

    public function registraEnvio(): void
    {
        /**
         * registrando envio do pedido no hub externo.
         * código,
         * código,
         * e mais código...
         */
        die('registraEnvio');
    }

    public function alterarStatusParaEnviado(): void
    {
         /**
         * alterando status do pedido no hub externo.
         * código,
         * código,
         * e mais código...
         */
        die('alterarStatusParaEnviado');
    }
}