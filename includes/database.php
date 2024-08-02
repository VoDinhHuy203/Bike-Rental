<?php

function query($sql, $data = [], $check = false)
{
    global $con;
    $ketqua = false;
    try {

        $statement = $con->prepare($sql);

        if (!empty($data)) {
            $ketqua = $statement->execute($data);
        } else {
            $ketqua = $statement->execute();
        }
    } catch (Exception $e) {
        echo $e->getMessage() . '<br>';
        echo 'File: ' . $e->getFile() . '<br>';
        echo 'Line: ' . $e->getLine() . '<br>';
        die();
    }

    if ($check) {
        return $statement;
    }

    return $ketqua;
}

// Hàm insert vào data
function insert($table, $data)
{
    $key = array_keys($data);
    $truong = implode(',', $key);
    $valueTable = ':' . implode(',:', $key);

    $sql = 'INSERT INTO ' . $table . '(' . $truong . ')' . 'VALUES(' . $valueTable . ')';

    $kq = query($sql, $data);
    return $kq;
}

// Hàm update data
function update($table, $data, $condition = '')
{
    $update = '';
    foreach ($data as $key => $value) {
        $update .= $key . ' = :' . $key . ',';
    }
    $update = trim($update, ',');

    if (!empty($condition)) {
        $sql = 'UPDATE ' . $table . ' SET ' . $update . ' WHERE ' . $condition;
    } else {
        $sql = 'UPDATE ' . $table . ' SET ' . $update;
    }
    $kq = query($sql, $data);
    return $kq;
}

//Hàm delete data
function delete($table, $condition = '')
{
    if (empty($condition)) {
        $sql = 'DELETE FROM ' . $table;
    } else {
        $sql = 'DELETE FROM ' . $table . ' WHERE ' . $condition;
    }

    $kq = query($sql);
    return $kq;
}

// Lấy nhiều đòng dữ liệu
function getRaw($sql)
{
    $kq = query($sql, '', true);
    if (is_object($kq)) {
        $dataFetch = $kq->fetchAll(PDO::FETCH_ASSOC);
    }
    return $dataFetch;
}

// Lấy 1 đòng dữ liệu
function oneRaw($sql)
{
    $kq = query($sql, '', true);
    if (is_object($kq)) {
        $dataFetch = $kq->fetch(PDO::FETCH_ASSOC);
    }
    return $dataFetch;
}

// Đếm số dòng dữ liệu
function getRows($sql)
{
    $kq = query($sql, '', true);
    if (is_object($kq)) {
        return $kq->rowCount();
    }
}
