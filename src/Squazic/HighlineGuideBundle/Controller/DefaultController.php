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
        $conn = $this->get('database_connection');

        $sql = 'SELECT w.title, w.description, w.latitude, w.longitude, a.name FROM artwork w
                JOIN artist_artwork aa ON w.id = aa.artwork_id
                JOIN artist a ON aa.artist_id = a.id';

        $data = $conn->fetchAll($sql);

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
