<?php

class BaseActiveRecord {

    function save(): void {}

    function delete(): bool { return true; } 

    function find($id): void {}

    function findAll(): void {}

}

?>