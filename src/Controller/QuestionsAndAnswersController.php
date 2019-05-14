<?php

namespace App\Controller;

use App\Entity\QuestionsAndAnswers;
use App\Form\QuestionsAndAnswersType;
use App\Repository\QuestionsAndAnswersRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/")
 */
class QuestionsAndAnswersController extends AbstractController
{
    /**
     * @Route("/", name="questions_and_answers_index", methods={"GET"})
     */
    public function index(QuestionsAndAnswersRepository $questionsAndAnswersRepository, PaginatorInterface $paginator, Request $request): Response
    {
        $questions_and_answers = $questionsAndAnswersRepository->findAll();

        $result = $paginator->paginate(
            $questions_and_answers,
            $request->query->getInt('page', 1),
            $request->query->getInt('limit', 3)
        );

        return $this->render('questions_and_answers/index.html.twig', [
//            'questions_and_answers' => $questionsAndAnswersRepository->findAll(),
            'questions_and_answers' => $result,
        ]);
    }

    /**
     * @Route("/new", name="questions_and_answers_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $questionsAndAnswer = new QuestionsAndAnswers();
        $form = $this->createForm(QuestionsAndAnswersType::class, $questionsAndAnswer);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($questionsAndAnswer);
            $entityManager->flush();

            return $this->redirectToRoute('questions_and_answers_index');
        }

        return $this->render('questions_and_answers/new.html.twig', [
            'questions_and_answer' => $questionsAndAnswer,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="questions_and_answers_show", methods={"GET"})
     */
    public function show(QuestionsAndAnswers $questionsAndAnswer): Response
    {
        return $this->render('questions_and_answers/show.html.twig', [
            'questions_and_answer' => $questionsAndAnswer,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="questions_and_answers_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, QuestionsAndAnswers $questionsAndAnswer): Response
    {
        $form = $this->createForm(QuestionsAndAnswersType::class, $questionsAndAnswer);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('questions_and_answers_index', [
                'id' => $questionsAndAnswer->getId(),
            ]);
        }

        return $this->render('questions_and_answers/edit.html.twig', [
            'questions_and_answer' => $questionsAndAnswer,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="questions_and_answers_delete", methods={"DELETE"})
     */
    public function delete(Request $request, QuestionsAndAnswers $questionsAndAnswer): Response
    {
        if ($this->isCsrfTokenValid('delete'.$questionsAndAnswer->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($questionsAndAnswer);
            $entityManager->flush();
        }

        return $this->redirectToRoute('questions_and_answers_index');
    }
}
