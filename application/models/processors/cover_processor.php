<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

require_once(APPPATH . 'models/resources/fields_names.php');
require_once(APPPATH . 'libraries/validation.php');
require_once(APPPATH . 'models/entities/cover.php');

class Cover_Processor extends CI_Model
{
    private $uploaderConfig = array(
        'tempFolderPath' => 'img/covers/temp/',
        'originalFolderPath' => 'img/covers/original/',
        'originalWidthMax' => 1920,
        'originalHeightMax' => 1080,
        'miniFolderPath' => 'img/covers/mini/',
        'miniWidthMax' => 200,
        'miniHeightMax' => 112,
        'partitionId' => 0
    );

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

// coverId int value is in range of : min = 1, max = 999999
        if (Validation::isInteger($coverId, 1, 999999)) {
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
        if ($coversIdArray == null || sizeof($coversIdArray) == 0
            || !Validation::arrayHasOnlyIntegers($coversIdArray)
        ) {
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
     * @param Cover $cover
     * @return array|bool
     */
    public function setNewCover($cover)
    {
        if ($cover == null) {
            return false;
        }

        $data = array(
            FieldsNames::$COVERS_PARTITION_ID => $cover->getPartitionId(),
            FieldsNames::$COVERS_PATH_ORIGINAL => $cover->getPathOriginal(),
            FieldsNames::$COVERS_PATH_MINI => $cover->getPathMini(),
            FieldsNames::$COVERS_VISIBLE_TO_ALL => $cover->getVisibleToAll()
        );

        $query = $this->db->insert(FieldsNames::$COVERS_TABLE, $data);

        if ($this->db->affected_rows() == 0) {
            return false;
        }

//Return id of the new cover
        return $this->db->insert_id();
    }

    /**
     * @param array $coversArray
     * @param int $partitionId
     * @return array
     */
    public function getCoversFromArrayByPartitionId($coversArray, $partitionId)
    {
        $covers = array();

        foreach ($coversArray as $cover) {
            if ($cover->getPartitionId() == $partitionId) {
                array_push($covers, $cover);
            }
        }

        return $covers;
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
            $cover->setPartitionId($row[FieldsNames::$COVERS_PARTITION_ID]);
            $cover->setVisibleToAll($row[FieldsNames::$COVERS_VISIBLE_TO_ALL]);
        }

        return $cover;
    }

    // Create new covers from $this->uploaderConfig['tempFolderPath'] folder
    public function createNewCoversFromFiles()
    {
        $images = $this->getImagesFromDirectory();

        if (sizeof($images) == 0) {
            echo 'Directory is empty' . "\n";
            return;
        }

        $this->load->library('image_lib');

        foreach ($images as $image) {
            $this->createCoverFromFile($image);
        }
    }

    private function getImagesFromDirectory()
    {
        $this->load->helper('directory');
        return directory_map($this->uploaderConfig['tempFolderPath'], 1);
    }

    private function createCoverFromFile($filePath)
    {
        static $counter = 0;

        $coverName = md5($filePath .time() . $counter++) . '.jpg';
        $coverPath = $this->uploaderConfig['originalFolderPath'] . $coverName;

        //Copy original cover file from temp folder
        if (!copy($this->uploaderConfig['tempFolderPath'] . $filePath, $coverPath)) {
            echo 'Failed to copy ' . $coverPath . "\n";
            return false;
        }

        $imageData = array(
            'image_width' => $this->uploaderConfig['originalWidthMax'],
            'image_height' => $this->uploaderConfig['originalHeightMax'],
            'full_path' => $coverPath
        );

        // Resize uploaded file according to original cover configs
        if (!$this->resizeCoverOriginal($imageData)) {
            echo $this->image_lib->display_errors();
            return false;
        }

        $miniCoverName = md5($filePath .time() . $counter++) . '.jpg';
        $miniCoverPath = $this->uploaderConfig['miniFolderPath'] . $miniCoverName;

        // Create mini-cover from uploaded image
        if (!$this->createCoverMini($imageData, $miniCoverPath)) {
            echo $this->image_lib->display_errors();
            return false;
        }

        $cover = new Cover();
        $cover->setPathOriginal($coverPath);
        $cover->setPathMini($miniCoverPath);
        $cover->setPartitionId($this->uploaderConfig['partitionId']);

        $coverId = $this->setNewCover($cover);

        if ($coverId == false) {
            echo 'Error!' . "\n";
            return false;
        }

        echo 'Congrats! Cover uploaded successfully! Id: ' . $coverId . "\n";
        return true;
    }

    private function resizeCoverOriginal($imageData)
    {
        // Image is smaller, than max values - no need to resize it
        if ($imageData['image_width'] <= $this->uploaderConfig['originalWidthMax'] && $imageData['image_height'] <= $this->uploaderConfig['originalHeightMax']) {
            return true;
        }

        $config = array(
            'source_image' => $imageData['full_path'],
            'maintain_ratio' => false,
            'width' => $this->uploaderConfig['originalWidthMax'],
            'height' => $this->uploaderConfig['originalHeightMax']
        );

        $this->image_lib->clear();
        $this->image_lib->initialize($config);

        return $this->image_lib->resize();
    }

    private function createCoverMini($imageData, $miniCoverPath)
    {
        $width = $this->uploaderConfig['miniWidthMax'];
        $height = $this->uploaderConfig['miniHeightMax'];

        $dim = (intval($imageData["image_width"]) / intval($imageData["image_height"])) - ($width / $height);

        // Resize image
        $config = array(
            'quality' => '100%',
            'source_image' => $imageData['full_path'],
            'new_image' => $miniCoverPath,
            'maintain_ratio' => true,
            'width' => $width,
            'height' => $height,
            'master_dim' => ($dim > 0) ? 'height' : 'width'
        );

        $this->image_lib->clear();
        $this->image_lib->initialize($config);

        if (!$this->image_lib->resize()) {
            return false;
        }

        // Crop image to fit block
        $config = array(
            'quality' => '100%',
            'source_image' => $miniCoverPath,
            'maintain_ratio' => false,
            'width' => $width,
            'height' => $height,
            'x_axis' => '0',
            'y_axis' => '0'
        );

        // to crop central part
        //'x_axis' => (intval($imageData["image_width"]) – $width / 2),
        //'y_axis' => (intval($imageData["image_height"]) – $height / 2)

        $this->image_lib->clear();
        $this->image_lib->initialize($config);

        return $this->image_lib->crop();
    }

    private function uploadImage()
    {
        $config = array(
            'allowed_types' => 'gif|jpg|png',
            'upload_path' => $this->uploaderConfig['originalFolderPath'],
            'max_size' => 1024 * 8,
            'encrypt_name' => TRUE,
        );
        $this->load->library('upload', $config);

        return $this->upload->do_upload();
    }

    public function uploadCover()
    {
        $result_json = array('success' => false);

        // Uploading received image
        if (!$this->uploadImage()) {
            $msg = $this->upload->display_errors('', '');
        } else {
            $imageData = $this->upload->data();

            $this->load->library('image_lib');

            // Resize uploaded file according to original cover configs
            if (!$this->resizeCoverOriginal($imageData)) {
                $result_json['msg'] = $this->image_lib->display_errors();
            } else {
                $miniCoverName = md5(time()) . '.jpg';
                $miniCoverPath = $this->uploaderConfig['miniFolderPath'] . $miniCoverName;

                // Create mini-cover from uploaded image
                if (!$this->createCoverMini($imageData, $miniCoverPath)) {
                    $result_json['msg'] = $this->image_lib->display_errors();
                } else {
                    $cover = new Cover();
                    $cover->setPathOriginal($this->uploaderConfig['originalFolderPath'] . $imageData['file_name']);
                    $cover->setPathMini($miniCoverPath);
                    $cover->setPartitionId($this->uploaderConfig['partitionId']);

                    $coverId = $this->setNewCover($cover);

                    if ($coverId == false) {
                        $result_json['msg'] = 'Error!';
                    } else {
                        $result_json['msg'] = 'Congrats! Uploaded successfully!';
                        $result_json['success'] = true;
                    }
                }
            }
        }

        echo json_encode($result_json);
    }
}