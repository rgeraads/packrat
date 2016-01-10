<?php

namespace PackratBundle\Controller;

use PackratBundle\Entity\Collection;
use PackratBundle\Form\CollectionType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Collection controller.
 *
 */
class CollectionController extends Controller
{
    /**
     * Lists all Collection entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $collections = $em->getRepository('PackratBundle:Collection')->findAll();

        return $this->render('collection/index.html.twig', [
            'collections' => $collections,
        ]);
    }

    /**
     * Creates a new Collection entity.
     *
     */
    public function newAction(Request $request)
    {
        $collection = new Collection();
        $form       = $this->createForm(CollectionType::class, $collection);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($collection);
            $em->flush();

            return $this->redirectToRoute('collection_show', ['id' => $collection->getId()]);
        }

        return $this->render('collection/new.html.twig', [
            'collection' => $collection,
            'form'       => $form->createView(),
        ]);
    }

    /**
     * Finds and displays a Collection entity.
     *
     */
    public function showAction(Collection $collection)
    {
        $deleteForm = $this->createDeleteForm($collection);

        return $this->render('collection/show.html.twig', [
            'collection'  => $collection,
            'delete_form' => $deleteForm->createView(),
        ]);
    }

    /**
     * Displays a form to edit an existing Collection entity.
     *
     */
    public function editAction(Request $request, Collection $collection)
    {
        $deleteForm = $this->createDeleteForm($collection);
        $editForm   = $this->createForm(CollectionType::class, $collection);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($collection);
            $em->flush();

            return $this->redirectToRoute('collection_edit', ['id' => $collection->getId()]);
        }

        return $this->render('collection/edit.html.twig', [
            'collection'  => $collection,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ]);
    }

    /**
     * Deletes a Collection entity.
     *
     */
    public function deleteAction(Request $request, Collection $collection)
    {
        $form = $this->createDeleteForm($collection);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($collection);
            $em->flush();
        }

        return $this->redirectToRoute('collection_index');
    }

    /**
     * Creates a form to delete a Collection entity.
     *
     * @param Collection $collection The Collection entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Collection $collection)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('collection_delete', ['id' => $collection->getId()]))
            ->setMethod('DELETE')
            ->getForm();
    }
}
