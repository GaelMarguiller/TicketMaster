<?php

namespace TicketBundle\Controller;

use TicketBundle\Entity\TicketEntity;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Ticketentity controller.
 *
 * @Route("ticketentity")
 */
class TicketEntityController extends Controller
{
    /**
     * Lists all ticketEntity entities.
     *
     * @Route("/", name="ticketentity_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $ticketEntities = $em->getRepository('TicketBundle:TicketEntity')->findAll();

        return $this->render('ticketentity/index.html.twig', array(
            'ticketEntities' => $ticketEntities,
        ));
    }

    /**
     * Creates a new ticketEntity entity.
     *
     * @Route("/new", name="ticketentity_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $ticketEntity = new Ticketentity();
        $form = $this->createForm('TicketBundle\Form\TicketEntityType', $ticketEntity);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($ticketEntity);
            $em->flush($ticketEntity);

            return $this->redirectToRoute('ticketentity_show', array('id' => $ticketEntity->getId()));
        }

        return $this->render('ticketentity/new.html.twig', array(
            'ticketEntity' => $ticketEntity,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a ticketEntity entity.
     *
     * @Route("/{id}", name="ticketentity_show")
     * @Method("GET")
     */
    public function showAction(TicketEntity $ticketEntity)
    {
        $deleteForm = $this->createDeleteForm($ticketEntity);

        return $this->render('ticketentity/show.html.twig', array(
            'ticketEntity' => $ticketEntity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing ticketEntity entity.
     *
     * @Route("/{id}/edit", name="ticketentity_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, TicketEntity $ticketEntity)
    {
        $deleteForm = $this->createDeleteForm($ticketEntity);
        $editForm = $this->createForm('TicketBundle\Form\TicketEntityType', $ticketEntity);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('ticketentity_edit', array('id' => $ticketEntity->getId()));
        }

        return $this->render('ticketentity/edit.html.twig', array(
            'ticketEntity' => $ticketEntity,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a ticketEntity entity.
     *
     * @Route("/{id}", name="ticketentity_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, TicketEntity $ticketEntity)
    {
        $form = $this->createDeleteForm($ticketEntity);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($ticketEntity);
            $em->flush($ticketEntity);
        }

        return $this->redirectToRoute('ticketentity_index');
    }

    /**
     * Creates a form to delete a ticketEntity entity.
     *
     * @param TicketEntity $ticketEntity The ticketEntity entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(TicketEntity $ticketEntity)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('ticketentity_delete', array('id' => $ticketEntity->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
