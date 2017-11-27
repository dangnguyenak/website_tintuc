<?php

class class_custom extends manage
{

    private function getConnection()
    {
        global $connectionDb;
        return $connectionDb;
    }

    public function query($query)
    {
        if ($query == "")
            return;
        $queryResult = mysqli_query($this->getConnection(), $query);
        return $queryResult;
    }


    public function fetch_assoc($query)
    {
        if ($query == "")
            return;
        $queryResult = $this->query($query);
        if ($queryResult == false)
            return;
        $result = mysqli_fetch_assoc($queryResult);
        return $result;
    }

    public function num_rows($query)
    {
        $result = "";
        if ($query == "")
            return;
        $queryResult = mysqli_query($this->getConnection(), $query);
        if ($queryResult != false)
            $result = mysqli_num_rows($queryResult);
        return $result;
    }


}