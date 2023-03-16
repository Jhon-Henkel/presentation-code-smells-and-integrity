<?php

namespace tests\unit;

use src\ExemploParaTesteIntegridade;
use Mockery;
use PHPUnit\Framework\TestCase;

class ExemploUnitTest extends TestCase
{
    public function testOfIntegrityExempleOne()
    {
        $exemploMock = Mockery::mock(ExemploParaTesteIntegridade::class)->makePartial();
        $exemploMock->shouldReceive('enviaNotaFiscal')->once();
        $exemploMock->shouldReceive('registraEnvio')->once();
        $exemploMock->shouldReceive('alterarStatusParaEnviado')->once();

        $exemploMock->faturaPedidoNoHubExternoExemploUm();

        $this->doesNotPerformAssertions();

        Mockery::close();
    }

    public function testOfIntegrityExempleTwo()
    {
        $exemploMock = Mockery::mock(ExemploParaTesteIntegridade::class)->makePartial();
        $exemploMock->shouldReceive('enviaNotaFiscal')->once();
        $exemploMock->shouldReceive('registraEnvio')->once();
        $exemploMock->shouldReceive('alterarStatusParaEnviado')->never();

        $exemploMock->faturaPedidoNoHubExternoExemploDois(false);

        $this->doesNotPerformAssertions();

        Mockery::close();
    }
}