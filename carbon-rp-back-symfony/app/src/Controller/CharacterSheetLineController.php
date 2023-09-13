<?php

namespace App\Controller;

use App\Entity\CharacterSheetLine;
use App\Form\CharacterSheetLineType;
use App\Repository\CharacterSheetLineRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/character/sheet/line')]
class CharacterSheetLineController extends AbstractController
{
    #[Route('/', name: 'app_character_sheet_line_index', methods: ['GET'])]
    public function index(CharacterSheetLineRepository $characterSheetLineRepository): Response
    {
        return $this->render('character_sheet_line/index.html.twig', [
            'character_sheet_lines' => $characterSheetLineRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_character_sheet_line_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $characterSheetLine = new CharacterSheetLine();
        $form = $this->createForm(CharacterSheetLineType::class, $characterSheetLine);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($characterSheetLine);
            $entityManager->flush();

            return $this->redirectToRoute('app_character_sheet_line_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('character_sheet_line/new.html.twig', [
            'character_sheet_line' => $characterSheetLine,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_character_sheet_line_show', methods: ['GET'])]
    public function show(CharacterSheetLine $characterSheetLine): Response
    {
        return $this->render('character_sheet_line/show.html.twig', [
            'character_sheet_line' => $characterSheetLine,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_character_sheet_line_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, CharacterSheetLine $characterSheetLine, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(CharacterSheetLineType::class, $characterSheetLine);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_character_sheet_line_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('character_sheet_line/edit.html.twig', [
            'character_sheet_line' => $characterSheetLine,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_character_sheet_line_delete', methods: ['POST'])]
    public function delete(Request $request, CharacterSheetLine $characterSheetLine, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$characterSheetLine->getId(), $request->request->get('_token'))) {
            $entityManager->remove($characterSheetLine);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_character_sheet_line_index', [], Response::HTTP_SEE_OTHER);
    }
}
