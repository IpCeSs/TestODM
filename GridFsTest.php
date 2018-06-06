<?php
use JPC\MongoDB\ODM\Annotations\Mapping as ODM;
use JPC\MongoDB\ODM\GridFS\Annotations\Mapping as GFS;
//notre classe va hériter de la classe Document
use JPC\MongoDB\ODM\GridFS\Document;
//collection dans laquelle vont aller les chunks de fichier
/**
 * @GFS\Document("my_gridfs_bucket")
 */
class GridFsTest extends Document
{
    /**
     * @return mixed
     */
    public function getMeta1()
    {
        return $this->meta1;
    }

    /**
     * @param mixed $meta1
     */
    public function setMeta1($meta1): void
    {
        $this->meta1 = $meta1;
    }
/**
 * @ODM\Field("meta_1");
 * @GFS\Metadata
 */
private $meta1;
}