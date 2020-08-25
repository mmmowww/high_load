<?php
namespace MMMOWWW\interface;
var_dump(__NAMESPACE__);
die();

interface IUser{
    /**
     * Constructor.
     * @param int $id user unique id
     */
    public function __construct(int $id);
    public function getId(): int;
}
