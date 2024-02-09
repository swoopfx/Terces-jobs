<?php

namespace Admin\Controller;

use Application\Entity\Newsletter;
use Application\Entity\NewsletterCategory;
use Doctrine\ORM\EntityManager;
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
        return $viewModel;
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
