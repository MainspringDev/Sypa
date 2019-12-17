<?php

namespace OpenCart\System\Library;

class Mail {
    private $adaptor;
    protected $to;
    protected $from;
    protected $sender;
    protected $reply_to;
    protected $subject;
    protected $text;
    protected $html;
    protected $attachments = array();
    public $parameter;

    /**
     * @param string $adaptor
     */
    public function __construct(string $adaptor = 'mail') {
        $class = 'OpenCart\\System\\Library\\Mail\\' . $adaptor;

        if (class_exists($class)) {
            $this->adaptor = new $class();
        } else {
            trigger_error('Error: Could not load mail adaptor ' . $adaptor . '!');
            exit();
        }
    }

    /**
     * @param string|string[] $to
     */
    public function setTo($to): void {
        $this->to = $to;
    }

    /**
     * @param string $from
     */
    public function setFrom(string $from): void {
        $this->from = $from;
    }

    /**
     * @param string $sender
     */
    public function setSender(string $sender): void {
        $this->sender = $sender;
    }

    /**
     * @param string $reply_to
     */
    public function setReplyTo(string $reply_to): void {
        $this->reply_to = $reply_to;
    }

    /**
     * @param string $subject
     */
    public function setSubject(string $subject): void {
        $this->subject = $subject;
    }

    /**
     * @param string $text
     * @return void
     */
    public function setText(string $text): void {
        $this->text = $text;
    }

    /**
     * @param string $html
     */
    public function setHtml(string $html): void {
        $this->html = $html;
    }

    /**
     * @param string $filename
     */
    public function addAttachment(string $filename) {
        $this->attachments[] = $filename;
    }

    /**
     * @throws \Exception
     */
    public function send(): void {
        if (!$this->to) {
            throw new \Exception('Error: E-Mail to required!');
        }

        if (!$this->from) {
            throw new \Exception('Error: E-Mail from required!');
        }

        if (!$this->sender) {
            throw new \Exception('Error: E-Mail sender required!');
        }

        if (!$this->subject) {
            throw new \Exception('Error: E-Mail subject required!');
        }

        if ((!$this->text) && (!$this->html)) {
            throw new \Exception('Error: E-Mail message required!');
        }

        foreach (get_object_vars($this) as $key => $value) {
            $this->adaptor->$key = $value;
        }

        $this->adaptor->send();
    }
}
