<?php

namespace App\Entity;

use App\Repository\RoomRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=RoomRepository::class)
 */
class Room
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=3)
     */
    private $number;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $comment;

    /**
     * @ORM\OneToOne(targetEntity="Floor")
     *
     */
    private $floor;

    /**
     * @var ArrayCollection
     * @ORM\ManyToMany(targetEntity="Task")
     */
    private $tasks;

    /**
     * @var ArrayCollection
     * @ORM\OneToMany(targetEntity="Journal", mappedBy="room")
     */
    private $journal;

    /**
     * @var \DateTime $created
     *
     * @Gedmo\Timestampable(on="create")
     * @ORM\Column(type="datetime")
     */
    private $created;

    /**
     * @var \DateTime $updated
     *
     * @Gedmo\Timestampable(on="update")
     * @ORM\Column(type="datetime")
     */
    private $updated;

    /**
     * @var \DateTime $contentChanged
     *
     * @ORM\Column(name="content_changed", type="datetime", nullable=true)
     * @Gedmo\Timestampable(on="change", field={"title", "body"})
     */
    private $contentChanged;


    public function __construct()
    {
        $this->tasks = new ArrayCollection();
            }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumber(): ?string
    {
        return $this->number;
    }

    public function setNumber(string $number): self
    {
        $this->number = $number;

        return $this;
    }

    public function getComment(): ?string
    {
        return $this->comment;
    }

    public function setComment(?string $comment): self
    {
        $this->comment = $comment;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getFloor()
    {
        return $this->floor;
    }

    /**
     * @param mixed $floor
     * @return Room
     */
    public function setFloor($floor)
    {
        $this->floor = $floor;
        return $this;
    }



    /**
     * @return \DateTime
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * @param \DateTime $created
     */
    public function setCreated($created)
    {
        $this->created = $created;
    }

    /**
     * @return \DateTime
     */
    public function getUpdated()
    {
        return $this->updated;
    }

    /**
     * @param \DateTime $updated
     */
    public function setUpdated($updated)
    {
        $this->updated = $updated;
    }

    /**
     * @return \DateTime
     */
    public function getContentChanged()
    {
        return $this->contentChanged;
    }

    /**
     * @param \DateTime $contentChanged
     */
    public function setContentChanged($contentChanged)
    {
        $this->contentChanged = $contentChanged;
    }

    /**
     * @return ArrayCollection
     */
    public function getTasks()
    {
        return $this->tasks;
    }

    /**
     * @return ArrayCollection
     */
    public function getJournal()
    {
        return $this->journal;
    }

    /**
     * @param mixed $task
     */
    public function addTask($task)
    {
        $this->tasks->add($task);
        // uncomment if you want to update other side
        //$task->setRoom($this);
    }

    /**
     * @param mixed $task
     */
    public function removeTask($task)
    {
        $this->tasks->removeElement($task);
        // uncomment if you want to update other side
        //$task->setRoom(null);
    }

    /**
     * @param mixed $journal
     */
    public function addJournal($journal)
    {
        $this->journal->add($journal);
        // uncomment if you want to update other side
        //$journal->setRoom($this);
    }

    /**
     * @param mixed $journal
     */
    public function removeJournal($journal)
    {
        $this->journal->removeElement($journal);
        // uncomment if you want to update other side
        //$journal->setRoom(null);
    }


}
