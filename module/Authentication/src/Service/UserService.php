<?php

namespace Authentication\Service;

use Authentication\Entity\User;
use Laminas\Crypt\Password\Bcrypt;

class UserService
{

    const USER_ROLE_GUEST = 1;

    /**
     * This contains all user roles both parent and child of the job seeker
     * All adjoining and extended priviledges of the job seeker are derevice from this
     */
    const USER_ROLE_JOB_SEEKER = 100;

     /**
     * This contains all user roles both parent and child of the Employer
     * All adjoining and extended priviledges of the job seeker are derevice from this
     */
    const USER_ROLE_EMPLOYER = 1000;

     /**
     * This contains all user roles both parent and child of the Administrator 
     * All adjoining and extended priviledges of the Administrator  are derevice from this
     */
    const USER_ROLE_ADMINISTRATOR = 10000;


    const USER_STATE_ENABLED = 1;

    const USER_STATE_DISABLED = 2;



    // const 


    /**
     * Static function for checking hashed password (as required by Doctrine)
     *
     * @param Application\Entity\User $user
     *            The identity object
     * @param string $passwordGiven
     *            Password provided to be verified
     * @return boolean true if the password was correct, else, returns false
     */
    public static function verifyHashedPassword(User $user, $passwordGiven)
    {
        $bcrypt = new Bcrypt(array(
            'cost' => 10
        ));
        return $bcrypt->verify($passwordGiven, $user->getPassword());
    }

    /**
     * Encrypt Password
     *
     * Creates a Bcrypt password hash
     *
     * @return String
     */
    public static function encryptPassword($password)
    {
        $bcrypt = new Bcrypt(array(
            'cost' => 10
        ));
        return $bcrypt->create($password);
    }
}
