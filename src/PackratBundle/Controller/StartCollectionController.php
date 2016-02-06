<?php

namespace PackratBundle\Controller;

use Broadway\CommandHandling\CommandBusInterface;
use Packrat\Collection\CollectionId;
use Packrat\Collection\CollectionName;
use Packrat\Collection\StartCollection;
use Packrat\User\UserId;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\JsonResponse;

final class StartCollectionController
{
    private $commandBus;

    public function __construct(CommandBusInterface $commandBus)
    {
        $this->commandBus = $commandBus;
    }

    /**
     * @Route("/collection/new", methods={"POST"})
     */
    public function startCollectionAction(CollectionName $collectionName, UserId $userId): JsonResponse
    {
        $collectionId = CollectionId::generate();

        $this->commandBus->dispatch(new StartCollection($collectionId, $collectionName, $userId));

        return new JsonResponse(['id' => (string) $collectionId], JsonResponse::HTTP_CREATED);
    }
}
