<?php namespace GearBest\Types;

use GearBest\Request;

class Coupon {
    protected $id;
    protected $image;
    protected $title;
    protected $link;
    protected $description;
    protected $code;
    protected $limit;
    protected $start_at;
    protected $end_at;
    protected $referrer_link;
    protected $affiliate_id;

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
        return $this->affiliate_id;
    }

    /**
     * @param mixed $affiliate_id
     */
    public function setAffiliateId($affiliate_id): void {
        $this->affiliate_id = $affiliate_id;
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
    public function getDescription() {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description): void {
        $this->description = $description;
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
    public function getLimit() {
        return $this->limit;
    }

    /**
     * @param mixed $limit
     */
    public function setLimit($limit): void {
        $this->limit = $limit;
    }

    /**
     * @return mixed
     */
    public function getStartAt() {
        return $this->start_at;
    }

    /**
     * @param mixed $start_at
     */
    public function setStartAt($start_at): void {
        $this->start_at = $start_at;
    }

    /**
     * @return mixed
     */
    public function getEndAt() {
        return $this->end_at;
    }

    /**
     * @param mixed $end_at
     */
    public function setEndAt($end_at): void {
        $this->end_at = $end_at;
    }

    /**
     * @return mixed
     */
    public function getReferrerLink() {
        $response = Request::post('/link/do-add-coupon-link', ['info' => [
            'id'            => $this->getId(),
            'aff_id'        => $this->getAffiliateId(),
            'link_img'      => $this->getImage(),
            'material_id'   => $this->getId(),
            'material_type' => 7
        ]]);

        $data = json_decode($response->getBody(), true);

        return $data['data'];
    }
}