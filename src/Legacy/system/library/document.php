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
    public function setTitle($title) {
        $this->title = $title;
    }

    /**
     * @return string
     */
    public function getTitle() {
        return $this->title;
    }

    /**
     * @param string $description
     * @return void
     */
    public function setDescription($description) {
        $this->description = $description;
    }

    /**
     * @return string
     */
    public function getDescription() {
        return $this->description;
    }

    /**
     * @param string $keywords
     * @return void
     */
    public function setKeywords($keywords) {
        $this->keywords = $keywords;
    }

    /**
     * @return string
     */
    public function getKeywords() {
        return $this->keywords;
    }

    /**
     * @param string $href
     * @param string $rel
     * @return void
     */
    public function addLink($href, $rel) {
        $this->links[$href] = array(
            'href' => $href,
            'rel'  => $rel
        );
    }

    /**
     * @return array[]
     */
    public function getLinks() {
        return $this->links;
    }

    /**
     * @param string $href
     * @param string $rel
     * @param string $media
     */
    public function addStyle($href, $rel = 'stylesheet', $media = 'screen') {
        $this->styles[$href] = array(
            'href'  => $href,
            'rel'   => $rel,
            'media' => $media
        );
    }

    /**
     * @return array[]
     */
    public function getStyles() {
        return $this->styles;
    }

    /**
     * @param string $href
     * @param string $position
     */
    public function addScript($href, $position = 'header') {
        $this->scripts[$position][$href] = $href;
    }

    /**
     * @param string $position
     * @return array[]
     */
    public function getScripts($position = 'header') {
        if (isset($this->scripts[$position])) {
            return $this->scripts[$position];
        } else {
            return array();
        }
    }
}
