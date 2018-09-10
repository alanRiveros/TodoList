<?php
use \Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use \Todo\Application\Services\QueryListService;

class ListServiceTest extends \PHPUnit\Framework\TestCase
{
    use MockeryPHPUnitIntegration;

    /*
    * este test es re boludo pero sirve para probar que funcionen los tests
    */
    public function testListAllTasksReturnArray(){
        $listRepo = \Mockery::mock('ListRepository', '\Infrastructure\iListPersistence');
        $listRepo
            ->shouldReceive('getAll')
            ->andReturn([
                ['id' => '1', 'uuid' => 'aabbccdd-12345678-aabbccdd', 'title' => 'cortar el pasto', 'state' => '1'],
                ['id' => '2', 'uuid' => 'abbccdde-67891234-abbccdde', 'title' => 'comprar pan', 'state' => '1']
            ]);
        
        $listService = new QueryListService($listRepo);
        $this->assertTrue(is_array($listService->listAll()));
    }
}