<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

require_once(APPPATH . 'models/resources/fields_names.php');
require_once(APPPATH . 'models/entities/cover.php');

class Cover_Processor extends CI_Model
{
    function __construct()
    {
        //Call the Model constructor
        parent::__construct();
    }

    /**
     * @param int $coverId
     * @return Cover|null
     */
    public function getCover($coverId)
    {
        $cover = null;

        if ($coverId != null) {
            $sql = " SELECT " . FieldsNames::$COVERS_ID . "," . FieldsNames::$COVERS_PARTITION_ID . "," .
                FieldsNames::$COVERS_PATH_ORIGINAL . "," . FieldsNames::$COVERS_PATH_MINI . "," .
                FieldsNames::$COVERS_VISIBLE_TO_ALL .
                " FROM " . FieldsNames::$COVERS_TABLE .
                " WHERE " . FieldsNames::$COVERS_ID . " = ? LIMIT 1";

            $query = $this->db->query($sql, array($coverId));

            if ($query != null && $query->num_rows() > 0) {
                foreach ($query->result_array() as $row) {
                    $cover = $this->getCoverFromRow($row);
                }
            }
        }

        return $cover;
    }

    /**
     * @param array $coversIdArray
     * @return array
     */
    public function getCovers($coversIdArray)
    {
        if ($coversIdArray == null || sizeof($coversIdArray) == 0) {
            return array();
        }

        $sql = " SELECT " . FieldsNames::$COVERS_ID . "," . FieldsNames::$COVERS_PARTITION_ID . "," .
            FieldsNames::$COVERS_PATH_ORIGINAL . "," . FieldsNames::$COVERS_PATH_MINI . "," .
            FieldsNames::$COVERS_VISIBLE_TO_ALL .
            " FROM " . FieldsNames::$COVERS_TABLE .
            " WHERE " . FieldsNames::$COVERS_ID . " IN (?)";

        $query = $this->db->query($sql, array($coversIdArray));

        return $this->getCoversFromQuery($query);
    }

    /**
     * @return array
     */
    public function getAllCovers()
    {
        $sql = " SELECT " . FieldsNames::$COVERS_ID . "," . FieldsNames::$COVERS_PARTITION_ID . "," .
            FieldsNames::$COVERS_PATH_ORIGINAL . "," . FieldsNames::$COVERS_PATH_MINI . "," .
            FieldsNames::$COVERS_VISIBLE_TO_ALL .
            " FROM " . FieldsNames::$COVERS_TABLE;

        $query = $this->db->query($sql);

        return $this->getCoversFromQuery($query);
    }

    /**
     * @return array
     */
    public function getAllVisibleCovers()
    {
        $sql = " SELECT " . FieldsNames::$COVERS_ID . "," . FieldsNames::$COVERS_PARTITION_ID . "," .
            FieldsNames::$COVERS_PATH_ORIGINAL . "," . FieldsNames::$COVERS_PATH_MINI . "," .
            FieldsNames::$COVERS_VISIBLE_TO_ALL .
            " FROM " . FieldsNames::$COVERS_TABLE .
            " WHERE " . FieldsNames::$COVERS_VISIBLE_TO_ALL . " = 1";

        $query = $this->db->query($sql);

        return $this->getCoversFromQuery($query);
    }

    public function getCoversCount()
    {
        return $this->db->count_all(FieldsNames::$COVERS_TABLE);
    }

    /**
     * @param $query
     * @return array
     */
    private function getCoversFromQuery($query)
    {
        $covers = array();

        if ($query != null && $query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                $cover = $this->getCoverFromRow($row);

                if ($cover != null) {
                    array_push($covers, $cover);
                }
            }
        }

        return $covers;
    }

    /**
     * @param array $row
     * @return Cover|null
     */
    private function getCoverFromRow($row)
    {
        $cover = null;

        if ($row != null) {
            $cover = new Cover();
            $cover->setId($row[FieldsNames::$COVERS_ID]);
            $cover->setPathOriginal($row[FieldsNames::$COVERS_PATH_ORIGINAL]);
            $cover->setPathMini($row[FieldsNames::$COVERS_PATH_MINI]);
            $cover->setVisibleToAll($row[FieldsNames::$COVERS_VISIBLE_TO_ALL]);
        }

        return $cover;
    }
}