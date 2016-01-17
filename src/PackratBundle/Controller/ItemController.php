<?php

namespace PackratBundle\Controller;

use PackratBundle\Entity\Item;
use PackratBundle\Form\ItemType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Item controller.
 *
 */
class ItemController extends Controller
{
    /**
     * Lists all Item entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $items = $em->getRepository('PackratBundle:Item')->findAll();

        return $this->render('item/index.html.twig', [
            'items' => $items,
        ]);
    }

    /**
     * Creates a new Item entity.
     *
     */
    public function newAction(Request $request)
    {
        $item = new Item();
        $form = $this->createForm(ItemType::class, $item);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($item);
            $em->flush();

            return $this->redirectToRoute('item_show', ['id' => $item->getId()]);
        }

        return $this->render('item/new.html.twig', [
            'item' => $item,
            'form' => $form->createView(),
        ]);
    }

    /**
     * Finds and displays a Item entity.
     *
     */
    public function showAction(Item $item)
    {
        $deleteForm = $this->createDeleteForm($item);

        $exchangeRate = '';
        if ($item->getCurrency() !== 'EUR') {
            $em           = $this->getDoctrine()->getManager();
            $exchangeRate = $em->getRepository('PackratBundle:ExchangeRate')
                ->findOneBy(['currency' => $item->getCurrency()])->getToEur();
        }

        return $this->render('item/show.html.twig', [
            'item'          => $item,
            'exchange_rate' => $exchangeRate,
            'delete_form'   => $deleteForm->createView(),
        ]);
    }

    /**
     * Displays a form to edit an existing Item entity.
     *
     */
    public function editAction(Request $request, Item $item)
    {
        $deleteForm = $this->createDeleteForm($item);
        $editForm   = $this->createForm(ItemType::class, $item);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($item);
            $em->flush();

            return $this->redirectToRoute('item_edit', ['id' => $item->getId()]);
        }

        return $this->render('item/edit.html.twig', [
            'item'        => $item,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ]);
    }

    /**
     * Deletes a Item entity.
     *
     */
    public function deleteAction(Request $request, Item $item)
    {
        $form = $this->createDeleteForm($item);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($item);
            $em->flush();
        }

        return $this->redirectToRoute('item_index');
    }

    /**
     * Creates a form to delete a Item entity.
     *
     * @param Item $item The Item entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Item $item)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('item_delete', ['id' => $item->getId()]))
            ->setMethod('DELETE')
            ->getForm();
    }
}
