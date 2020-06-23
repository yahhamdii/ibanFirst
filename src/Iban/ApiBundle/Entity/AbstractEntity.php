<?php

namespace Iban\ApiBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use JMS\Serializer\Annotation as Serializer;

/**
 * Abstract
 *
 * @ORM\MappedSuperclass
 */
abstract class AbstractEntity {

    /**
     * @var int
     * @Serializer\Type(name="int")
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @Serializer\Groups({"add", "update", "list", "detail", "listitems", "moq", "search", "credit", "list_credit", "list_pricing"})
     * @Serializer\Type("integer")
     */
    protected $id;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     * @Gedmo\Timestampable(on="create")
     * @Serializer\Groups({"add", "update", "list", "detail", "list_credit"})
     * @Serializer\Type("DateTime")
     * @Serializer\Expose
     */
    protected $dateCreate;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     * @Gedmo\Timestampable(on="update")
     * @Serializer\Expose
     * @Serializer\Groups({"add", "update", "list", "detail", "list_credit"})
     * @Serializer\Type("DateTime")
     */
    protected $dateUpdate;

    /**
     * Get id.
     *
     * @return int
     */
    public function getId() {
        return $this->id;
    }

}
