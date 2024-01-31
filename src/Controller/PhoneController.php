<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\PhoneRepository;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\HttpFoundation\Response;

class PhoneController extends AbstractController
{
    #[Route('/phones', name: 'app_phone')]
    public function getPhones(PhoneRepository $phoneRepository, SerializerInterface $serializer): JsonResponse
    {

        $phones = $phoneRepository->findAll();

        $jsonPhones = $serializer->serialize($phones, 'json');
        return new JsonResponse($jsonPhones, Response::HTTP_OK, [], true);
    }
}
