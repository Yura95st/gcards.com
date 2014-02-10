<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

class FieldsNames
{
    //Cards table values
    public static $CARDS_TABLE = "cards";
    public static $CARDS_ID = "card_id";
    public static $CARDS_COVER_ID = "cover_id";
    public static $CARDS_BLOCKS = "blocks";
    public static $CARDS_HASH_CODE = "hash_code";

    //Blocks table values
    public static $BLOCKS_TABLE = "blocks";
    public static $BLOCKS_ID = "block_id";
    public static $BLOCKS_POSITION = "position";
    public static $BLOCKS_CONTENT = "content";

    //Covers table values
    public static $COVERS_TABLE = "covers";
    public static $COVERS_ID = "cover_id";
    public static $COVERS_PARTITION_ID = "partition_id";
    public static $COVERS_PATH_ORIGINAL = "path_original";
    public static $COVERS_PATH_MINI = "path_mini";
    public static $COVERS_VISIBLE_TO_ALL = "visible_to_all";



    //JSON Position fields
    public static $JSON_POSITION_X = "x";
    public static $JSON_POSITION_Y = "y";
    public static $JSON_POSITION_HEIGHT = "height";
    public static $JSON_POSITION_WIDTH = "width";
    public static $JSON_POSITION_ANGLE = "angle";

    //JSON Block fields
    public static $JSON_BLOCK_CONTENT = "content";
    public static $JSON_BLOCK_POSITION = "position";

    //JSON Card fields
    public static $JSON_CARDS_BLOCKS = "blocks";
    public static $JSON_CARDS_COVER_ID = "coverId";
}