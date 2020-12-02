<?php

namespace townsend\users;

use PDO;

/*
CREATE TABLE `townsend`.`Contact` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NOT NULL,
  `phone` VARCHAR(45) NOT NULL,
  `email` VARCHAR(45) NOT NULL,
  `message` VARCHAR(255) NOT NULL,
  `newsletter` TINYINT DEFAULT 0,
  `ipAddress` VARCHAR(20) NULL,
  `timestamp` INT(11),
  PRIMARY KEY (`id`));
*/

/**
 * Class Contact
 * @package townsend\users
 */
class Contact
{
    /**
     * @var
     */
    private $name;

    /**
     * @var
     */
    private $phone;

    /**
     * @var
     */
    private $email;

    /**
     * @var
     */
    private $message;

    /**
     * @var
     */
    private $newsletter;

    /**
     * Contact constructor.
     * @param $name
     * @param $phone
     * @param $email
     * @param $message
     * @param $newsletter
     * @param $ipAddress
     */
    public function __construct(String $name, String $phone, String $email, String $message, int $newsletter, String $ipAddress)
    {
        $this->name = $name;
        $this->phone = $phone;
        $this->email = $email;
        $this->message = $message;
        $this->newsletter = $newsletter;
        $this->ipAddress = $ipAddress;
    }

    /**
     * Save the object to the Contact table in the townsend schema
     */
    public function save()
    {
        //Connect to the MySQL database using the PDO object.
        $pdo = new PDO('mysql:host=localhost:33056;dbname=townsend', 'townsend', 'marketta8');
        $stmt = $pdo->prepare("INSERT INTO `Contact` (`name`, `phone`, `email`, `message`, `newsletter`, `ipAddress`, `timestamp` ) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt->execute(array($this->name, $this->phone, $this->email, $this->message, $this->newsletter, $this->ipAddress, time()));
        return "Contact inserted";
    }

    public function notifyAdmin()
    {
        //mail("admin@site.com", "Contact details", $this->name . ", " . $this->phone. ", " . $this->email. ", " . $this->message. ", " . $this->newsletter. ", " . $this->ipAddress);
    }
}