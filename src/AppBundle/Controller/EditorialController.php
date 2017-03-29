<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Editorial;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Editorial controller.
 *
 */
class EditorialController extends Controller
{
    /**
     * Lists all editorial entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $editorials = $em->getRepository('AppBundle:Editorial')->findAll();

        return $this->render('editorial/index.html.twig', array(
            'editorials' => $editorials,
        ));
    }

    /**
     * Creates a new editorial entity.
     *
     */
    public function newAction(Request $request)
    {
        $editorial = new Editorial();
        $form = $this->createForm('AppBundle\Form\EditorialType', $editorial);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($editorial);
            $em->flush($editorial);

            return $this->redirectToRoute('editorial_show', array('id' => $editorial->getId()));
        }

        return $this->render('editorial/new.html.twig', array(
            'editorial' => $editorial,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a editorial entity.
     *
     */
    public function showAction(Editorial $editorial)
    {
        $deleteForm = $this->createDeleteForm($editorial);

        return $this->render('editorial/show.html.twig', array(
            'editorial' => $editorial,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing editorial entity.
     *
     */
    public function editAction(Request $request, Editorial $editorial)
    {
        $deleteForm = $this->createDeleteForm($editorial);
        $editForm = $this->createForm('AppBundle\Form\EditorialType', $editorial);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('editorial_index');
        }

        return $this->render('editorial/edit.html.twig', array(
            'editorial' => $editorial,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a editorial entity.
     *
     */
    public function deleteAction(Request $request, Editorial $editorial)
    {
        $form = $this->createDeleteForm($editorial);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($editorial);
            $em->flush();
        }

        return $this->redirectToRoute('editorial_index');
    }

    /**
     * Creates a form to delete a editorial entity.
     *
     * @param Editorial $editorial The editorial entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Editorial $editorial)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('editorial_delete', array('id' => $editorial->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
