<?php

namespace Recruiter\Controller;

use Doctrine\ORM\EntityManager;
use General\Entity\ActiveJobCountry;
use General\Entity\JobApplyLinkType;
use General\Entity\JobScreeningQuestions;
use General\Entity\JobSkills;
use General\Entity\Marketing;
use General\Entity\PostjobType;
use General\Entity\PostJobWorkplaceType;
use Laminas\InputFilter\InputFilter;
use Laminas\Mvc\Controller\AbstractActionController;
use Laminas\View\Model\JsonModel;
use Laminas\View\Model\ViewModel;
use Recruiter\Entity\RecruiterJob;
use Recruiter\Entity\RecruiterJobPosition;
use Recruiter\Service\RecruiterService;

class RecruiterController extends AbstractActionController
{

    /**
     * Undocumented variable
     *
     * @var EntityManager
     */
    private EntityManager $entityManager;

    /**
     * Undocumented variable
     *
     * @var RecruiterService
     */
    private RecruiterService $recruiterService;


    public function indexAction()
    {
        $view = new ViewModel();
        return $view;
    }
    public function postJobAction()
    {
        $viewModel = new ViewModel();
        $jsonModel = new JsonModel();
        $request = $this->getRequest();
        $response = $this->getResponse();
        $em = $this->entityManager;
        if ($request->isPost()) {
            $post = $request->getPost();
            $inputFilter = new InputFilter();
            $inputFilter->add(array(
                'name' => 'jobTitle',
                'required' => true,
                'allow_empty' => false,
                'filters' => array(
                    array(
                        'name' => 'StripTags'
                    ),
                    array(
                        'name' => 'StringTrim'
                    )
                ),
                'validators' => array(
                    array(
                        'name' => 'NotEmpty',
                        'options' => array(
                            'messages' => array(
                                'isEmpty' => 'Job title is required'
                            )
                        )
                    )
                )
            ));
            $inputFilter->add(array(
                'name' => 'jobType',
                'required' => true,
                'allow_empty' => false,
                'filters' => array(
                    array(
                        'name' => 'StripTags'
                    ),
                    array(
                        'name' => 'StringTrim'
                    )
                ),
                'validators' => array(
                    array(
                        'name' => 'NotEmpty',
                        'options' => array(
                            'messages' => array(
                                'isEmpty' => 'Job title cannot be null'
                            )
                        )
                    )
                )
            ));

            $inputFilter->add(array(
                'name' => 'workplaceType',
                'required' => true,
                'allow_empty' => false,
                'filters' => array(
                    array(
                        'name' => 'StripTags'
                    ),
                    array(
                        'name' => 'StringTrim'
                    )
                ),
                'validators' => array(
                    array(
                        'name' => 'NotEmpty',
                        'options' => array(
                            'messages' => array(
                                'isEmpty' => 'Work Place cannot be null'
                            )
                        )
                    )
                )
            ));

            $inputFilter->add(array(
                'name' => 'country',
                'required' => true,
                'allow_empty' => false,
                'filters' => array(
                    array(
                        'name' => 'StripTags'
                    ),
                    array(
                        'name' => 'StringTrim'
                    )
                ),
                'validators' => array(
                    array(
                        'name' => 'NotEmpty',
                        'options' => array(
                            'messages' => array(
                                'isEmpty' => 'Active Country cannot be null'
                            )
                        )
                    )
                )
            ));

            $inputFilter->add(array(
                'name' => 'jobDescription',
                'required' => true,
                'allow_empty' => false,
                'filters' => array(
                    // array(
                    //     'name' => 'StripTags'
                    // ),
                    array(
                        'name' => 'StringTrim'
                    )
                ),
                'validators' => array(
                    array(
                        'name' => 'NotEmpty',
                        'options' => array(
                            'messages' => array(
                                'isEmpty' => 'Active Country cannot be null'
                            )
                        )
                    )
                )
            ));

            $inputFilter->add(array(
                'name' => 'jobPosition',
                'required' => true,
                'allow_empty' => false,
                'filters' => array(
                    // array(
                    //     'name' => 'StripTags'
                    // ),
                    array(
                        'name' => 'StringTrim'
                    )
                ),
                'validators' => array(
                    array(
                        'name' => 'NotEmpty',
                        'options' => array(
                            'messages' => array(
                                'isEmpty' => 'Active Country cannot be null'
                            )
                        )
                    )
                )
            ));

            $inputFilter->add(array(
                'name' => 'skills',
                'required' => true,
                'allow_empty' => false,
                'filters' => array(
                    // array(
                    //     'name' => 'StripTags'
                    // ),
                    array(
                        'name' => 'StringTrim'
                    )
                ),
                'validators' => array(
                    array(
                        'name' => 'NotEmpty',
                        'options' => array(
                            'messages' => array(
                                'isEmpty' => 'Active Country cannot be null'
                            )
                        )
                    )
                )
            ));



            $inputFilter->add(array(
                'name' => 'filterQuestions',
                'required' => true,
                'allow_empty' => false,
                'filters' => array(
                    // array(
                    //     'name' => 'StripTags'
                    // ),
                    array(
                        'name' => 'StringTrim'
                    )
                ),
                'validators' => array(
                    array(
                        'name' => 'NotEmpty',
                        'options' => array(
                            'messages' => array(
                                'isEmpty' => 'Active Country cannot be null'
                            )
                        )
                    )
                )
            ));

            // $inputFilter->add(array(
            //     'name' => 'associatedCompany',
            //     'required' => true,
            //     'allow_empty' => false,
            //     'filters' => array(
            //         // array(
            //         //     'name' => 'StripTags'
            //         // ),
            //         array(
            //             'name' => 'StringTrim'
            //         )
            //     ),
            //     'validators' => array(
            //         array(
            //             'name' => 'NotEmpty',
            //             'options' => array(
            //                 'messages' => array(
            //                     'isEmpty' => 'Active Country cannot be null'
            //                 )
            //             )
            //         )
            //     )
            // ));

            $inputFilter->add(array(
                'name' => 'applyLink',
                'required' => true,
                'allow_empty' => false,
                'filters' => array(
                    array(
                        'name' => 'StripTags'
                    ),
                    array(
                        'name' => 'StringTrim'
                    )
                ),
                'validators' => array(
                    array(
                        'name' => 'NotEmpty',
                        'options' => array(
                            'messages' => array(
                                'isEmpty' => 'Active Country cannot be null'
                            )
                        )
                    )
                )
            ));

            $inputFilter->add(array(
                'name' => 'externalLink',
                'required' => false,
                'allow_empty' => true,
                'filters' => array(
                    array(
                        'name' => 'StripTags'
                    ),
                    array(
                        'name' => 'StringTrim'
                    )
                ),
                'validators' => array(
                    // array(
                    //     'name' => 'NotEmpty',
                    //     'options' => array(
                    //         'messages' => array(
                    //             'isEmpty' => 'Active Country cannot be null'
                    //         )
                    //     )
                    // )
                )
            ));

            $inputFilter->add(array(
                'name' => 'marketing',
                'required' => true,
                'allow_empty' => false,
                'filters' => array(
                    array(
                        'name' => 'StripTags'
                    ),
                    array(
                        'name' => 'StringTrim'
                    )
                ),
                'validators' => array(
                    array(
                        'name' => 'NotEmpty',
                        'options' => array(
                            'messages' => array(
                                'isEmpty' => 'Please select how you got to know about us'
                            )
                        )
                    )
                )
            ));

            $inputFilter->add(array(
                'name' => 'otherMarketing',
                'required' => false,
                'allow_empty' => true,
                'filters' => array(
                    // array(
                    //     'name' => 'StripTags'
                    // ),
                    array(
                        'name' => 'StringTrim'
                    )
                ),
                'validators' => array(
                    // array(
                    //     'name' => 'NotEmpty',
                    //     'options' => array(
                    //         'messages' => array(
                    //             'isEmpty' => 'Active Country cannot be null'
                    //         )
                    //     )
                    // )
                )
            ));


            $inputFilter->setData($post);
            if ($inputFilter->isValid()) {
                $data = $inputFilter->getValues();
                try {
                    $res =  $this->recruiterService->postjob($data);
                    $response->setStatusCode(201);
                    $jsonModel->setVariables([
                        "data" => $res,
                        "success" => true
                    ]);
                    return $jsonModel;
                } catch (\Throwable $th) {
                    $jsonModel->setVariables([
                        "success" => false,
                        "messages" => $th->getMessage(),
                    ]);
                    $response->setStatusCode(401);
                    return $jsonModel;
                }
            } else {
                $jsonModel->setVariables([
                    "success" => false,
                    "message" => $inputFilter->getMessages()
                ]);
                $response->setStatusCode(401);
                return $jsonModel;
            }
        }
        return $viewModel;
    }

    public function viewJobAction()
    {
        $viewModel = new ViewModel();
        $id = $this->params()->fromRoute("id", NULL);
        $em = $this->entityManager;
        if ($id == NULL) {
            // redirect to another post job page
            $this->redirect()->toRoute("recruiter", ["action" => "post-job"]);
        }
        $data = $em->getRepository(RecruiterJob::class)->findOneBy([
            "uuid" => $id
        ]);
        $viewModel->setVariable("data", $data);

        return $viewModel;
    }

    public function searchJobPositionAction()
    {
        $em = $this->entityManager;
        $jsonModel = new JsonModel();
        $id = $this->params()->fromRoute("id", NULL);
        if ($id != NULL) {
            $data = $em->getRepository(RecruiterJobPosition::class)
                ->createQueryBuilder("l")
                ->select([
                    "l"
                ])
                ->where('l.position LIKE :word')
                ->setParameter('word', '%' . $id . '%')
                ->setMaxResults(12)
                ->getQuery()
                // ->setHydrationMode(Query::HYDRATE_ARRAY)
                ->getArrayResult();
            $jsonModel->setVariable("data", $data);
        }

        return $jsonModel;
    }

    public function getRecruiterCompanyAction()
    {
        $jsonModel = new JsonModel();
        $em = $this->entityManager;
        // $data = $em->getRepository()
        return $jsonModel;
    }

    public function getJobTypeAction()
    {
        $jsonModel = new JsonModel();
        $em = $this->entityManager;
        $data = $em->getRepository(PostjobType::class)->createQueryBuilder("j")
            ->select("j")
            ->getQuery()
            ->getArrayResult();
        $jsonModel->setVariables([
            'data' => $data
        ]);
        return $jsonModel;
    }

    public function getWorkplaceTypeAction()
    {
        $jsonModel = new JsonModel();
        $em = $this->entityManager;
        $data = $em->getRepository(PostJobWorkplaceType::class)->createQueryBuilder("j")
            ->select("j")
            ->getQuery()
            ->getArrayResult();
        $jsonModel->setVariables([
            'data' => $data
        ]);
        return $jsonModel;
    }


    public function getActiveCountryAction()
    {
        $jsonModel = new JsonModel();
        $em = $this->entityManager;
        $data = $em->getRepository(ActiveJobCountry::class)->createQueryBuilder("j")
            ->select("j")
            ->getQuery()
            ->getArrayResult();
        $jsonModel->setVariables([
            'data' => $data
        ]);
        return $jsonModel;
    }


    public function getJobApplyLinksAction()
    {
        $jsonModel = new JsonModel();
        $em = $this->entityManager;
        $data = $em->getRepository(JobApplyLinkType::class)->createQueryBuilder("j")
            ->select("j")
            ->getQuery()
            ->getArrayResult();
        $jsonModel->setVariables([
            'data' => $data
        ]);
        return $jsonModel;
    }

    public function getJobSkillsAction()
    {
        $jsonModel = new JsonModel();
        $em = $this->entityManager;
        $data = $em->getRepository(JobSkills::class)->createQueryBuilder("j")
            ->select("j")
            ->getQuery()
            ->getArrayResult();
        $jsonModel->setVariables([
            'data' => $data
        ]);
        return $jsonModel;
    }

    public function getMarketingAction()
    {
        $jsonModel = new JsonModel();
        $em = $this->entityManager;
        $data = $em->getRepository(Marketing::class)->createQueryBuilder("j")
            ->select("j")
            ->getQuery()
            ->getArrayResult();
        $jsonModel->setVariables([
            'data' => $data
        ]);
        return $jsonModel;
    }

    public function getJobScreeningQuastionsAction()
    {
        $jsonModel = new JsonModel();
        $em = $this->entityManager;
        $data = $em->getRepository(JobScreeningQuestions::class)->createQueryBuilder("j")
            ->select("j")
            ->getQuery()
            ->getArrayResult();
        $jsonModel->setVariables([
            'data' => $data
        ]);
        return $jsonModel;
    }

    public function getCountryAction()
    {
        $jsonModel = new JsonModel();
        $em = $this->entityManager;
        $data = $em->getRepository(ActiveJobCountry::class)->createQueryBuilder("j")
            ->select(["j.id", "j.country", "j.flag"])
            ->getQuery()
            ->getArrayResult();
        $jsonModel->setVariables([
            'data' => $data
        ]);
        return $jsonModel;
    }

    public function searchSkillsAction()
    {

        $em = $this->entityManager;
        $jsonModel = new JsonModel();
        $id = $this->params()->fromRoute("id", NULL);
        if ($id != NULL) {
            $data = $em->getRepository(JobSkills::class)
                ->createQueryBuilder("l")
                ->select([
                    "l"
                ])
                ->where('l.skill LIKE :word')
                ->setParameter('word', '%' . $id . '%')
                ->setMaxResults(12)
                ->getQuery()
                // ->setHydrationMode(Query::HYDRATE_ARRAY)
                ->getArrayResult();
            $jsonModel->setVariable("data", $data);
        }

        return $jsonModel;
    }

    /**
     * Set undocumented variable
     *
     * @param  EntityManager  $entityManager  Undocumented variable
     *
     * @return  self
     */
    public function setEntityManager(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;

        return $this;
    }

    /**
     * Set undocumented variable
     *
     * @param  RecruiterService  $recruiterService  Undocumented variable
     *
     * @return  self
     */
    public function setRecruiterService(RecruiterService $recruiterService)
    {
        $this->recruiterService = $recruiterService;

        return $this;
    }
}
