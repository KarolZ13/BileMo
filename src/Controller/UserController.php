<?php

namespace App\Controller;

use App\Entity\Customer;
use App\Entity\User;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Contracts\Cache\TagAwareCacheInterface;
use Symfony\Contracts\Cache\ItemInterface;

#[Route('/api')]
class UserController extends AbstractController
{
    #[Route('/users', name: 'app_customer_users', methods:['GET'])]
    public function getUsersByCustomer(SerializerInterface $serializer, Security $security, TagAwareCacheInterface $cache): JsonResponse
    {
        $currentCustomer = $security->getUser();
    
        if ($currentCustomer instanceof Customer) {
            $customerId = $currentCustomer->getId();
            $idCache = "getUsersByCustomer_" . $customerId;
    
            $users = $cache->get($idCache, function (ItemInterface $item) use ($currentCustomer) {
                echo("L'élément n'est pas encore en cache !\n");
                $item->tag("userCache");
                return $currentCustomer->getUsers();
            });
    
            $jsonUsers = $serializer->serialize($users, 'json', ['groups' => 'getUsers']);
            
            return new JsonResponse($jsonUsers, Response::HTTP_OK, [], true);
        } else {
            return new JsonResponse(['message' => 'Access Denied'], Response::HTTP_FORBIDDEN);
        }
    }

    #[Route('/user/{id}/details', name: 'app_customer_user_details', methods:['GET'])]
    public function getUserDetailsByCustomer(User $user, SerializerInterface $serializer, UserRepository $userRepository, Security $security, TagAwareCacheInterface $cache): JsonResponse
    {
        $currentCustomer = $security->getUser();
    
        if ($currentCustomer) {
            // Assurez-vous que l'utilisateur est lié au client connecté
            if ($user->getCustomer() === $currentCustomer) {
                $userId = $user->getId();
                $idCache = "getUserDetailsByCustomer_" . $userId;
    
                $userDetails = $cache->get($idCache, function (ItemInterface $item) use ($userRepository, $userId) {
                    echo("L'élément n'est pas encore en cache !\n");
                    $item->tag("userDetailsCache");
                    return $userRepository->find($userId);
                });
    
                $jsonUsers = $serializer->serialize($userDetails, 'json', ['groups' => 'getUsers']);
    
                return new JsonResponse($jsonUsers, Response::HTTP_OK, [], true);
            } else {
                return new JsonResponse(['message' => 'Unauthorized access to user details'], Response::HTTP_FORBIDDEN);
            }
        } else {
            return new JsonResponse(['message' => 'Access Denied'], Response::HTTP_FORBIDDEN);
        }
    }

    #[Route('/user/add', name: 'app_customer_user_add', methods:['POST'])]
    public function addUser(Request $request, SerializerInterface $serializer, EntityManagerInterface $entityManager, Security $security): JsonResponse
    {
        $currentCustomer = $security->getUser();
    
        if ($currentCustomer) {
            $user = $serializer->deserialize($request->getContent(), User::class, 'json');
    
            $user->setCustomer($currentCustomer);
    
            $user->setCreatedAt(new \DateTimeImmutable());
    
            $entityManager->persist($user);
            $entityManager->flush();
    
            $jsonUser = $serializer->serialize($user, 'json', ['groups' => 'getUsers']);
            return new JsonResponse($jsonUser, Response::HTTP_CREATED, [], true);
        } else {
            return new JsonResponse(['message' => 'Access Denied'], Response::HTTP_FORBIDDEN);
        }
    }

    #[Route('/user/{id}/delete', name: 'app_customer_user_delete', methods:['DELETE'])]
    public function deleteUser(User $user, Security $security, EntityManagerInterface $entityManager): JsonResponse
    {
        $currentCustomer = $security->getUser();
    
        if ($currentCustomer) {
            if ($user->getCustomer() === $currentCustomer) {
    
                $entityManager->remove($user);
                $entityManager->flush();
    
                return new JsonResponse(['message' => 'User deleted successfully'], Response::HTTP_OK);
            } else {
                return new JsonResponse(['message' => 'Unauthorized access to delete user'], Response::HTTP_FORBIDDEN);
            }
        } else {
            return new JsonResponse(['message' => 'Access Denied'], Response::HTTP_FORBIDDEN);
        }
    }
}
