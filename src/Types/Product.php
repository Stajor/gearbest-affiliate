<?php namespace GearBest\Types;

abstract class Product {
    protected $id;
    protected $affiliateId;
    protected $title;
    protected $startAt;
    protected $endAt;
    protected $image;
    protected $price;
    protected $link;

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
    public function getAffiliateId() {
        return $this->affiliateId;
    }

    /**
     * @param mixed $affiliateId
     */
    public function setAffiliateId($affiliateId): void {
        $this->affiliateId = $affiliateId;
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

    abstract public function getClickTag(): string;
}