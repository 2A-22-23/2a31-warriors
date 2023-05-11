<?php 
class services
{
    private ?int $idservice = null;
    private ?string $description = null;
    private ?float $price = null;
    

    public function __construct($id = null, $desc, $price)
    {
        $this->idservice = $id;
        $this->description = $desc;
        $this->price = $price;
        
        
    }
    /**
     * Get the value of id
     */
    public function getidservice()
    {
        return $this->idservice;
    }


    /**
     * Get the value of description
     */
    public function getdescription()
    {
        return $this->description;
    }

    /**
     * Set the value of description
     *
     * @return  self
     */
    public function setdescription($description)
    {
        $this->description = $description;

        return $this;
    }

        /**
     * Get the value of price
     */
    public function getprice()
    {
        return $this->price;
    }

        /**
     * Set the value of price
     *
     * @return  self
     */
    public function setprice($price)
    {
        $this->price = $price;

        return $this;
    }
}
?>

