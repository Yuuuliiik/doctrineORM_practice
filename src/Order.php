<?php

use Doctrine\ORM\Mapping as ORM;
#[ORM\Entity]
#[ORM\Table(name: 'orders')]

class Order
{
    #[ORM\Id]
    #[ORM\Column(type: 'integer')]
    #[ORM\GeneratedValue]
    private int|null $id = null;


    #[ORM\Column(type: 'integer', unique: true)]
    private $orderNumber;

    #[ORM\Column(type: 'string')]
    private $customerName;


    #[ORM\Column(type: "datetime")]
    private $creationDate;


    #[ORM\Column(type: "boolean")]
    private $isSaleSuccessful;

    #[ORM\Column(type: "datetime", nullable: true)]
    private $saleDate;

    #[ORM\Column(type: "string", nullable: true)]
    private $managerName;


    #[ORM\Column(type: "datetime", nullable: true)]
    private $assignmentDate;


    #[ORM\Column(type: "datetime", nullable: true)]
    private $reassignmentDate;

    // Конструктор для установки начальных значений

    /**
     * @throws Exception
     */
    public function __construct()
    {
        $this->orderNumber = 0;
        $this->customerName = '';
        $this->creationDate = new DateTime();
        $this->isSaleSuccessful = false;
    }

    // Операция "Назначение менеджера"
    public function assignManager(string $managerName)
    {
        if ($this->managerName === null) {
            $this->managerName = $managerName;
            $this->assignmentDate = new DateTime();
        }
    }

    // Операция "Смена менеджера"
    public function reassignManager(string  $newManagerName)
    {
        if ($this->managerName !== null) {
            $this->managerName = $newManagerName;
            $this->reassignmentDate = new DateTime();

        }
    }

    // Операция "Продажа заказа"
    public function sellOrder()
    {
        if (!$this->isSaleSuccessful) {
            $this->isSaleSuccessful = true;
            $this->saleDate = new DateTime();
        }
    }
    public function getSaleStatus(): bool
    {
        return $this->isSaleSuccessful;
    }
    public function getId(): int
    {
        return $this->id;
    }
    public function getManagerName(): string
    {
        return $this->managerName;
    }
    public function getOrderNumber(): int
    {
        return $this->orderNumber;
    }
    public function setOrderNumber(int $newOrderNumber)
    {
        $this->orderNumber = $newOrderNumber;
    }

    public function setCustomerName(string $newCustomerName)
    {
         $this->customerName = $newCustomerName;
    }


}

