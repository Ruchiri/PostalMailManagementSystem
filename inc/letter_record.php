<?php


class letter_record
{
    private static $letter_count = 0;
    private static $ref_count = 0;
    private $id;
    private $reg_no;
    private $date;
    private $section;
    private $subject;
    private $sender;
    private $scan_copy;
    private $ref_id;
    private $replied;
    private $marked;

    /**
     * letter_record constructor.
     */
    public function __construct($id, $date, $section, $subject, $sender, $scan_copy, $ref_id,$replied)
    {
        $this->id = $id;
        $this->date = $date;
        $this->section = $section;
        $this->subject = $subject;
        $this->sender = $sender;
        $this->scan_copy = $scan_copy;
        $this->ref_id = $ref_id;
         $this->replied = $replied;
        $this->marked = 0;
        self::$letter_count++;
    }


    /**
     * @return mixed
     */
    public function getSender()
    {
        return $this->sender;
    }

    /**
     * @param mixed $sender
     */
    public function setSender($sender)
    {
        $this->sender = $sender;
    }


    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getRegNo()
    {
        return $this->reg_no;
    }

    /**
     * @param mixed $reg_no
     */
    public function setRegNo($reg_no)
    {
        $this->reg_no = $reg_no;
    }

    /**
     * @return mixed
     */
    public function getSubject()
    {
        return $this->subject;
    }

    /**
     * @param mixed $subject
     */
    public function setSubject($subject)
    {
        $this->subject = $subject;
    }

    /**
     * @return mixed
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param mixed $date
     */
    public function setDate($date)
    {
        $this->date = $date;
    }

    /**
     * @return mixed
     */
    public function getSection()
    {
        return $this->section;
    }

    /**
     * @param mixed $section
     */
    public function setSection($section)
    {
        $this->section = $section;
    }

    /**
     * @return mixed
     */
    public function getSubjetct()
    {
        return $this->subjetct;
    }

    /**
     * @param mixed $subjetct
     */
    public function setSubjetct($subjetct)
    {
        $this->subjetct = $subjetct;
    }

    /**
     * @return mixed
     */
    public function getScanCopy()
    {
        return $this->scan_copy;
    }

    /**
     * @param mixed $scan_copy
     */
    public function setScanCopy($scan_copy)
    {
        $this->scan_copy = $scan_copy;
    }

    /**
     * @return mixed
     */
    public function getRefId()
    {
        return $this->ref_id;
    }

    /**
     * @param mixed $ref_id
     */
    public function setRefId($ref_id)
    {
        $this->ref_id = $ref_id;
    }

    /**
     * @return mixed
     */
    public function getReplied()
    {
        return $this->replied;
    }

    /**
     * @param mixed $replied
     */
    public function setReplied($replied)
    {
        $this->replied = $replied;
    }

    /**
     * @return int
     */
    public function getMarked()
    {
        return $this->marked;
    }

    /**
     * @param int $marked
     */
    public function setMarked($marked)
    {
        $this->marked = $marked;
    }


}

function find_recoDb($id, $connection)
{

    $cmd = "SELECT *FROM letter WHERE id='$id'";
    mysqli_set_charset($connection, 'utf8');
    $record = mysqli_query($connection, $cmd);
    $reco = $record->fetch_array();
    $reco_obj = new letter_record($reco['id'], $reco['date'], $reco['section'], $reco['subject'], $reco['sender'], $reco['rec_letter'], $reco['ref_id'],$reco['replied']);
    if ($reco['reg_no'] != null) {
        $reco_obj->setRegNo($reco['reg_no']);
    }
    $n_cmd = "SELECT letter_id from notification WHERE letter_id='$id'";
    $result = mysqli_query($connection, $n_cmd);
    $notice = $result->fetch_array();
    if (empty($notice)) {
        $reco_obj->setMarked(0);
    } else {
        $reco_obj->setMarked(1);
    }
    return $reco_obj;
}


?>