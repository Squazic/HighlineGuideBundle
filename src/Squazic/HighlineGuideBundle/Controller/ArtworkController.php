<?php

namespace Squazic\HighlineGuideBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Squazic\HighlineGuideBundle\Entity\Artwork;
use Squazic\HighlineGuideBundle\Form\ArtworkType;

/**
 * Artwork controller.
 *
 */
class ArtworkController extends Controller
{
    /**
     * Lists all Artwork entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('SquazicHighlineGuideBundle:Artwork')->findAll();

        return $this->render('SquazicHighlineGuideBundle:Artwork:index.html.twig', array(
            'entities' => $entities,
        ));
    }

    /**
     * Finds and displays a Artwork entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SquazicHighlineGuideBundle:Artwork')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Artwork entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('SquazicHighlineGuideBundle:Artwork:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to create a new Artwork entity.
     *
     */
    public function newAction()
    {
        $entity = new Artwork();
        $form   = $this->createForm(new ArtworkType(), $entity);

        return $this->render('SquazicHighlineGuideBundle:Artwork:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a new Artwork entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity  = new Artwork();
        $form = $this->createForm(new ArtworkType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('artwork_show', array('id' => $entity->getId())));
        }

        return $this->render('SquazicHighlineGuideBundle:Artwork:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Artwork entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SquazicHighlineGuideBundle:Artwork')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Artwork entity.');
        }

        $editForm = $this->createForm(new ArtworkType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('SquazicHighlineGuideBundle:Artwork:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing Artwork entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SquazicHighlineGuideBundle:Artwork')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Artwork entity.');
        }

        $originalArtists = $entity->getArtist()->toArray();

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new ArtworkType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            // Make sure only selected artists are associated
            $checkedArtists = $entity->getArtist()->toArray();

            // Remove old ones
            foreach($originalArtists as $artist) {
                if (!in_array($artist, $checkedArtists)) {
                    $artist->removeArtwork($entity);
                    $em->persist($artist);
                }
            }

            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('artwork_edit', array('id' => $id)));
        }

        return $this->render('SquazicHighlineGuideBundle:Artwork:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Artwork entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('SquazicHighlineGuideBundle:Artwork')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Artwork entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('artwork'));
    }

    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
}
