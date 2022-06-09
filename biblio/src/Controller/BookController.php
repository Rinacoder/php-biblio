<?php

namespace App\Controller;

use App\Entity\Book;
use App\Form\BookType;
use App\Repository\BookRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/book')]
class BookController extends AbstractController
{
    //Получение списка всех книг и вывод их на главную страницу
<<<<<<< HEAD
=======
    // Входные данные
    // BookRepository
    // Выходные данные
    // Форма с информацией о всех книгах
>>>>>>> f07c1e0 (Initial commit)
    #[Route('/', name: 'app_book_index', methods: ['GET'])]
    public function index(BookRepository $bookRepository): Response
    {
        return $this->render('book/index.html.twig', [
            'books' => $bookRepository->findAll(),
        ]);
    }

    //создание новой книги
<<<<<<< HEAD
=======
    // Входные данные
    // BookRepository
    // Request - нужно для получения информации о залогинившемся пользователе
    // Выходные данные
    // Форма с информацией о конкретной книге
>>>>>>> f07c1e0 (Initial commit)
    #[Route('/new', name: 'app_book_new', methods: ['GET', 'POST'])]
    public function new(Request $request, BookRepository $bookRepository): Response
    {
        $book = new Book();
        $user = $this->getUser();
        $book->setDateAdded(new \DateTime('now'));
        $book->setUser($user);
        $form = $this->createForm(BookType::class, $book);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $bookRepository->add($book, true);

            return $this->redirectToRoute('app_book_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('book/new.html.twig', [
            'book' => $book,
            'form' => $form,
        ]);
    }

    //редактировать книгу
<<<<<<< HEAD
=======
    // Входные данные
    // BookRepository
    // book - (объект) конкретная книга, информацию о которой нужно изменить
    // request - нужно для получения информации о залогинившемся пользователе
    // Выходные данные
    // Форма с информацией о конкретной книге, если получилось добавить книгу, или информация о всех книгах пользователя
>>>>>>> f07c1e0 (Initial commit)
    #[Route('/{id}/edit', name: 'app_book_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Book $book, BookRepository $bookRepository): Response
    {
        $form = $this->createForm(BookType::class, $book);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $bookRepository->add($book, true);

            return $this->redirectToRoute('app_book_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('book/edit.html.twig', [
            'book' => $book,
            'form' => $form,
        ]);
    }

    //удалить книгу
<<<<<<< HEAD
=======
    // Входные данные
    // bookRepository
    // book - (объект) конкретная книга, которую нужно удалить
    // request - нужно для получения информации о залогинившемся пользователе
    // Выходные данные
    // Редирект на app_book_index
>>>>>>> f07c1e0 (Initial commit)
    #[Route('/{id}', name: 'app_book_delete', methods: ['POST'])]
    public function delete(Request $request, Book $book, BookRepository $bookRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$book->getId(), $request->request->get('_token'))) {
            $bookRepository->remove($book, true);
        }

        return $this->redirectToRoute('app_book_index', [], Response::HTTP_SEE_OTHER);
    }
}
