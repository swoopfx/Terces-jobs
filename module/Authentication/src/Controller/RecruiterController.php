<?php

namespace Authentication\Controller;

use Doctrine\ORM\EntityManager;
use Application\Controller\RegisterInterface;
use Authentication\Entity\Roles;
use Authentication\Entity\User;
use Authentication\Entity\UserState;
use Authentication\Service\UserService;
use DoctrineModule\Validator\NoObjectExists;
use Laminas\InputFilter\InputFilter;
use Laminas\Mvc\Controller\AbstractActionController;
use Laminas\Validator\Identical;
use Laminas\Validator\StringLength;
use Laminas\View\Model\JsonModel;
use Laminas\View\Model\ViewModel;
use Ramsey\Uuid\Uuid;
use General\Service\GoogleService;

class RecruiterController extends AbstractActionController
{
    /**
     * Undocumented variable
     *
     * @var EntityManager
     */
    private $entityManager;

    private $activeCampaignService;

    private $authService;

    private $postmarkService;

    /**
     * Undocumented variable
     *
     * @var GoogleService
     */
    private $googleService;

    public function indexAction()
    {
        $viewModel = new ViewModel();
        return $viewModel;
    }


    public function registerAction()
    {
        $this->layout()->setTemplate("login-layout");
        $viewModel = new ViewModel();
        $request = $this->getRequest();
        $response = $this->getResponse();
        $entityManager = $this->entityManager;
        $jsonModel = new JsonModel();
        if ($request->isPost()) {
            // validat post 
            // retrive post 
            $inputFilter = new InputFilter;
            $inputFilter->add([
                'name' => 'email',
                'break_chain_on_failure' => true,
                'required' => true,
                "allow_empty" => false,
                'filters' => [
                    [
                        'name' => 'StripTags'
                    ],
                    [
                        'name' => 'StringTrim'
                    ]
                ],
                'validators' => [
                    [
                        'name' => 'NotEmpty',
                        'options' => [
                            'messages' => [
                                'isEmpty' => 'Email is required'
                            ]
                        ]
                    ],
                    [
                        "name" => NoObjectExists::class,
                        "options" => [
                            "use_context" => true,
                            "object_repository" => $entityManager->getRepository(User::class),
                            "objject_manager" => $entityManager,
                            "fields" => [
                                "email"
                            ],
                            "messages" => [
                                NoObjectExists::ERROR_OBJECT_FOUND => "Please "
                            ]
                        ]
                    ],
                    [
                        'name' => StringLength::class,
                        'options' => [
                            'messages' => [],
                            'min' => 6,
                            'max' => 256,
                            'messages' => [
                                StringLength::TOO_SHORT => 'Try Something more longer',
                                StringLength::TOO_LONG => 'Could you really remember this long identity'
                            ]
                        ],
                    ]
                ]
            ]);

            $inputFilter->add([
                'name' => 'fullname',
                'break_chain_on_failure' => true,
                'required' => true,
                "allow_empty" => false,
                'filters' => [
                    [
                        'name' => 'StripTags'
                    ],
                    [
                        'name' => 'StringTrim'
                    ]
                ],
                'validators' => [
                    [
                        'name' => 'NotEmpty',
                        'options' => [
                            'messages' => [
                                'isEmpty' => 'Full Name is required'
                            ]
                        ]
                    ],

                    [
                        'name' => StringLength::class,
                        'options' => [
                            'messages' => [],
                            'min' => 3,
                            'max' => 256,
                            'messages' => [
                                StringLength::TOO_SHORT => 'Try Something more longer',
                                StringLength::TOO_LONG => 'Could you really remember this long identity'
                            ]
                        ],
                    ]
                ]
            ]);

            $inputFilter->add([
                'name' => 'company_name',
                'break_chain_on_failure' => true,
                'required' => true,
                "allow_empty" => false,
                'filters' => [
                    [
                        'name' => 'StripTags'
                    ],
                    [
                        'name' => 'StringTrim'
                    ]
                ],
                'validators' => [
                    [
                        'name' => 'NotEmpty',
                        'options' => [
                            'messages' => [
                                'isEmpty' => 'Company Name is required'
                            ]
                        ]
                    ],

                    [
                        'name' => StringLength::class,
                        'options' => [
                            'messages' => [],
                            'min' => 3,
                            'max' => 256,
                            'messages' => [
                                StringLength::TOO_SHORT => 'Try Something more longer',
                                StringLength::TOO_LONG => 'Could you really remember this long identity'
                            ]
                        ],
                    ]
                ]
            ]);



            $inputFilter->add([
                "name" => "password",
                'break_chain_on_failure' => true,
                "required" => true,
                "allow_empty" => false,
                "filters" => [
                    [
                        'name' => 'StripTags'
                    ],
                    [
                        'name' => 'StringTrim'
                    ]
                ],
                "validators" => [
                    [
                        'name' => 'StringLength',
                        'options' => [
                            'encoding' => 'UTF-8',
                            'min' => 6,
                            'max' => 50,
                            "messages" => [
                                StringLength::TOO_SHORT => "The password must be more than 6 characters",
                                StringLength::TOO_LONG => "This password is too long to memorize"
                            ]
                        ]
                    ]
                ]

            ]);

            $inputFilter->add([
                "name" => "confirm_password",
                'break_chain_on_failure' => true,
                "required" => true,
                "allow_empty" => false,
                "validators" => [
                    [
                        'name' => 'StringLength',
                        'options' => [
                            'encoding' => 'UTF-8',
                            'min' => 6,
                            'max' => 50,
                            "messages" => [
                                StringLength::TOO_SHORT => "The password must be more than 6 characters",
                                StringLength::TOO_LONG => "This password is too long to memorize"
                            ]
                        ]
                    ],
                    [
                        'name' => 'Identical',
                        'options' => [
                            'token' => 'password',
                            "messages" => [
                                Identical::NOT_SAME => "The passwords are not identical"
                            ]
                        ]
                    ]
                ]

            ]);
            $post = $request->getPost();
            $inputFilter->setData($post);
            if ($inputFilter->isValid()) {

                try {

                    $data = $inputFilter->getValues();
                    $userEntity = new User();
                    $token = md5(uniqid(mt_rand(), true));
                    $userEntity->setCreatedOn(new \Datetime())
                        ->setRole($entityManager->find(Roles::class, UserService::USER_ROLE_EMPLOYER))
                        ->setEmail($data["email"])
                        ->setPassword(UserService::encryptPassword($data["password"]))
                        ->setEmailConfirmed(False)
                        ->setFullname($data["fullname"])
                        ->setIsActive(TRUE)
                        ->setRegistrationDate(new \Datetime())->setRegistrationToken($token)
                        ->setUuid(Uuid::uuid4())
                        ->setUid(uniqid())
                        ->setIsOauth(false)
                        ->setIpAddress($post["ip"])
                        ->setCompanyName($data["company_name"])
                        ->setState($entityManager->find(UserState::class, UserService::USER_STATE_ENABLED));


                    // send email
                    $nameArray = explode(" ", $data["fullname"]);
                    // Register on Active campaign 

                    $data = [
                        "fullname" => $data["fullname"],

                        "email" => $data["email"]
                    ];
                    $jsonModel->setVariables([
                        "data" => $data,
                        "success" => true
                    ]);
                    $activeCampaignData = [
                        "email" => $data["email"],
                        "firstname" => $nameArray[0],
                        "lastname" => $nameArray[1],
                        "phone" => "",
                    ];

                    // call active campaign newsletter
                    // $activeResponse = $this->activeCampaignService->createContact($activeCampaignData);
                    // $activeCampaignList = [
                    //     "list" => 5,
                    //     "contact" => $activeResponse["id"]
                    // ];

                    $fulllink = $this->url()->fromRoute('authentication', array(
                        "controller" => "auth",
                        'action' => 'confirm-email',
                        'id' => $userEntity->getRegistrationToken()
                    ), array(
                        'force_canonical' => true
                    ));
                    // $this->activeCampaignService->updateContactList($activeCampaignList);
                    $emailData["to"] =  $data["email"];
                    $emailData["link"] = $fulllink;
                    $emailData["name"] = $data["fullname"];

                    $this->postmarkService->sendConfirmEmail($emailData);

                    $entityManager->persist($userEntity);
                    $entityManager->flush();

                    $response->setStatusCode(201);
                } catch (\Throwable $th) {
                    $jsonModel->setVariables([
                        "success" => false,
                        "message" => $th->getMessage()
                    ]);
                    $response->setStatusCode(400);
                }


                return $jsonModel;
            } else {
                $jsonModel->setVariables([
                    "success" => false,
                    "message" => "Please use another email"
                ]);
                $response->setStatusCode(400);
                return $jsonModel;
            }
        }
        return $viewModel;
    }

    public function  registerGoogleAction()
    {
        $jsonModel = new JsonModel();
        $request = $this->getRequest();
        $response = $this->getResponse();
        $em = $this->entityManager;

        return $jsonModel;
    }




    public function forgotPasswordAction()
    {
        $this->layout()->setTemplate("login-layout");
        $viewModel = new ViewModel();

        $jsonModel = new JsonModel();
        $request = $this->getRequest();

        $response = $this->getResponse();
        if ($request->isPost()) {
            $post = $request->getPost();
            $email = $post["email"];
            /**
             * @var User
             */
            $userEntity = $this->entityManager->getRepository(User::class)->findOneBy([
                "email" => $email
            ]);
            if ($userEntity == null) {
                $response->setStatusCode(423);
                return $jsonModel;
            } else {
                try {
                    // generate new Token 
                    $token = md5(uniqid(mt_rand(), true));
                    // Hy
                    $userEntity->setRegistrationToken($token)->setUpdatedOn(new \Datetime());

                    $fullLink = $this->getBaseUrl() . $this->url()->fromRoute('authentication', array(
                        "controller" => "auth",
                        'action' => 'newpassword',
                        'id' => $userEntity->getRegistrationToken()

                    ));

                    // send email

                    $this->entityManager->persist($userEntity);
                    $mailData["to"] = $userEntity->getEmail();
                    $mailData["subject"] = "Terces Academy Reset Password";
                    $mailData["toName"] = $userEntity->getFullname();
                    // $mailData["template"] = "reset-password-mail";
                    $mailData["fulllink"] = $fullLink;
                    // $mailData["var"] = [
                    //     "link" => $fullLink
                    // ];

                    // $this->mailService->execute($mailData);

                    // $this->mailtrap->passwordResetMail($mailData);
                    $this->postmarkService->resetPassword($mailData);

                    $this->entityManager->flush();
                    $response->setStatusCode(201);
                    return $jsonModel;
                } catch (\Throwable $th) {
                    $response->setStatusCode(400);
                    $jsonModel->setVariables([
                        "messages" => $th->getMessage(),
                        "data" => $th->getTrace()
                    ]);
                    return $jsonModel;
                }
            }
        }


        return $viewModel;
    }

    public function newpasswordAction()
    {
        $this->layout()->setTemplate("login-layout");
        $viewmodel = new ViewModel();
        $jsonmodel = new JsonModel();
        $response = $this->getResponse();
        $token = $this->params()->fromRoute('id');
        try {
            $entityManager = $this->entityManager;

            $request = $this->getRequest();
            if ($request->isPost()) {
                $post = $request->getPost();
                // var_dump($post);
                $inputFilter = new InputFilter();

                $inputFilter->add(array(
                    'name' => 'password',
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
                                    'isEmpty' => 'password is required'
                                )
                            )
                        )
                    )
                ));

                $inputFilter->add(array(
                    'name' => 'token',
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
                                    'isEmpty' => 'Token is required'
                                )
                            )
                        )
                    )
                ));

                $inputFilter->add(array(
                    'name' => 'passwordz',
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
                                    'isEmpty' => 'Verified Password is required'
                                )
                            )
                        ),
                        array(
                            'name' => 'Identical',
                            'options' => array(
                                'token' => 'password',
                                "messages" => array(
                                    Identical::NOT_SAME => "The Passwords are not identical"
                                )
                            )
                        )
                    )
                ));
                $inputFilter->setData($post);
                if ($inputFilter->isValid()) {
                    $data = $inputFilter->getValues();
                    /**
                     * @var User
                     */
                    $userEntity = $entityManager->getRepository(User::class)->findOneBy(array(
                        'registrationToken' => $data["token"]
                    ));
                    if ($userEntity) {
                        $userEntity->setPassword(UserService::encryptPassword($data["password"]))->setUpdatedOn(new \Datetime())->setRegistrationToken(md5(uniqid(mt_rand(), true)));

                        $entityManager->persist($userEntity);
                        $entityManager->flush();

                        // Send a success mail

                        // return $this->redirect()->toRoute("login");
                        $response->setStatusCode(201);
                        // $jsonmodel->setVariables([

                        // ]);
                        return  $jsonmodel;
                    }
                } else {
                    $response->setStatusCode(400);
                    $jsonmodel->setVariables([
                        "messages" => $inputFilter->getMessages()
                    ]);
                    return  $jsonmodel;
                }
            } else {
                try {
                    $user = $entityManager->getRepository(User::class)->findOneBy(array(
                        'registrationToken' => $token
                    ));
                    if ($user == NULL) {
                        throw new \Exception("invalid token");
                    }
                } catch (\Throwable $th) {
                    // $this->flashMessenger()->addErrorMessage($th->getMessage());
                    $this->redirect()->toRoute("login");
                }
            }
            // }
        } catch (\Throwable $th) {
            //throw $th;
            $response->setStatusCode(400);
            $jsonmodel->setVariables([
                "messages" => $th->getMessage()
            ]);
            return  $jsonmodel;
        }

        $viewmodel->setVariables([
            // "data"=>[
            "token" => $token,

            // ]
        ]);
        return $viewmodel;
    }


    public function logoutAction()
    {
        $auth = $this->authService;
        if ($auth->hasIdentity()) {
            $auth->clearIdentity();
            $sessionManager = new SessionManager();
            $sessionManager->forgetMe();
            $sessionManager->destroy();
        }

        return $this->redirect()->toRoute("login");
    }


    public function confirmEmailAction()
    {
        $token = $this->params()->fromRoute('id');
        $viewModel = new ViewModel();
        try {
            $entityManager = $this->entityManager;
            if ($token !== '' && $user = $entityManager->getRepository(User::class)->findOneBy(array(
                'registrationToken' => $token
            ))) {
                if ($user->getEmailConfirmed() == TRUE) {
                    $this->flashmessenger()->addErrorMessage("This email has been confirmed already");
                    $this->redirect()->toRoute("login");
                }
                $user->setRegistrationToken(md5(uniqid(mt_rand(), true)));
                $user->setState($entityManager->find(UserState::class, UserService::USER_STATE_ENABLED));
                $user->setEmailConfirmed(1);
                $entityManager->persist($user);
                $entityManager->flush();

                $this->flashmessenger()->addSuccessMessage("Email successfully confirmed and registration completed");
                $this->redirect()->toRoute("login");
                // $viewModel = new ViewModel(array(
                // 'navMenu' => $this->options->getNavMenu()
                // ));

                // $viewModel->setTemplate('csn-user/registration/confirm-email-success');
                // return $viewModel;
                return $this;
            } else {
                $this->flashmessenger()->addErrorMessage("There was a problem consfirming your email");
                return $this->redirect()->toRoute('login', array());
            }
        } catch (\Exception $e) {
            // return $this->getServiceLocator()->get('csnuser_error_view')->createErrorView(
            // $this->getTranslatorHelper()->translate('Something went wrong during the activation of your account! Please, try again later.'),
            // $e,
            // $this->options->getDisplayExceptions(),
            // $this->options->getNavMenu()
            // );
            $this->flashmessenger()->addErrorMessage("There was a problem consfirming your email");
            return $this->redirect()->toRoute('login', array());
        }
        return $viewModel;
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
     * Set the value of activeCampaignService
     *
     * @return  self
     */
    public function setActiveCampaignService($activeCampaignService)
    {
        $this->activeCampaignService = $activeCampaignService;

        return $this;
    }

    /**
     * Set the value of authService
     *
     * @return  self
     */
    public function setAuthService($authService)
    {
        $this->authService = $authService;

        return $this;
    }


    /**
     * Set the value of postmarkService
     *
     * @return  self
     */
    public function setPostmarkService($postmarkService)
    {
        $this->postmarkService = $postmarkService;

        return $this;
    }

    /**
     * Set undocumented variable
     *
     * @param  GoogleService  $googleService  Undocumented variable
     *
     * @return  self
     */
    public function setGoogleService(GoogleService $googleService)
    {
        $this->googleService = $googleService;

        return $this;
    }
}
