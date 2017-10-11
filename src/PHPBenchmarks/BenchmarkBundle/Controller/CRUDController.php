<?php

namespace PHPBenchmarks\BenchmarkBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use PHPBenchmarks\BenchmarkBundle\Entity\CRUD;

class CRUDController extends Controller
{
    /**
     * @return Response
     */
    public function crudAction()
    {
        $crud = $this->create();
//        $crud = $this->read($crud);
//        $this->update($crud);
//        $this->delete($crud);

        return new Response();
    }

    /**
     * @return CRUD
     */
    protected function create()
    {
        $manager = $this->get('doctrine')->getManager();
        $crud = new CRUD();
        $crud
            ->setFirstName('Steevan')
            ->setLastName('BARBOYON')
            ->setEmail('steevan.barboyon@gmail.com')
            ->setMessage('php-benchmarks, the first php benchmarks site !');
        $manager->persist($crud);
        $manager->flush();

        $manager->clear();

        return $crud;
    }

    /**
     * @param CRUD $crud
     */
    protected function read(CRUD $crud)
    {
        return $this->get('doctrine')->getRepository('BenchmarkBundle:CRUD')->findOneById($crud->getId());
    }

    /**
     * @param CRUD $crud
     */
    protected function update(CRUD $crud)
    {
        $crud
            ->setFirstName('InfoDroid')
            ->setLastName('InfoDroid')
            ->setEmail('contact@info-droid.fr')
            ->setMessage('php-benchmarks, the ultimate php benchmarks site !');

        $this->get('doctrine')->getManager()->flush();
    }

    /**
     * @param CRUD $crud
     */
    protected function delete(CRUD $crud)
    {
        $manager = $this->get('doctrine')->getManager();
        $manager->remove($crud);
        $manager->flush();
    }
}
