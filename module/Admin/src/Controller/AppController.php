<?php

namespace Admin\Controller;

use Application\Entity\Newsletter;
use Application\Entity\NewsletterCategory;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Query;
use Doctrine\ORM\Tools\Pagination\Paginator;
use General\Service\GeneralService;
use General\Service\UploadService;
use Laminas\Filter\StringTrim;
use Laminas\Filter\StripTags;
use Laminas\InputFilter\InputFilter;
use Laminas\Mvc\Controller\AbstractActionController;
use Laminas\Mvc\MvcEvent;
use Laminas\Validator\File\Extension;
use Laminas\Validator\File\Size;
use Laminas\View\Model\JsonModel;
use Laminas\View\Model\ViewModel;
use Ramsey\Uuid\Uuid;

class AppController extends AbstractActionController
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
     * @var UploadService
     */
    private UploadService $uploadService;

    // private 

    public function onDispatch(MvcEvent $e)
    {
        $response = parent::onDispatch($e);
        $this->layout()->setTemplate("admin-layout");
        return $response;
    }

    public function createnewsAction()
    {
        $jsonModel = new JsonModel();
        $request = $this->getRequest();
        $response = $this->getResponse();
        if ($request->isPost()) {
            $post = $request->getPost()->toArray();
            $files = $request->getFiles()->toArray();
            $merge = array_merge($post, $files);
            $inputFilter = new InputFilter();
            $inputFilter->add([
                "name" => "referenceImage",
                'required' => true,
                'validators' => [      // Validators.
                    [
                        'name' => Extension::class,
                        'options' => [
                            'extension' => 'jpg, jpeg, png',
                            'message' => 'File extension not match',
                        ],
                    ],
                    // [
                    //     'name' => MimeType::class,
                    //     'options' => [
                    //         'mimeType' => 'text/xls', 'text/xlsx',
                    //         'message' => 'File type not match',
                    //     ],
                    // ],
                    [
                        'name' => Size::class,
                        'options' => [
                            'min' => '1kB',  // minimum of 1kB
                            'max' => '4MB',
                            'message' => 'File too large',
                        ],
                    ],
                ]
            ]);

            // $inputFilter->add([
            //     "name" => "title",
            //     'required' => true,
            // ]);

            $inputFilter->add([
                "name" => "title",
                'required' => true,
                "allow_empty" => false,
                "filters" => [
                    [
                        "name" => StripTags::class
                    ],
                    [
                        "name" => StringTrim::class
                    ]
                ],
                'validators' => [      // Validators.


                    array(
                        'name' => 'NotEmpty',
                        'options' => array(
                            'messages' => array(
                                'isEmpty' => 'Please provide  newsletter title'
                            )
                        )
                    ),
                ]
            ]);

            $inputFilter->add([
                "name" => "content",
                'required' => true,
                "allow_empty" => false,
                "content" => [
                    // [
                    //     "name" => StripTags::class
                    // ],
                    [
                        "name" => StringTrim::class
                    ]
                ],
                'validators' => [      // Validators.


                    array(
                        'name' => 'NotEmpty',
                        'options' => array(
                            'messages' => array(
                                'isEmpty' => 'Please provide  newsletter content'
                            )
                        )
                    ),
                ]
            ]);

            $inputFilter->add([
                "name" => "category",
                'required' => true,
                "allow_empty" => false,
                "content" => [
                    [
                        "name" => StripTags::class
                    ],
                    [
                        "name" => StringTrim::class
                    ]
                ],
                'validators' => [      // Validators.


                    array(
                        'name' => 'NotEmpty',
                        'options' => array(
                            'messages' => array(
                                'isEmpty' => 'Please select category'
                            )
                        )
                    ),
                ]
            ]);


            $inputFilter->add([
                "name" => "isPublished",
                'required' => true,
                "allow_empty" => false,
                "content" => [
                    [
                        "name" => StripTags::class
                    ],
                    [
                        "name" => StringTrim::class
                    ]
                ],
                'validators' => [      // Validators.


                    array(
                        'name' => 'NotEmpty',
                        'options' => array(
                            'messages' => array(
                                'isEmpty' => 'Please select the publication status'
                            )
                        )
                    ),
                ]
            ]);

            $inputFilter->setData($merge);
            if ($inputFilter->isValid()) {
                try {
                    $em = $this->entityManager;
                    $data = $inputFilter->getValues();
                    $userEntity = $this->identity();
                    $uuid = Uuid::uuid4();
                    $image = $this->uploadService->upload($data["referenceImage"]);
                    $newsletterEntity = new Newsletter();
                    $newsletterEntity->setCreatedOn(new \Datetime())
                        ->setUuid($uuid)
                        ->setUploader($userEntity)->setTitle($data["title"])
                        ->setReferenceImage($image)
                        ->setContent($data["content"])
                        ->setCategory($em->find(NewsletterCategory::class, $data["category"]));

                    $em->persist($newsletterEntity);
                    $em->flush();
                    $jsonModel->setVariables([
                        // "data" => $responseData,
                        "status" => "success",
                        "uuid" => $uuid
                    ]);

                    $response->setStatusCode(201);
                } catch (\Throwable $th) {
                    //throw $th;
                    $jsonModel->setVariables([
                        "messages" => $th->getMessage(),
                        "trace" => $th->getTrace(),
                    ]);
                    $response->setStatusCode(400);
                }
            }
        }
        return $jsonModel;
    }

    public function newslistAction()
    {
        $viewModel = new ViewModel();
        $em = $this->entityManager;
        $order = ($this->params()->fromQuery("order", NULL) == null ? "DESC" : "ASC");
        $pageCount = ($this->params()->fromQuery("page_count", GeneralService::MAX_PAGE_COUNT) > 100 ? 100 : $this->params()->fromQuery("page_count", GeneralService::MAX_PAGE_COUNT));
        $orderBy = $this->params()->fromQuery("order_by", "id");
        $query = $em->getRepository(Newsletter::class)
            ->createQueryBuilder("t")
            ->select(["t", "r", "u", "c"])
            ->leftJoin("t.referenceImage", "r")
            ->leftJoin("t.uploader", "u")
            ->leftJoin("t.category", "c")

            ->orderBy("t.{$orderBy}", $order)
            ->getQuery()
            ->setHydrationMode(Query::HYDRATE_ARRAY);

        $paginator = new Paginator($query);
        $totalItems = count($paginator);

        $currentPage = ($this->params()->fromQuery("page")) ?: 1;
        $totalPageCount = ceil($totalItems / $pageCount);
        $nextPage = (($currentPage < $totalPageCount) ? $currentPage + 1 : $totalPageCount);
        $previousPage = (($currentPage > 1) ? $currentPage - 1 : 1);

        $records = $paginator->getQuery()->setFirstResult($pageCount * ($currentPage - 1))
            ->setMaxResults($pageCount)
            ->getResult(Query::HYDRATE_ARRAY);

        $viewModel->setVariables([
            "previous_page" => $previousPage,
            "next_page" => $nextPage,
            "total_page" => $totalPageCount,
            "data" => $records
        ]);
        return $viewModel;
    }

    public function editnewsAction()
    {
        $viewmodel  = new ViewModel();
        $uuid = $this->params()->fromRoute("id", NULL);
        $em = $this->entityManager;
        $data = $em->getRepository(Newsletter::class)->createQueryBuilder("t")
            ->select(["t", "r", "u", "c"])
            ->leftJoin("t.referenceImage", "r")
            ->leftJoin("t.uploader", "u")
            ->leftJoin("t.category", "c")->where("t.uuid = :uuid")
            ->setParameters([
                "uuid" => $uuid
            ])
            ->getQuery()
            ->getArrayResult();

        $viewmodel->setVariable("data", $data[0]);
        return $viewmodel;
    }

    public function newsdetailsAction()
    {
        $viewmodel  = new ViewModel();
        $uuid = $this->params()->fromRoute("id", NULL);
        $em = $this->entityManager;
        $data = $em->getRepository(Newsletter::class)->createQueryBuilder("t")
            ->select(["t", "r", "u", "c"])
            ->leftJoin("t.referenceImage", "r")
            ->leftJoin("t.uploader", "u")
            ->leftJoin("t.category", "c")->where("t.uuid = :uuid")
            ->setParameters([
                "uuid" => $uuid
            ])
            ->getQuery()
            ->getArrayResult();

        $viewmodel->setVariable("data", $data[0]);
        return $viewmodel;
    }

    public function createHelpDeskAction()
    {
        $viewModel = new ViewModel();
        $jsonModel = new JsonModel();
        $request = $this->getRequest();
        $response = $this->getResponse();
        if ($request->isPost()) {
            $post = $request->getPost()->toArray();
            $files = $request->getFiles()->toArray();
            $merge = array_merge($post, $files);
            $inputFilter = new InputFilter();
            $inputFilter->add([
                "name" => "referenceImage",
                'required' => true,
                'validators' => [      // Validators.
                    [
                        'name' => Extension::class,
                        'options' => [
                            'extension' => 'jpg, jpeg, png',
                            'message' => 'File extension not match',
                        ],
                    ],
                    // [
                    //     'name' => MimeType::class,
                    //     'options' => [
                    //         'mimeType' => 'text/xls', 'text/xlsx',
                    //         'message' => 'File type not match',
                    //     ],
                    // ],
                    [
                        'name' => Size::class,
                        'options' => [
                            'min' => '1kB',  // minimum of 1kB
                            'max' => '4MB',
                            'message' => 'File too large',
                        ],
                    ],
                ]
            ]);

            // $inputFilter->add([
            //     "name" => "title",
            //     'required' => true,
            // ]);

            $inputFilter->add([
                "name" => "title",
                'required' => true,
                "allow_empty" => false,
                "filters" => [
                    [
                        "name" => StripTags::class
                    ],
                    [
                        "name" => StringTrim::class
                    ]
                ],
                'validators' => [      // Validators.


                    array(
                        'name' => 'NotEmpty',
                        'options' => array(
                            'messages' => array(
                                'isEmpty' => 'Please provide  newsletter title'
                            )
                        )
                    ),
                ]
            ]);

            $inputFilter->add([
                "name" => "content",
                'required' => true,
                "allow_empty" => false,
                "content" => [
                    // [
                    //     "name" => StripTags::class
                    // ],
                    [
                        "name" => StringTrim::class
                    ]
                ],
                'validators' => [      // Validators.


                    array(
                        'name' => 'NotEmpty',
                        'options' => array(
                            'messages' => array(
                                'isEmpty' => 'Please provide  newsletter content'
                            )
                        )
                    ),
                ]
            ]);

            $inputFilter->add([
                "name" => "category",
                'required' => true,
                "allow_empty" => false,
                "content" => [
                    [
                        "name" => StripTags::class
                    ],
                    [
                        "name" => StringTrim::class
                    ]
                ],
                'validators' => [      // Validators.


                    array(
                        'name' => 'NotEmpty',
                        'options' => array(
                            'messages' => array(
                                'isEmpty' => 'Please select category'
                            )
                        )
                    ),
                ]
            ]);


            $inputFilter->add([
                "name" => "isPublished",
                'required' => true,
                "allow_empty" => false,
                "content" => [
                    [
                        "name" => StripTags::class
                    ],
                    [
                        "name" => StringTrim::class
                    ]
                ],
                'validators' => [      // Validators.


                    array(
                        'name' => 'NotEmpty',
                        'options' => array(
                            'messages' => array(
                                'isEmpty' => 'Please select the publication status'
                            )
                        )
                    ),
                ]
            ]);

            $inputFilter->setData($merge);
            if ($inputFilter->isValid()) {
                try {
                    $em = $this->entityManager;
                    $data = $inputFilter->getValues();
                    $userEntity = $this->identity();
                    $uuid = Uuid::uuid4();
                    $image = $this->uploadService->upload($data["referenceImage"]);
                    $newsletterEntity = new Newsletter();
                    $newsletterEntity->setCreatedOn(new \Datetime())
                        ->setUuid($uuid)
                        ->setUploader($userEntity)->setTitle($data["title"])
                        ->setReferenceImage($image)
                        ->setContent($data["content"])
                        ->setCategory($em->find(NewsletterCategory::class, $data["category"]));

                    $em->persist($newsletterEntity);
                    $em->flush();
                    $jsonModel->setVariables([
                        // "data" => $responseData,
                        "status" => "success",
                        "uuid" => $uuid
                    ]);

                    $response->setStatusCode(201);
                } catch (\Throwable $th) {
                    //throw $th;
                    $jsonModel->setVariables([
                        "messages" => $th->getMessage(),
                        "trace" => $th->getTrace(),
                    ]);
                    $response->setStatusCode(400);
                }
            }
        }
       
        return $viewModel;
    }

    public function helpDeskListAction()
    {
        $viewModel = new ViewModel();
        $em = $this->entityManager;
        $order = ($this->params()->fromQuery("order", NULL) == null ? "DESC" : "ASC");
        $pageCount = ($this->params()->fromQuery("page_count", GeneralService::MAX_PAGE_COUNT) > 100 ? 100 : $this->params()->fromQuery("page_count", GeneralService::MAX_PAGE_COUNT));
        $orderBy = $this->params()->fromQuery("order_by", "id");
        $query = $em->getRepository(Newsletter::class)
            ->createQueryBuilder("t")
            ->select(["t", "r", "u", "c"])
            ->leftJoin("t.referenceImage", "r")
            ->leftJoin("t.uploader", "u")
            ->leftJoin("t.category", "c")

            ->orderBy("t.{$orderBy}", $order)
            ->getQuery()
            ->setHydrationMode(Query::HYDRATE_ARRAY);

        $paginator = new Paginator($query);
        $totalItems = count($paginator);

        $currentPage = ($this->params()->fromQuery("page")) ?: 1;
        $totalPageCount = ceil($totalItems / $pageCount);
        $nextPage = (($currentPage < $totalPageCount) ? $currentPage + 1 : $totalPageCount);
        $previousPage = (($currentPage > 1) ? $currentPage - 1 : 1);

        $records = $paginator->getQuery()->setFirstResult($pageCount * ($currentPage - 1))
            ->setMaxResults($pageCount)
            ->getResult(Query::HYDRATE_ARRAY);

        $viewModel->setVariables([
            "previous_page" => $previousPage,
            "next_page" => $nextPage,
            "total_page" => $totalPageCount,
            "data" => $records
        ]);
        return $viewModel;
    }

    public function editHelpDeskAction()
    {
    }

    /**
     * Set undocumented variable
     *
     * @param  UploadService  $uploadService  Undocumented variable
     *
     * @return  self
     */
    public function setUploadService(UploadService $uploadService)
    {
        $this->uploadService = $uploadService;

        return $this;
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
}
