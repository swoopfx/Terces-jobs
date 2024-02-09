<?php

namespace Admin\Controller;

use Doctrine\ORM\EntityManager;
use General\Service\PostMarkService;
use Laminas\InputFilter\InputFilter;
use Laminas\Mvc\Controller\AbstractActionController;
use Laminas\Session\Container;
use Laminas\View\Model\JsonModel;
use Laminas\View\Model\ViewModel;

class AdminController extends AbstractActionController
{

    private PostMarkService $postmarkService;

    private EntityManager $entityManager;

    private $activeCampaignService;

    private $authService;

    public function indexAction()
    {
        $viewModel = new ViewModel();
        return $viewModel;
    }

    public function loginAction()
    {
        $this->layout()->setTemplate("admin-login-layout");
        $request = $this->getRequest();
        $response = $this->getResponse();
        $em =  $this->entityManager;

        $user = $this->identity();
        if ($user) {
            // return $this->redirect()->toRoute("home");
        }
        $jsonModel = new JsonModel();

        // $data = $inputFilter->getValues();

        $uri = $this->getRequest()->getUri();

        $fullUrl = sprintf('%s://%s', $uri->getScheme(), $uri->getHost());
        // use the generated controllerr plugin for the redirection

        // $form = $this->loginForm->createUserForm($this->userEntity, 'login');
        $messages = null;
        $request = $this->getRequest();
        if ($request->isPost()) {
            $post = $request->getPost()->toArray();
            $inputFilter = new InputFilter();
            $inputFilter->add(array(
                'name' => 'email',
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
                                'isEmpty' => 'Phone number or email is required'
                            )
                        )
                    )
                )
            ));

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
                                'isEmpty' => 'Password is required'
                            )
                        )
                    )
                )
            ));

            $inputFilter->setData($post);
            if ($inputFilter->isValid()) {
                $data = $inputFilter->getValues();

                $authService = $this->authService;
                $adapter = $authService->getAdapter();
                $email = $data["email"];

                try {
                    $user = $this->entityManager->createQuery("SELECT u FROM  Authentication\Entity\User u WHERE u.email = '$email' ")->getResult(\Doctrine\ORM\Query::HYDRATE_OBJECT);

                    // $user = $this->user->selectUserDQL($phoneOrEmail);
                    if (count($user) == 0) {
                        $response->setCustomStatusCode(498);
                        $response->setReasonPhrase('Invalid token!');
                        return $jsonModel->setVariables([
                            "messages" => "The username or email is not valid!"
                        ]);
                    } else {
                        $user = $user[0];
                    }

                    // var_dump($user);
                    // var_dump($user);
                    // if ($user == NULL) {

                    // $messages = 'The username or email is not valid!';
                    // // return new ViewModel(array(
                    // // 'error' => $this->translatorHelper->translate('Your authentication credentials are not valid'),
                    // // 'form' => $form,
                    // // 'messages' => $messages,
                    // // 'navMenu' => $this->options->getNavMenu()
                    // // ));

                    // $response->setStatusCode(Response::STATUS_CODE_422);
                    // return $jsonModel->setVariables([
                    // "messages" => $messages
                    // ]);
                    // }
                    if ($user->getState()->getId() == 2) {
                        $messages = 'This account is disabled';
                        $response->setStatusCode(400);
                        return $jsonModel->setVariables([
                            "messages" => $messages
                        ]);
                    }
                    if (!$user->getEmailConfirmed() == 1) {
                        $messages = 'You are yet to confirm your account, please go to the registered email to confirm your account';
                        $response->setStatusCode(400);
                        return $jsonModel->setVariables([
                            "messages" => $messages
                        ]);
                    }
                    if (!$user->getIsActive()) {
                        $messages = 'Your username is disabled. Please contact an administrator.';
                        $response->setStatusCode(400);
                        return $jsonModel->setVariables([
                            "messages" => $messages
                        ]);
                    }

                    $adapter->setIdentity($user->getEmail());
                    $adapter->setCredential($data["password"]);

                    $authResult = $authService->authenticate();
                    // $class_methods = get_class_methods($adapter);
                    // echo "<pre>";print_r($class_methods);exit;

                    if ($authResult->isValid()) {
                        $identity = $authResult->getIdentity();
                        $authService->getStorage()->write($identity);

                        // Last Login Date
                        // $this->lastLogin($this->identity());
                        $userEntity = $this->identity();
                        if ($this->params()->fromPost('rememberme')) {
                            $time = 1209600; // 14 days (1209600/3600 = 336 hours => 336/24 = 14 days)
                            $sessionManager = new SessionManager();
                            $sessionManager->rememberMe($time);
                        }

                        // var_dump($this->identity());
                        /**
                         * At this region check if the user varible isProfiled is true
                         * If it is true make sure continue with the login
                         * If it is false branch into the condition get the user role mand seed it to
                         * the userProfile Sertvice
                         * to display the required form to fill the profile
                         * if required redirect to the copletinfg profile Page
                         */
                        $redirect = $this->url()->fromRoute('home', array(), array(
                            'force_canonical' => true
                        ));

                        $cont = new Container("refer");
                        $referal = $cont->refer;
                        if ($referal != "") {
                            $redirect = $referal;
                        }
                        // $link =

                        $response->setStatusCode(200);
                        $jsonModel->setVariables([
                            "redirect" => $redirect
                        ]);
                        $cont->refer = "";
                        return $jsonModel;
                        // return $this->redirect()->toRoute($this->options->getLoginRedirectRoute());
                    } else {
                        $messages = 'Invalid Credentials';
                        $response->setStatusCode(Response::STATUS_CODE_422);
                        return $jsonModel->setVariables([
                            "messages" => $messages
                        ]);
                        return $jsonModel;
                    }

                    foreach ($authResult->getMessages() as $message) {
                        $messages .= "$message\n";
                    }
                } catch (\Exception $e) {
                    // echo "Something went wrong";
                    // return $this->errorView->createErrorView($this->translatorHelper->translate('Something went wrong during login! Please, try again later.'), $e, $this->options->getDisplayExceptions(), $this->options);
                    // ->getNavMenu();
                    $response->setStatusCode(Response::STATUS_CODE_400);
                    return $jsonModel->setVariables([
                        "messages" => 'Something went wrong during login! Please, try again later.',
                        "data" => $e->getMessage(),
                    ]);
                }
            }
        }


        $viewModel = new ViewModel([
            // "google" => $this->googleService->getGoogleClient()
        ]);
        return $viewModel;
    }

    public function dashboardAction()
    {
        $viewModel = new ViewModel();
        return $viewModel;
    }

    public function newsletterAction()
    {
        $viewModel = new ViewModel();
        return $viewModel;
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
     * Set the value of entityManager
     *
     * @return  self
     */ 
    public function setEntityManager($entityManager)
    {
        $this->entityManager = $entityManager;

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
     * Set the value of activeCampaignService
     *
     * @return  self
     */ 
    public function setActiveCampaignService($activeCampaignService)
    {
        $this->activeCampaignService = $activeCampaignService;

        return $this;
    }
}
