<?php

namespace CommentBundle\Controller;

use CommentBundle\Entity\CommentEntity;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Commententity controller.
 *
 * @Route("comment")
 */
class CommentEntityController extends Controller
{
    /**
     * Lists all commentEntity entities.
     *
     * @Route("/", name="comment_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $commentEntities = $em->getRepository('CommentBundle:CommentEntity')->findAll();

        return $this->render('commententity/index.html.twig', array(
            'commentEntities' => $commentEntities,
        ));
    }

    /**
     * Creates a new commentEntity entity.
     *
     * @Route("/new", name="comment_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $commentEntity = new Commententity();
        $form = $this->createForm('CommentBundle\Form\CommentEntityType', $commentEntity);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($commentEntity);
            $em->flush($commentEntity);

            return $this->redirectToRoute('comment_show', array('id' => $commentEntity->getId()));
        }

        return $this->render('commententity/new.html.twig', array(
            'commentEntity' => $commentEntity,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a commentEntity entity.
     *
     * @Route("/{id}", name="comment_show")
     * @Method("GET")
     */
    public function showAction(CommentEntity $commentEntity)
    {
        $deleteForm = $this->createDeleteForm($commentEntity);

        return $this->render('commententity/show.html.twig', array(
            'commentEntity' => $commentEntity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing commentEntity entity.
     *
     * @Route("/{id}/edit", name="comment_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, CommentEntity $commentEntity)
    {
        $deleteForm = $this->createDeleteForm($commentEntity);
        $editForm = $this->createForm('CommentBundle\Form\CommentEntityType', $commentEntity);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('comment_edit', array('id' => $commentEntity->getId()));
        }

        return $this->render('commententity/edit.html.twig', array(
            'commentEntity' => $commentEntity,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a commentEntity entity.
     *
     * @Route("/{id}", name="comment_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, CommentEntity $commentEntity)
    {
        $form = $this->createDeleteForm($commentEntity);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($commentEntity);
            $em->flush($commentEntity);
        }

        return $this->redirectToRoute('comment_index');
    }

    /**
     * Creates a form to delete a commentEntity entity.
     *
     * @param CommentEntity $commentEntity The commentEntity entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(CommentEntity $commentEntity)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('comment_delete', array('id' => $commentEntity->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
