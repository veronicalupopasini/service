<?php


use Esc\Repository\IdentityRepository;
use PHPUnit\Framework\TestCase;

class IdentityRepositoryTest extends TestCase
{

    public function testFindOneById(){

        $identityRepository = $this->getMockBuilder(IdentityRepository::class)
            ->disableOriginalConstructor()
            ->getMock();

        $object = $identityRepository->expects($this->once())
            ->method('findOneById')
            ->with(4)
            ->willReturn(__CLASS__);

        $this->assertIsObject($object);
    }

    public function testGetOneByIdThrowException(){

        $identityRepository = $this->getMockBuilder(IdentityRepository::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->expectException(RuntimeException::class);

        $identityRepository->expects($this->once())
            ->method('getOneById')
            ->with(4)
            ->willThrowException(new RuntimeException());
    }
}