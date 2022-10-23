<?php
class VegetableEntity
{
    private string $name;
    private bool $commentable;
    private string $comment;

    /**
     * VegetableEntity constructor.
     * @param string $name
     * @param bool $commentable
     * @param string $comment
     */
    public function __construct(string $name, bool $commentable=false, string $comment="")
    {
        $this->name = $name;
        $this->commentable = $commentable;
        $this->comment = $comment;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return bool
     */
    public function isCommentable(): bool
    {
        return $this->commentable;
    }

    /**
     * @return string
     */
    public function getComment(): string
    {
        return $this->comment;
    }

    /**
     * @param string $comment
     */
    public function setComment(string $comment): void
    {
        $this->comment = $comment;
    }


}