<?php

namespace Squazic\HighlineGuideBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\SecurityContext;
use Symfony\Component\HttpFoundation\JsonResponse;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('SquazicHighlineGuideBundle:Default:index.html.twig');
    }

    public function dataAction()
    {
        $em = $this->getDoctrine()->getEntityManager();
        $artworks = $em->createQueryBuilder()
            ->select('w')
            ->from('SquazicHighlineGuideBundle:Artwork', 'w')
            ->join('w.artist', 'a')
            ->getQuery()->getResult();

        $data = array();
        foreach($artworks as $artwork) {
            $artworkData['title'] = $artwork->getTitle();
            $artworkData['description'] = $artwork->getDescription();
            $artworkData['latitude'] = $artwork->getLatitude();
            $artworkData['longitude'] = $artwork->getLongitude();
            $artists = $artwork->getArtist()->toArray();

            if(count($artists) === 1) {
                $artworkData['artists'] = current($artists)->getName();
            } else {
                $artistNames = array();
                foreach($artists as $artist) {
                    $artistNames[] = $artist->getName();
                }
                $artworkData['artists'] = $artistNames;
            }
            $data[] = $artworkData;
        }

        return new JsonResponse($data);
    }

    /**
     * @Template()
     */
    public function loginAction()
    {
        if ($this->get('request')->attributes->has(SecurityContext::AUTHENTICATION_ERROR)) {
            $error = $this->get('request')->attributes->get(SecurityContext::AUTHENTICATION_ERROR);
        } else {
            $error = $this->get('request')->getSession()->get(SecurityContext::AUTHENTICATION_ERROR);
        }

        return array(
            'last_username' => $this->get('request')->getSession()->get(SecurityContext::LAST_USERNAME),
            'error'         => $error,
        );
    }
}
