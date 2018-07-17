<?php namespace GearBest\Types;

use GearBest\Request;

class Product {
    protected $id;
    protected $title;
    protected $startAt;
    protected $endAt;
    protected $image;
    protected $price;
    protected $link;
    protected $code;
    protected $limited;
    protected $discount;
    protected $clickTagUrl;
    protected $clickTagParams;
    protected $banners;

    /**
     * @return mixed
     */
    public function getId() {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getTitle() {
        return $this->title;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title): void {
        $this->title = $title;
    }

    /**
     * @return mixed
     */
    public function getStartAt() {
        return $this->startAt;
    }

    /**
     * @param mixed $startAt
     */
    public function setStartAt($startAt): void {
        $this->startAt = empty($startAt) ? null : new \DateTime($startAt);
    }

    /**
     * @return mixed
     */
    public function getEndAt() {
        return $this->endAt;
    }

    /**
     * @param mixed $endAt
     */
    public function setEndAt($endAt): void {
        $this->endAt = empty($endAt) ? null : new \DateTime($endAt);
    }

    /**
     * @return mixed
     */
    public function getImage() {
        return $this->image;
    }

    /**
     * @param mixed $image
     */
    public function setImage($image): void {
        $this->image = $image;
    }

    /**
     * @return mixed
     */
    public function getPrice() {
        return $this->price;
    }

    /**
     * @param mixed $price
     */
    public function setPrice($price): void {
        $this->price = $price;
    }

    /**
     * @return mixed
     */
    public function getLink() {
        return $this->link;
    }

    /**
     * @param mixed $link
     */
    public function setLink($link): void {
        $this->link = $link;
    }

    /**
     * @return mixed
     */
    public function getCode() {
        return $this->code;
    }

    /**
     * @param mixed $code
     */
    public function setCode($code): void {
        $this->code = $code;
    }

    /**
     * @return mixed
     */
    public function getLimited() {
        return $this->limited;
    }

    /**
     * @param mixed $limited
     */
    public function setLimited($limited): void {
        $this->limited = $limited;
    }

    /**
     * @return mixed
     */
    public function getDiscount() {
        return $this->discount;
    }

    /**
     * @param mixed $discount
     */
    public function setDiscount($discount): void {
        $this->discount = $discount;
    }

    /**
     * @param mixed $clickTagUrl
     */
    public function setClickTagUrl($clickTagUrl): void {
        $this->clickTagUrl = $clickTagUrl;
    }

    /**
     * @param mixed $clickTagParams
     */
    public function setClickTagParams($clickTagParams): void {
        $this->clickTagParams = $clickTagParams;
    }

    /**
     * @return mixed
     */
    public function getBanners() {
        return $this->banners;
    }

    /**
     * @param mixed $banners
     */
    public function setBanners($banners): void {
        $this->banners = $banners;
    }

    public function getClickTag() {
        $response = Request::post($this->clickTagUrl, ['info' => $this->clickTagParams]);

        $data = json_decode($response->getBody(), true);

        return $data['data'];
    }
}