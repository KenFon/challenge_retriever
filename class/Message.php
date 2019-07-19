<?php
require_once 'Message.php';

class Message
{
    const LIMIT_USERNAME = 2;
    const LIMIT_MESSAGE = 5;

    private $username;
    private $message;
    private $date;

    public function __construct(string $username, string $message, ?DateTime $date = null)
    {
        $this->username = $username;
        $this->message = $message;
        $this->date = $date ?: new DateTime();
    }

    public function isValid()
    {
        return empty($this->getErrors());
    }

    public function getErrors(): array
    {
        $error = [];
        if (strlen($this->username) < self::LIMIT_USERNAME) {
            $error['username'] = 'Votre pseudo est trop court';
        }
        if (strlen($this->message) < self::LIMIT_MESSAGE) {
            $error['message'] = 'Votre message est trop court' . $this->message;
        }
        return $error;
    }


    public function toHTML()
    {
        $username = htmlentities($this->username);
        $date = $this->date->format("d/m/Y à H:i");
        $message = nl2br(htmlentities($this->message));
        return <<<HTML
            <p>
                <strong>{$username}</strong><em>{$date}</em><br>
                {$message}
            </p>

HTML;
    }

    public function toJSON()
    {
        return json_encode(
            [
                'username' => $this->username,
                'message' => $this->message,
                'date' => $this->date->getTimestamp()
            ]);
    }
}

?>