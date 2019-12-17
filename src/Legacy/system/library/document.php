<?php

namespace OpenCart\System\Library;

class Document {
    private $title;
    private $description;
    private $keywords;
    private $links = array();
    private $styles = array();
    private $scripts = array();

    /**
     * @param string $title
     * @return void
     */
    public function setTitle(string $title): void {
        $this->title = $title;
    }

    /**
     * @return string
     */
    public function getTitle(): string {
        return $this->title;
    }

    /**
     * @param string $description
     * @return void
     */
    public function setDescription(string $description): void {
        $this->description = $description;
    }

    /**
     * @return string
     */
    public function getDescription(): string {
        return $this->description;
    }

    /**
     * @param string $keywords
     * @return void
     */
    public function setKeywords(string $keywords): void {
        $this->keywords = $keywords;
    }

    /**
     * @return string
     */
    public function getKeywords(): string {
        return $this->keywords;
    }

    /**
     * @param string $href
     * @param string $rel
     * @return void
     */
    public function addLink(string $href, string $rel): void {
        $this->links[$href] = array(
            'href' => $href,
            'rel'  => $rel
        );
    }

    /**
     * @return array[]
     */
    public function getLinks(): array {
        return $this->links;
    }

    /**
     * @param string $href
     * @param string $rel
     * @param string $media
     */
    public function addStyle(string $href, string $rel = 'stylesheet', string $media = 'screen'): void {
        $this->styles[$href] = array(
            'href'  => $href,
            'rel'   => $rel,
            'media' => $media
        );
    }

    /**
     * @return array[]
     */
    public function getStyles(): array {
        return $this->styles;
    }

    /**
     * @param string $href
     * @param string $position
     */
    public function addScript(string $href, string $position = 'header'): void {
        $this->scripts[$position][$href] = $href;
    }

    /**
     * @param string $position
     * @return array[]
     */
    public function getScripts(string $position = 'header'): array {
        if (isset($this->scripts[$position])) {
            return $this->scripts[$position];
        }

        return array();
    }
}
