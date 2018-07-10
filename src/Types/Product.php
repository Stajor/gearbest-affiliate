<?php namespace GearBest\Types;

class Product {
    protected $image;
    protected $discount;
    protected $title;
    protected $price;

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
    public function getPrice() {
        return $this->price;
    }

    /**
     * @param mixed $price
     */
    public function setPrice($price): void {
        $this->price = (float)preg_replace("/[^0-9.]/", "", $price);
    }

    /**
     * @return mixed
     */
    public function getReferrerLink() {
        $response = Request::post('/link/do-add-banner-link', ['info' => [
//            'link_url' =>
            'link_img' => $this->getImage(),
//            'aff_id' => ''
//info[cate_id]: 11239
//info[material_id]: 1477852
//info[material_type]: 2
        ]]);



        $data = json_decode($response->getBody(), true);

        return $data['data'];
    }
}