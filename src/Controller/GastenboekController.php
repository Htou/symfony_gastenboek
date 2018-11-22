<?php

namespace App\Controller;

use App\Entity\Gastenboek;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;


use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
class GastenboekController extends AbstractController
{
    /**
     * @Route("/", name="gastenboek", methods={"GET"})
     */
    public function index()
    {
        $gastenboek = $this->getDoctrine()->getRepository(Gastenboek::class)->findAll();

        return $this->render('gastenboek/index.html.twig', [
            'gastenboek' => $gastenboek
        ]);
    }

    /**
     * @route("/gastenboek/nieuw", name="nieuw_gastenboek", methods={"GET", "POST"})
     *
     */
    public function new(Request $request)
    {
        $gastenboekItem = new Gastenboek;

        $form = $this->createFormBuilder($gastenboekItem)
            ->add('naam', TextType::class, ['attr' => ['class' => 'form-control']])
            ->add('email', TextType::class, ['attr' => ['class' => 'form-control']])
            ->add('titel', TextType::class, ['attr' => ['class' => 'form-control']])
            ->add('body', TextareaType::class, ['required' => false, 'attr' => ['class' => 'form-control']])
            ->add('save', SubmitType::class, ['label' => 'Opslaan', 'attr' => ['class' => 'btn btn-primary mt-3']])
            ->getForm();

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid())
        {
            $gastenboekItem = $form->getData();

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($gastenboekItem);
            $entityManager->flush();

            return $this->redirectToRoute('gastenboek');
        }

        return $this->render('gastenboek/nieuw.html.twig', [
            'form' => $form->createView()
        ]);
    }


    /**
     * @route("/gastenboek/bewerken/{id}", name="bewerk_gastenboek", methods={"GET", "POST"})
     *
     */
    public function bewerken(Request $request, $id)
    {
        $gastenboekItem = new Gastenboek();
        $gastenboekItem = $this->getDoctrine()->getRepository(Gastenboek::class)->find($id);

        $form = $this->createFormBuilder($gastenboekItem)
            ->add('naam', TextType::class, ['attr' => ['class' => 'form-control']])
            ->add('email', TextType::class, ['attr' => ['class' => 'form-control']])
            ->add('titel', TextType::class, ['attr' => ['class' => 'form-control']])
            ->add('body', TextareaType::class, ['required' => false, 'attr' => ['class' => 'form-control']])
            ->add('save', SubmitType::class, ['label' => 'Bewerken', 'attr' => ['class' => 'btn btn-primary mt-3']])
            ->getForm();

        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->flush();
            return $this->redirectToRoute('gastenboek');
        }
        return $this->render('gastenboek/bewerken.html.twig', ['form' => $form->createView()
    ]);
    }

    /**
     * @Route("/gastenboek/{id}", name="gastenboek_show")
     */
    public function show($id)
    {
        $gastenboekItem = $this->getDoctrine()->getRepository(Gastenboek::class)->find($id);

        return $this->render('gastenboek/show.html.twig', ['gastenboekItem' => $gastenboekItem]);
    }

    /**
     * @Route("/gastenboek/delete/{id}", methods={"DELETE"})
     */
    public function delete(Request $request, $id)
    {
        $gastenboekItem = $this->getDoctrine()->getRepository(Gastenboek::class)->find($id);

        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->remove($gastenboekItem);
        $entityManager->flush();

        $response = new Response();
        $response->send();
    }

}
